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
                $sumIncomes = 0;
                $sumExpends = 0;
            ?>
                <?php foreach ($table as $key => $val) { ?>
                    <tr class="text-center">
                        <td hidden><?= $i ?></td>
                        <td>
                            <div hidden><?= $i++ ?></div><?= $val->Mounth ?>
                        </td>
                        <?php if ($val->incomes == '') { ?>
                            <td>-</td>
                        <?php } else {
                            $sumIncomes = $sumIncomes + $val->incomes;
                        ?>
                            <td class="text-success font-weight-bold"><?= number_format($val->incomes, 2) ?></td>
                        <?php } ?>
                        <?php if ($val->expends == '') { ?>
                            <td>-</td>
                        <?php } else {
                            $sumExpends = $sumExpends + $val->expends;
                        ?>
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
    var sumIncomes = <?php echo json_encode($sumIncomes) ?>;
    var sumExpends = <?php echo json_encode($sumExpends) ?>;
    var balance = sumIncomes + sumExpends;
    sumExpends = sumExpends * -1;

    $('#sumIncomes').html((commaSeparateNumber(sumIncomes.toFixed(2))));
    $('#sumExpends').html((commaSeparateNumber(Math.abs(sumExpends).toFixed(2))));
    $('#balance').html((commaSeparateNumber(balance.toFixed(2))));

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>