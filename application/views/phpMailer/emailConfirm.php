<style>
#confirm_img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        max-width: auto;
        max-height: 400px;
    }
</style>
<?php 
    if($select){
        $val = TRUE;
    }else{
        $val = FALSE;
    }
?>
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ยืนยันการทำธุรกรรม</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row" style="user-select: auto;">
            <div class="col-xs-12 col-md-12 col-sm-12" style="user-select: auto;">
                <div class="text-center">
                    <?php if($val){ ?>
                        <br>
                        <h2 class="text-success" style="user-select: auto; display: display"><b>ยืนยันการทำธุรกรรม</b></h2>
                        <br>
                        <img id="confirm_img" src="<?= base_url() ?>assets/img/undraw_confirmation_re_b6q5.svg" />
                    <?php }else{ ?>
                        <br>
                        <h2 class="text-danger" style="user-select: auto; display: display"><b>ธุรกรรมเกิดความผิดพลาด</b></h2>
                        <br>
                        <img id="confirm_img" src="<?= base_url() ?>assets/img/undraw_cancel_re_ctke.svg" />
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>