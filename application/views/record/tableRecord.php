<div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped mytb">
        <thead>
            <tr class="text-center">
                <th hidden>ลำดับ</th>
                <th>วันที่</th>
                <th class="text-left">รายละเอียด</th>
                <th>รายรับ</th>
                <th>รายจ่าย</th>
                <th>คงเหลือ</th>
                <th>ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start loop show db to table -->
            <?php
            $sum = 0;
            $sum_income = 0;
            $sum_expense = 0;
            if (isset($table) && $table) {
                $i = 1 //กำหนดลำดับ 
            ?>
                <?php foreach ($table as $key => $valSum) {
                    $sum += $valSum->transaction_cash;
                } ?>
                <?php foreach ($table as $key => $val) { ?>

                    <!-- <?php if ($val->transaction_delete_status == "active") { ?> -->
                        <tr class="text-center">
                            <td hidden>i++</td>
                            <td><?= date("d/m/Y", strtotime($val->transaction_date)) ?></td>
                            <td class="text-left"><?= $val->transaction_description ?></td>
                            <?php if ($val->transaction_cash < 0) {
                                $sum_expense += $val->transaction_cash; ?>
                                <td>-</td>
                                <td class="text-danger font-weight-bold"><?= number_format($val->transaction_cash * -1, 2) ?></td>
                            <?php } else {
                                $sum_income += $val->transaction_cash; ?>
                                <td class="text-success font-weight-bold"><?= number_format($val->transaction_cash, 2) ?></td>
                                <td>-</td>
                            <?php } ?>
                            <td class="text-secondary font-weight-bold"><?= number_format($sum, 2) ?></td>
                            <td>
                                <button type="button" class="btn waves-effect waves-light btn-warning btn-sm btn_edit" data-toggle="modal" data-toggle="modal" data-target="#editData" data-cash="<?= $val->transaction_cash ?>" data-description="<?= $val->transaction_description ?>" data-id="<?= $val->transaction_id ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn waves-effect waves-light btn-danger btn-sm btn_delete" id="<?= $val->transaction_id  ?>"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php $sum = $sum - ($val->transaction_cash); ?>
                    <!-- <?php } ?> -->
                <?php } ?>
            <?php } ?>

            <!-- End loop -->
        </tbody>
    </table>
</div>


<script>
    var x = false;
    var sum_income = <?php echo json_encode($sum_income) ?>;
    var sum_expense = <?php echo json_encode($sum_expense) ?>;
    sum_expense *= -1;
    var sum = sum_income - sum_expense;


    $('#sum_income').html(numberWithCommas(parseFloat(sum_income).toFixed(2)) + " บาท");
    $('#sum_expense').html(numberWithCommas(parseFloat(sum_expense).toFixed(2)) + " บาท");
    $('#sum').html(numberWithCommas(parseFloat(sum).toFixed(2)) + " บาท");

    $('#editData').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var description = button.data('description');
        var cash = button.data('cash');
        var id = button.data('id');

        if (cash < 0) {
            cash = cash * (-1);
            x = true;
        }

        var modal = $(this);

        modal.find('#transaction_description[name="EditData[]"]').val(description);
        modal.find('#transaction_cash[name="EditData[]"]').val(cash);
        modal.find('#transaction_id').val(id);

    })

    $('.btn_delete').click(function() {
        var id = $(this).attr("id");
        var data = {};
        data['tableName'] = 'ie_transaction';
        data['columnIdName'] = 'transaction_id';
        data['columnDeleteStatus'] = 'transaction_delete_status';
        data['id'] = id;
        $.ajax({
            url: "deleteRow",
            method: "POST",
            data: data,
        }).done(function(returnData) {
            alert("ลบข้อมูลสำเร็จ");
            getList();
        });

        // Swal.fire({
        //     title: 'ยืนยันการลบ',
        //     text: "ต้องการลบข้อมูลหรือไม่",
        //     type: 'warning',
        //     showCancelButton: true,
        //     confirmButtonColor: '#3085d6',
        //     cancelButtonColor: '#d33',
        //     confirmButtonText: 'ยืนยัน',
        //     cancelButtonText: 'ยกเลิก'
        // }).then((result) => {
        // if (result.value) {
        //     Swal.fire({
        //         title: 'สำเร็จ',
        //         text: 'ลบข้อมูลเสร็จสิ้น',
        //         type: 'success',
        //         showCancelButton: false,
        //         timer: 1500
        //     })

    })
    //delete row of that 
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>