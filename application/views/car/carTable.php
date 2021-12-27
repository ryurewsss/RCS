
<html>
<head>
<style>
#modalAddmoney .row {
  /* text-indent: 10%; */
  text-indent: 10px;
  padding-bottom: 10px;
}
#modalAddmoney .row label {
    margin-top: 0.5rem
}
#car_image{
    width: 50%;
    height: auto;
}

</style>
</head>
</html>

<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">

        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ข้อมูลรถเช่า</a>
            <button style="margin-left: 77%;" type="button" class="btn btn-success d-none d-lg-block m-l-12 " data-toggle="modal" data-toggle="modal" data-target="#modalAddmoney" id="addMoney" data-whatever="@mdo">เพิ่มรถเช่า (+)</button> &ensp;
            <!-- <button type="button" class="btn btn-warning d-none d-lg-block m-l-5" data-toggle="modal" data-toggle="modal" data-target="#modalOutmoney" id="outMoney" data-whatever="@fat">รายจ่าย (-)</button> -->
        </div>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="col mr-2">
                            <div class="h3 font-weight-bold text-gray-900 text-uppercase mb-1">รวมรายรับ</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-900" align="right" id="sum_income"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="col mr-2">
                            <div class="h3 font-weight-bold text-gray-900 text-uppercase mb-1">รวมรายจ่าย</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-900" align="right" id="sum_expense"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="col mr-2">
                            <div class="h3 font-weight-bold text-gray-900 text-uppercase mb-1">ยอดเงินคงเหลือ</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-900" align="right" id="sum"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="commerceTable"></div>
    </div>
</div>
<!-- End Table -->

<!-- Open Modal Addmoney -->
<div class="modal fade" id="modalAddmoney" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">เพิ่มรถเช่า (+)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="incomeForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <label >เลขทะเบียน <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="carInputData[]" id="car_registration" autocomplete="off" placeholder="เลขทะเบียนรถยนต์">
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label >ยี่ห้อ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="carInputData[]" id="car_brand" autocomplete="off" placeholder="ยี่ห้อรถยนต์">
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label >รุ่น <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="carInputData[]" id="car_model" autocomplete="off" placeholder="รุ่นรถยนต์">
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label >คุณสมบัติ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="carInputData[]" id="car_feature" autocomplete="off" placeholder="คุณสมบัติรถยนต์">
                    </div><!-- อาจทำเป็นกดปุ่มเพิ่มคุณสมบัติ -->
                    <div class="row">
                        <div class="col-3">
                            <label >คำอธิบาย <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="carInputData[]" id="car_description" autocomplete="off" placeholder="คำอธิบายรถยนต์">
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label >ราคาต่อวัน <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="number" min="0" step="0" oninput="validity.valid||(value='');" class="form-control" name="carInputData[]" id="car_price" autocomplete="off" placeholder="0">
                        <label style="margin-left: 11px;"> บาท </label>
                        <label style="margin-left: 20px;" id="incomeError" class="text-danger"></label>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label >รูปรถยนต์ </label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="file" class="form-control" name="carInputData[]" id="car_upload" autocomplete="off" onchange="readURL(this);">
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <img id="car_image" src="#" alt="your image" hidden/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <!-- <button type="submit" class="btn waves-effect waves-light btn-success">บันทึก</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Addmoney -->

<!-- Open Modal Outmoney -->
<div class="modal fade" id="modalOutmoney" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">บันทึกรายจ่าย (-)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="outcomeForm">
                <div class="modal-body">
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 40px;">รายละเอียด </label> : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="commerceOutputData[]" id="transaction_description" autocomplete="off" placeholder="รายละเอียดรายจ่าย">
                        <label style="margin-left: 11px;"> บาท </label><br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; word-spacing: 10px;">จำนวนเงิน<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="number" min="0" step="0.01" oninput="validity.valid||(value='');" class="form-control" name="commerceOutputData[]" id="transaction_cash" autocomplete="off" placeholder="0.00">
                        <label style="margin-left: 11px;"> บาท </label>
                        <label style="margin-left: 20px;" id="outcomeError" class="text-danger"></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn waves-effect waves-light btn-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Outmoney -->

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
            <form id="EditcomeForm">
                <div class="modal-body">
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 40px;">รายละเอียด</label> : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="EditData[]" id="transaction_description" autocomplete="off">
                        <label style="margin-left: 11px;"> บาท </label><br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; word-spacing: 10px;">จำนวนเงิน <a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="number" min="0" step="0.01" oninput="validity.valid||(value='');" class="form-control" name="EditData[]" id="transaction_cash" autocomplete="off" placeholder="0.00">
                        <label style="margin-left: 11px;"> บาท </label>
                        <label style="margin-left: 20px;" id="EditcomeError" class="text-danger"></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="transaction_id">
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#car_image').attr('src', e.target.result);
            $('#car_image').attr('hidden',false);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
    // $('#modalAddmoney').on('hidden.bs.modal', function() {
    //     alert("ASD");
    //     $('#incomeForm')[0].reset();
    //     $('#incomeError').html('');
    // });
    $('#EditcomeForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
        var formData = {};
        $("[name^='EditData']").each(function() {
            formData[this.id] = this.value;
        });

        if (formData['transaction_cash'] == '' || parseFloat(formData['transaction_cash']) <= 0) {
            $('#EditcomeError').html('กรุณากรอกจำนวนเงินให้ถูกต้อง');
        } else {
            $('#EditcomeError').html('');

            var formData = {};
            $("[name^='EditData']").each(function() {
                formData[this.id] = this.value;
            });

            if (x) {
                formData['transaction_cash'] = formData['transaction_cash'] * -1;
                x = false;
                console.log(x);
            }

            var tableData = {};
            tableData['tableName'] = 'ie_transaction';


            var whereData = {
                'transaction_id': document.getElementById("transaction_id").value,
                'transaction_user_id': <?php echo $_SESSION['id'] ?>
            };

            $.ajax({
                method: "POST",
                url: "editData",
                data: {
                    table: tableData,
                    arrayData: formData,
                    arrayWhere: whereData
                },
            }).done(function(returnData) {
                getList();
                $('#editData form')[0].reset();
                $('#editData').modal('hide'); //ปิด modal
            });
        }
    })

    $('#incomeForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
        var formData = {};
        $("[name^='commerceInputData']").each(function() {
            formData[this.id] = this.value;
        });

        if (formData['transaction_cash'] == '' || parseFloat(formData['transaction_cash']) <= 0) {
            $('#incomeError').html('กรุณากรอกจำนวนเงินให้ถูกต้อง');
            // $.toast({
            //     heading: 'ไม่สำเร็จ',
            //     text: 'กรุณากรอกข้อมูลให้ถูกต้อง',
            //     position: 'top-right',
            //     loaderBg: '#ff6849',
            //     icon: 'error',
            //     hideAfter: 3500,
            //     stack: 3
            // });
        } else {
            $('#incomeError').html('');

            var formData = {};
            $("[name^='commerceInputData']").each(function() {
                formData[this.id] = this.value;
            });

            var tableData = {};
            tableData['tableName'] = 'ie_transaction';

            console.log(formData)

            $.ajax({
                method: "POST",
                url: "addData",
                data: {
                    table: tableData,
                    arrayData: formData,
                    createColumn: 'transaction_user_id'
                },
            }).done(function(returnData) {
                getList();
                // $.toast({
                //     heading: 'สำเร็จ',
                //     text: 'เพิ่มข้อมูลสำเร็จ',
                //     position: 'top-right',
                //     loaderBg: '#ff6849',
                //     icon: 'success',
                //     hideAfter: 3500,
                //     stack: 3
                // });
                $('#modalAddmoney form')[0].reset();
                $('#modalAddmoney').modal('hide'); //ปิด modal
            });
        }
    })

    $('#outcomeForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
        var formData = {};
        $("[name^='commerceOutputData']").each(function() {
            formData[this.id] = this.value;
        });

        if (formData['transaction_cash'] == '' || parseFloat(formData['transaction_cash']) <= 0) {
            $('#outcomeError').html('กรุณากรอกจำนวนเงินให้ถูกต้อง');
            // $.toast({
            //     heading: 'ไม่สำเร็จ',
            //     text: 'กรุณากรอกข้อมูลให้ถูกต้อง',
            //     position: 'top-right',
            //     loaderBg: '#ff6849',
            //     icon: 'error',
            //     hideAfter: 3500,
            //     stack: 3
            // });
        } else {
            $('#outcomeError').html('');

            var formData = {};
            $("[name^='commerceOutputData']").each(function() {
                formData[this.id] = this.value;
            });

            formData['transaction_cash'] = formData['transaction_cash'] * -1;

            var tableData = {};
            tableData['tableName'] = 'ie_transaction';

            console.log(formData)

            $.ajax({
                method: "POST",
                url: "addData",
                data: {
                    table: tableData,
                    arrayData: formData,
                    createColumn: 'transaction_user_id'
                },
            }).done(function(returnData) {
                getList();
                // $.toast({
                //     heading: 'สำเร็จ',
                //     text: 'เพิ่มข้อมูลสำเร็จ',
                //     position: 'top-right',
                //     loaderBg: '#ff6849',
                //     icon: 'success',
                //     hideAfter: 3500,
                //     stack: 3
                // });
                $('#modalOutmoney form')[0].reset();
                $('#modalOutmoney').modal('hide'); //ปิด modal
            });
        }
    })

    function getList() {

        var data = {};
        data['tableName'] = 'ie_transaction';
        data['colName'] = '';
        data['where'] = "transaction_delete_status = 'active' and transaction_date LIKE '" + new Date().getFullYear() + "%' and transaction_user_id = " + <?php echo $_SESSION['id'] ?>;
        data['order'] = 'transaction_date DESC';
        data['arrayJoinTable'] = '';
        data['groupBy'] = '';
        data['pathView'] = 'record/tableRecord';

        $.ajax({
            method: "POST",
            url: "getTable",
            data: data,
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