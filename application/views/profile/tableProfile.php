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

<!-- <style>
    .bottomright {
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
    }
</style> -->

<div class="row">
    <!-- Start card body -->
    <div class="card-body">
        <form class="form-material">
            <h3 class="card-title">ข้อมูลส่วนตัว</h3>
            <div class="form-body">
                <hr>
                <!-- Start loop show db to table -->
                <?php if (isset($table)) { ?>
                    <?php foreach ($table as $key => $val) { ?>
                        <div class="form-group">
                            <label style="text-indent: 20px; word-spacing: 10px;">บัญชีผู้ใช้ : </label>
                            <input type="text" style="width: 200px;" class="form-control" name="profileData[]" id="user_username" value="<?= $val->user_username ?>" placeholder="บัญชีผู้ใช้" disabled>
                        </div>
                        <div class="form-group">
                            <label style="text-indent: 20px; word-spacing: 10px;">ชื่อ-นามสกุล : </label>
                            <input type="text" style="width: 200px;" class="form-control" name="profileData[]" id="user_name" value="<?= $val->user_name ?>" placeholder="ชื่อ - นามสกุล">
                        </div>
                        <div class="form-group">
                            <div class="col-lg-2 col-md-4">
                                <button id="editPassword" type="button" class="btn btn-block btn-secondary" data-id='<?= $val->user_id ?>' data-toggle='modal' data-target='#changePasswordmodal' data-username='<?= $val->user_username ?>' ?>เปลี่ยนรหัสผ่าน</button>
                            </div>
                        </div>
                        <div class="form-group form-actions p-t-20 bottomright">
                            <p hidden id="base_url"><?php echo base_url(); ?></p>
                            <button class="btn btn-success" type="button" id="submitEditProfile" data-id=''>บันทึก</button>
                            <button class="btn btn-danger btn_delete" type="button" id="<?= $val->user_id ?>" data-id='' onclick="return confirm('Are you sure you want to delete this item?');">ลบบัญชีผู้ใช้</button>
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
        tableData['tableName'] = 'ie_user';
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

        $.ajax({
            url: "deleteRow",
            method: "POST",
            data: data,
        }).done(function(returnData) {
            $.ajax({
                url: "../Login/logout",
                method: "POST"
            }).done(function(returnData) {
                window.location.replace($('#base_url').html());
            });
        });
    })
</script>