<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,

            ajax: "{{ url('items') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'make',
                    name: 'make'
                },
                {
                    data: 'accessary',
                    name: 'accessary'
                },
                {
                    data: 'complain',
                    name: 'complain'
                },
                {
                    data: 'remarks',
                    name: 'remarks'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ],
            order: [
                [0, 'desc']
            ]
        });
    });

    const add = () => {
        $('#staffForm').trigger("reset");
        $('#staffModal').html("Add Item");
        $('#addStaffModal').modal('show');

        $('#id').val('');
        $('#purpose').val('insert');

        $("#btn-save").html('Add');
    }

    const editStaff = (id) => {
        $('.edit-' + id).html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);

        $.ajax({
            type: "POST",
            url: "{{ url('items/edit') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                $('.edit-' + id).html(`Edit`);

                $('#staffModal').html("Edit Item");
                $('#addStaffModal').modal('show');
                $('#id').val(res.id);
                $('#purpose').val('update');
                $('#name').val(res.name);
                $('#name').attr('disabled', true);
                $('#make').val(res.make);
                $('#accessary').val(res.accessary);
                $('#complain').val(res.complain);
                $('#remarks').val(res.remarks);
                $("#btn-save").html('Update');
            }
        });
    }

    // const deleteStaff = (id) => {
    //     $('.delete-' + id).html(`
    //         <div class="spinner-border spinner-border-sm" role="status">
    //             <span class="sr-only">Loading...</span>
    //         </div>`);

    //     if (confirm("Delete Record?") == true) {
    //         $.ajax({
    //             type: "POST",
    //             url: "{{ url('items/delete') }}",
    //             data: {
    //                 id: id
    //             },
    //             dataType: 'json',
    //             success: function(res) {
    //                 $.notify("Successfully delete item", "success");
    //                 $('.delete-' + id).html(`Delete`)
    //                 var oTable = $('#dataTable').dataTable();
    //                 oTable.fnDraw(false);
    //             }
    //         });
    //     }
    // }
    const deleteStaff = (id) => {
            const deleteButton = $('.delete-' + id);

            deleteButton.html(`
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);

            if (confirm("Disable Record? Only Admin can undo!!")) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('items/disable') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $.notify("Successfully disabled item", "success");
                        deleteButton.html(`Disable`);
                        var oTable = $('#dataTable').dataTable();
                        oTable.fnDraw(false);
                    },
                    error: function(err) {
                        $.notify("Error disabling item", "error");
                        deleteButton.html(`Disable`);
                    }
                });
            } else {
                deleteButton.html(`Disable`);
            }
        }
    $('#staffForm').submit(function(e) {
        e.preventDefault();

        let btnSaveText = $('#btn-save').html();
        $('#btn-save').html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`)

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "{{ url('items/store') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (data) => {
                $.notify(data.message, "success");
                $('#btn-save').html(btnSaveText)

                $("#addStaffModal").modal('hide');
                var oTable = $('#dataTable').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Add Item');
                $("#btn-save").attr("disabled", false);
            },
            error: function(data) {
                $.notify(data, "error");
            }
        });
    });
</script>
