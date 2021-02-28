<div class="row">
    <table class="table table-bordered table-striped mytb">
        <thead>
            <tr class="text-center">
                <th hidden>ลำดับ</th>
                <th class="text-left">รหัสการนำเงินเข้าหรือออก</th>
                <th>วันที่ปรับปรุงล่าสุด</th>
                <th>จำนวนเงินที่นำเข้า</th>
                <th>จำนวนเงินที่นำออก</th>
                <th>เงินคงเหลือเคาน์เตอร์</th>
                <th>อ้างอิง</th>
                <th>หมายเหตุ</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start loop show db to table -->
            <?php
            if (isset($table) && $table) {
                $i = 1 //กำหนดลำดับ 
            ?>
                <?php foreach ($table as $key => $val) { ?>
                    <?php if ($val->cts_delete_status == "active") { ?>
                        <tr class="text-center">
                            <td hidden ><?= $i++ ?></td>
                            <td class="text-left"><?= $val->cts_id ?></td>
                            <td><?= date('d-m-Y', strtotime(substr($val->cts_create_date, 0, 10))); ?></td>
                            <?php if ($val->cts_income != 0) { ?>
                                <td class="text-success font-weight-bold"><?= $val->cts_income ?></td>
                            <?php } else { ?>
                                <td><?= $val->cts_income ?></td>
                            <?php }
                            if ($val->cts_outcome != 0) { ?>
                                <td class="text-danger font-weight-bold"><?= $val->cts_outcome ?></td>
                            <?php } else { ?>
                                <td><?= $val->cts_outcome ?></td>
                            <?php } ?>
                            <td class="font-weight-bold"><?= $val->cts_money_in_counter ?></td>

                            <?php if ($val->cts_bill_header_id == 0) { ?>
                                <td></td>
                            <?php } else { ?>
                                <td><button type="button" class="btn waves-effect waves-light btn-outline-info btn-xs valDateRow" style="cursor: pointer;" data-toggle='modal' data-target='#detailCommerceModal' data-firstname='<?= $val->ep_firstname ?>' data-id='<?= $val->bhd_id ?>' data-lastname='<?= $val->ep_lastname ?>' data-date='<?= $val->bhd_create_date ?>' data-total='<?= $val->bhd_total_price ?>'>ใบเสร็จ</button></td>
                            <?php } ?>

                            <td><?= $val->cts_note_id == 0 ? $val->cts_note_other_detail : $val->nt_name ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <!-- End loop -->
        </tbody>
    </table>
</div>