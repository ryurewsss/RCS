<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <a class="m-b-0 text-white" style="font-size: 17px;">ข้อมูลรายละเอียดการเงิน</a>
    </div>
    <div class="card-body">
        <div id="commerceTable"></div>
    </div>
</div>
<!-- End Table -->




<script>
    getList();
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