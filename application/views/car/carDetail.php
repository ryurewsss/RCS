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
/* .carImg{
    height: 220px;
} */
.text-blue{
    color:blue;
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

    <div class="col-xs-12 col-md-12 showCarTable" style="user-select: auto;">
        <div class="row flex-row" style="user-select: auto;">
            <div class="col-xs-12 col-sm-5 carBlock" style="user-select: auto;">
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
                    <h2 class="text-blue" style="user-select: auto;"><b><?php echo $val->car_brand_name_en.' '.$val->car_model_name; ?></b></h2>
                </div>
                <div class="row">
                    <h5 style="user-select: auto;"><?php echo $val->car_model_description; ?> </h5>
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
                        <button type="button" class="btn btn-success d-none d-lg-block m-l-12">จองเลย</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>