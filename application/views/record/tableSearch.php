<div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped mytb">
        <thead>
            <tr class="text-center">
                <th>วันที่</th>
                <th class="text-left">รายละเอียด</th>
                <th>รายรับ</th>
                <th>รายจ่าย</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start loop show db to table -->
            <?php
            $sum = 0;
            if (isset($table) && $table) {
                $i = 1 //กำหนดลำดับ 
            ?>
                <?php foreach ($table as $key => $val) {
                    $sum = $sum + $val->transaction_cash;
                ?>
                    <?php if ($val->transaction_delete_status == "active") { ?>
                        <tr class="text-center">
                            <td><?= substr($val->transaction_date, 0, 10) ?></td>
                            <td class="text-left"><?= $val->transaction_description ?></td>
                            <?php if ($val->transaction_cash < 0) { ?>
                                <td>-</td>
                                <td class="text-danger font-weight-bold"><?= $val->transaction_cash * -1 ?></td>
                            <?php } else { ?>
                                <td class="text-success font-weight-bold"><?= $val->transaction_cash ?></td>
                                <td>-</td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <!-- End loop -->
        </tbody>
    </table>
</div>


<script>
    var sum = <?php echo json_encode($sum) ?>;

    $('#sum').val(parseFloat(sum).toFixed(2));
</script>