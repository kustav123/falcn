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

            ajax: "{{ url('suppliers') }}",
            columns: [{
                    data: 'sid',
                    name: 'sid',
                    orderable: false
                },
                {
                    data: 'merchant_name',
                    name: 'merchant_name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'gst',
                    name: 'gst'
                },
                {
                    data: 'due_ammount',
                    name: 'due_ammount'
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
    $('#suppForm').trigger("reset");
    $('#SuppModal').html("Add Supplier");
    $('#addSuppModal').modal('show');

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

$('#suppForm').on('submit', function (e) {
    e.preventDefault();

    let formData = $(this).serialize();
    let url = '/suppliers/store';

    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function (data) {
            // Handle success
            $.notify(data.message, "success");
            $('#addSuppModal').modal('hide');
            // Possibly reload the data or update the UI
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
            url: "{{ url('suppliers/edit') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                $('.edit-' + id).html(`Edit`);
                $('#SuppModal').html("Edit Client");
                $('#addSuppModal').modal('show');
                $('#id').val(res.sid);
                $('#purpose').val('update');
                $('#name').val(res.merchant_name);
                $('#email').val(res.email);
                $('#mobile').val(res.mobile);
                $('#mobile').attr('disabled', true);
                $('#address').val(res.address)
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
                    url: "{{ url('suppliers/disable') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $.notify("Successfully disabled supplier", "success");
                        deleteButton.html(`Disable`);
                        var oTable = $('#dataTable').dataTable();
                        oTable.fnDraw(false);
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
