<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <a class="m-b-0 text-white" style="font-size: 23px;">ข้อมูลส่วนตัว</a>
    </div>
    <div class="card-body">
        <div id="profileTable"></div>
    </div>
</div>
<!-- End Table -->

<!-- Start Modal EditData -->
<div class="modal" id="changePasswordmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">เปลี่ยนรหัสผ่าน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-material" method="post" id="editForm">
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 105px;">อีเมลล์ </label> : &ensp;
                        <input type="email" style="width: 350px;" class="form-control" name="changePassword[]" id="user_email" disabled>
                    </div><br>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 57px;">รหัสผ่านเดิม<a style="color: red; word-spacing: 1px;"> *</a></label> : &ensp;
                        <input type="password" style="width: 350px;" class="form-control passwordOld" placeholder="ใส่รหัสผ่านเดิม">
                    </div><br>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 54px;">รหัสผ่านใหม่<a style="color: red; word-spacing: 1px;"> *</a> </label> : &ensp;
                        <input type="password" style="width: 350px;" class="form-control newPass" id="passwordNew" placeholder="ใส่รหัสผ่านใหม่">
                    </div><br>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 10px;">รหัสผ่านใหม่อีกครั้ง<a style="color: red; word-spacing: 1px;"> *</a></label> : &ensp;
                        <input type="password" style="width: 350px;" class="form-control newPass" name="changePassword[]" id="user_password" placeholder="ยืนยันรหัสผ่านใหม่อีกครั้ง">
                    </div><br>
                    <div class="modal-footer">
                        <label id="passwordEditError" class="text-danger"></label>
                        <button type="button" class="btn waves-effect waves-light btn-danger" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn waves-effect waves-light btn-success" id="submitEdit">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal EditData -->

<script>
    $('#changePasswordmodal').on('hidden.bs.modal', function() {
        $('#changePasswordmodal form')[0].reset();
        $('#passwordEditError').html('');
    }); // add modal reset

    getList();


    $('#editForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
        var pass = true;
        // console.log(555)
        passwordNew = $("#passwordNew").val();
        passwordNewAgain = $("#user_password").val();
        if (passwordNew != passwordNewAgain || (passwordNew == '' && passwordNewAgain == '')) {
            $('#passwordEditError').html('<span class="text-danger"> กรุณาใส่รหัสผ่านให้ถูกต้อง</span>');
            pass = false;
        }
        // console.log(passwordNew + "___" + passwordNewAgain)
        var passwordData = {};
        passwordData['tableName'] = 'crs_user';
        passwordData['columnName'] = 'user_password';
        passwordData['password'] = $(".passwordOld").val();

        $.ajax({
            url: "checkPassword",
            method: "POST",
            data: passwordData
        }).done(function(returnData) {
            console.log(returnData + "ASD")
            if (!returnData) {
                $('#passwordEditError').html('<span class="text-danger"> กรุณาใส่รหัสผ่านให้ถูกต้อง</span>');
            }
            if (pass && returnData) {
                Swal.fire({
                    title: 'ยืนยันการเปลี่ยนรหัส',
                    text: "ต้องการเปลี่ยนรหัสหรือไม่",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                var tableData = {};
                tableData['tableName'] = 'crs_user';
                tableData['columnIdName'] = 'user_id';

                var formData = {};

                $("[name^='changePassword']").each(function() {
                    formData[this.id] = this.value;
                });

                console.log(formData);
                $.ajax({
                    method: "POST",
                    url: "changePassword",
                    data: {
                        table: tableData,
                        arrayData: formData
                    },
                }).done(function(returnData) {
                    getList();
                    // $.toast({
                    //     heading: 'สำเร็จ',
                    //     text: 'แก้ไขข้อมูลสำเร็จ',
                    //     position: 'top-right',
                    //     loaderBg: '#ff6849',
                    //     icon: 'success',
                    //     hideAfter: 3500,
                    //     stack: 3
                    // });
                    $('#changePasswordmodal form')[0].reset();
                    $('#passwordEditError').html('');
                    $('#changePasswordmodal').modal('hide'); //ปิด modal
                });
                })
            } else {
                console.log("ASD")
            }
        });

    })

    function getList() {
        var data = {};
        data['tableName'] = 'crs_user';
        data['colName'] = '';
        data['where'] = 'user_id = ' + <?php echo $_SESSION['id'] ?>;
        data['order'] = '';
        data['arrayJoinTable'] = '';
        data['groupBy'] = '';
        data['pathView'] = 'profile/tableProfile';

        $.ajax({
            method: "POST",
            url: "getTable",
            data: data,
        }).done(function(returnedData) {
            $('#profileTable').html(returnedData.html);
            $('.mytb').dataTable({
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ ข้อมูล",
                    "sSearch": "ค้นหา : ",
                    "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ ข้อมูล",
                    "oPaginate": {
                        "sPrevious": "ย้อนกลับ",
                        "sNext": "ถัดไป"
                    },
                    "sZeroRecords": "ไม่พบข้อมูลที่ต้องการ",
                    "sInfoFiltered": "(ค้นหาจากทั้งหมด _MAX_ ข้อมูล)",
                    "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 ข้อมูล"
                }
            });
            console.log(returnedData.table)
        });

    } //show auto
</script>