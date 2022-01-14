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

</style>
<?php 
    // print_r($select); 
    $val = $select[0];
?>
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ข้อมูลรถเช่า</a>
        </div>
    </div>
    <div class="card-body">
        <div class="tab">
        <button class="tablinks active" onclick="openTab(event, 'setDate')">กำหนดวันเวลา</button>
        <button class="tablinks" onclick="openTab(event, 'uploadDoc')">อัปโหลดเอกสาร</button>
        <button class="tablinks" onclick="openTab(event, 'confirmPay')">ยืนยันการชำระเงิน</button>
        <button class="tablinks" onclick="openTab(event, 'uploadPay')">อัปโหลดหลักฐานการโอนเงิน</button>
        </div>

        <div id="setDate" class="tabcontent" style="display: block;">
            <div class="col-xs-12 col-md-12 showCarTable" style="user-select: auto;">
                <div class="row flex-row" style="user-select: auto;">
                    <div class="col-xs-12 col-sm-5 carBlock" style="user-select: auto;">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h2 class="text-blue" style="user-select: auto;"><b><?php echo $val->car_brand_name_en.' '.$val->car_model_name; ?></b></h2>
                            </div>
                        </div>
                        <div class="carImg row">
                            <div class="col-12">
                                <img src="<?php echo base_url('img/car_img'); ?>/<?php echo $val->car_image; ?>" alt="<?php echo $val->car_image; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h4 class="text-blue" style="user-select: auto;">ราคา <b><?php echo number_format($val->car_price); ?></b> บาท/วัน</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h2 style="user-select: auto;">
                                    <b>
                                        Tel : 081-xxxxxxxxx <br>
                                        Line : @RCS
                                    </b>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7" style="user-select: auto;">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h2 class="text-black" style="user-select: auto;"><b>จองรถเช่า</b></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 class="text-black" style="user-select: auto;"><b>วันเวลาและสถานที่</b></h3>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-5">
                                <h4 >สถานที่รับส่งรถเช่า <a style="color: red;"> *</a></h4>
                            </div>  : &ensp;
                            <select style="width: 300px;" id="car_brand_id" class="form-control form-control-line" name="editData[]">
                                <option disabled selected>เลือกสถานที่รับส่ง</option>
                                <?php
                                if (isset($placeSelect)) {
                                    foreach ($placeSelect as $key => $val) {
                                        echo "<option value=" . $val->place_id . ">" . $val->place_name . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-5">
                                <h4 >ช่วงวันและเวลา <a style="color: red;"> *</a></h4>
                            </div>  : &ensp;
                            <input type="text" style="width: 300px;" class="form-control" name="datetimes" />
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="button" style="margin:auto;" class="btn btn-info d-none d-lg-block m-l-12">ตรวจสอบการจอง</button>
                            </div>
                        </div>

                        <br><br><br>
                        <br><br><br>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="button" style="margin:auto; width: 100px;" class="btn btn-success d-none d-lg-block m-l-12">ถัดไป</button>
                            </div>
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
                                <h3 class="text-black" style="user-select: auto;"><b>ภาพถ่ายหรือสำเนาเอกสารของผู้ขับขี่</b></h3>
                            </div>
                        </div>
                        
                        <br><div class="row">
                            <div class="col-5 text-center">
                                <h4 >เอกสารระบุตัวตน <br>(หนังสือเดินทางหรือบัตรประชาชน) </h4>
                            </div>
                            <div class="col-5 text-center">
                                <input type="file" class="form-control" name="iden_upload" id="iden_upload" onchange="readURL(this,'iden'); src='' ">
                            </div>
                        </div>
                        <br><div class="row">
                            <div class="col-12 text-center"></div>
                            <img class="doc_image" id="iden_image" src="#" alt="your image" hidden/>
                        </div>

                        <br><div class="row">
                            <div class="col-5 text-center">
                                <h4 >ใบอนุญาตขับขี่ </a></h4>
                            </div>
                            <div class="col-5 text-center">
                                <input type="file" class="form-control" name="license_upload" id="license_upload" onchange="readURL(this,'license'); src='' ">
                            </div>
                        </div>
                        <br><div class="row">
                            <div class="col-12 text-center"></div>
                            <img class="doc_image" id="license_image" src="#" alt="your image" hidden/>
                        </div>
                        
                        <br><div class="row">
                            <div class="col-12 text-center">
                                <!-- <a href="<?= base_url() ?>Car/carDetail?type=rent&carId=<?php echo $val->car_id; ?>"> -->
                                    <button type="button" style="margin:auto;" class="btn btn-success d-none d-lg-block m-l-12">ตรวจสอบการจอง</button>
                                <!-- </a> -->
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <div id="confirmPay" class="tabcontent">
            <h3>Tokyo</h3>
            <p>Tokyo is the capital of Japan.</p>
        </div>

        <div id="uploadPay" class="tabcontent">
            <h3>Tokyo</h3>
            <p>Tokyo is the capital of Japan.</p>
        </div>

    </div>
</div>

<script>

$('input[name="datetimes"]').daterangepicker({
    timePicker: true,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'M/DD hh:mm A'
    }
});

function openTab(evt, tabName) {
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
  evt.currentTarget.className += " active";
}

function readURL(input,type) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            if(type == 'iden'){
                $('#iden_image').attr('src', e.target.result);
                $('#iden_image').attr('hidden',false);
            }else if(type == 'license'){
                $('#license_image').attr('src', e.target.result);
                $('#license_image').attr('hidden',false);
            }
        };

        reader.readAsDataURL(input.files[0]);
    }
}//show image when choose
</script>