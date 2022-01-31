
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
<?php 
    $val = $user[0];
?>
<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ประวัติการเช่าของ <?php echo $val->user_fname.' '.$val->user_lname;?></a>
        </div>
    </div>
    <div class="card-body">
        <div id="transactionUserTable"></div>
    </div>
</div>
<!-- End Table -->

<script>
    getList();

    function getList() {
        var formData = {};
        formData['user_id'] = "<?php echo $val->user_id ;?>";
        $.ajax({
            method: "POST",
            url: "getTransactionUserTable",
            data: formData,
        }).done(function(returnedData) {
            $('#transactionUserTable').html(returnedData.html);
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