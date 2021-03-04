<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <a class="m-b-0 text-white" style="font-size: 17px;">รายงาน</a>
    </div>
    <div class="col-md-12"><br>
        <div class="row">
            <label style="text-indent: 27px; word-spacing: 10px;">ปี <a style="color: red; word-spacing: 1px;"> *</a> : </label>&ensp;
            <select style="width: 150px;  height: 33px; font-size:14px;" class="form-control valYear">
                <option value="" disabled>กรุณาเลือกปี</option>
                <?php
                if (isset($select_box)) {
                    $checkYear = "";
                    foreach ($select_box as $key => $val) {
                        echo "<option selected value=" . $val->year . ">" . $val->year . "</option>";
                    }
                }
                ?>
            </select>
        </div><br>
        <div id="reportTable"></div>
    </div>
</div>
<!-- End Table -->

<script>
    var where = "transaction_delete_status = 'active' AND transaction_date LIKE '" + $(".valYear").val() + "%'";
    getList(where);
    getListDetail();
    getChart();

    var where

    $(".valYear").change(function() {
        var data = $(this).val();
        console.log(data)
        if (!data) {
            where = '';
        } else {
            where = "transaction_delete_status = 'active' AND transaction_date LIKE '" + data + "%'";
        }
        getList(where);
        getChart(where)
    });

    /*
     * getList
     * get table from db to show
     * @input -
     * @output table 
     * @author Kittichai Anansinchai
     * @Update Date 01-03-2564
     */
    function getList(where = '') {
        var column = "CASE " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '01' THEN 'มกราคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '02' THEN 'กุมภาพันธ์' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '03' THEN 'มีนาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '04' THEN 'เมษายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '05' THEN 'พฤษภาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '06' THEN 'มิถุนายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '07' THEN 'กรกฎาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '08' THEN 'สิงหาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '09' THEN 'กันยายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '10' THEN 'ตุลาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '11' THEN 'พฤศจิกายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '12' THEN 'ธันวาคม' " +
            "ELSE 'ข้อมูลเดือนผิด' " +
            "END AS Mounth , COUNT(SUBSTRING(transaction_date, 6, 2)) AS AmountList, " +
            "SUM(CASE WHEN transaction_cash < 0 THEN transaction_cash END) AS expends, " +
            "SUM(CASE WHEN transaction_cash > 0 THEN transaction_cash END) AS incomes";


        if (where != '') {
            where = where + " and transaction_user_id = " + <?php echo $_SESSION['id'] ?>;
        } else {
            where = "transaction_user_id = " + <?php echo $_SESSION['id'] ?>;
        }
        console.log(where);
        var data = {};
        data['tableName'] = 'ie_transaction';
        data['colName'] = column;
        data['where'] = where;
        data['order'] = 'SUBSTRING(transaction_date, 6, 2)';
        data['arrayJoinTable'] = '';
        data['groupBy'] = 'Mounth';
        data['pathView'] = 'record/tableReport';

        $.ajax({
            method: "POST",
            url: "getTable",
            data: data,
        }).done(function(returnedData) {
            $('#reportTable').html(returnedData.html);
            $('.mytb').dataTable({
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ ข้อมูล",
                    "sSearch": "ค้นหา : ",
                    "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ ข้อมูล",
                    "oPaginate": {
                        "sPrevious": "ย้อนกลับ",
                        "sNext": "ถัดไป"
                    },
                    "sZeroRecords": "ไม่พบข้อมูลที่ต้องการ",
                    "sInfoFiltered": "(ค้นหาจากทั้งหมด _MAX_ ข้อมูล)",
                    "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 ข้อมูล"
                }
            });
            console.log(returnedData.table)
        });

    } //show auto


    /*
     * getListDetail
     * get data from db to show
     * @input -
     * @output detail 
     * @author Nitikron Piew-on
     * @Update Date 03-03-2564
     */
    function getListDetail(where = '') {
        var column = "CASE " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '01' THEN 'มกราคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '02' THEN 'กุมภาพันธ์' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '03' THEN 'มีนาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '04' THEN 'เมษายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '05' THEN 'พฤษภาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '06' THEN 'มิถุนายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '07' THEN 'กรกฎาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '08' THEN 'สิงหาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '09' THEN 'กันยายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '10' THEN 'ตุลาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '11' THEN 'พฤศจิกายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '12' THEN 'ธันวาคม' " +
            "ELSE 'ข้อมูลเดือนผิด' " +
            "END AS Mounth , COUNT(SUBSTRING(transaction_date, 6, 2)) AS AmountList, " +
            "SUM(CASE WHEN transaction_cash < 0 THEN transaction_cash END) AS expends, " +
            "SUM(CASE WHEN transaction_cash > 0 THEN transaction_cash END) AS incomes";

        var data = {};
        data['tableName'] = 'ie_transaction';
        data['colName'] = column;
        data['where'] = "transaction_delete_status = 'active'";
        data['order'] = 'SUBSTRING(transaction_date, 6, 2)';
        data['arrayJoinTable'] = '';
        data['groupBy'] = 'Mounth';
        data['pathView'] = 'record/tableReportDetail';

        $.ajax({
            method: "POST",
            url: "getTable",
            data: data,
        }).done(function(returnedData) {
            $('#reportDetail').html(returnedData.html);
            console.log(returnedData.table)
        });

    } //show auto

    function getChart(where = '') {

        var joinTable = '';
        var data = {};
        data['tableName'] = 'ie_transaction';
        // data['colName'] = "month(scs_bill_header.bhd_create_date) as month, " +
        //     " SUM(CASE WHEN scs_bill_detail.bdt_amount > 0 THEN scs_bill_detail.bdt_amount * scs_bill_detail.bdt_sale_price END) total_price";
        data['colName'] = "CASE " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '01' THEN 'มกราคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '02' THEN 'กุมภาพันธ์' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '03'  THEN 'มีนาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '04' THEN 'เมษายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '05' THEN 'พฤษภาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '06' THEN 'มิถุนายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '07' THEN 'กรกฎาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '08' THEN 'สิงหาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '09' THEN 'กันยายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '10' THEN 'ตุลาคม' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '11' THEN 'พฤศจิกายน' " +
            "WHEN SUBSTRING(transaction_date, 6, 2) = '12' THEN 'ธันวาคม' " +
            "ELSE 'ข้อมูลเดือนผิด' " +
            "END AS month, " +
            "SUM(CASE WHEN transaction_cash > 0 THEN transaction_cash END) incomes," +
            "SUM(CASE WHEN transaction_cash < 0 THEN transaction_cash END) expends,"
        data['where'] = where;
        data['order'] = 'SUBSTRING(transaction_date, 6, 2)';
        data['arrayJoinTable'] = joinTable;
        data['groupBy'] = 'month';
        data['pathView'] = 'record/charts';

        $.ajax({
            method: "POST",
            url: "getChart",
            data: data,
        }).done(function(returnedData) {
            console.log(returnedData);
            $('#recordChart').html(returnedData.html);
        });
    } //show auto table
</script>