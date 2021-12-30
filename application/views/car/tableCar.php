<style>
.car_image_table{
    max-width: 100px;
    max-height: 100px;
}
</style>
<div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped mytb">
        <thead>
            <tr class="text-center">
                <th hidden>ลำดับ</th>
                <th>รูปรถยนต์</th>
                <th>ทะเบียนรถยนต์</th>
                <th>ยี่ห้อรถยนต์</th>
                <th>รุ่นรถยนต์</th>
                <th>คุณสมบัติ</th>
                <th>คำอธิบาย</th>
                <th>ราคาต่อวัน</th>
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
                        <td hidden>i++</td>
                        <td class="text-center">
                            <img class="car_image_table" src="<?php echo base_url('img/car_img'); ?>/<?php echo $val->car_upload; ?>" alt="<?php echo $val->car_upload; ?>">
                        </td>
                        <td class="text-left"><?= $val->car_registration ?></td>
                        <td class="text-left"><?= $val->car_brand ?></td>
                        <td class="text-left"><?= $val->car_model ?></td>
                        <td class="text-left"><?= $val->car_feature ?></td>
                        <td class="text-left"><?= $val->car_description ?></td>
                        <td class="text-left"><?= $val->car_price ?></td>
                        <td>
                            <button type="button" class="btn waves-effect waves-light btn-warning btn-sm btn_edit" data-toggle="modal" data-toggle="modal" data-target="#modalEditCar" data-id="<?= $val->car_id ?>" data-registration="<?= $val->car_registration ?>" data-brand="<?= $val->car_brand ?>" data-model="<?= $val->car_model ?>" data-feature="<?= $val->car_feature ?>" data-description="<?= $val->car_description ?>" data-price="<?= $val->car_price ?>" data-upload="<?= $val->car_upload ?>"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn waves-effect waves-light btn-danger btn-sm btn_delete" id="<?= $val->car_id ?>" data-upload="<?= $val->car_upload ?>"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>

            <!-- End loop -->
        </tbody>
    </table>
</div>


<script>

    $('#modalEditCar').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var registration = button.data('registration');
        var brand = button.data('brand');
        var model = button.data('model');
        var feature = button.data('feature');
        var description = button.data('description');
        var price = button.data('price');
        var upload = button.data('upload');

        var modal = $(this);

        modal.find('#e_car_id').val(id);
        modal.find('#e_car_registration').val(registration);
        modal.find('#e_car_brand').val(brand);
        modal.find('#e_car_model').val(model);
        modal.find('#e_car_feature').val(feature);
        modal.find('#e_car_description').val(description);
        modal.find('#e_car_price').val(price);
        modal.find('#e_old_image').val(upload);

        $('.car_image').attr('src', '<?php echo base_url('img/car_img'); ?>/'+upload);
        $('.car_image').attr('hidden',false);

        // modal.find('#e_car_upload').attr('src', <?php echo base_url('img/car_img'); ?>"/upload");
        
    })

    $('.btn_delete').click(function() {
        var button = $(event.relatedTarget)
        var data = {};
        data['id'] = $(this).attr("id");
        data['old_image'] = $(this).attr("data-upload");
        if (confirm('ยืนยันการลบรายการนี้หรือไม่')) {
            $.ajax({
                url: "deleteCar",
                method: "POST",
                data: data,
            }).done(function(returnData) {
                getList();
            });
        }
    })
    //delete row
</script>