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
            <div class="form-body">
                <!-- Start loop show db to table -->
                <?php if (isset($table)) { ?>
                    <?php foreach ($table as $key => $val) { ?>
                            <div class="row">
                                <label style="text-indent: 20px; margin-right: 40px;">บัญชีผู้ใช้ </label>: &ensp;
                                <input type="text" style="width: 250px;" class="form-control" name="profileData[]" id="user_username" value="<?= $val->user_username ?>" placeholder="บัญชีผู้ใช้" disabled>
                            </div><br>
                            <div class="row">
                                <label style="text-indent: 20px;  margin-right: 18px;">ชื่อ-นามสกุล </label>: &ensp;
                                <input type="text" style="width: 250px;" class="form-control" name="profileData[]" id="user_name" value="<?= $val->user_name ?>" placeholder="ชื่อ - นามสกุล">
                            </div><br>
                        <div class="row">
                            <div class="col-lg-2 col-md-4">
                                <button style="margin-left: 10px;" id="editPassword" type="button" class="btn btn-block btn-secondary" data-id='<?= $val->user_id ?>' data-toggle='modal' data-target='#changePasswordmodal' data-username='<?= $val->user_username ?>' ?>เปลี่ยนรหัสผ่าน</button>
                            </div>
                        </div><br>
                        <div class="row">
                            <button style="margin-left: 20px;" class="btn btn-success" type="button" id="submitEditProfile" data-id=''>บันทึก</button>&ensp;
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
        tableData['tableName'] = 'ie_user';
        tableData['columnIdName'] = 'user_id';

        var whereData = {
            'user_id': document.getElementById("user_id").value
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
                arrayWhere: whereData,
                updateColumn: ''
            },
        }).done(function(returnData) {
            getList();
            // $.toast({
            //     heading: 'สำเร็จ',
            //     text: 'แก้ไขข้อมูลสำเร็จ',
            //     position: 'top-right',
            //     loaderBg: '#ff6849',
            //     icon: 'success',
            //     hideAfter: 3500,
            //     stack: 3
            // });
        });
    }) 
    //submit edit form

    $('.btn_delete').click(function() {
        var id = $(this).attr("id");
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
            getList();
        });
    })
</script>