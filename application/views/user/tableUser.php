<div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped mytb">
        <thead>
            <tr class="text-center">
                <th>ลำดับ</th>
                <th>อีเมล</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เบอร์โทรศัพท์</th>
                <th>ประเภทผู้ใช้งาน</th>
                <th>ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start loop show db to table -->
            <?php
            if (isset($table) && $table) {
                $i = 1 //กำหนดลำดับ 
            ?>
                <?php foreach ($table as $key => $val) { ?>
                    <tr class="text-center">
                        <td><?php echo $i++; ?></td>
                        <td class="text-left"><?= $val->user_email ?></td>
                        <td class="text-left"><?= $val->user_fname ?></td>
                        <td class="text-left"><?= $val->user_lname ?></td>
                        <td class="text-left"><?= $val->user_phone ?></td>
                        <td class="text-left"><?= $val->user_type_name ?></td>
                        <td>
                            <button type="button" class="btn waves-effect waves-light btn-warning btn-sm btn_edit" data-toggle="modal" data-toggle="modal" data-target="#editData" data-id="<?= $val->user_id ?>" data-email="<?= $val->user_email ?>" data-fname="<?= $val->user_fname ?>" data-lname="<?= $val->user_lname ?>" data-phone="<?= $val->user_phone ?>" data-typeid="<?= $val->user_type_id ?>"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn waves-effect waves-light btn-danger btn-sm btn_delete" id="<?= $val->user_id ?>" ><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>

            <!-- End loop -->
        </tbody>
    </table>
</div>


<script>
   $('#editData').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var email = button.data('email');
        var fname = button.data('fname');
        var lname = button.data('lname');
        var phone = button.data('phone');
        var typeid = button.data('typeid');
        
        var modal = $(this);
        modal.find('#user_id[name="editData[]"]').val(id);
        modal.find('#user_email[name="editData[]"]').val(email);
        modal.find('#user_fname[name="editData[]"]').val(fname);
        modal.find('#user_lname[name="editData[]"]').val(lname);
        modal.find('#user_phone[name="editData[]"]').val(phone);
        modal.find('#user_type_id[name="editData[]"]').val(typeid);
    })

    $('.btn_delete').click(function() {
        var button = $(event.relatedTarget)
        var data = {};
        data['id'] = $(this).attr("id");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                url: "deleteUser",
                method: "POST",
                data: data,
            }).done(function(returnData) {
                getList();
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            });    
            }
        }) 
    })
</script>