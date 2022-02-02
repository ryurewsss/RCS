<div class="col-md-12">
    <table id="myTable" class="table table-bordered table-striped mytb">
        <thead>
            <tr class="text-center">
                <th>ลำดับ</th>
                <th>ชื่อสถานที่</th>
                <th>ตำแหน่งสถานที่</th>
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
                        <td class="text-left"><?= $val->place_name ?></td>
                        <td class="text-left"><?= $val->place_address ?></td>
                        <!-- <td class="text-left"><a href="<?= $val->place_address ?>" target="_blank"><?= $val->place_address ?></a></td> -->
                        <td>
                            <button type="button" class="btn waves-effect waves-light btn-warning btn-sm btn_edit" data-toggle="modal" data-toggle="modal" data-target="#modalEditPlace" data-id="<?= $val->place_id ?>" data-name="<?= $val->place_name ?>" data-address="<?= $val->place_address ?>" ><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn waves-effect waves-light btn-danger btn-sm btn_delete" id="<?= $val->place_id ?>" ><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>

            <!-- End loop -->
        </tbody>
    </table>
</div>


<script>

    $('#modalEditPlace').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var name = button.data('name');
        var address = button.data('address');

        var modal = $(this);
        modal.find('#place_id[name="editData[]"]').val(id);
        modal.find('#place_name[name="editData[]"]').val(name);
        modal.find('#place_address[name="editData[]"]').val(address);
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
                url: "deletePlace",
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
    //delete row
</script>