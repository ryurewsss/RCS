<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ข้อมูลรายละเอียดการเงิน</a>
            <button style="margin-left: 64%;" type="button" class="btn btn-success d-none d-lg-block m-l-15" data-toggle="modal" data-toggle="modal" data-target="#modalAddmoney" id="addMoney" data-whatever="@mdo">รายรับ (+)</button> &ensp;
            <button type="button" class="btn btn-warning d-none d-lg-block m-l-5" data-toggle="modal" data-toggle="modal" data-target="#modalOutmoney" id="outMoney" data-whatever="@fat">รายจ่าย (-)</button>
        </div>
    </div>
    <div class="card-body">
        <!-- <div class="row">
            <button style="margin-left: 83%;" type="button" class="btn btn-success d-none d-lg-block m-l-15" data-toggle="modal" data-toggle="modal" data-target="#modalAddmoney" id="addMoney" data-whatever="@mdo">รายรับ (+)</button> &ensp;
            <button type="button" class="btn btn-warning d-none d-lg-block m-l-5" data-toggle="modal" data-toggle="modal" data-target="#modalOutmoney" id="outMoney" data-whatever="@fat">รายจ่าย (-)</button>
        </div><br> -->
        <div id="commerceTable"></div>
    </div>
</div>
<!-- End Table -->

<!-- Open Modal Addmoney -->
<div class="modal fade" id="modalAddmoney" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">บันทึกรายรับ (+)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="incomeForm">
                <div class="modal-body">
                    <div class="row">
                        <label style="text-indent: 20px; margin-right: 40px;">รายละเอียด</label> : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="commerceInputData[]" id="transaction_description" autocomplete="off" placeholder="รายละเอียดรายรับ">
                        <label style="margin-left: 11px;"> บาท </label><br><br>
                    </div>
                    <div class="row">
                        <label style="text-indent: 20px; word-spacing: 10px;">จำนวนเงิน <a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                        <input style="width: 250px;" type="number" min="0" step="0.01" oninput="validity.valid||(value='');" class="form-control" name="commerceInputData[]" id="transaction_cash" autocomplete="off" placeholder="0.00">
                        <label style="margin-left: 11px;"> บาท </label>
                        <label style="margin-left: 20px;" id="incomeError" class="text-danger"></label>
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

<script>
    getList();

    // $('#modalAddmoney').on('hidden.bs.modal', function() {
    //     alert("ASD");
    //     $('#incomeForm')[0].reset();
    //     $('#incomeError').html('');
    // });

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
                    createColumn: 'transaction_employee_id'
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
        console.log('checksss')
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
            
            formData['transaction_cash'] = formData['transaction_cash'] *-1 ;

            var tableData = {};
            tableData['tableName'] = 'ie_transaction';

            console.log(formData)

            $.ajax({
                method: "POST",
                url: "addData",
                data: {
                    table: tableData,
                    arrayData: formData,
                    createColumn: 'transaction_employee_id'
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
        data['where'] = '';
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