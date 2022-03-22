
<html>
<head>
<style>
#modalAddCarModel .row {
  text-indent: 10px;
  padding-bottom: 10px;
}
#modalAddCarModel .row label {
    margin-top: 0.5rem
}

#modalEditCarModel .row {
  text-indent: 10px;
  padding-bottom: 10px;
}
#modalEditCarModel .row label {
    margin-top: 0.5rem
}

</style>
</head>
</html>

<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ข้อมูลรุ่นรถยนต์</a>
            <button style="margin-left: 70%;" type="button" class="btn btn-success d-none d-lg-block m-l-12 " data-toggle="modal" data-toggle="modal" data-target="#modalAddCarModel" id="addCarModel" data-whatever="@mdo">เพิ่มรุ่นรถยนต์ (+)</button> &ensp;
        </div>
    </div>
    <div class="card-body">
        <div id="carModelTable"></div>
    </div>
</div>
<!-- End Table -->

<!-- Open Modal modalAddCarModel -->
<div class="modal fade" id="modalAddCarModel" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">เพิ่มรุ่นรถยนต์ (+)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addCarModelForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <label >ยี่ห้อรถยนต์ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <select style="width: 250px;" id="car_brand_id" class="form-control form-control-line" name="inputData[]" required>
                            <option disabled selected value="">เลือกยี่ห้อรถยนต์</option>
                            <?php
                            if (isset($select)) {
                                foreach ($select as $key => $val) {
                                    echo "<option value=" . $val->car_brand_id . ">" . $val->car_brand_name_en . "</option>";
                                }
                            }
                            echo "<option value= '0' >" . "ไม่มีในตัวเลือก" . "</option>";
                            ?>
                        </select>
                    </div>

                    <div id="addAddBrand" hidden>
                        <div class="row">
                            <div class="col-3">
                                <label >ยี่ห้อรถยนต์(ภาษาไทย) <a style="color: red;"> *</a></label>
                            </div>  : &ensp;
                            <input style="width: 250px;" type="text" class="form-control" name="inputData[]" id="car_brand_name_th" autocomplete="off" placeholder="ยี่ห้อรถยนต์ภาษาไทย" required>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label >ยี่ห้อรถยนต์(ภาษาอังกฤษ) <a style="color: red;"> *</a></label>
                            </div>  : &ensp;
                            <input style="width: 250px;" type="text" class="form-control" name="inputData[]" id="car_brand_name_en" autocomplete="off" placeholder="ยี่ห้อรถยนต์ภาษาอังกฤษ" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <label >ชื่อรุ่นรถยนต์ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="inputData[]" id="car_model_name" autocomplete="off" placeholder="รุ่นรถยนต์" required>
                    </div>

                    <div class="field_wrapper">
                        <div class="row">
                            <div class="col-3">
                                <label >คุณสมบัติรถยนต์ <a style="color: red;"> *</a></label>
                            </div>  : &ensp;
                            <div class="form-inline">
                                <input style="width: 250px;" type="text" class="form-control" name="feature[]" id="car_model_feature" autocomplete="off" placeholder="คุณสมบัติรถยนต์" required> &ensp;               
                                <button type="button" class="add_button btn waves-effect waves-light btn-success" title="Add field">+</button>                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <label >คำอธิบายรถยนต์ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <textarea style="width: 400px; height: 100px" class="form-control" rows="3" name="inputData[]" id="car_model_description" autocomplete="off" placeholder="คำอธิบายรถยนต์" required></textarea>
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
<!-- End Modal modalAddCarModel -->

<!-- Start modalEditCarModel -->
<div class="modal fade" id="modalEditCarModel" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">แก้ไขข้อมูลรุ่นรถยนต์</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editCarModelForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <label >ยี่ห้อรถยนต์ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <select style="width: 250px;" id="car_brand_id" class="form-control form-control-line" name="editData[]" required>
                            <option disabled selected value="">เลือกยี่ห้อรถยนต์</option>
                            <?php
                            if (isset($select)) {
                                foreach ($select as $key => $val) {
                                    echo "<option value=" . $val->car_brand_id . ">" . $val->car_brand_name_en . "</option>";
                                }
                            }
                            echo "<option value= '0' >" . "ไม่มีในตัวเลือก" . "</option>";
                            ?>
                        </select>
                    </div>

                    <div id="editAddBrand" hidden>
                        <div class="row">
                            <div class="col-3">
                                <label >ยี่ห้อรถยนต์(ภาษาไทย) <a style="color: red;"> *</a></label>
                            </div>  : &ensp;
                            <input style="width: 250px;" type="text" class="form-control" name="editData[]" id="car_brand_name_th" autocomplete="off" placeholder="ยี่ห้อรถยนต์ภาษาไทย" required>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label >ยี่ห้อรถยนต์(ภาษาอังกฤษ) <a style="color: red;"> *</a></label>
                            </div>  : &ensp;
                            <input style="width: 250px;" type="text" class="form-control" name="editData[]" id="car_brand_name_en" autocomplete="off" placeholder="ยี่ห้อรถยนต์ภาษาอังกฤษ" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <label >ชื่อรุ่นรถยนต์ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="editData[]" id="car_model_name" autocomplete="off" placeholder="รุ่นรถยนต์" required>
                    </div>

                    <div class="field_wrapper">
                        <div class="row">
                            <div class="col-3">
                                <label >คุณสมบัติรถยนต์ <a style="color: red;"> *</a></label>
                            </div>  : &ensp;
                            <div class="form-inline">
                                <input style="width: 250px;" type="text" class="form-control" name="feature[]" id="car_model_feature" autocomplete="off" placeholder="คุณสมบัติรถยนต์" > &ensp;               
                                <button type="button" class="add_button btn waves-effect waves-light btn-success" title="Add field">+</button>                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <label >คำอธิบายรถยนต์ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <textarea style="width: 400px; height: 100px" class="form-control" rows="3" name="editData[]" id="car_model_description" autocomplete="off" placeholder="คำอธิบายรถยนต์" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="editData[]" id="car_model_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn waves-effect waves-light btn-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End modalEditCarModel -->

<script>
    getList();

    $('#addCarModelForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser

        var formData = {};
        var featureData = {};
        var i = 0;
        $("[name^='inputData']").each(function() {
            formData[this.id] = this.value;
        });
        $(this).find("[name^='feature']").each(function() {
            featureData[i++] = this.value;
        });

        $.ajax({  
            url:"addCarModel",
            method:"POST",  
            data:{
                formData: formData,
                featureData:featureData
            }
        }).done(function(returnData) {
            getList();
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Add Car Madel Complete',
                    showConfirmButton: false,
                    timer: 1500
                    })
            $('#modalAddCarModel form')[0].reset();
            $('#modalAddCarModel').modal('hide'); //ปิด modal
            removeField();
        });
    })

    $('#editCarModelForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
       
        var formData = {};
        var featureData = {};
        var i = 0;
        $("[name^='editData']").each(function() {
            formData[this.id] = this.value;
        });

        $(this).find("[name^='feature']").each(function() {
            featureData[i++] = this.value;
        });


        $.ajax({  
            url:"editCarModel",
            method:"POST",  
            data:{
                formData: formData,
                featureData:featureData
            }
        }).done(function(returnData) {
            getList();
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Edit Data Car Model Complete',
                    showConfirmButton: false,
                    timer: 1500
                    })
            $('#modalEditCarModel form')[0].reset();
            $('#modalEditCarModel').modal('hide'); //ปิด modal
            removeField();
        });
    })

    $('#car_brand_id[name="inputData[]"]').on('change', function(event) {
        if(this.value != 0){
            $('#addAddBrand').attr('hidden',true);
        }else{
            $('#addAddBrand').attr('hidden',false);
        }
    })
    $('#car_brand_id[name="editData[]"]').on('change', function(event) {
        if(this.value != 0){
            $('#editAddBrand').attr('hidden',true);
        }else{
            $('#editAddBrand').attr('hidden',false);
        }
    })

    var maxField = 6; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper');
    var fieldHTML = '<div class="row"><div class="col-3"></div>&ensp;&ensp;<div class="form-inline"><input style="width: 250px;" type="text" class="form-control" name="feature[]" id="car_model_feature" autocomplete="off" placeholder="คุณสมบัติรถยนต์"/> &ensp;<button type="button" class="remove_button btn waves-effect waves-light btn-danger" title="Remove field">-</button></div></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        // console.log(x)
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    function removeField() {
        $('.remove_button').each(function() {
            $(this).parent('div').parent('div').remove(); //Remove field html
        });
        x = 1;
    }

    function getList() {
        $.ajax({
            method: "POST",
            url: "getCarModelTable",
        }).done(function(returnedData) {
            $('#carModelTable').html(returnedData.html);
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