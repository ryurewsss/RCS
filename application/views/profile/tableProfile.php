<!-- 
  * tableProfile				  	   
  * show detail EmployeeProfile from db
  * @input -
  * @output show detail EmployeeProfile from db                  
  * @author Thitipong Phuttacharoenpong
  * @Create Date 11-10-2563

  * tableProfile				  	   
  * show detail EmployeeProfile from db
  * @input -
  * @output show detail EmployeeProfile from db                  
  * @author Kittichai Anansinchai
  * @Create Date 17-10-2563
  -->

<style>
    /* .bottomright {
        position: absolute;
        bottom: 5px;
        right: 30px;
        font-size: 18px;
    }

    .imagesProfile {
        position: absolute;
        bottom: 5px;
        right: 230px;
        width: 300px;
    } */

    .car_image{
    width: 50%;
    max-width: 500px;
    max-height: 500px;
    height: auto;
}
</style>

<div class="row">
    <!-- Start card body -->
    <div class="card-body">
        <form class="form-material">
            <div class="form-body">
                <!-- Start loop show db to table -->
                <?php if (isset($table)) { ?>
                    <?php foreach ($table as $key => $val) { ?>
                        <div class="row">
                            <label style="text-indent: 20px; margin-right: 66px;">อีเมลล์ </label>: &ensp;
                            <input type="email" style="width: 250px;" class="form-control" name="profileData[]" id="user_email" value="<?= $val->user_email ?>" placeholder="อีเมลล์" disabled>
                        </div><br>
                        <div class="row">
                            <label style="text-indent: 20px;  margin-right: 90px;">ชื่อ </label>: &ensp;
                            <input type="text" style="width: 250px;" class="form-control" name="profileData[]" id="user_fname" value="<?= $val->user_fname ?>" placeholder="ชื่อ">
                        </div><br>
                        <div class="row">
                            <label style="text-indent: 20px;  margin-right: 53px;">นามสกุล </label>: &ensp;
                            <input type="text" style="width: 250px;" class="form-control" name="profileData[]" id="user_lname" value="<?= $val->user_lname ?>" placeholder="นามสกุล">
                        </div><br>
                        <div class="row">
                            <label style="text-indent: 20px;  margin-right: 18px;">เบอร์โทรศัพท์ </label>: &ensp;
                            <input type="text" style="width: 250px;" class="form-control" name="profileData[]" id="user_phone" value="<?= $val->user_phone ?>" placeholder="">
                        </div><br>
                        
                        <div class="form-group">
                            <div class="col-lg-2 col-md-4">
                                <button id="editPassword" type="button" class="btn btn-block btn-secondary" data-id='<?= $val->user_id ?>' data-toggle='modal' data-target='#changePasswordmodal' data-username='<?= $val->user_username ?>' ?>เปลี่ยนรหัสผ่าน</button>
                            </div>
                        </div>
                        <div class="row">
                        <input type="hidden" name="old_image" id="e_old_image">
                            <p hidden id="base_url"><?php echo base_url(); ?></p>
                            <button style="margin-left: 22px;" class="btn btn-success" type="button" id="submitEditProfile" data-id=''>บันทึก</button>&ensp;
                            <button class="btn btn-danger btn_delete" type="button" id="<?= $val->user_id ?>" data-id=''>ลบบัญชีผู้ใช้</button>
                        </div>
                    <?php } ?>
                <?php } ?>
                <!-- End loop -->
            </div>
        </form>
    </div>
    <!-- End card body -->
</div>

<script>
    var data = <?php echo json_encode($val->user_username) ?>;
    $('#user_username[name="changePassword[]"]').val(data);
    $('#submitEditProfile').click(function() {
        var tableData = {};
        tableData['tableName'] = 'crs_user';
        tableData['columnIdName'] = 'user_id';

        var whereData = {
            'user_id': <?php echo $_SESSION['id'] ?>
        };
        var formData = {};

        $("[name^='profileData']").each(function() {
            formData[this.id] = this.value;
        });

        console.log(formData);
        $.ajax({
            method: "POST",
            url: "editData",
            data: {
                table: tableData,
                arrayData: formData,
                arrayWhere: whereData
            },
        }).done(function(returnData) {
            getList();
        });
    })
    //submit edit form

    $('.btn_delete').click(function() {

        var id = <?php echo $_SESSION['id'] ?>;
        var data = {};
        data['tableName'] = 'ie_user';
        data['columnIdName'] = 'user_id';
        data['columnDeleteStatus'] = 'user_delete_status';
        data['updateColumn'] = ""
        data['id'] = id;
        console.log(id);
        if (confirm('ยืนยันการลบบัญชีผู้ใช้หรือไม่')) {
            $.ajax({
                url: "deleteRow",
                method: "POST",
                data: data,
            }).done(function(returnData) {
                $.ajax({
                    url: "../Login/logout",
                    method: "POST"
                }).done(function(returnData) {
                    alert("ลบข้อมูลเสร็จสิ้น")
                    window.location.replace($('#base_url').html());
                });
            });
        }
    })

    function readURL(input,modal) {
        alert("aunnn");
        if (input.files && input.files[0]) {
            var reader = new FileReader();
        alert("ryuuuu");
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