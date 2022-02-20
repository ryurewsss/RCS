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
                            <img class="car_image_table" src="<?php echo base_url('img/car_img'); ?>/<?php echo $val->car_image; ?>" alt="<?php echo $val->car_image; ?>">
                        </td>
                        <td class="text-left"><?= $val->car_registration ?></td>
                        <td class="text-left"><?= $val->car_brand_name_en ?></td>
                        <td class="text-left"><?= $val->car_model_name ?></td>
                        <td class="text-left">
                            <!-- <?= $val->car_model_feature ?> -->
                            <?php
                            foreach (json_decode($val->car_model_feature) as $key2 => $val2) {
                            if($key2 != 0){?>    <br>    <?php  }  ?>
                            <i class="fas fa-check-circle" style='font-size:20px; color:#39e600;'></i>
                                <?= $val2 ?>
                            <?php
                            }
                            ?>
                        </td>
                        <td class="text-left"><?= $val->car_model_description ?></td>
                        <td class="text-left"><?= $val->car_price ?></td>
                        <td>
                            <button type="button" class="btn waves-effect waves-light btn-warning btn-sm btn_edit" data-toggle="modal" data-toggle="modal" data-target="#modalEditCar" data-id="<?= $val->car_id ?>" data-registration="<?= $val->car_registration ?>" data-brand="<?= $val->car_brand_id ?>" data-model="<?= $val->car_model_id ?>" data-feature='<?= $val->car_model_feature ?>' data-description="<?= $val->car_model_description ?>" data-price="<?= $val->car_price ?>" data-upload="<?= $val->car_image ?>"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn waves-effect waves-light btn-danger btn-sm btn_delete" id="<?= $val->car_id ?>" data-upload="<?= $val->car_image ?>"><i class="fas fa-trash-alt"></i></button>
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
        modal.find('#e_car_brand_id').val(brand);
        getModel2(model)
        // modal.find('#e_car_model_id').val(model);
        modal.find('#e_car_description').val(description);
        modal.find('#e_car_price').val(price);
        modal.find('#e_old_image').val(upload);
        // modal.find('#e_car_feature').val(feature);

        removeField()
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = ''; //New input field html 
        $.each(feature, function( index, value ) {
            if(index == 0){
                modal.find('#car_model_feature[name="feature[]"]').val(value);
            }else{
                fieldHTML = '<div class="row"><div class="col-3"></div>&ensp;&ensp;<div class="form-inline"><input style="width: 250px;" type="text" class="form-control" name="feature[]" id="car_model_feature" autocomplete="off" placeholder="คุณสมบัติรถยนต์" value="'+value+'" disabled/><button type="button" class="remove_button btn waves-effect waves-light btn-danger" title="Remove field" hidden>-</button></div></div>';
                modal.find(wrapper).append(fieldHTML);
            }
        });

        $('#e_car_image').attr('src', '<?php echo base_url('img/car_img'); ?>/'+upload);
        $('#e_car_image').attr('hidden',false);

        // modal.find('#e_car_image').attr('src', <?php echo base_url('img/car_img'); ?>"/upload");


    })

    $('.btn_delete').click(function() {
        var button = $(event.relatedTarget)
        var data = {};
        data['id'] = $(this).attr("id");
        data['old_image'] = $(this).attr("data-upload");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                url: "deleteCar",
                method: "POST",
                data: data,
                }).done(function(returnData) {
                    getList();
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                });  
            }
        })
    })
    //delete row
    $("#e_car_brand_id").on('change', function(event) {
        getModel2()
    })
    function getModel2(model="0") {
        var data = {};
        data['car_brand_id'] = $('#e_car_brand_id').val();
        $.ajax({
            method: "POST",
            url: "getModel",
            data: data,  
        }).done(function(returnedData) {
            removeOptions(document.getElementById('e_car_model_id'));
            $("#e_car_model_id").append('<option disabled selected value="0">เลือกรุ่นรถยนต์</option>');
            for(var i = 0; i < returnedData.car_model.length; i++) {
                $("#e_car_model_id").append('<option value=' + returnedData.car_model[i].car_model_id + '>' + returnedData.car_model[i].car_model_name + '</option>');
            }
            $('#e_car_model_id').val(model)
        });
    } //show auto

</script>