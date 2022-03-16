<style>
.showCarTable img{
    max-width: 400px;
    max-height: 400px;

    width: auto;
    height: auto;
    position: relative;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}
.carBlock{
    height: auto;
    width: auto;
    position: relative;
    margin-bottom: 20px;
}
.text-blue{
    color:blue;
}
.doc_image{
    max-width: 400px;
    max-height: 400px;
}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.car_image{
    width: 50%;
    max-width: 250px;
    max-height: 250px;
    height: auto;
}
</style>
<?php 
    $val = $select[0];
?>
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">แก้ไขข้อมูลรถฝากเช่า</a>
        </div>
    </div>
    <div class="card-body">
        <div class="tab">
            <button class="tablinks active" id="setDate2" onclick="openTab('setDate')">ข้อมูลรถยนต์</button>
            <button class="tablinks" id="uploadDoc2" onclick="openTab('uploadDoc')">เอกสารอัปโหลด</button>
        </div>
        <form id="editCarDepositForm" method="post" enctype="multipart/form-data">
            <div id="setDate" class="tabcontent" style="display: block;">
                <div class="col-xs-12 col-md-12 showCarTable" style="user-select: auto;">
                    <div class="row flex-row" style="user-select: auto;">
                        <div class="col-xs-12 col-sm-7" style="user-select: auto;"><br>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2 class="text-black" style="user-select: auto;"><b>ข้อมูลรถฝากเช่า</b></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h3 class="text-black" style="user-select: auto;"><b>รถยนต์และราคาต่อวัน</b></h3>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ทะเบียนรถยนต์ <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 250px; text-align: center;" class="form-control" name="car_registration" id="car_registration" value="<?php echo $val->car_registration; ?>">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ยี่ห้อรถยนต์ <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <select style="width: 250px;" id="car_brand_id" class="form-control form-control-line" name="car_brand_id">
                                    <option disabled>เลือกยี่ห้อรถยนต์</option>
                                    <?php
                                    if (isset($brand)) {
                                        foreach ($brand as $key => $val_brand) {
                                            if($val->car_brand_id == $val_brand->car_brand_id){
                                                echo "<option selected value=" . $val_brand->car_brand_id . ">" . $val_brand->car_brand_name_en . "</option>";
                                            }else{
                                                echo "<option value=" . $val_brand->car_brand_id . ">" . $val_brand->car_brand_name_en . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >รุ่นรถยนต์ <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <input type="hidden" id="model_id" value="<?php echo $val->car_model_id; ?>"/>
                                <select style="width: 250px;" id="car_model_id" class="form-control form-control-line" name="car_model_id">
                                    <option disabled selected>เลือกรุ่นรถยนต์</option>
                                </select>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ราคาต่อวัน <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 250px; text-align: right;" class="form-control" name="car_price" id="car_price" value="<?php echo $val->car_price; ?>" />
                                <h5 style="margin-top:10px;">&ensp; บาท/วัน</h5>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >รูปรถยนต์ <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <input type="file" style="width: 250px;" class="form-control" name="car_deposit_upload" id="car_deposit_upload" onchange="readURL(this,'deposit'); src='' ">
                                <input type="hidden" name="old_car_deposit_upload" value="<?php echo $val->car_image; ?>"/>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-1"></div>
                                    <?php if ($val->car_image != ""){?>
                                    <img class="car_deposit_image" id="car_deposit_image" src="<?php echo base_url('img/car_img'); ?>/<?php echo $val->car_image; ?>" alt="your image" />
                                    <?php }else{ ?>
                                    <img class="car_deposit_image" id="car_deposit_image" src="#" alt="your image" hidden/>
                                    <?php } ?>
                            </div><br>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="button" style="margin:auto; width: 150px;" class="btn btn-success d-none d-lg-block m-l-12" onclick="openTab('uploadDoc')">ถัดไป &raquo;</button>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-12 col-sm-5" style="user-select: auto;"><br>
                            <div class="text-center">
                                <h4>เหตุผลปฏิเสธเอกสาร <br><br> </h4>
                                <textarea style="height: 300px" class="form-control" rows="3" id="transaction_reject_iden" autocomplete="off" placeholder="สาเหตุที่ปฏิเสธ" disabled><?php echo $val->car_reject_deposit; ?></textarea>
                                <br>
                                <h2 class="text-danger" id="car_status_8" style="user-select: auto; display: <?php echo isset($val->car_status) && $val->car_status == 8 ? 'display' : 'none'; ?>"><b>ปฏิเสธเอกสาร</b></h2>
                                    <h2 class="text-success" id="car_status_9" style="user-select: auto; display: <?php echo isset($val->car_status) && $val->car_status == 9 ? 'display' : 'none'; ?>"><b>ยอมรับเอกสาร</b></h2>
                                    <input type="hidden" name="car_status" id="car_status" value="<?php echo isset($val->car_status) ? $val->car_status : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="uploadDoc" class="tabcontent">
                <div class="col-xs-12 col-md-12 showCarTable" style="user-select: auto;">
                    <div class="row flex-row" style="user-select: auto;">
                        <div class="col-xs-12 col-sm-12" style="user-select: auto;">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2 class="text-black" style="user-select: auto;"><b>อัปโหลดเอกสาร</b></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h3 class="text-black" style="user-select: auto;"><b>สำเนาเอกสารของรถยนต์</b></h3>
                                </div>
                            </div>
                            
                            <br><div class="row">
                                <div class="col-5 text-center">
                                    <h4 >เอกสารระบุความเป็นเจ้าของ <br>(เล่มรถยนต์) </h4>
                                </div>
                                <div class="col-5 text-center">
                                    <input type="file" class="form-control" name="license_upload" id="license_upload" onchange="readURL(this,'license'); src='' ">
                                    <input type="hidden" name="old_license_upload" value="<?php echo $val->car_proof_image; ?>"/>
                                </div>
                            </div>
                            <br><div class="row">
                                <div class="col-12 text-center"></div>
                                <?php if ($val->car_image != ""){?>
                                    <img class="license_image" id="license_image" src="<?php echo base_url('img/car_deposit_img'); ?>/<?php echo $val->car_proof_image; ?>" alt="your image" />
                                    <?php }else{ ?>
                                    <img class="license_image" id="license_image" src="#" alt="your image" hidden/>
                                    <?php } ?>
                            </div>
                            <br><br><br>
                            <div class="row">
                                <div class="col-6 text-center">
                                    <button type="button" style="margin:auto; width: 100px;" class="btn btn-secondary d-none d-lg-block m-l-12" onclick="openTab('setDate')">&laquo; ย้อนกลับ</button>
                                </div>
                                <div class="col-6 text-center">
                                <input type="hidden" name="car_id" value="<?php echo $val->car_id; ?>"/>
                                <input type="hidden" name="transaction_id" value="<?php echo $val->transaction_id; ?>"/>
                                <button type="submit" id="selectDeposit" style="margin:auto; width: 150px;" class="btn btn-success d-none d-lg-block m-l-12">ยืนยันการแก้ไข &raquo;</button>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            
        </form>
    </div>
</div>
<script>
    
    getModel()
$("#car_brand_id").on('change', function(event) {
    getModel()
})


$('#editCarDepositForm').on('submit', function(event) {
    event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser

    Swal.fire({
        title: 'Are you sure?',
        text: "You Confirm Deposit a Car",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#dc3545',
        confirmButtonColor: '#28a745',
        confirmButtonText: 'Yes, Confirm it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({  
                url:"editCarDeposit",
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
            }).done(function(returnData) {
                for(var i=1; i<4; i=i+2){//ยังไม่รวมฝากเช่า
                    $.ajax({
                    url: 'sendEmailDeposit',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        tran_id: returnData.transaction_temp_id,
                        user_type: i
                    }, success: function (returnData) {
                    }
                    });
                }
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Save Complete',
                    showConfirmButton: false,
                    timer: 1000
                })
                setTimeout(location.reload.bind(location), 1200);
            }); 
        }
    })
})

function toggleSelect()
{
  var isChecked = document.getElementById("tos").checked;
  document.getElementById("selectDeposit").disabled = !isChecked;
}

function openTab(tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";

  var elem = document.getElementById(tabName+"2");
  elem.classList.add("active");
}

function readURL(input,type) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            if(type == 'deposit'){
                $('#car_deposit_image').attr('src', e.target.result);
                $('#car_deposit_image').attr('hidden',false);
            }else if(type == 'license'){
                $('#license_image').attr('src', e.target.result);
                $('#license_image').attr('hidden',false);
            }else if(type == 'transaction'){
                $('#transaction_image').attr('src', e.target.result);
                $('#transaction_image').attr('hidden',false);
            }
        };

        reader.readAsDataURL(input.files[0]);
    }
}//show image when choose
function removeOptions(selectElement) {
    var i, L = selectElement.options.length - 1;
    for(i = L; i >= 0; i--) {
        selectElement.remove(i);
    }
}
function getModel() {
    var data = {};
    data['car_brand_id'] = $('#car_brand_id').val();
    $.ajax({
        method: "POST",
        url: "getModel",
        data: data,  
    }).done(function(returnedData) {
        removeOptions(document.getElementById('car_model_id'));
        $("#car_model_id").append('<option disabled selected>เลือกรุ่นรถยนต์</option>');
        for(var i = 0; i < returnedData.car_model.length; i++) {
            $("#car_model_id").append('<option value=' + returnedData.car_model[i].car_model_id + '>' + returnedData.car_model[i].car_model_name + '</option>');
        }
        $("#car_model_id").val($("#model_id").val());
    });
} //show auto
</script>