<?php require_once $_SERVER['DOCUMENT_ROOT'].'/CRS/application/views/transaction/transactionStatus.php'; ?>
<div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped mytb">
        <thead>
            <tr class="text-center">
                <th>ลำดับ</th>
                <th>ทะเบียน</th>
                <th>ยี่ห้อ</th>
                <th>ราคา</th>
                <th>สถานะ</th>
                <th>ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start loop show db to table -->
            <?php
            if (isset($table) && $table) {
                // var_dump($table);
                $i = 1 //กำหนดลำดับ 
            ?>
                <?php foreach ($table as $key => $val) { ?>
                    <tr class="text-center">
                        <td><?php echo $i++; ?></td>
                        <td class="text-left"><?= $val->car_registration ?></td>
                        <td class="text-left"><?= $val->car_brand_name_en ?></td>
                        <td class="text-center"><?= $val->car_price ?></td>
                        <td class="text-center <?= $tranStatusColor[$val->car_status] ?>"><?= $tranStatus[$val->car_status] ?></td>
                        <td>
                            <a href="<?= base_url() ?>Car/carDetail2?carId=<?php echo $val->car_id; ?>&tranId=<?php echo $val->transaction_id; ?>">
                            <button type="button" class="btn waves-effect waves-light btn-info btn-sm" ><i class="fas fa-search"></i></button>
                            </a>
                            <?php if($val->car_status == 9){?> 
                                <button type="button" class="btn waves-effect waves-light btn-warning btn-sm receive_check"  value="<?= $val->transaction_id ?>" ><i class="fas fa-user-check"></i></button>
                            <?php } ?>
                            <?php if($val->car_status == 10){?> 
                                <button type="button" class="btn waves-effect waves-light btn-success btn-sm return_check"  value="<?= $val->transaction_id ?>" ><i class="fas fa-calendar-check"></i></button>
                            <?php } ?>                       
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>

            <!-- End loop -->
        </tbody>
    </table>
</div>

<script>
    $('.receive_check').click(function(e) {
        Swal.fire({
        title: 'Are you sure?',
        text: "You Confirm the Receive",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#dc3545',
        confirmButtonColor: '#28a745',
        confirmButtonText: 'Yes, Confirm it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var formData = {};
            formData['transaction_id'] = this.value;
            formData['car_status'] = 10;
            $.ajax({  
                url:"changeCarStatus",
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
                getList();
            });
        }
        })
    })

    $('.return_check').click(function(e) {
        Swal.fire({
        title: 'Are you sure?',
        text: "You Confirm the Return",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#dc3545',
        confirmButtonColor: '#28a745',
        confirmButtonText: 'Yes, Confirm it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var formData = {};
            formData['transaction_id'] = this.value;
            formData['car_status'] = 11;
            $.ajax({  
                url:"changeCarStatus",
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
                getList();
            });
        }
        })
    })
</script>