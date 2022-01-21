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
            <button class="tablinks" onclick="openTab(event, 'uploadPay')">อัปโหลดหลักฐานการโอนเงิน</button>
        </div>
        <form id="addCarRentForm" method="post" enctype="multipart/form-data">
            <div id="setDate" class="tabcontent" style="display: block;">
                <div class="col-xs-12 col-md-12 showCarTable" style="user-select: auto;">
                    <div class="row flex-row" style="user-select: auto;">
                        <div class="col-xs-12 col-sm-5 carBlock" style="user-select: auto;">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2 class="text-blue" style="user-select: auto;"><b><?php echo $val->car_brand_name_en.' '.$val->car_model_name; ?></b></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h4 class="text-blue" style="user-select: auto;"><b><?php echo $val->car_registration; ?></b></h4>
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
                                <div class="col-4">
                                    <h4 >สถานที่รับส่งรถเช่า <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <select style="width: 350px;" class="form-control form-control-line" name="place_id" id="place_id">
                                    <option disabled selected>เลือกสถานที่รับส่ง</option>
                                    <?php
                                    if (isset($placeSelect)) {
                                        foreach ($placeSelect as $key => $place) {
                                            echo "<option value=" . $place->place_id . ">" . $place->place_name . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ช่วงวันและเวลา <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 350px;" class="form-control" name="datetimes" id="datetimes" />
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ระยะเวลาที่เช่า</h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 200px; text-align: right;" class="form-control" name="rentHours" id="rentHours"  readonly/>
                                <h5 style="margin-top:10px">&ensp; ชั่วโมง</h5>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ราคา</h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 200px; text-align: right;" class="form-control" name="rentPrice" id="rentPrice" value="<?php echo number_format($val->car_price); ?>" readonly/>
                                <h5 style="margin-top:10px;">&ensp; บาท/วัน</h5>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ยอดที่ต้องโอน</h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 200px; text-align: right;" class="form-control rentTotal" name="rentTotal" readonly/>
                                <h5 style="margin-top:10px">&ensp; บาท</h5>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="button" style="margin:auto;" class="btn btn-info d-none d-lg-block m-l-12">ตรวจสอบการจอง</button>
                                </div>
                            </div>

                            <br><br><br>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="button" style="margin:auto; width: 100px;" class="btn btn-success d-none d-lg-block m-l-12" onclick="openTab(event, 'uploadDoc')">ถัดไป &raquo;</button>
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
                            
                            <br><br><br>
                            <div class="row">
                                <div class="col-6 text-center">
                                    <button type="button" style="margin:auto; width: 100px;" class="btn btn-secondary d-none d-lg-block m-l-12" onclick="openTab(event, 'setDate')">&laquo; ย้อนกลับ</button>
                                </div>
                                <div class="col-6 text-center">
                                    <button type="button" style="margin:auto; width: 100px;" class="btn btn-success d-none d-lg-block m-l-12" onclick="openTab(event, 'uploadPay')">ถัดไป &raquo;</button>
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
                                    <h2 class="text-black" style="user-select: auto;"><b>อัปโหลดหลักฐานการโอนเงิน</b></h2>
                                </div>
                            </div>
                            
                            <br><div class="row">
                                <div class="col-3">
                                    <h4 >ยอดที่ต้องโอน</h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 200px; text-align: right;" class="form-control rentTotal" disabled/>
                                <h5 style="margin-top:10px">&ensp; บาท</h5>
                            </div>

                            <br><div class="row">
                                <div class="col-6 text-center">
                                    <h3>บัญชีธนาคาร</h3>
                                    <br><br>
                                    <h5>386-0-662XX-X</h5>
                                    <h5>กรุงไทย</h5>
                                    <h5>สิรภพ คูณสินชัย</h5>
                                </div>
                                <div class="col-6 text-center">
                                    <h3>บัญชีพร้อมเพย์</h3>
                                    <div id="qrImage"></div>
                                </div>
                            </div>

                            <br><br><div class="row">
                                <div class="col-3">
                                    <h4>หลักฐานการโอนเงิน </a></h4>
                                </div>
                                <div class="col-5 text-center">
                                    <input type="file" class="form-control" name="transaction_upload" id="transaction_upload" onchange="readURL(this,'transaction'); src='' ">
                                </div>
                            </div>
                            <br><div class="row">
                                <div class="col-12 text-center"></div>
                                <img class="doc_image" id="transaction_image" src="#" alt="your image" hidden/>
                            </div>
                            
                            <br><div class="row">
                                <div class="col-6 text-center">
                                    <button type="button" style="margin:auto; width: 100px;" class="btn btn-secondary d-none d-lg-block m-l-12" onclick="openTab(event, 'uploadDoc')">&laquo; ย้อนกลับ</button>
                                </div>
                                <div class="col-6 text-center">
                                    <input type="hidden" name="car_id" id="car_id" value="<?php echo $val->car_id; ?>">
                                    <button type="submit" style="margin:auto; width: 130px;" class="btn btn-success d-none d-lg-block m-l-12" >ยืนยันการจอง &raquo;</button>
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

$('input[name="datetimes"]').daterangepicker({
    timePicker: true,
    timePicker24Hour: true,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(24, 'hour'),
    locale: {
      format: 'DD/MM/YYYY HH:mm'
    }
});

$('input[name="datetimes"]').on('change', function(event) {
    var startDate = this.value.substring(10, 0);
    var startTime = this.value.substring(16, 11);
    var endDate = this.value.substring(29, 19);
    var endTime = this.value.substring(35, 30);
    var start = new Date(ConvertDateFormat(startDate,startTime));
    var end = new Date(ConvertDateFormat(endDate,endTime));
    var diff = new Date(end - start);

    var days = Math.floor(diff / 1000 / 60 / 60 / 24);
    var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / 1000 / 60 / 60);
    var totalHours = Math.floor(diff / 1000 / 60 / 60 );
    $('#rentHours').val(totalHours);
    var price = parseInt($('#rentPrice').val().replace(/,/g, ''));
    if(days == 0){
        days++;
        $('.rentTotal').val(parseInt(days) * price); //rent less than 1 day
    }else if(hours > 5){
        days++;
        $('.rentTotal').val(parseInt(days) * price); //rent more 1 day and 5 hours+
    }else{
        $('.rentTotal').val((parseInt(days) * price) + (parseInt(hours) * parseInt(price / 10))); //rent more 1 day and 5 hours-
    }
    $('.rentTotal').val(addCommas($('.rentTotal').val()));
    getQRcode();
})
$('input[name="datetimes"]').trigger("change"); //trigger on open

$('#addCarRentForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser

        //เหลือดัก

        $.ajax({  
            url:"addCarRent",
            method:"POST",  
            data:new FormData(this),  
            contentType: false,  
            cache: false,  
            processData:false,  
        }).done(function(returnData) {
            getList();
            $('#addCarRentForm form')[0].reset();
            // $('#car_image').attr('src', '');
            // $('#car_image').attr('hidden',true);
        }); 

    })

function addCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

function ConvertDateFormat(d, t) {
    var dt = d.split('/'); //split date
    return dt[1] + '/' + dt[0] + '/' + dt[2] + ' ' + t; //convert date to mm/dd/yy hh:mm format for date creation.
}

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
            }else if(type == 'transaction'){
                $('#transaction_image').attr('src', e.target.result);
                $('#transaction_image').attr('hidden',false);
            }
        };

        reader.readAsDataURL(input.files[0]);
    }
}//show image when choose

function getQRcode() {
        var data = {};
        data['price'] = $('.rentTotal').val().replace(/,/g, '');
        data['tel'] = '0809425365';
        $.ajax({
            method: "POST",
            url: "getQRcode",
            data: data,  
        }).done(function(returnedData) {
            $('#qrImage').html(returnedData.html);
        });
    }
</script>