<!-- <div class="row"> -->
<!-- Earnings (Monthly) Card Example -->
<!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">การสอบทักษะครั้งที่ 1.1 จะเริ่มในอีก</div>
                        <p id="demo"></p>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<style>
    h1 {
        text-align: center;
        font-size: 60px;
        margin-top: 0px;
    }

    p {
        text-align: center;
        font-size: 80px;
        margin-top: 0px;
        color: black;
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        max-width: 500px;
        max-height: auto;
    }
</style>
</head>

<body>
    <h2 style="text-align: center">ระบบเช่ารถยนต์โดยใช้เทคโนโลยีบล็อกเชน</h2>
    <!-- <img src="<?= base_url() ?>assets/img/stocks.png" /> -->
    <img src="<?= base_url() ?>assets/img/order_a_car.svg" />
    <div id="carTable"></div>

<script>
    getList();

    function getList() {
        var data = {};
        data['type'] = 'show';
        $.ajax({
            method: "POST",
            url: "car/getCarTable",
            data: data,  
        }).done(function(returnedData) {
            $('#carTable').html(returnedData.html);
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
</script>