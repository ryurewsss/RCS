<style>
.showCarTable img{
    max-width: 200px;
    max-height: 200px;

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
.carImg{
    height: 220px;
}

</style>
<div class="col-xs-12 col-md-12 showCarTable" style="user-select: auto;">

    <?php
    if (isset($table) && $table) {
        $i = 0 //กำหนดลำดับ 
    ?>
    <?php
    foreach ($table as $key => $val) { 
        if($i == 0 || ($i % 3) == 0 ){
    ?>
        <div class="row flex-row" style="user-select: auto;">
    <?php 
        }//end if 
    ?>

        <div class="col-xs-12 col-sm-4 carBlock" style="user-select: auto;">
            <div class="carImg row">
                <img src="<?php echo base_url('img/car_img'); ?>/<?php echo $val->car_image; ?>" alt="<?php echo $val->car_image; ?>">
            </div>
            <div class="col-xs-12 col-sm-12 row-no-padding" style="user-select: auto;">
                <h4 style="user-select: auto;">
                    <div class="float-left padding-bottom-5" style="user-select: auto;">
                        <a href="" title="<?php echo $val->car_brand_name_en.' '.$val->car_model_name; ?>" style="user-select: auto;">
                            <strong style="user-select: auto;"><?php echo $val->car_brand_name_en.' '.$val->car_model_name; ?></strong>
                        </a>
                    </div>
                    <br>
                    <div class="float-right padding-bottom-5" style="user-select: auto;">
                        <strong style="user-select: auto;"><?php echo number_format($val->car_price); ?> บาท</strong>
                    </div>
                    <br>
                    <div class="float-left padding-bottom-5" style="user-select: auto;">
                        <h6 style="user-select: auto;"><?php echo $val->car_model_description; ?> </h6>
                    </div>
                    <br>
                </h4>
            </div>
        </div>

    <?php 
        if(($i % 3) == 2 || $i == count($table)-1){
    ?>
        </div><!-- new row  -->
    <?php 
        }//end if 
        $i++;
    ?>

    <?php }//end foreach ?>
    <?php }//end if ?>
</div>