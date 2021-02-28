<div class="row">
    <table id="myTable" class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
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
            if (isset($table) && $table) {
                $i = 1 //กำหนดลำดับ 
            ?>
                <?php foreach ($table as $key => $val) { 
                    $sum = $sum+$val->transaction_cash;
                    ?>
                    <?php if ($val->transaction_delete_status == "active") { ?>
                        <tr class="text-center">
                            <td><?= substr($val->transaction_date, 0, 10) ?></td>
                            <td><?= $val->transaction_description ?></td>
                            <?php if ($val->transaction_cash < 0) { ?>
                                <td>-</td>
                                <td><?= $val->transaction_cash ?></td>
                            <?php } else { ?>
                                <td><?= $val->transaction_cash ?></td>
                                <td>-</td>
                            <?php } ?>
                            <td><?= $sum ?></td>
                            <td>
                                <button type="button" class="btn waves-effect waves-light btn-warning btn-sm btn_edit"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn waves-effect waves-light btn-danger btn-sm btn_delete"><i class="fas fa-trash-alt"></i></button>
                            </td>

                        </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <!-- End loop -->
        </tbody>
    </table>
</div>