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
                <th>ยี่ห้อรถยนต์ (ภาษาไทย)</th>
                <th>ยี่ห้อรถยนต์ (ภาษาอังกฤษ)</th>
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
                        <td class="text-left"><?= $val->car_brand_name_th ?></td>
                        <td class="text-left"><?= $val->car_brand_name_en ?></td>
                        <td>
                            <button type="button" class="btn waves-effect waves-light btn-warning btn-sm btn_edit" data-toggle="modal" data-toggle="modal" data-target="#modalEditCarBrand" data-id="<?= $val->car_brand_id ?>" data-brandth="<?= $val->car_brand_name_th ?>" data-branden="<?= $val->car_brand_name_en ?>" ><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn waves-effect waves-light btn-danger btn-sm btn_delete" id="<?= $val->car_brand_id ?>" ><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>

            <!-- End loop -->
        </tbody>
    </table>
</div>


<script>

    $('#modalEditCarBrand').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var brandth = button.data('brandth');
        var branden = button.data('branden');

        var modal = $(this);
        modal.find('#car_brand_id[name="editData[]"]').val(id);
        modal.find('#car_brand_name_th[name="editData[]"]').val(brandth);
        modal.find('#car_brand_name_en[name="editData[]"]').val(branden);
    })

    $('.btn_delete').click(function() {
        var button = $(event.relatedTarget)
        var data = {};
        data['id'] = $(this).attr("id");
        if (confirm('ยืนยันการลบรายการนี้หรือไม่')) {
            $.ajax({
                url: "deleteCarBrand",
                method: "POST",
                data: data,
            }).done(function(returnData) {
                getList();
            });
        }
    })
    //delete row
</script>