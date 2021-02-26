<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $i = 1;
    $total = 0;
    $total = $total; //ตอนนี้เป็น string อยู่ให้เปลี่ยนเป็น int ก่อนโดยใช้ . . .
    $(document).ready(function() {
        $("#submitadd").click(function() {
            if (document.getElementById("type").value == "รายจ่าย") {
                $total = Number($total) + Number(((document.getElementById("money").value) * -1));
                $("tbody").append("<tr><td>" + $i++ + "</td><td style='color:red; text-decoration: underline; font-style: italic;'>" + document.getElementById("type").value + "</td><td>" + document.getElementById("money").value + "</td></tr>");
            } else {
                $total = Number($total) + Number((document.getElementById("money").value));
                $("tbody").append("<tr><td>" + $i++ + "</td><td style='color:green;'>" + document.getElementById("type").value + "</td><td>" + document.getElementById("money").value + "</td></tr>");
            }


            $("#totalrow").remove();
            $("tbody").append("<tr id='totalrow'><td> ยอดเงินคงเหลือ </td><td>" + $total + "</td><td> บาท </td></tr>");

            // alert($total);
        });
    });
</script>
<!-- EXAM 1
<br>
ให้สมาชิกสร้าง ตารางรายรับ - รายจ่าย โดยมีข้อกำหนดดังนี้
<br>
1.เมื่อกดปุ่ม เพิ่มข้อมูลรายรับ - รายจ่าย ให้เรียกแบบฟอร์มขึ้นมาในแบบฟอร์มจะมี ตัวเลือกให้เลือก ประเภท และใส่เลข จำนวนเงิน
<br>
2.เมื่อกดปุ่ม บันทึก ของแบบฟอร์มให้เพิ่มแถวในตารางอีก 1 แถว พร้อมบอกประเภท ถ้าเป็นรายรับให้เป็นตัวอักษรสีเขียว ถ้าเป็นรายจ่ายให้เป็นสีแดงตัวเอียงขีดเส้นใต้
<br>
3.หลังจากนั้นให้แสดงยอดเงินคงเหลือในบรรทัดสุดท้ายของตาราง ถ้าเป็นรายรับให้เพิ่มเงิน แต่ถ้าเป็นรายจ่ายให้ลดเงิน
<br>
4.ให้แก้ไข Code ในส่วนของ script เท่านั้น
<br><br>
***Keyword***
<br>
- append
<br>
- remove
<br>
- document.getElementById("id").value
<br>
- Number()
<br>
- if
<br>
- + (ใช้ในการต่อ string)
<br><br> -->
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary">Exam1</h6>
            </div>
            <div id="content_center_ex1" class="card-body">
                <div class="modal-header">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle='modal' data-target='#addtable' aria-label="Close">เพิ่มข้อมูลรายรับ - รายจ่าย</button>
                </div>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ประเภท</th>
                                <th>จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="addtable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลรายรับ - รายจ่าย</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        ประเภท : <select style="width: 200px;" class="form-control" id="type">
                            <option value="รายรับ">รายรับ</option>
                            <option value="รายจ่าย">รายจ่าย</option>
                        </select>
                    </div>
                    <div class="form-group">
                        จำนวนเงิน : <input style="width: 200px;" type="number" class="form-control" id="money" placeholder="จำนวนเงิน">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn waves-effect waves-light btn-danger" data-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn waves-effect waves-light btn-success submitForm" data-dismiss="modal" id="submitadd" data-id=''>บันทึก</button>
                        <!-- <button type="button" class="btn btn-warning d-none d-lg-block m-l-15" id="test"><i class="fa fa-plus-circle"></i>test</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>