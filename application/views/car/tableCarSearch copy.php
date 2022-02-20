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
    <div class="col-md-12">
        <table id="myTable" class="table mytb">
            <thead>
                <tr class="text-center">
                    <th hidden>ลำดับ</th>
                    <th>รูปรถยนต์</th>
                    <th>ทะเบียนรถยนต์</th>
                    <th>ทะเบียนรถยนต์</th>
                </tr>
            </thead>
            <tbody>
                <!-- Start loop show db to table -->
                <?php
                if (isset($table) && $table) {
                    $i = 0 //กำหนดลำดับ 
                ?>
                    <?php foreach ($table as $key => $val) { 
                        if($i == 0 || ($i % 3) == 0 ){
                    ?>
                        <tr class="text-center">

                    <?php 
                        }//end if 
                    ?>
                            <td>
                                <div class="col-xs-12 col-sm-12 carBlock" style="user-select: auto;">
                                    <div class="carImg row">
                                        <img src="<?php echo base_url('img/car_img'); ?>/<?php echo $val->car_image; ?>" alt="<?php echo $val->car_image; ?>">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 row-no-padding" style="user-select: auto;">
                                        <h4 style="user-select: auto;">
                                            <div class="float-left padding-bottom-5" style="user-select: auto;">
                                                <a href="<?= base_url() ?>Car/carDetail?type=detail&carId=<?php echo $val->car_id; ?>" title="<?php echo $val->car_brand_name_en.' '.$val->car_model_name; ?>" style="user-select: auto;">
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
                            </td>
                        <?php 
                        if(($i % 3) == 2 || $i == count($table)-1){
                        ?>
                            </tr>
                        <?php 
                            }//end if 
                            $i++;
                        ?>
                    <?php } ?>
                <?php } ?>
                <!-- End loop -->
            </tbody>
        </table>
    </div>
</div>