<!-- Open Table -->

<head>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<div class="card">
    <div class="card-header bg-dark">
        <a class="m-b-0 text-white" style="font-size: 23px;">ค้นหารายรับ - รายจ่าย</a>
    </div>
    <div class="card-body">
        <div class="row">
            <label style="font-size:13pt; text-indent: 25px; word-spacing: 10px;">วันที่ <a style="color: red;  margin-right: 37px;"> *</a> </label>: &ensp;
            <input style="width: 250px; height: 33px; font-size:12pt;" type='text' class="form-control buttonClass" placeholder="กรุณาเลือกวัน" />
        </div><br>

        <div id="searchTable"></div><br>
        <div class="row">
            <label style="font-size:15pt; margin-left: 68%; margin-right: 15px">ยอดเงินรวม </label>
            <input style="width: 200px; height: 33px; font-size:13pt; text-align:right;" type="text" class="form-control" id="sum" placeholder="0.00" disabled>
            <label style="font-size:15pt; margin-left: 5px">&ensp; บาท </label>
        </div>
    </div>
</div>

<script>
    var searchDate = '';
    getList();

    $('.buttonClass').daterangepicker({
        autoclose: true,
        locale: {
            format: 'DD/MM/YYYY'
        },
        endDate: new Date(),
        drops: "down",
        buttonClasses: "btn",
        applyClass: "btn-info",
        cancelClass: "btn-danger",

        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'This Year': [moment().startOf('year'), moment().endOf('year')],
        },
        "alwaysShowCalendars": true,
    }, function(start, end, label) {
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');

    });

    $('.buttonClass').val('');

    $('.buttonClass').change(function() {
        date = this.value.trim().split(' - ');
        firstRange = date[0].split('/');
        date[0] = firstRange[2] + "-" + firstRange[1] + "-" + firstRange[0];

        secondRange = date[1].split('/');
        date[1] = secondRange[2] + "-" + secondRange[1] + "-" + secondRange[0];
        searchDate = " and transaction_date >= '" + date[0] + "' and  transaction_date <= '" + date[1] + " 23:59:59.999'";
        console.log(searchDate)
        getList(searchDate);
    });

    function getList() {
        var data = {};
        data['tableName'] = 'ie_transaction';
        data['colName'] = '';
        data['where'] = "transaction_user_id = " + <?php echo $_SESSION['id'] ?> + searchDate;
        data['order'] = '';
        data['arrayJoinTable'] = '';
        data['groupBy'] = '';
        data['pathView'] = 'record/tableSearch';

        $.ajax({
            method: "POST",
            url: "getTable",
            data: data,
        }).done(function(returnedData) {
            $('#searchTable').html(returnedData.html);
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
    }
</script>