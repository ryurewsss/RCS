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
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ข้อมูลรถฝากเช่า</a>
        </div>
    </div>
    <div class="card-body">
        <div class="tab">
            <button class="tablinks active" id="setDate2" onclick="openTab('setDate')">ข้อมูลรถยนต์</button>
            <button class="tablinks" id="uploadDoc2" onclick="openTab('uploadDoc')">ตรวจสอบเอกสาร</button>
            <button class="tablinks" id="userDeatail2" onclick="openTab('userDeatail')">ข้อมูลผู้จอง</button>
        </div>
        <form id="addConfirmRentForm" method="post" enctype="multipart/form-data">
            <div id="setDate" class="tabcontent" style="display: block;">
                <div class="col-xs-12 col-md-12 showCarTable" style="user-select: auto;">
                    <div class="row flex-row" style="user-select: auto;">
                        <div class="col-xs-12 col-sm-5 carBlock" style="user-select: auto;">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2 class="text-blue" style="user-select: auto;"><b><?php echo $val->car_brand_name_en?></b></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h4 class="text-blue" style="user-select: auto;"><b><?php echo $val->car_registration; ?></b></h4>
                                </div>
                            </div>
                            <div class="carImg row">
                                <div class="col-12 text-center">
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
                                    <h2 class="text-black" style="user-select: auto;"><b>ข้อมูลรถยนต์ฝากเช่า</b></h2>
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
                                    <h4 >ทะเบียนรถยนต์</h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 250px; text-align: center;" class="form-control" name="car_registration" id="car_registration" value="<?php echo $val->car_registration; ?>" readonly/>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ยี่ห้อรถยนต์ </h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 250px; text-align: center;" class="form-control" name="car_brand_id" id="car_brand_id" value="<?php echo $val->car_brand_name_en; ?>" readonly/>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-4">
                                    <h4 >รุ่นรถยนต์ </h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 250px; text-align: center;" class="form-control" name="car_model_name" id="car_model_name" value="<?php echo $val->car_model_name; ?>" readonly/>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h4 >ราคา</h4>
                                </div>  : &ensp;
                                <input type="text" style="width: 250px; text-align: center;" class="form-control" name="car_price" id="car_price" value="<?php echo $val->car_price; ?>" readonly/>
                                <h5 style="margin-top:10px;">&ensp; บาท/วัน</h5>
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
                                    <h3 class="text-black" style="user-select: auto;"><b>ภาพถ่ายหรือสำเนาเอกสารของรถยนต์</b></h3>
                                </div>
                            </div>
                            
                            <br><div class="row">
                                <div class="col-6 text-center">
                                    <h4 >เอกสารระบุตัวตน <br>(เล่มรถยนต์) </h4>
                                        <img id="car_proof_image" src="<?php echo base_url('img/car_deposit_img').'/'. $val->car_proof_image; ?>">
                                    <br><br><br>
                                </div>
                                <div class="col-6 text-center">
                                    <h4>ปฏิเสธเอกสาร <br><br> </h4>
                                    <textarea style="height: 300px" class="form-control" rows="3" name="inputData[]" id="car_reject_deposit" autocomplete="off" placeholder="สาเหตุที่ปฏิเสธ" ><?php echo isset($val->car_reject_deposit) ? $val->car_reject_deposit : ''; ?></textarea>
                                    <br>
                                    <h2 class="text-danger" id="car_status_8" style="user-select: auto; display: <?php echo isset($val->car_status) && $val->car_status == 8 ? 'display' : 'none'; ?>"><b>ปฏิเสธเอกสาร</b></h2>
                                        <h2 class="text-success" id="car_status_9" style="user-select: auto; display: <?php echo isset($val->car_status) && ($val->car_status == 9 || $val->car_status == 10 || $val->car_status == 11) ? 'display' : 'none'; ?>"><b>ยอมรับเอกสาร</b></h2>
                                        <input type="hidden" name="inputData[]" id="car_status" value="<?php echo isset($val->car_status) ? $val->car_status : ''; ?>">
                                    <div class="row">
                                        <div class="col-6 text-center">
                                            <button type="button" style="margin:auto; width: 100px;" class="btn btn-danger d-none d-lg-block m-l-12 reject_iden_btn" value="0" <?php echo isset($val->car_status) && ($val->car_status == 10 || $val->car_status == 11) ? 'disabled' : '' ; ?>>ปฏิเสธ</button>
                                        </div>
                                        <div class="col-6 text-center">
                                            <button type="button" style="margin:auto; width: 150px;" class="btn btn-success d-none d-lg-block m-l-12 reject_iden_btn" value="1" <?php echo isset($val->car_status) && ($val->car_status == 10 || $val->car_status == 11) ? 'disabled' : '' ; ?>>ยอมรับ</button>
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
                                <input type="hidden" name="inputData[]" id="transaction_id" value="<?php echo $val->transaction_id; ?>">
                                <button type="submit" style="margin:auto; width: 160px;" class="btn btn-success d-none d-lg-block m-l-12" <?php echo $val->car_status == 11 ? 'disabled' : '' ; ?>>ยืนยันการตรวจสอบ</button>
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

$('.reject_iden_btn').click(function() {
    if(this.value == 0){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Reject Document',
            showConfirmButton: false,
            timer: 1000
        })
        $('#car_status_8').show();
        $('#car_status_9').hide();
        $('#car_status').val(8);
    }
    if(this.value == 1){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Approve Document',
            showConfirmButton: false,
            timer: 1000
        })
        $('#car_status_8').hide();
        $('#car_status_9').show();
        $('#car_status').val(9);
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
                window.location = "<?php echo base_url().'/Car/carDepositRecord'; ?>";
            });
        }
    })
})


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