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
    // var_dump($user);
    if($user){
        $val_user = $user[0];
    }else{
        $val_user = $user;//false
    }
    // if($check_date){
    //     $val_check_date = $check_date[0];
    // }else{
    //     $val_check_date = $check_date;//false
    // }
    // var_dump($val_check_date);

?>
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ข้อมูลรถเช่า</a>
        </div>
    </div>
    <div class="card-body">
        <div class="tab">
            <button class="tablinks active" id="setDate2" onclick="openTab('setDate')">กำหนดวันเวลา</button>
            <button class="tablinks" id="uploadDoc2" onclick="openTab('uploadDoc')">อัปโหลดเอกสาร</button>
            <button class="tablinks" id="uploadPay2" onclick="openTab('uploadPay')">อัปโหลดหลักฐานการโอนเงิน</button>
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
                                    <h4 >วันและเวลาที่รับ <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <!-- <input type="text" style="width: 350px;" class="form-control" name="datetimes" id="datetimes" /> -->
                                <input type="text" style="width: 170px;" class="form-control" name="datepicker" id="datepicker">
                                &ensp; : &ensp;
                                <input type="text" style="width: 150px; text-align: center;" class="form-control" name="datetimepicker" id="datetimepicker">
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >วันและเวลาที่คืน <a style="color: red;"> *</a></h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 170px;" class="form-control" name="datepicker2" id="datepicker2">
                                &ensp; : &ensp;
                                <input type="text" style="width: 150px; text-align: center;" class="form-control" name="datetimepicker2" id="datetimepicker2">
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

                            <br><br><br>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="button" style="margin:auto; width: 100px;" class="btn btn-success d-none d-lg-block m-l-12" onclick="openTab('uploadDoc')">ถัดไป &raquo;</button>
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
                                <!-- <img class="doc_image" id="iden_image" src="#" alt="your image" hidden/> -->
                                <?php if ($val_user){?>
                                    <img class="doc_image" id="iden_image" src="<?php echo base_url('img/user_doc_img'); ?>/<?php echo $val_user->user_doc_iden_image; ?>"/>
                                <?php }else{ ?>
                                    <img class="doc_image" id="iden_image" src="#" alt="your image" hidden/>
                                <?php } ?>
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
                                <!-- <img class="doc_image" id="license_image" src="#" alt="your image" hidden/> -->
                                <!-- <img class="doc_image" id="license_image" src="<?php echo base_url('img/user_doc_img'); ?>/<?php echo $val_user->user_doc_license_image; ?>"/> -->
                                <?php if ($val_user){?>
                                    <img class="doc_image" id="license_image" src="<?php echo base_url('img/user_doc_img'); ?>/<?php echo $val_user->user_doc_license_image; ?>"/>
                                <?php }else{ ?>
                                    <img class="doc_image" id="license_image" src="#" alt="your image" hidden/>
                                <?php } ?>
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
                                    <button type="button" style="margin:auto; width: 100px;" class="btn btn-secondary d-none d-lg-block m-l-12" onclick="openTab('uploadDoc')">&laquo; ย้อนกลับ</button>
                                </div>
                                <div class="col-6 text-center">
                                    <button type="submit" style="margin:auto; width: 130px;" class="btn btn-success d-none d-lg-block m-l-12" >ยืนยันการจอง &raquo;</button>
                                </div>
                            </div>
                                <div class="row">
                                    <input type="hidden" name="user_type_id" id="user_type_id" value="<?php echo $val->user_type_id; ?>">
                                    <input type="hidden" name="car_id" id="car_id" value="<?php echo $val->car_id; ?>">
                                    <input type="hidden" name="car_registration" id="car_registration" value="<?php echo $val->car_registration; ?>">
                                    <input type="hidden" name="user_doc_id" id="user_doc_id" value="<?php echo $val_user?$val_user->user_doc_id :0; ?>" />
                                    <input type="hidden" name="old_iden_upload" id="old_iden_upload" value="<?php echo $val_user?$val_user->user_doc_iden_image:""; ?>">
                                    <input type="hidden" name="old_license_upload" id="old_license_upload" value="<?php echo $val_user?$val_user->user_doc_license_image:""; ?>">
                                    <input type="hidden" name="place_name" id="place_name" value="">
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
    var date_range = [];
    get_date()

$('#datetimepicker, #datetimepicker2').timepicker({
    timeFormat: 'HH:mm',
    interval: 15,
    minTime: '06',
    maxTime: '20',
    defaultTime: '06',
    startTime: '06:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true,
    change: onDateChange
});

$("#datepicker").on('change', function(event) {
    $('#datepicker2').datepicker('option', 'minDate', new Date(moment(moment($("#datepicker").val(), 'DD/MM/YYYY')).format("MM/DD/YYYY")));
});
$("#datepicker2").on('change', function(event) {
    $('#datepicker').datepicker('option', 'maxDate', new Date(moment(moment($("#datepicker2").val(), 'DD/MM/YYYY')).format("MM/DD/YYYY")));

    let pass = true;
    for (var i = 0; i < date_range.length; i++) {
        if(dateCheck(date_range[i][0])){
            pass = false;
            break;
        }
    }
    if(pass){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'During that time, can reserved',
            showConfirmButton: false,
            timer: 1000
        })
    }else{
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'During that time, people have already reserved.',
            showConfirmButton: false,
            timer: 1000
        })
    }
});
$("#datepicker, #datepicker2").on('change', function(event) {
    onDateChange()
    if($("#datepicker").val()!='' && $("#datepicker2").val()!=''){
        checkDate()
    }
});

$('#addCarRentForm').on('submit', function(event) {
    event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser

    Swal.fire({
        title: 'Are you sure?',
        text: "You Confirm Rent a Car",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#dc3545',
        confirmButtonColor: '#28a745',
        confirmButtonText: 'Yes, Confirm it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:"addCarRent",
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,
            }).done(function(returnData) {
                for(var i=1; $("#user_type_id").val()==3 ? i<4:i<3; i++){//ยังไม่รวมฝากเช่า
                    $.ajax({
                    url: 'sendEmail',
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
            });
        }
    })
})

$('#place_id').on('change', function(event) {
    $('#place_name').val($('#place_id option:selected').text())
})

function checkDate() {
    let pass = true;
    for (var i = 0; i < date_range.length; i++) {
        if(dateCheck(date_range[i][0])){
            pass = false;
            break;
        }
    }
    if(pass){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'During that time, can reserved',
            showConfirmButton: false,
            timer: 1000
        })
    }else{
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'During that time, people have already reserved.',
            showConfirmButton: false,
            timer: 1000
        })
    }
}

function dateCheck(get_date) {
    let fDate,lDate,cDate;
    let dateArray = $('#datepicker').val().split('/')
    let dateArray2 = $('#datepicker2').val().split('/')
    fDate = dateArray[1] + '/' + dateArray[0] + '/' + dateArray[2];
    lDate = dateArray2[1] + '/' + dateArray2[0] + '/' + dateArray2[2];

    fDate = new Date(fDate); // firstdate
    cDate = new Date(get_date); // date from form
    lDate = new Date(lDate);
    
    if(Date.parse(cDate) <= Date.parse(lDate) && Date.parse(cDate) >= Date.parse(fDate)){
        return true;
    }

    return false;
}

function onDateChange() {
    if($("#datepicker").val()!='' && $("#datepicker2").val()!=''){
        var startDate = $("#datepicker").val().substring(10, 0);
        var startTime = $("#datetimepicker").val().substring(5, 0);
        var endDate = $("#datepicker2").val().substring(10, 0);
        var endTime = $("#datetimepicker2").val().substring(5, 0);
        // console.log(startDate)
        // console.log(startTime)
        // console.log(endDate)
        // console.log(endTime)
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
    }
}

function get_date() {
    var formData = {"car_id" : $("#car_id").val()};
    $.ajax({  
        url:"check_date",
        method:"GET",
        data: formData,
    }).done(function(returnData) {
        // date_range = [ ["02-04-2022", "02-08-2022"], ["02-25-2022", "02-27-2022"], ["02-21-2022", "02-23-2022"] ];
        date_range = returnData['date_array'];
        console.log(date_range)
        $("#datepicker, #datepicker2").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: +2,
            beforeShowDay: function(date) {
                var string = $.datepicker.formatDate('mm-dd-yy', date);
                for (var i = 0; i < date_range.length; i++) {
                    if (Array.isArray(date_range[i])) {
                        var from = new Date(date_range[i][0]);
                        var to = new Date(date_range[i][1]);
                        var current = new Date(string);
                        
                        if (current >= from && current <= to) return false;
                    }
                }
                return [date_range.indexOf(string) == -1]
            }
        });
    });
}

function addCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

function ConvertDateFormat(d, t) {
    var dt = d.split('/'); //split date
    return dt[1] + '/' + dt[0] + '/' + dt[2] + ' ' + t; //convert date to mm/dd/yy hh:mm format for date creation.
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