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
                $i = 1 //กำหนดลำดับ 
            ?>
                <?php foreach ($table as $key => $val) { ?>
                    <tr class="text-center">
                        <td><?php echo $i++; ?></td>
                        <td class="text-left"><?= $val->car_registration ?></td>
                        <td class="text-left"><?= $val->car_brand_name_en ?></td>
                        <td class="text-center"><?= $val->car_price ?></td>
                        <?php if($val->car_status == 1){ ?>
                            <td class="text-center" style="color:green">รถของร้าน</td>
                        <?php } else if($val->car_status == 2){?>
                            <td class="text-center" style="color:#4e73df;">รถรอการตรวจสอบ</td>
                        <?php } else if($val->car_status == 3){?>
                            <td class="text-center" style="color:red">รถถูกปฏิเสธ</td>
                        <?php } else if($val->car_status == 4){?>
                            <td class="text-center" style="color:green">รถฝากเช่า</td>
                        <?php } ?>
                        <td>
                            <!-- <button type="button" class="btn waves-effect waves-light btn-warning btn-sm btn_edit" data-toggle="modal" data-toggle="modal" data-target="#editData" data-id="<?= $val->user_id ?>" data-email="<?= $val->user_email ?>" data-fname="<?= $val->user_fname ?>" data-lname="<?= $val->user_lname ?>" data-phone="<?= $val->user_phone ?>" data-typeid="<?= $val->user_type_id ?>"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn waves-effect waves-light btn-danger btn-sm btn_delete" id="<?= $val->user_id ?>" ><i class="fas fa-trash-alt"></i></button> -->
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>

            <!-- End loop -->
        </tbody>
    </table>
</div>