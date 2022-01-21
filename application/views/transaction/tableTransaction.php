<?php include 'transactionStatus.php';?>
<div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped mytb">
        <thead>
            <tr class="text-center">
                <th>ลำดับ</th>
                <th>รหัสการเช่า</th>
                <th>ทะเบียน</th>
                <th>สถานที่</th>
                <th>วันที่รับ</th>
                <th>เวลาที่รับ</th>
                <th>วันที่คืน</th>
                <th>เวลาที่คืน</th>
                <th>สถานะ</th>
                <th>ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start loop show db to table -->
            <?php
            if (isset($table) && $table) {
                $i = 1 //กำหนดลำดับ 
            ?>
                <?php foreach ($table as $key => $val) { ?>

                    <tr class="text-center">
                        <td><?php echo $i++; ?></td>
                        <td class="text-left"><?= $val->transaction_id ?></td>
                        <td class="text-left"><?= $val->car_registration ?></td>
                        <td class="text-left"><?= $val->place_name ?></td>
                        <td class="text-left"><?= date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_receive_date,0,10)))) ?></td>
                        <td class="text-left"><?= substr($val->transaction_receive_date,11,5) ?></td>
                        <td class="text-left"><?= date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_return_date,0,10)))) ?></td>
                        <td class="text-left"><?= substr($val->transaction_return_date,11,5) ?></td>
                        <td class="text-left"><?= $tranStatus[$val->transaction_status] ?></td>
                        <td>
                            <a href="<?= base_url() ?>Transaction/transactionDetail?tranId=<?php echo $val->transaction_id; ?>">
                                <button type="button" class="btn waves-effect waves-light btn-info btn-sm" id="<?= $val->transaction_id ?>" ><i class="fas fa-search"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>

            <!-- End loop -->
        </tbody>
    </table>
</div>


<script>
</script>