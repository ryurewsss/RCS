<style>

    .car_image{
        width: 50%;
        max-width: 250px;
        max-height: 250px;
        height: auto;
    }

    #car_main {
        display: block;
        margin-left: auto;
        margin-right: auto;
        max-width: auto;
        max-height: auto;
    }
</style>

<div class="row">
    <!-- Start card body -->
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-sm-6">
                <form class="form-material" id="submitEditProfile">
                    <div class="form-body">
                        <!-- Start loop show db to table -->
                        <?php if (isset($table)) { ?>
                            <?php foreach ($table as $key => $val) { ?>
                                <div class="row">
                                    <label style="text-indent: 20px; margin-right: 75px;">อีเมล </label>: &ensp;
                                    <input type="email" style="width: 250px;" class="form-control" name="user_email" id="user_email" value="<?= $val->user_email ?>" placeholder="อีเมล" disabled>
                                </div><br>
                                <div class="row">
                                    <label style="text-indent: 20px;  margin-right: 90px;">ชื่อ </label>: &ensp;
                                    <input type="text" style="width: 250px;" class="form-control" name="user_fname" id="user_fname" value="<?= $val->user_fname ?>" placeholder="ชื่อ" required>
                                </div><br>
                                <div class="row">
                                    <label style="text-indent: 20px;  margin-right: 53px;">นามสกุล </label>: &ensp;
                                    <input type="text" style="width: 250px;" class="form-control" name="user_lname" id="user_lname" value="<?= $val->user_lname ?>" placeholder="นามสกุล" required>
                                </div><br>
                                <div class="row">
                                    <label style="text-indent: 20px;  margin-right: 18px;">เบอร์โทรศัพท์ </label>: &ensp;
                                    <input type="text" style="width: 250px;" class="form-control" name="user_phone" id="user_phone" value="<?= $val->user_phone ?>" placeholder="" required>
                                </div><br>
                                <div class="row">
                                    <label style="text-indent: 20px;  margin-right: 62px;">รูปภาพ </label>: &ensp;
                                    <input type="file" style="width: 250px;" class="form-control" name="user_upload" id="user_upload" onchange="readURL(this,'add'); " placeholder="" >
                                </div><br>
                                <div class="row">
                                <div class="col-1"></div>
                                <?php if ($val->user_image != ""){?>
                                    <img class="car_image" id="car_image" src="<?php echo base_url('img/user_img'); ?>/<?php echo $val->user_image; ?>" alt="your image" />
                                <?php }else{ ?>
                                    <img class="car_image" id="car_image" src="#" alt="your image" hidden/>
                                <?php } ?>
                                </div><br>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <button id="editPassword" type="button" class="btn btn-block btn-secondary" data-id='<?= $val->user_id ?>' data-toggle='modal' data-target='#changePasswordmodal' data-email='<?= $val->user_email ?>' ?>เปลี่ยนรหัสผ่าน</button>      
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <input type="hidden" name="user_id" id="user_id" value="<?= $val->user_id ?>">
                                        <input type="hidden" name="old_image" id="e_old_image" value="<?= isset($val->user_image) ? $val->user_image : ''; ?>">
                                        <button style="margin-left: 22px;" class="btn btn-success" type="submit" data-id=''>บันทึก</button>&ensp;
                                    </div>
                                </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <!-- End loop -->
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-sm-6">
                <img id="car_main" src="<?= base_url() ?>assets/img/undraw_profile_details_re_ch9r.svg" />
            </div>
        </div>
    </div>
    <!-- End card body -->
</div>

<script>
    $('#submitEditProfile').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
        if(document.getElementById("user_upload").files.length == 0 ){
            $.ajax({  
                url:"editProfileNoFile",
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
            }).done(function(returnData) {
                getList();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Edit Profile Complete',
                    showConfirmButton: false,
                    timer: 1500
                    })
            });
            //submit without file
        }else{
        $.ajax({
            method: "POST",
            url: "editProfile",
            data:new FormData(this),  
            contentType: false,  
            cache: false,  
            processData:false, 
        }).done(function(returnData) {
            getList();
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Edit Profile Complete',
                    showConfirmButton: false,
                    timer: 1500
                    })
        });
        }
    })
    //submit edit form

    $('#changePasswordmodal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var email = button.data('email');
        var modal = $(this);
        modal.find('#user_id[name="changePassword[]"]').val(id);
        modal.find('#user_email[name="changePassword[]"]').val(email);
    })

    function readURL(input,modal) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                if(modal == 'add'){
                    $('#car_image').attr('src', e.target.result);
                    $('#car_image').attr('hidden',false);
                }else if(modal == 'edit'){
                    $('#e_car_image').attr('src', e.target.result);
                    $('#e_car_image').attr('hidden',false);
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }//show image when choose
</script>