
<html>
<head>
<style>
#modalAddTransaction .row {
  text-indent: 10px;
  padding-bottom: 10px;
}
#modalAddTransaction .row label {
    margin-top: 0.5rem
}

#modalEditTransaction .row {
  text-indent: 10px;
  padding-bottom: 10px;
}
#modalEditTransaction .row label {
    margin-top: 0.5rem
}

</style>
</head>
</html>

<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ตรวจสอบการเช่า</a>
        </div>
    </div>
    <!-- <button id="test"> API </button> -->
    <div class="card-body">
        <div id="transactionTable"></div>
    </div>
</div>
<!-- End Table -->

<script>
    getList();

    // $('#test').click(function(e){
    //     console.log('TEST');
    //     $.ajax({
    //         method: "POST",
    //         url: "callAPI",
    //     }).done(function(returnedData) {
    //         console.log(returnedData)
    //     })
    // })

    function getList() {
        $.ajax({
            method: "POST",
            url: "getTransactionTable",
        }).done(function(returnedData) {
            $('#transactionTable').html(returnedData.html);
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