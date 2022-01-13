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
        <button class="tablinks active" onclick="openCity(event, 'setDate')">กำหนดวันเวลา</button>
        <button class="tablinks" onclick="openCity(event, 'uploadDoc')">อัปโหลดเอกสาร</button>
        <button class="tablinks" onclick="openCity(event, 'confirmPay')">ยืนยันการชำระเงิน</button>
        <button class="tablinks" onclick="openCity(event, 'uploadPay')">อัปโหลดหลักฐานการโอนเงิน</button>
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
                        <div class="row">
                            <h5 style="user-select: auto;"><?php echo $val->car_model_description; ?> </h5>
                        </div>
                        <div class="row">
                            <h4 class="text-blue" style="user-select: auto;">ราคา <b><?php echo number_format($val->car_price); ?></b> บาท/วัน</h4>
                        </div>

                        <?php
                        foreach (json_decode($val->car_model_feature) as $key2 => $val2) {
                            if($key2 == 0){?>    <br>    <?php  }  ?>
                            <div class="row">
                                <i class="fas fa-check-circle" style='font-size:20px; color:#39e600;'></i>
                                <h5 style="user-select: auto;"> &ensp;<?php echo $val2; ?> </h5>
                            </div>
                        <?php
                        }
                        ?>
                        <br>

                        <div class="row">
                            <a href="<?= base_url() ?>Car/carDetail?type=rent&carId=<?php echo $val->car_id; ?>">
                                <button type="button" class="btn btn-success d-none d-lg-block m-l-12">ตรวจสอบการจอง</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="uploadDoc" class="tabcontent">
            <h3>Paris</h3>
            <p>Paris is the capital of France.</p> 
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

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>