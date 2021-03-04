<!-- 
  * tableReport
  * show report by month 
  * @input -           					   
  * @output report by month                               
  * @author Somrutai Ketsada					    
  * @Create Date 01-03-2564
  -->
<div class="col-md-12">
    <table class="table table-bordered table-striped mytb">
        <thead>
            <tr class="text-center">
                <th hidden>ลำดับ</th>
                <th>เดือน</th>
                <th>รายรับ</th>
                <th>รายจ่าย</th>
                <th>คงเหลือ</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start loop show db to table -->

            <?php
            if (!empty($table)) {
                $i = 1; //กำหนดลำดับ 
                $sumAmount = 0;
                $sumPrice = 0;
                $sumCost = 0;
                $sumProfit = 0;
            ?>
                <?php foreach ($table as $key => $val) { ?>
                    <tr class="text-center">
                        <td hidden><?= $i++ ?></td>
                        <td><?= $val->Mounth ?></td>
                        <?php if ($val->incomes == '') { ?>
                            <td>-</td>
                        <?php } else { ?>
                            <td class="text-success font-weight-bold"><?= number_format($val->incomes, 2) ?></td>
                        <?php } ?>
                        <?php if ($val->expends == '') { ?>
                            <td>-</td>
                        <?php } else { ?>
                            <td class="text-danger font-weight-bold"><?= number_format($val->expends * -1, 2) ?></td>
                        <?php } ?>
                        <?php if ($val->expends + $val->incomes >= 0) { ?>
                            <td class="text-success font-weight-bold"><?= number_format($val->expends + $val->incomes, 2) ?></td>
                        <?php } else { ?>
                            <td class="text-danger font-weight-bold"><?= number_format($val->expends + $val->incomes, 2) ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            <?php } ?>
            <!-- End loop -->
        </tbody>
    </table>
</div>


<script>
</script>