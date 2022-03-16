<?php require_once $_SERVER['DOCUMENT_ROOT'].'/CRS/application/views/transaction/transactionStatus.php'; ?>
<div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped mytb">
        <thead>
            <tr class="text-center">
                <th>ลำดับ</th>
                <th>ทะเบียน</th>
                <th>ยี่ห้อ</th>
                <th>ราคา</th>
                <th>สถานะ</th>
                <th>ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start loop show db to table -->
            <?php
            if (isset($table) && $table) {
                // var_dump($table);
                $i = 1 //กำหนดลำดับ 
            ?>
                <?php foreach ($table as $key => $val) { ?>
                    <tr class="text-center">
                        <td><?php echo $i++; ?></td>
                        <td class="text-left"><?= $val->car_registration ?></td>
                        <td class="text-left"><?= $val->car_brand_name_en ?></td>
                        <td class="text-center"><?= $val->car_price ?></td>
                        <td class="text-center <?= $tranStatusColor[$val->car_status] ?>"><?= $tranStatus[$val->car_status] ?></td>
                        <td>
                            <a href="<?= base_url() ?>Car/carDetail2?carId=<?php echo $val->car_id; ?>&tranId=<?php echo $val->transaction_id; ?>">
                            <button type="button" class="btn waves-effect waves-light btn-info btn-sm" ><i class="fas fa-search"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>

            <!-- End loop -->
        </tbody>
    </table>
</div>