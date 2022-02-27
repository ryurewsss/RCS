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
#user_image{
    max-width: 300px;
    max-height: 300px;
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
            <button class="tablinks active" id="setDate2" onclick="openTab('setDate')">วันเวลาที่จอง</button>
            <button class="tablinks" id="uploadDoc2" onclick="openTab('uploadDoc')">ตรวจสอบเอกสาร</button>
            <button class="tablinks" id="uploadPay2" onclick="openTab('uploadPay')">ตรวจสอบหลักฐานการโอนเงิน</button>
            <button class="tablinks" id="userDeatail2" onclick="openTab('userDeatail')">ข้อมูลผู้จอง</button>
        </div>
        <form id="addConfirmRentForm" method="post" enctype="multipart/form-data">
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
                                    <h4 >สถานที่รับส่งรถเช่า</h4>
                                </div>  : &ensp;
                                <select style="width: 350px;" class="form-control form-control-line" name="place_id" id="place_id" disabled>
                                    <?php
                                        echo "<option selected value=" . $val->place_id . ">" . $val->place_name . "</option>";
                                    ?>
                                </select>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >วันและเวลาที่รับ </h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 170px;" class="form-control" name="datepicker" id="datepicker" value="<?php echo date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_receive_date,0,10))));?>" readonly>
                                &ensp; : &ensp;
                                <input type="text" style="width: 150px; text-align: center;" class="form-control" name="datetimepicker" id="datetimepicker" value="<?php echo substr($val->transaction_receive_date,11,5); ?>" readonly>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >วันและเวลาที่คืน </h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 170px;" class="form-control" name="datepicker2" id="datepicker2" value="<?php echo date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_return_date,0,10)))); ?>" readonly>
                                &ensp; : &ensp;
                                <input type="text" style="width: 150px; text-align: center;" class="form-control" name="datetimepicker2" id="datetimepicker2" value="<?php echo substr($val->transaction_return_date,11,5); ?>" readonly>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ระยะเวลาที่เช่า</h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 200px; text-align: right;" class="form-control rentHours" name="rentHours" readonly/>
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
                                <div class="col-6 text-center">
                                    <h4 >เอกสารระบุตัวตน <br>(หนังสือเดินทางหรือบัตรประชาชน) </h4>
                                    <img class="doc_image" id="iden_image" src="<?php echo base_url('img/user_doc_img'); ?>/<?php echo $val->user_doc_iden_image; ?>"/>
                                    <br><br><br>
                                    <h4 >ใบอนุญาตขับขี่ </a></h4>
                                    <img class="doc_image" id="license_image" src="<?php echo base_url('img/user_doc_img'); ?>/<?php echo $val->user_doc_license_image; ?>"/>
                                </div>
                                <div class="col-6 text-center">
                                    <h4>ปฏิเสธเอกสาร <br><br> </h4>
                                    <textarea style="height: 300px" class="form-control" rows="3" name="inputData[]" id="transaction_reject_iden" autocomplete="off" placeholder="สาเหตุที่ปฏิเสธ" <?php echo $val->transaction_status == 5 ? 'readonly' : '' ; ?>><?php echo isset($val->transaction_reject_iden) ? $val->transaction_reject_iden : ''; ?></textarea>
                                    <br>
                                        <h2 class="text-danger" id="reject_iden_1" style="user-select: auto; display: <?php echo isset($val->transaction_iden_approve) && $val->transaction_iden_approve == 0 ? 'display' : 'none'; ?>"><b>ปฏิเสธเอกสาร</b></h2>
                                        <h2 class="text-success" id="reject_iden_2" style="user-select: auto; display: <?php echo isset($val->transaction_iden_approve) && $val->transaction_iden_approve == 1 ? 'display' : 'none'; ?>"><b>ยอมรับเอกสาร</b></h2>
                                        <input type="hidden" name="inputData[]" id="reject_iden" value="<?php echo isset($val->transaction_iden_approve) ? $val->transaction_iden_approve : ''; ?>">
                                    <div class="row">
                                        <div class="col-6 text-center">
                                            <button type="button" style="margin:auto; width: 100px;" class="btn btn-danger d-none d-lg-block m-l-12 reject_iden_btn" value="0" <?php echo $val->transaction_status == 5 ? 'disabled' : '' ; ?>>ปฏิเสธ</button>
                                        </div>
                                        <div class="col-6 text-center">
                                            <button type="button" style="margin:auto; width: 150px;" class="btn btn-success d-none d-lg-block m-l-12 reject_iden_btn" value="1" <?php echo $val->transaction_status == 5 ? 'disabled' : '' ; ?>>ยอมรับ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            
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
                                    <h2 class="text-black" style="user-select: auto;"><b>ตรวจสอบหลักฐานการโอนเงิน</b></h2>
                                </div>
                            </div>
                            <br><div class="row">
                                <div class="col-6 text-center">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h4>หลักฐานการโอนเงิน </a></h4>
                                        </div>
                                    </div>
                                    <br><div class="row">
                                        <div class="col-12 text-center"></div>
                                        <img class="doc_image" id="transaction_image" src="<?php echo base_url('img/transaction_img'); ?>/<?php echo $val->transaction_image; ?>"/>
                                    </div>
                                    <br><h4>ข้อมูลการเช่า</h4>
                                    <br><div class="row">
                                        <div class="col-4">
                                            <h4 >ระยะเวลาที่เช่า</h4>
                                        </div>  : &ensp;
                                        <input type="text" style="width: 200px; text-align: right;" class="form-control rentHours" name="rentHours" readonly/>
                                        <h5 style="margin-top:10px">&ensp; ชั่วโมง</h5>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-4">
                                            <h4 >ยอดที่ต้องโอน</h4>
                                        </div>  : &ensp;
                                        <input type="text" style="width: 200px; text-align: right;" class="form-control rentTotal" name="rentTotal" readonly/>
                                        <h5 style="margin-top:10px">&ensp; บาท</h5>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    <h4>ปฏิเสธเอกสาร <br><br> </h4>
                                    <textarea style="height: 300px" class="form-control" rows="3" name="inputData[]" id="transaction_reject_transfer" autocomplete="off" placeholder="สาเหตุที่ปฏิเสธ" <?php echo $val->transaction_status == 5 ? 'readonly' : '' ; ?>><?php echo isset($val->transaction_reject_transfer) ? $val->transaction_reject_transfer : ''; ?></textarea>
                                    <br>
                                        <h2 class="text-danger" id="reject_tran_1" style="user-select: auto; display: <?php echo isset($val->transaction_transfer_approve) && $val->transaction_transfer_approve == 0 ? 'display' : 'none'; ?>"><b>ปฏิเสธเอกสาร</b></h2>
                                        <h2 class="text-success" id="reject_tran_2" style="user-select: auto; display: <?php echo isset($val->transaction_transfer_approve) && $val->transaction_transfer_approve == 1 ? 'display' : 'none'; ?>"><b>ยอมรับเอกสาร</b></h2>
                                        <input type="hidden" name="inputData[]" id="reject_tran" value="<?php echo isset($val->transaction_transfer_approve) ? $val->transaction_transfer_approve : ''; ?>">
                                    <div class="row">
                                        <div class="col-6 text-center">
                                            <button type="button" style="margin:auto; width: 100px;" class="btn btn-danger d-none d-lg-block m-l-12 reject_tran_btn" value="0" <?php echo $val->transaction_status == 5 ? 'disabled' : '' ; ?>>ปฏิเสธ</button>
                                        </div>
                                        <div class="col-6 text-center">
                                            <button type="button" style="margin:auto; width: 150px;" class="btn btn-success d-none d-lg-block m-l-12 reject_tran_btn" value="1" <?php echo $val->transaction_status == 5 ? 'disabled' : '' ; ?>>ยอมรับ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row">
                                <div class="col-6 text-center">
                                    <button type="button" style="margin:auto; width: 100px;" class="btn btn-secondary d-none d-lg-block m-l-12" onclick="openTab('setDate')">&laquo; ย้อนกลับ</button>
                                </div>
                                <div class="col-6 text-center">
                                    <input type="hidden" name="inputData[]" id="transaction_id" value="<?php echo $val->transaction_id; ?>">
                                    <button type="submit" style="margin:auto; width: 160px;" class="btn btn-success d-none d-lg-block m-l-12" <?php echo $val->transaction_status == 5 ? 'disabled' : '' ; ?>>ยืนยันการตรวจสอบ</button>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div id="userDeatail" class="tabcontent">
            <div class="col-xs-12 col-md-12 showCarTable" style="user-select: auto;">
                <div class="row flex-row" style="user-select: auto;">
                    <div class="col-xs-12 col-sm-12" style="user-select: auto;">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h2 class="text-black" style="user-select: auto;"><b>ข้อมูลผู้จอง</b></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <br><div class="row">
                                    <div class="col-4">
                                        <h4 >อีเมล</h4>
                                    </div>  : &ensp;
                                    <input type="text" style="width: 300px;" class="form-control" value="<?php echo $val->user_email; ?>" disabled/>
                                </div>

                                <br><div class="row">
                                    <div class="col-4">
                                        <h4 >ชื่อ - นามสกุล</h4>
                                    </div>  : &ensp;
                                    <input type="text" style="width: 300px;" class="form-control" value="<?php echo $val->user_fname.' '.$val->user_lname; ?>" disabled/>
                                </div>

                                <br><div class="row">
                                    <div class="col-4">
                                        <h4 >เบอร์โทรศัพท์</h4>
                                    </div>  : &ensp;
                                    <input type="text" style="width: 300px;" class="form-control" value="<?php echo $val->user_phone; ?>" disabled/>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a href="<?= base_url() ?>Transaction/transactionUser?userId=<?php echo $val->user_id; ?>">
                                            <button type="button" style="margin:auto;" class="btn btn-info d-none d-lg-block m-l-12">ดูประวัติการจอง</button>
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-6">
                                <br><div class="row">
                                    <div class="col-12 text-center"></div>
                                    <img id="user_image" src="<?php echo isset($val->user_image) ? base_url('img/user_img').'/'. $val->user_image : base_url('img/user_img').'/'. 'profile.png'; ?>">
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

onDateChange()

$('.reject_iden_btn').click(function() {
    if(this.value == 0){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Reject Document',
            showConfirmButton: false,
            timer: 1000
        })
        $('#reject_iden_1').show();
        $('#reject_iden_2').hide();
        $('#reject_iden').val(0);
    }
    if(this.value == 1){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Approve Document',
            showConfirmButton: false,
            timer: 1000
        })
        $('#reject_iden_1').hide();
        $('#reject_iden_2').show();
        $('#reject_iden').val(1);
    }
})
$('.reject_tran_btn').click(function() {
    if(this.value == 0){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Reject Document',
            showConfirmButton: false,
            timer: 1000
        })
        $('#reject_tran_1').show();
        $('#reject_tran_2').hide();
        $('#reject_tran').val(0);
    }
    if(this.value == 1){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Approve Document',
            showConfirmButton: false,
            timer: 1000
        })
        $('#reject_tran_1').hide();
        $('#reject_tran_2').show();
        $('#reject_tran').val(1);
    }
})

$('#addConfirmRentForm').on('submit', function(event) {
    event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser

    Swal.fire({
        title: 'Are you sure?',
        text: "You Confirm the document",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#dc3545',
        confirmButtonColor: '#28a745',
        confirmButtonText: 'Yes, Confirm it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var formData = {};
            $("[name^='inputData']").each(function() {
                formData[this.id] = this.value;
            });
            $.ajax({  
                url:"editTransactionDetail",
                method:"POST",  
                data:formData
            }).done(function(returnData) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Save Complete',
                    showConfirmButton: false,
                    timer: 1000
                })
                window.location = "<?php echo base_url().'/Transaction/transaction'; ?>";
                // $('#addConfirmRentForm form')[0].reset();
            });
        }
    })
})

function onDateChange() {
    if($("#datepicker").val()!='' && $("#datepicker2").val()!=''){
        var startDate = $("#datepicker").val().substring(10, 0);
        var startTime = $("#datetimepicker").val().substring(5, 0);
        var endDate = $("#datepicker2").val().substring(10, 0);
        var endTime = $("#datetimepicker2").val().substring(5, 0);
        var start = new Date(ConvertDateFormat(startDate,startTime));
        var end = new Date(ConvertDateFormat(endDate,endTime));
        var diff = new Date(end - start);

        var days = Math.floor(diff / 1000 / 60 / 60 / 24);
        var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / 1000 / 60 / 60);
        var totalHours = Math.floor(diff / 1000 / 60 / 60 );
        $('.rentHours').val(totalHours);
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
    }
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


</script>