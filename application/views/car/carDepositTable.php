<html>
<head>
</head>
</html>

<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ประวัติการฝากเช่า</a>
        </div>
    </div>
    <div class="card-body">
        <div id="CarDepositTable"></div>
    </div>
</div>
<!-- End Table -->

<script>
    getList();

    function getList() {
        $.ajax({
            method: "POST",
            url: "getCarDepositTable",
        }).done(function(returnedData) {
            $('#CarDepositTable').html(returnedData.html);
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
            // console.log(returnedData.table)
        });
    } //show auto
</script>