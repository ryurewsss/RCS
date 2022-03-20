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
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ข้อมูลรถฝากเช่า</a>
        </div>
    </div>
    <div class="card-body">
        <div class="tab">
            <button class="tablinks active" id="setDate2" onclick="openTab('setDate')">กำหนดข้อมูลรถยนต์</button>
            <button class="tablinks" id="uploadDoc2" onclick="openTab('uploadDoc')">อัปโหลดเอกสาร</button>
            <button class="tablinks" id="uploadPay2" onclick="openTab('uploadPay')">เงื่อนไขการฝากเช่า</button>
        </div>
        <form id="addCarDepositForm" method="post" enctype="multipart/form-data">
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
                                    <h3 class="text-black" style="user-select: auto;"><b>ข้อมูลรถยนต์และราคา</b></h3>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ทะเบียนรถยนต์ <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 250px; text-align: center;" class="form-control" name="car_registration" id="car_registration" required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ยี่ห้อรถยนต์ <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <select style="width: 250px;" id="car_brand_id" class="form-control form-control-line" name="car_brand_id" required>
                                    <option disabled selected value="">เลือกยี่ห้อรถยนต์</option>
                                    <?php
                                    if (isset($select)) {
                                        foreach ($select as $key => $val) {
                                            echo "<option value=" . $val->car_brand_id . ">" . $val->car_brand_name_en . "</option>";
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
                                <select style="width: 250px;" id="car_model_id" class="form-control form-control-line" name="car_model_id" required>
                                    <option disabled selected value="">เลือกรุ่นรถยนต์</option>
                                </select>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ราคาต่อวัน <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 250px; text-align: right;" class="form-control" name="car_price" id="car_price" value="" required/>
                                <h5 style="margin-top:10px;">&ensp; บาท/วัน</h5>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >รูปรถยนต์ <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <input type="file" style="width: 250px;" class="form-control" name="car_deposit_upload" id="car_deposit_upload" onchange="readURL(this,'deposit'); src='' " required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-1"></div>
                                    <img class="doc_image" id="car_deposit_image" src="#" alt="your image" hidden/>
                            </div><br>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="button" style="margin:auto; width: 130px;" class="btn btn-success d-none d-lg-block m-l-12" onclick="openTab('uploadDoc')">ถัดไป &raquo;</button>
                                </div>
                            </div>
                            <br>
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
                                    <input type="file" class="form-control" name="license_upload" id="license_upload" onchange="readURL(this,'license'); src='' " required>
                                </div>
                            </div>
                            <br><div class="row">
                                <div class="col-12 text-center"></div>
                                <!-- <img class="doc_image" id="license_image" src="#" alt="your image" hidden/> -->
                                <!-- <img class="doc_image" id="license_image" src="<?php echo base_url('img/user_doc_img'); ?>/<?php echo $val_user->user_doc_license_image; ?>"/> -->
                                <!-- <?php if ($val_user){?>
                                    <img class="doc_image" id="license_image" src="<?php echo base_url('img/user_doc_img'); ?>/<?php echo $val_user->user_doc_license_image; ?>"/>
                                <?php }else{ ?> -->
                                <!-- <?php } ?> -->
                                <img class="doc_image" id="license_image" src="#" alt="your image" hidden/>
                            </div>
                            <br><br><br>
                            <div class="row">
                                <div class="col-6 text-center">
                                    <button type="button" style="margin:auto; width: 100px;" class="btn btn-secondary d-none d-lg-block m-l-12" onclick="openTab('setDate')">&laquo; ย้อนกลับ</button>
                                </div>
                                <div class="col-6 text-center">
                                    <button type="button" style="margin:auto; width: 100px;" class="btn btn-success d-none d-lg-block m-l-12" onclick="openTab('uploadPay')">ถัดไป &raquo;</button>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <div id="uploadPay" class="tabcontent">
                <div class="col-xs-12 col-md-12 showCarTable" style="user-select: auto;">
                    <div class="row flex-row" style="user-select: auto;">
                        <div class="col-xs-12 col-sm-12" style="user-select: auto;">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2 class="text-black" style="user-select: auto;"><b>ยืนยันข้อตกลง</b></h2>
                                </div>
                                <div class="col-12 text-center">
                                    <h2 class="text-black" style="user-select: auto;"><b>เงื่อนไขการฝากเช่า</b></h2>
                                </div>
                            </div>
                            <br><div class="row">
                                <div class="col-12">
                                    <h6>1.เงื่อนไขการใช้บริการของบริษัท อาร์ซีเอส จำกัด ฉบับนี้มีวัตถุประสงค์เพื่อแจ้งให้ทราบถึงสิทธิและหน้าที่ตามกฎหมายอันพึ่งต้องปฎิบัติตาม</h6>
                                    <h6>2.การสมัครเข้าใช้บริการ การยอมรับข้อตกลง เงื่อนไขการใช้บริการ และนโยบายความเป็นส่วนตัวต่างๆ ถือว่าผู้ใช้บริการยอมรับได้ว่า อ่านและเข้าใจพร้อมทั้งตกลงยินยอมตามข้อตกลง เงื่อนไขการใช้บริการ นโยบายความเป็นส่วนตัวและหรือข้อบังคับอื่นใดแล้วแต่กรณี</h6>
                                    <h6>3.ผู้ใช้บริการต้องให้ข้อมูลที่ถูกต้องและเป็นจริงทุกประการแก่ผู้ให้บริการ เพื่อประโยชน์ในการให้บริการขนส่งในบางกรณีผู้ให้บริการ อาจร้องขอเอกสารเพิ่มเติมเพื่อยืนยันข้อมูลต่างๆและผู้ใช้บริการยอมรับที่ต้องปฎิบัติตามคำร้องขอ</h6>
                                    <h6>4.ผู้ให้บริการไม่อนุญาติให้นำเข้าและหรือส่งออกซึ่งข้อมูลใดๆ และ หรือเอกสารใดๆเข้ามาในเวบไซด์โดยประการที่อาจทำให้เกิดความเสียหายแก่อุปกรณ์ ฮาร์ดแวร์ หรือ ซอฟท์แวร์ อันเป็นความผิดตามกฎหมาย</h6>
                                    <h6>5.ผู้ใช้บริการต้องไม่พยายามหรือกระทำการใดๆที่เป็นอันตรายต่อความปลอดภัยของระบบคอมพิวเตอร์หรือระบบเน็ตเวิร์ค ซึ่งหมายรวมถึงการกระทำผิดใดๆตามที่กฎหมายกำหนด</h6>
                                    <h6>6.หากผู้ใช้บริการกำหนดให้บุคคลภายนอกซึ่งไม่ได้มีส่วนร่วมในการดูแลจัดการบัญชีของท่าน ผู้ให้บริการจะถือว่าการปฏิบัติของบุคคลภายนอกดังกล่าวคือการปฏิบัติของผู้ใช้บริการ หากการปฏิบัติของบุคคลดังกล่าวก่อให้เกิดความเสียหายหรือการเสียผลประโยชน์แก่ท่าน ผู้ให้บริการจะไม่รับผิดชอบใดๆทั้งสิ้น</h6>
                                    <h6>7.ผู้ให้บริการไม่อนุญาติให้ผู้ใช้บริการโอนสิทธิและหน้าที่ภายใต้ข้อตกลง เงื่อนไขการใช้บริการ และนโยบายความเป็นส่วนตัวแก่บุคคลและหรือนิติบุคคลอื่น โดยเด็ดขาด</h6>
                                    <h6>8.ข้อมูลส่วนบุคคลของผู้ใช้บริการ จะไม่เปิดเผยความลับหรือข้อมูลส่วนบุคคลของท่านให้แก่บุคคลภายนอกหรือองค์กรอื่นใดไม่ว่าเพื่อวัตถุประสงค์ใดๆ เว้นแต่
                                            1.ได้รับความยินยอมจากผู้ใช้บริการ
                                            2.กระทำการตามที่กฎหมายบังคับ และหรือตามคำสั่งหรือหมายของศาล เป็นต้น
                                            3.เป็นไปตาม นโยบายความเป็นส่วนตัว</h6>
                                    <h6>9.ผู้ให้บริการ มีซึ่งสิทธิ ลิขสิทธิ์ และ ทรัพย์สินทางปัญญาในข้อมูลที่แสดง รูปภาพ และ รูปแบบการแสดงผล ตามที่ปรากฏในเว็บไซต์ทั้งหมด ยกเว้นจะมีการระบุอย่างชัดเจนเป็นอื่น ห้ามมิให้ผู้ใดทำการคัดลอก ทำซ้ำ มีสำเนา สำรองไว้ ทำเลียนแบบ ทำเหมือน ดัดแปลง ทำเพิ่ม เพื่อนำไปเผยแพร่ด้วยวัตถุประสงค์อื่นใด โดยปราศจากความยินยอมเป็นหนังสือจากผู้ให้บริการ ทั้งนี้เว้นแต่จะได้มีการระบุกำหนดไว้ในข้อตกลง เงื่อนไขการใช้บริการ และนโยบายความเป็นส่วนตัว</h6>
                                    <h6>10.ผู้ให้บริการ สามารถนำข้อมูลใดๆก็ตามที่ผู้ใช้บริการให้กับผู้ให้บริการ โดยผ่าน CRS ไปใช้ในการวิจัย วิเคราะห์ แยกแยะ และหรืออื่นใด ตามที่เห็นสมควร โดยมิต้องแจ้งให้ทราบล่วงหน้า ต้องเป็นข้อมูลที่ผู้ใช้บริการยินยอมให้ใช้ตามข้อตกลง เงื่อนไขการใช้บริการ และนโยบายความเป็นส่วนตัว</h6>
                                </div>
                            </div>
                            <div class ="row">
                                <div class ="col-12 text-center">
                                    <input type="checkbox" name="tos" id="tos" value="1"  onClick="toggleSelect()">
                                    <label for="vehicle1"><h6>ข้าพเจ้ายอมรับเงื่อนไขการฝากเช่า</h6></label><br>
                                </div>
                            </div>  
                            <br><div class="row">
                                <div class="col-6 text-center">
                                    <button type="button" style="margin:auto; width: 100px;" class="btn btn-secondary d-none d-lg-block m-l-12" onclick="openTab('uploadDoc')">&laquo; ย้อนกลับ</button>
                                </div>
                                <div class="col-6 text-center">
                                    <button type="submit" id="selectDeposit" style="margin:auto; width: 150px;" class="btn btn-success d-none d-lg-block m-l-12" disabled>ยืนยันการฝากเช่า </button>
                                </div>
                            </div>
                                <input type="hidden" name="tos_dis" id="tos_dis" value="">
                                <!-- <div class="row">
                                    <input type="hidden" name="car_id" id="car_id" value="<?php echo $val->car_id; ?>">
                                </div> -->
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    

$("#car_brand_id").on('change', function(event) {
    getModel()
})


$('#addCarDepositForm').on('submit', function(event) {
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
                url:"addCarDeposit",
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
                window.location = "<?php echo base_url(); ?>";
                // setTimeout(location.reload.bind(location), 1200);
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
    });
} //show auto
</script>