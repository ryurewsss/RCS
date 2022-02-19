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

    #car_main {
        display: block;
        margin-left: auto;
        margin-right: auto;
        max-width: 500px;
        max-height: auto;
    }
</style>
</head>

<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ค้นหารถเช่า</a>
        </div>
    </div>
    <!-- <button id="test"> API </button> -->
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <label>ยี่ห้อรถยนต์ <a style="color: red;"> *</a></label>
            </div>  : &ensp;
            <select style="width: 250px;" id="car_brand_id" class="form-control form-control-line" name="inputData[]">
                <option selected value="*">เลือกทั้งหมด</option>
                <?php
                if (isset($car_brand)) {
                    foreach ($car_brand as $key => $val) {
                        echo "<option value=" . $val->car_brand_id . ">" . $val->car_brand_name_en . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <label>รุ่นรถยนต์<a style="color: red;"> *</a></label>
            </div>  : &ensp;
            <select style="width: 250px;" id="car_model_id" class="form-control form-control-line" name="inputData[]">
                <option selected value="*">เลือกทั้งหมด</option>
                <?php
                if (isset($select)) {
                    foreach ($select as $key => $val) {
                        echo "<option value=" . $val->car_model_id . ">" . $val->car_model_name . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <label>ประเภท <a style="color: red;"> *</a></label>
            </div>  : &ensp;
            <select style="width: 250px;" id="car_brand_id" class="form-control form-control-line" name="inputData[]">
                <option selected value="*">เลือกทั้งหมด</option>
                <?php
                if (isset($select)) {
                    foreach ($select as $key => $val) {
                        echo "<option value=" . $val->car_brand_id . ">" . $val->car_brand_name_en . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <label>ช่วงราคา <a style="color: red;"> *</a></label>
            </div>  : &ensp;
            <select style="width: 250px;" id="car_brand_id" class="form-control form-control-line" name="inputData[]">
                <option selected value="*">เลือกทั้งหมด</option>
                <?php
                if (isset($select)) {
                    foreach ($select as $key => $val) {
                        echo "<option value=" . $val->car_brand_id . ">" . $val->car_brand_name_en . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div id="carTable"></div>
    </div>
</div>
<!-- End Table -->

<script>
    getModel();
    getList();

    $("#car_brand_id").on('change', function(event) {
        getModel()
    })

    function removeOptions(selectElement) {
        var i, L = selectElement.options.length - 1;
        for(i = L; i >= 0; i--) {
            selectElement.remove(i);
        }
    }

    function getModel() {
        var data = {};
        data['car_brand_id'] = $('#car_brand_id').val();
        $.ajax({
            method: "POST",
            url: "getModel",
            data: data,  
        }).done(function(returnedData) {

            removeOptions(document.getElementById('car_model_id'));

            $("#car_model_id").append('<option value=*>เลือกทั้งหมด</option>');
            for(var i = 0; i < returnedData.car_model.length; i++) {
                $("#car_model_id").append('<option value=' + returnedData.car_model[i].car_model_id + '>' + returnedData.car_model[i].car_model_name + '</option>');
            }
        });
    } //show auto

    function getList() {
        var data = {};
        data['type'] = 'show';
        $.ajax({
            method: "POST",
            url: "getCarTable",
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