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
                <th>ลำดับ</th>
                <th>ยี่ห้อรถยนต์ </th>
                <th>รุ่นรถยนต์</th>
                <th>คุณสมบัติ</th>
                <th>คำอธิบาย</th>
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
                        <td class="text-left"><?= $val->car_brand_name_en ?></td>
                        <td class="text-left"><?= $val->car_model_name ?></td>
                        <td class="text-left"><?= $val->car_model_feature ?></td>
                        <td class="text-left"><?= $val->car_model_description ?></td>
                        <td>
                            <button type="button" class="btn waves-effect waves-light btn-warning btn-sm btn_edit" data-toggle="modal" data-toggle="modal" data-target="#modalEditCarModel" data-id="<?= $val->car_model_id ?>" data-brand="<?= $val->car_brand_id ?>" data-model="<?= $val->car_model_name ?>" data-feature="<?= $val->car_model_feature ?>" data-description="<?= $val->car_model_description ?>"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn waves-effect waves-light btn-danger btn-sm btn_delete" id="<?= $val->car_model_id ?>" ><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>

            <!-- End loop -->
        </tbody>
    </table>
</div>


<script>

    $('#modalEditCarModel').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var brand = button.data('brand');
        var model = button.data('model');
        var feature = button.data('feature');
        var description = button.data('description');
        
        var modal = $(this);
        modal.find('#car_model_id[name="editData[]"]').val(id);
        modal.find('#car_brand_id[name="editData[]"]').val(brand);
        modal.find('#car_model_name[name="editData[]"]').val(model);
        modal.find('#car_model_feature[name="editData[]"]').val(feature);
        modal.find('#car_model_description[name="editData[]"]').val(description);
    })

    $('.btn_delete').click(function() {
        var button = $(event.relatedTarget)
        var data = {};
        data['id'] = $(this).attr("id");
        if (confirm('ยืนยันการลบรายการนี้หรือไม่')) {
            $.ajax({
                url: "deleteCarModel",
                method: "POST",
                data: data,
            }).done(function(returnData) {
                getList();
            });
        }
    })
    //delete row
</script>