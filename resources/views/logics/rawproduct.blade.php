<script type="text/javascript">
    var isDataEdit = false;

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,

            ajax: "{{ url('rawproducts') }}",
            columns: [{
                    data: 'rid',
                    name: 'rid',
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'unit',
                    name: 'unit'
                },
                {
                    data: 'current_stock',
                    name: 'current_stock'
                },
                {
                    data: 'remarks',
                    name: 'remarks'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
    });

    const add = () => {
    $('#rawForm').trigger("reset");
    $('#RawModal').html("Add Raw Product");
    $('#addRawModal').modal('show');

    $('#id').val('');
    $('#purpose').val('insert');
    $("#btn-save").html('Add');

    // Clear previous errors
    clearErrors();
}

    const clearErrors = () => {
        $('.form-group').removeClass('has-error');
        $('.help-block').remove();
        $("#btn-save").html('Add');
    }

    $('#rawForm').on('submit', function (e) {
        e.preventDefault();

        let formData = $(this).serialize();
        let url = '/rawproducts/store';

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function (data) {
                // Handle success
                $.notify(data.message, "success");
                $('#addRawModal').modal('hide');
                window.location.href = '/rawproducts';
            },
            error: function (xhr) {
                if (xhr.status != 200) {
                    clearErrors()
                    $.notify(xhr.responseJSON.message);
                }
            }
        });
    });
    const editStaff = (id) => {

        $('.edit-' + id).html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);

        $.ajax({
            type: "POST",
            url: "{{ url('rawproducts/edit') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                $('.edit-' + id).html(`Edit`);
                $('#RawModal').html("Edit Raw Product");
                $('#addRawModal').modal('show');
                $('#id').val(res.rid);
                $('#purpose').val('update');
                $('#name').val(res.name);
                $('#name').attr('disabled', true);
                $('#unit').val(res.unit);
                $('#unit').attr('disabled', true);
                $('#remarks').val(res.remarks);
                $("#btn-save").html('Update');

            },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', xhr.responseText);
            // Handle error
        }
        });
    }


            const deleteStaff = (id) => {
            const deleteButton = $('.delete-' + id);

            deleteButton.html(`
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);

            if (confirm("Disable Record? Only Admin can undo!!")) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('rawproducts/disable') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $.notify("Successfully disabled Product", "success");
                        deleteButton.html(`Disable`);
                        var oTable = $('#dataTable').dataTable();
                        oTable.fnDraw(false);
                        window.location.href = '/rawproducts';
                    },
                    error: function(err) {
                        $.notify("Error disableing supplier", "error");
                        deleteButton.html(`Disable`);
                    }
                });
            } else {
                deleteButton.html(`Disable`);
            }
        }


</script>
