
<html>
<head>
<style>
#modalAddPlace .row {
  text-indent: 10px;
  padding-bottom: 10px;
}
#modalAddPlace .row label {
    margin-top: 0.5rem
}

#modalEditPlace .row {
  text-indent: 10px;
  padding-bottom: 10px;
}
#modalEditPlace .row label {
    margin-top: 0.5rem
}

</style>
</head>
</html>

<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ข้อมูลสถานที่</a>
            <button style="margin-left: 70%;" type="button" class="btn btn-success d-none d-lg-block m-l-12 " data-toggle="modal" data-toggle="modal" data-target="#modalAddPlace" id="addPlace" data-whatever="@mdo">เพิ่มสถานที่ (+)</button> &ensp;
        </div>
    </div>
    <div class="card-body">
        <div id="placeTable"></div>
    </div>
</div>
<!-- End Table -->

<!-- Open Modal modalAddPlace -->
<div class="modal fade" id="modalAddPlace" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">เพิ่มสถานที่ (+)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addPlaceForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label >ชื่อสถานที่ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="inputData[]" id="place_name" autocomplete="off" placeholder="ชื่อสถานที่" required>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label >ตำแหน่งสถานที่ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <textarea style="width: 400px; height: 100px" class="form-control" rows="3" name="inputData[]" id="place_address" autocomplete="off" placeholder="ตำแหน่งสถานที่" required></textarea>
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
<!-- End Modal modalAddPlace -->

<!-- Start modalEditPlace -->
<div class="modal fade" id="modalEditPlace" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">แก้ไขข้อมูลสถานที่</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editPlaceForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label >ชื่อสถานที่ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="editData[]" id="place_name" autocomplete="off" placeholder="ชื่อสถานที่" required>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label >ตำแหน่งสถานที่ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <textarea style="width: 400px; height: 100px" class="form-control" rows="3" name="editData[]" id="place_address" autocomplete="off" placeholder="ตำแหน่งสถานที่" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="editData[]" id="place_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn waves-effect waves-light btn-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End modalEditPlace -->

<script>
    getList();

    $('#addPlaceForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser

        var formData = {};
        $("[name^='inputData']").each(function() {
            formData[this.id] = this.value;
        });

        $.ajax({  
            url:"addPlace",
            method:"POST",  
            data:formData
        }).done(function(returnData) {
            getList();
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Add Place Complete',
                    showConfirmButton: false,
                    timer: 1500
                    })
            $('#modalAddPlace form')[0].reset();
            $('#modalAddPlace').modal('hide'); //ปิด modal
        });
    })

    $('#editPlaceForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
       
        var formData = {};
        $("[name^='editData']").each(function() {
            formData[this.id] = this.value;
        });

        $.ajax({  
            url:"editPlace",
            method:"POST",  
            data:formData
        }).done(function(returnData) {
            getList();
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Edit Place Complete',
                    showConfirmButton: false,
                    timer: 1500
                    })
            $('#modalEditPlace form')[0].reset();
            $('#modalEditPlace').modal('hide'); //ปิด modal
        });
    })

    function getList() {
        $.ajax({
            method: "POST",
            url: "getPlaceTable",
        }).done(function(returnedData) {
            $('#placeTable').html(returnedData.html);
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