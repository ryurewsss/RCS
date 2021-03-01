<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <a class="m-b-0 text-white" style="font-size: 17px;">ข้อมูลรายละเอียดการเงิน</a>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-success d-none d-lg-block m-l-15" data-toggle="modal" data-toggle="modal" data-target="#modalAddmoney" id="addMoney" data-whatever="@mdo">รายรับ (+)</button>
        <button type="button" class="btn btn-warning d-none d-lg-block m-l-5" data-toggle="modal" data-toggle="modal" data-target="#modalOutmoney" id="outMoney" data-whatever="@fat">รายจ่าย (-)</button>
        <!-- รายรับ -->
        <!-- <div class="modal" id="modalAddmoney" tabindex="-1" role="dialog" aria-labelledby="modalAddmoney" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalAddmoney">บันทึกรายรับ (+)</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div> -->
        <!-- <form class="form-material" method="post" id="incomeForm">
                        <div class="form-material">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label style="text-indent: 20px; margin-right: 18px;">รายละเอียด </label> : &ensp;
                                    <input style="width: 250px;" type="text" class="form-control" name="commerceInputData[]" id="cts_income" autocomplete="off" placeholder="รายละเอียดรายรับ">
                                    <label style="margin-left: 11px;"> บาท </label>
                                </div>
                                <div class="form-group">
                                    <label style="text-indent: 20px; word-spacing: 10px;">จำนวนเงิน<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                                    <input style="width: 250px;" type="number" min="0" step="0.01" oninput="validity.valid||(value='');" class="form-control" name="commerceInputData[]" id="cts_income" autocomplete="off" placeholder="0.00">
                                    <label style="margin-left: 11px;"> บาท </label>
                                    <label style="margin-left: 20px;" id="incomeError" class="text-danger"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn waves-effect waves-light btn-success" id="addCommerce">บันทึก</button>
                        </div>
                    </form> -->

        <div class="modal fade" id="modalAddmoney" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">บันทึกรายรับ (+)</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-material" method="post" id="incomeForm">
                        <div class="modal-body">
                            <div class="form-group">
                                <label style="text-indent: 20px; margin-right: 18px;">รายละเอียด </label> : &ensp;
                                <input style="width: 250px;" type="text" class="form-control" name="commerceInputData[]" id="transaction_description" autocomplete="off" placeholder="รายละเอียดรายรับ">
                                <label style="margin-left: 11px;"> บาท </label>
                            </div>
                            <div class="form-group">
                                <label style="text-indent: 20px; word-spacing: 10px;">จำนวนเงิน<a style="color: red; margin-right: 26px;"> *</a></label> : &ensp;
                                <!-- <input style="width: 300px;" type="text" class="form-control form-control-line allowDecimal" name="commerceInputData" id="cts_income" autocomplete="off" placeholder=""> -->
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
        <div id="commerceTable"></div>
    </div>
</div>



<script>
    getList();

    // $('#modalAddmoney').on('hidden.bs.modal', function() {
    //     alert("ASD");
    //     $('#incomeForm')[0].reset();
    //     $('#incomeError').html('');
    // });

    $('#incomeForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
        console.log('checksss')
        if ($('#transaction_cash').val() == '' || parseFloat($('#transaction_cash').val()) <= 0) {
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

    function getList() { 
        var data = {};
        data['tableName'] = 'ie_transaction';
        data['colName'] = '';
        data['where'] = '';
        data['order'] = '';
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