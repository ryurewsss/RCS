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
.car_image_table{
    max-width: 100px;
    max-height: 100px;
}
</style>
<div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped mytb showCarTable">
        <thead hidden>
            <tr class="text-center">
                <th>ลำดับ</th>
                <th>รถยนต์</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start loop show db to table -->
            <?php
            if (isset($table) && $table) {
                $i = 1 //กำหนดลำดับ 
            ?>
                <?php foreach ($table as $key => $val) { ?>
                    <tr>
                        <td hidden><?php echo $i++; ?></td>
                        <td>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 carBlock" style="user-select: auto;">
                                    <div class="carImg">
                                        <img src="<?php echo base_url('img/car_img'); ?>/<?php echo $val->car_image; ?>" alt="<?php echo $val->car_image; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-9 col-sm-9 carBlock" style="user-select: auto;">
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
                    </tr>
                <?php } ?>
            <?php } ?>
            <!-- End loop -->
        </tbody>
    </table>
</div>