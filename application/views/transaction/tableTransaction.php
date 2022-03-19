<?php include 'transactionStatus.php';?>
<div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped mytb">
        <thead>
            <tr class="text-center">
                <th>ลำดับ</th>
                <th>รหัสการเช่า</th>
                <th>ทะเบียน</th>
                <th>สถานที่</th>
                <th>วันที่รับ(ว/ด/ป) <br>(เวลา)</th>
                <th>วันที่คืน(ว/ด/ป) <br>(เวลา)</th>
                <th>สถานะ</th>
                <th>ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start loop show db to table -->
            <?php
            // var_dump($test);
            // var_dump($table);
            if (isset($table) && $table) {
                $i = 1; //กำหนดลำดับ 
                $date_now = new DateTime();
                //1 2 3 6
                //4
            ?>
                <?php foreach ($table as $key => $val) { 
                        $date2    = new DateTime($val->transaction_receive_date);
                        $date3    = new DateTime($val->transaction_return_date);
                    
                    ?>

                    <tr class="text-center">
                        <td><?php echo $i++; ?></td>
                        <td class="text-left"><?= $val->transaction_id ?></td>
                        <td class="text-left"><?= $val->car_registration ?></td>
                        <td class="text-left"><?= $val->place_name ?></td>

                        <?php if(($val->transaction_status == 1 || $val->transaction_status == 2 || $val->transaction_status == 3 || $val->transaction_status == 6) && $date_now > $date2){?>
                            <td class="text-center text-danger"><?= date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_receive_date,0,10)))) ?> <br> <?= substr($val->transaction_receive_date,11,5)." น." ?></td>
                        <?php }else{ ?>
                            <td class="text-center"><?= date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_receive_date,0,10)))) ?> <br> <?= substr($val->transaction_receive_date,11,5)." น." ?></td>
                        <?php } ?>

                        <?php if($val->transaction_status == 4 && $date_now > $date3){?>
                            <td class="text-center text-danger"><?= date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_return_date,0,10)))) ?> <br> <?= substr($val->transaction_return_date,11,5)." น." ?></td>
                        <?php }else{ ?>
                            <td class="text-center"><?= date("d/m/Y", strtotime(str_replace('-', '/', substr($val->transaction_return_date,0,10)))) ?> <br> <?= substr($val->transaction_return_date,11,5)." น." ?></td>
                        <?php } ?>

                        <td class="text-center <?= $tranStatusColor[$val->transaction_status] ?>"><?= $tranStatus[$val->transaction_status] ?></td>
                        <td>
                            <a href="<?= base_url() ?>Transaction/transactionDetail?tranId=<?php echo $val->transaction_id; ?>">
                                <button type="button" class="btn waves-effect waves-light btn-info btn-sm" id="<?= $val->transaction_id ?>" ><i class="fas fa-search"></i></button>
                            </a>
                            <?php if($val->transaction_status == 3){?> 
                                <button type="button" id="receive_check" class="btn waves-effect waves-light btn-warning btn-sm" data-type="<?= $val->user_type_id ?>" value="<?= $val->transaction_id ?>" ><i class="fas fa-user-check"></i></button>
                            <?php } ?>
                            <?php if($val->transaction_status == 4){?> 
                                <button type="button" id="return_check" class="btn waves-effect waves-light btn-success btn-sm" data-type="<?= $val->user_type_id ?>" value="<?= $val->transaction_id ?>" ><i class="fas fa-calendar-check"></i></button>
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
    $('#receive_check').click(function(e) {
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
            formData['user_type_id'] = this.getAttribute("data-type");
            formData['transaction_status'] = 4;
            $.ajax({  
                url:"changeTransactionStatus",
                method:"POST",  
                data:formData
            }).done(function(returnData) {
                for(var i=1; formData['user_type_id']==3 ? i<4:i<3; i++){//ยังไม่รวมฝากเช่า
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
                getList();
            });
        }
        })
    })

    $('#return_check').click(function(e) {
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
            formData['transaction_status'] = 5;
            formData['user_type_id'] = this.getAttribute("data-type");
            $.ajax({  
                url:"changeTransactionStatus",
                method:"POST",  
                data:formData
            }).done(function(returnData) {
                for(var i=1; formData['user_type_id']==3 ? i<4:i<3; i++){//ยังไม่รวมฝากเช่า
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
                getList();
            });
        }
        })
    })
</script>