<!-- 
  * tableReportDetail
  * show detail report
  * @input -           					   
  * @output detail report                              
  * @author Nitikron Piew-on					    
  * @Create Date 03-03-2564
  -->

<?php
if (!empty($table)) {
    $i = 1; //กำหนดลำดับ 
    $sumIncomes = 0;
    $sumExpends = 0;
    $balance = 0;
    // Start loop sum data from database
    foreach ($table as $key => $val) {
        $sumIncomes += $val->incomes;
        $sumExpends += $val->expends;
    }
    // End loop
    $balance = $sumIncomes + $sumExpends;
} ?>


<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
    var sumIncomes = <?php echo json_encode($sumIncomes) ?>;
    var sumExpends = <?php echo json_encode($sumExpends) ?>;
    var balance = <?php echo json_encode($balance) ?>;

    console.log((commaSeparateNumber(sumIncomes)))
    $('#sumIncomes').val((commaSeparateNumber(sumIncomes.toFixed(2))));
    $('#sumExpends').val((commaSeparateNumber(Math.abs(sumExpends).toFixed(2))));
    $('#balance').val((commaSeparateNumber(balance.toFixed(2))));
</script>