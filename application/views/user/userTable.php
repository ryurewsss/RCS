<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">

        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">จัดการสมาชิก</a>
            <button style="margin-left: 75%;" type="button" class="btn btn-success d-none d-lg-block m-l-12" data-toggle="modal" data-toggle="modal" data-target="#modalAddUser" id="addMoney" data-whatever="@mdo">เพิ่มสมาชิก (+)</button> &ensp;
            <!-- <button type="button" class="btn btn-warning d-none d-lg-block m-l-5" data-toggle="modal" data-toggle="modal" data-target="#modalOutmoney" id="outMoney" data-whatever="@fat">รายจ่าย (-)</button> -->
        </div>
    </div>
    <div class="card-body">
        <div id="commerceTable"></div>
    </div>
</div>
<!-- End Table -->

<!-- Open Modal Addmoney -->
<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">เพิ่มสมาชิก (+)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addUser">
                <div class="modal-body">
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 98px;">อีเมล<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="email" class="form-control" name="register[]" id="user_email" autocomplete="off" placeholder="อีเมล" value="" required>
                        <br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 77px;">รหัสผ่าน<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="password" class="form-control" name="register[]" id="user_password" autocomplete="off" placeholder="รหัสผ่าน" value="" required>
                        <br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 40px;">ยืนยันรหัสผ่าน<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="password" class="form-control" id="confirm-password" autocomplete="off" placeholder="ยืนยันรหัสผ่าน" value="" required>
                        <br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 114px;">ชื่อ<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="register[]" id="user_fname" autocomplete="off" placeholder="ชื่อ" value="" required>
                        <br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 77px;">นามสกุล<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="register[]" id="user_lname" autocomplete="off" placeholder="นามสกุล" value="" required>
                        <br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 42px;">เบอร์โทรศัพท์<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="tel" class="form-control" name="register[]" id="user_phone" autocomplete="off" placeholder="เบอร์โทรศัพท์" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                        <br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 80px;">ประเภท <a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <select style="width: 250px;" id="user_type_id" class="form-control form-control-line" name="register[]" required>
                            <option disabled selected value="">เลือกประเภท</option>
                            <?php
                            if (isset($select)) {
                                foreach ($select as $key => $val) {
                                    echo "<option value=" . $val->user_type_id . ">" . $val->user_type_name . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <!-- <input style="width: 250px;" type="number" min="0" step="0.01" oninput="validity.valid||(value='');" class="form-control" name="commerceInputData[]" id="transaction_cash" autocomplete="off" placeholder="0.00">
                        <label style="margin-left: 11px;"> บาท </label>
                        <label style="margin-left: 20px;" id="incomeError" class="text-danger"></label> -->
                    </div>
                    <label style="margin-left: 20px;" id="regisError" class="text-danger"></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" id="register-submit" class="btn waves-effect waves-light btn-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Addmoney -->

<!-- Start EditData -->
<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">แก้ไขข้อมูล</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editUser">
                <div class="modal-body">
                <div class="row">
                        <label style="text-indent: 20px; margin-right: 100px;">อีเมล<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="email" class="form-control" name="editData[]" id="user_email" autocomplete="off" placeholder="อีเมล" value="" required>
                        <br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 114px;">ชื่อ<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="editData[]" id="user_fname" autocomplete="off" placeholder="ชื่อ" value="" required>
                        <br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 77px;">นามสกุล<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="editData[]" id="user_lname" autocomplete="off" placeholder="นามสกุล" value="" required>
                        <br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 42px;">เบอร์โทรศัพท์<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="tel" class="form-control" name="editData[]" id="user_phone" autocomplete="off" placeholder="เบอร์โทรศัพท์" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                        <br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 80px;">ประเภท <a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <select style="width: 250px;" id="user_type_id" class="form-control form-control-line" name="editData[]" required>
                            <option disabled selected value="">เลือกประเภท</option>
                            <?php
                            if (isset($select)) {
                                foreach ($select as $key => $val) {
                                    echo "<option value=" . $val->user_type_id . ">" . $val->user_type_name . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <!-- <input style="width: 250px;" type="number" min="0" step="0.01" oninput="validity.valid||(value='');" class="form-control" name="commerceInputData[]" id="transaction_cash" autocomplete="off" placeholder="0.00">
                        <label style="margin-left: 11px;"> บาท </label>
                        <label style="margin-left: 20px;" id="incomeError" class="text-danger"></label> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="user_id" name="editData[]">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn waves-effect waves-light btn-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End EditData -->
<script>
    getList();

    $('#addUser').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser

        var formData = {};
        $("[name^='register']").each(function() {
            formData[this.id] = this.value;
        });
        if (formData['user_email'] == '' || formData['user_password'] == '' || $('#confirm-password').val() == '') {
                $('#regisError').html('Please fill in the correct details.');
                // $('#regisError').html('กรุณากรอกรายละเอียดให้ถูกต้อง');
                pass = false;
        }
        if (formData['user_password'] != $('#confirm-password').val()) {
            $('#regisError').html('รหัสผ่านไม่ถูกต้อง.');
            // $('#regisError').html('กรุณากรอกรายละเอียดให้ถูกต้อง');
            pass = false;
        }else{
        $.ajax({  
            url:"addUser",
            method:"POST",  
            data:formData
        }).done(function(returnData) {
            getList();
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Add User Complete',
                    showConfirmButton: false,
                    timer: 1500
                    })
            $('#modalAddUser form')[0].reset();
            $('#modalAddUser').modal('hide'); //ปิด modal
        });
        }
        
    })

    $('#editUser').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
       
        var formData = {};
        $("[name^='editData']").each(function() {
            formData[this.id] = this.value;
        });

        $.ajax({  
            url:"editUser",
            method:"POST",  
            data:formData
        }).done(function(returnData) {
            getList();
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Add Data User Complete',
                    showConfirmButton: false,
                    timer: 1500
                    })
            $('#editData form')[0].reset();
            $('#editData').modal('hide'); //ปิด modal
        });
    })

    function getList() {
        $.ajax({
            method: "POST",
            url: "getUser",
        }).done(function(returnedData) {
            $('#commerceTable').html(returnedData.html);
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