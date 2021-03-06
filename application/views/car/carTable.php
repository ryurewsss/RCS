
<html>
<head>
<style>
#modalAddcar .row {
  /* text-indent: 10%; */
  text-indent: 10px;
  padding-bottom: 10px;
}
#modalAddcar .row label {
    margin-top: 0.5rem
}

#modalEditCar .row {
  /* text-indent: 10%; */
  text-indent: 10px;
  padding-bottom: 10px;
}
#modalEditCar .row label {
    margin-top: 0.5rem
}
.car_image{
    width: 50%;
    max-width: 500px;
    max-height: 500px;
    height: auto;
}

</style>
</head>
</html>

<!-- Open Table -->
<div class="card">
    <div class="card-header bg-dark">
        <div class="row">
            <a class="m-b-0 text-white" style="font-size: 23px; margin-left: 10px;">ข้อมูลรถเช่า</a>
            <button style="margin-left: 77%;" type="button" class="btn btn-success d-none d-lg-block m-l-12 " data-toggle="modal" data-toggle="modal" data-target="#modalAddcar" id="Addcar" data-whatever="@mdo">เพิ่มรถเช่า (+)</button> &ensp;
        </div>
    </div>
    <div class="card-body">
        <div id="carTable"></div>
    </div>
</div>
<!-- End Table -->

<!-- Open Modal Addcar -->
<div class="modal fade" id="modalAddcar" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">เพิ่มรถเช่า (+)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addCarForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <label >เลขทะเบียน <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="car_registration" id="car_registration" autocomplete="off" placeholder="เลขทะเบียนรถยนต์" required>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <label>ยี่ห้อรถยนต์ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <select style="width: 250px;" id="car_brand_id" class="form-control form-control-line" name="car_brand_id" required>
                            <option disabled selected value="">เลือกยี่ห้อรถยนต์</option>
                            <?php
                            if (isset($select)) {
                                foreach ($select as $key => $val) {
                                    echo "<option value=" . $val->car_brand_id . ">" . $val->car_brand_name_en . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <label >รุ่นรถยนต์ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <select style="width: 250px;" id="car_model_id" class="form-control form-control-line" name="car_model_id" required>
                            <option disabled selected value="">เลือกรุ่นรถยนต์</option>
                        </select>
                    </div>

                    <div class="field_wrapper">
                        <div class="row">
                            <div class="col-3">
                                <label >คุณสมบัติรถยนต์ <a style="color: red;"> *</a></label>
                            </div>  : &ensp;
                            <div class="form-inline">
                                <input style="width: 250px;" type="text" class="form-control" name="feature[]" id="car_model_feature" autocomplete="off" placeholder="คุณสมบัติรถยนต์" disabled> &ensp;               
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <label >คำอธิบาย <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <textarea style="width: 400px; height: 100px" class="form-control" rows="3" name="car_description" id="car_description" autocomplete="off" placeholder="คำอธิบายรถยนต์" disabled></textarea>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label >ราคาต่อวัน <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="number" min="0" step="0" oninput="validity.valid||(value='');" class="form-control" name="car_price" id="car_price" autocomplete="off" placeholder="0" required>
                        <label style="margin-left: 11px;"> บาท </label>
                        <label style="margin-left: 20px;" id="incomeError" class="text-danger"></label>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label >รูปรถยนต์ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="file" class="form-control" name="car_upload" id="car_upload" onchange="readURL(this,'add'); src='' " required>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <img class="car_image" id="car_image" src="#" alt="your image" hidden/>
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
<!-- End Modal Addcar -->

<!-- Start EditCar -->
<div class="modal fade" id="modalEditCar" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">แก้ไขข้อมูลรถเช่า</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editCarForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <label >เลขทะเบียน <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="text" class="form-control" name="car_registration" id="e_car_registration" autocomplete="off" placeholder="เลขทะเบียนรถยนต์" required>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <label>ยี่ห้อรถยนต์ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <select style="width: 250px;" id="e_car_brand_id" class="form-control form-control-line" name="car_brand_id" required>
                            <option disabled selected value="">เลือกยี่ห้อรถยนต์</option>
                            <?php
                            if (isset($select)) {
                                foreach ($select as $key => $val) {
                                    echo "<option value=" . $val->car_brand_id . ">" . $val->car_brand_name_en . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <label >รุ่นรถยนต์<a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <select style="width: 250px;" id="e_car_model_id" class="form-control form-control-line" name="car_model_id" required>
                            <option disabled selected value="">เลือกรุ่นรถยนต์</option>
                        </select>
                    </div>

                    <div class="field_wrapper">
                        <div class="row">
                            <div class="col-3">
                                <label >คุณสมบัติรถยนต์ <a style="color: red;"> *</a></label>
                            </div>  : &ensp;
                            <div class="form-inline">
                                <input style="width: 250px;" type="text" class="form-control" name="feature[]" id="car_model_feature" autocomplete="off" placeholder="คุณสมบัติรถยนต์" disabled> &ensp;               
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <label >คำอธิบาย <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <textarea style="width: 400px; height: 100px" class="form-control" rows="3" name="car_description" id="e_car_description" autocomplete="off" placeholder="คำอธิบายรถยนต์" disabled></textarea>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label >ราคาต่อวัน <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="number" min="0" step="0" oninput="validity.valid||(value='');" class="form-control" name="car_price" id="e_car_price" autocomplete="off" placeholder="0" required>
                        <label style="margin-left: 11px;"> บาท </label>
                        <label style="margin-left: 20px;" id="incomeError" class="text-danger"></label>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label >รูปรถยนต์ <a style="color: red;"> *</a></label>
                        </div>  : &ensp;
                        <input style="width: 250px;" type="file" class="form-control" name="car_upload" id="e_car_upload" onchange="readURL(this,'edit');">
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <img class="car_image" id="e_car_image" src="#" alt="your image" hidden/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="car_id" id="e_car_id">
                    <input type="hidden" name="old_image" id="e_old_image">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn waves-effect waves-light btn-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End EditData -->
<script>
    getList();

    var wrapper = $('.field_wrapper');
    var fieldHTML = '<div class="row"><div class="col-3"></div>&ensp;&ensp;<div class="form-inline"><input style="width: 250px;" type="text" class="form-control" name="feature[]" id="car_model_feature" autocomplete="off" placeholder="คุณสมบัติรถยนต์"/> &ensp;<button type="button" class="remove_button btn waves-effect waves-light btn-danger" title="Remove field">-</button></div></div>'; //New input field html 

    $('#car_model_id').on('change', function(event) {
        var formData = {};
        formData['id'] = this.value;
        $.ajax({  
            url:"getCarSelectModel",
            method:"POST",
            data:formData
        }).done(function(returnData) {
            // console.log(returnData)
            // console.log(returnData.table[0].car_model_description)
            removeField()
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = ''; //New input field html
            $.each(JSON.parse(returnData.table[0].car_model_feature), function( index, value ) {
                if(index == 0){
                    $('#modalAddcar').find('#car_model_feature[name="feature[]"]').val(value);
                }else{
                    fieldHTML = '<div class="row"><div class="col-3"></div>&ensp;&ensp;<div class="form-inline"><input style="width: 250px;" type="text" class="form-control" name="feature[]" id="car_model_feature" autocomplete="off" placeholder="คุณสมบัติรถยนต์" value="'+value+'" disabled/><button type="button" class="remove_button btn waves-effect waves-light btn-danger" title="Remove field" hidden>-</button></div></div>';
                    $('#modalAddcar').find(wrapper).append(fieldHTML);
                }
            });

            $('#car_description').val(returnData.table[0].car_model_description)
        });

    })//get data when select model

    $('#e_car_model_id').on('change', function(event) {
        var formData = {};
        formData['id'] = this.value;
        $.ajax({  
            url:"getCarSelectModel",
            method:"POST",
            data:formData
        }).done(function(returnData) {
            // console.log(returnData)
            // console.log(returnData.table[0].car_model_description)
            removeField()
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = ''; //New input field html
            $.each(JSON.parse(returnData.table[0].car_model_feature), function( index, value ) {
                if(index == 0){
                    $('#modalEditCar').find('#car_model_feature[name="feature[]"]').val(value);
                }else{
                    fieldHTML = '<div class="row"><div class="col-3"></div>&ensp;&ensp;<div class="form-inline"><input style="width: 250px;" type="text" class="form-control" name="feature[]" id="car_model_feature" autocomplete="off" placeholder="คุณสมบัติรถยนต์" value="'+value+'" disabled/><button type="button" class="remove_button btn waves-effect waves-light btn-danger" title="Remove field" hidden>-</button></div></div>';
                    $('#modalEditCar').find(wrapper).append(fieldHTML);
                }
            });

            $('#e_car_description').val(returnData.table[0].car_model_description)
        });

    })//get data when select model

    $('#addCarForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser

        //เหลือดัก

        $.ajax({  
            url:"addCar",
            method:"POST",  
            data:new FormData(this),  
            contentType: false,  
            cache: false,  
            processData:false,  
        }).done(function(returnData) {
            getList();
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Add Car Complete',
                    showConfirmButton: false,
                    timer: 1500
                    })
            $('#modalAddcar form')[0].reset();
            $('#modalAddcar').modal('hide'); //ปิด modal
            $('#car_image').attr('src', '');
            $('#car_image').attr('hidden',true);
        }); 

    })

    $('#editCarForm').on('submit', function(event) {
        event.preventDefault(); //ใช้หยุดการเกิดเหตุการณ์ที่เป็นของ browser
       
        //เหลือดัก
        if(document.getElementById("e_car_upload").files.length == 0 ){
            $.ajax({  
                url:"editCarNoFile",
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
            }).done(function(returnData) {
                getList();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Edit Data Car Complete',
                    showConfirmButton: false,
                    timer: 1500
                    })
                // $('#modalEditCar form')[0].reset();
                $('#modalEditCar').modal('hide'); //ปิด modal
                $('#e_car_image').attr('src', '');
                $('#e_car_image').attr('hidden',true);
            });
            //submit without file
        }else{
            $.ajax({  
                url:"editCar",
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
            }).done(function(returnData) {
                getList();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Edit Data Car Complete',
                    showConfirmButton: false,
                    timer: 1500
                    })
                // $('#modalEditCar form')[0].reset();
                $('#modalEditCar').modal('hide'); //ปิด modal
                $('#e_car_image').attr('src', '');
                $('#e_car_image').attr('hidden',true);
            });
        }//submit with file
    })

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
            $("#car_model_id").append('<option disabled selected>เลือกรุ่นรถยนต์</option>');
            for(var i = 0; i < returnedData.car_model.length; i++) {
                $("#car_model_id").append('<option value=' + returnedData.car_model[i].car_model_id + '>' + returnedData.car_model[i].car_model_name + '</option>');
            }
        });
    } //show auto

    function removeField() {
        $('.remove_button').each(function() {
            $(this).parent('div').parent('div').remove(); //Remove field html
        });
    }

    function getList() {
        var data = {};
        data['type'] = 'manage';
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

    function readURL(input,modal) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if(modal == 'add'){
                    $('#car_image').attr('src', e.target.result);
                    $('#car_image').attr('hidden',false);
                }else if(modal == 'edit'){
                    $('#e_car_image').attr('src', e.target.result);
                    $('#e_car_image').attr('hidden',false);
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }//show image when choose
</script>