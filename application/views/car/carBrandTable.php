
<html>
<head>
<style>
#modalAddCarBrand .row {
  text-indent: 10px;
  padding-bottom: 10px;
}
#modalAddCarBrand .row label {
    margin-top: 0.5rem
}

#modalEditCarBrand .row {
  text-indent: 10px;
  padding-bottom: 10px;
}
#modalEditCarBrand .row label {
    margin-top: 0.5rem
}

</style>
</head>
</html>

<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ข้อมูลยี่ห้อรถยนต์</a>
            <button style="margin-left: 70%;" type="button" class="btn btn-success d-none d-lg-block m-l-12 " data-toggle="modal" data-toggle="modal" data-target="#modalAddCarBrand" id="addCarBrand" data-whatever="@mdo">เพิ่มยี่ห้อรถยนต์ (+)</button> &ensp;
        </div>
    </div>
    <div class="card-body">
        <div id="carBrandTable"></div>
    </div>
</div>
<!-- End Table -->

<!-- Open Modal modalAddCarBrand -->
<div class="modal fade" id="modalAddCarBrand" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">เพิ่มยี่ห้อรถยนต์ (+)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addCarBrandForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label >ยี่ห้อรุ่นรถยนต์(ภาษาไทย) <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="inputData[]" id="car_brand_name_th" autocomplete="off" placeholder="ยี่ห้อรถยนต์ภาษาไทย" required>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label >ยี่ห้อรุ่นรถยนต์(ภาษาอังกฤษ) <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="inputData[]" id="car_brand_name_en" autocomplete="off" placeholder="ยี่ห้อรถยนต์ภาษาอังกฤษ" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn waves-effect waves-light btn-success">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal modalAddCarBrand -->

<!-- Start modalEditCarBrand -->
<div class="modal fade" id="modalEditCarBrand" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">แก้ไขข้อมูลยี่ห้อรถยนต์</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editCarBrandForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label >ยี่ห้อรุ่นรถยนต์(ภาษาไทย) <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="editData[]" id="car_brand_name_th" autocomplete="off" placeholder="ยี่ห้อรถยนต์ภาษาไทย" required>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label >ยี่ห้อรุ่นรถยนต์(ภาษาอังกฤษ) <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="editData[]" id="car_brand_name_en" autocomplete="off" placeholder="ยี่ห้อรถยนต์ภาษาอังกฤษ" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="editData[]" id="car_brand_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn waves-effect waves-light btn-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End modalEditCarBrand -->

<script>
    getList();

    $('#addCarBrandForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser

        var formData = {};
        $("[name^='inputData']").each(function() {
            formData[this.id] = this.value;
        });

        $.ajax({  
            url:"addCarBrand",
            method:"POST",  
            data:formData
        }).done(function(returnData) {
            getList();
            $('#modalAddCarBrand form')[0].reset();
            $('#modalAddCarBrand').modal('hide'); //ปิด modal
        });
    })

    $('#editCarBrandForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
       
        var formData = {};
        $("[name^='editData']").each(function() {
            formData[this.id] = this.value;
        });

        $.ajax({  
            url:"editCarBrand",
            method:"POST",  
            data:formData
        }).done(function(returnData) {
            getList();
            $('#modalEditCarBrand form')[0].reset();
            $('#modalEditCarBrand').modal('hide'); //ปิด modal
        });
    })

    function getList() {
        $.ajax({
            method: "POST",
            url: "getCarBrandTable",
        }).done(function(returnedData) {
            $('#carBrandTable').html(returnedData.html);
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