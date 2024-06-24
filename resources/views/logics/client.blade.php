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

            ajax: "{{ url('clients') }}",
            columns: [{
                    data: 'userId',
                    name: 'userId',
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name'
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
                    data: 'job',
                    name: 'job'
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

    const add = (mobileNumber) => {
    $('#staffForm').trigger("reset");
    $('#staffModal').html("Add Client");
    $('#addStaffModal').modal('show');

    $('#id').val('');
    $('#purpose').val('insert');
    $("#btn-save").html('Add');

    // Update mobile number input value
    $('#mobile').val(mobileNumber);

    // Clear previous errors
    clearErrors();
}

const clearErrors = () => {
    $('.form-group').removeClass('has-error');
    $('.help-block').remove();
    $("#btn-save").html('Add');
}

$('#staffForm').on('submit', function (e) {
    e.preventDefault();

    let formData = $(this).serialize();
    let url = '/clients/store';

    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            // Handle success
            console.log('Data successfully inserted:', data); // Log success message for debugging
            $.notify(data.message, "success");
            $('#addStaffModal').modal('hide');

            // Prompt the user
            if (confirm('Do you want to create a job for this client?')) {
                // Redirect to add job page with mobile number
                let mobileNumber = $('#mobile').val(); // Assuming the mobile input has id="mobile"
                window.location.href = `/addjobpage?mob=${mobileNumber}`;
            } else {
                // Reload the current page
                window.location.href = '/clients'; // Redirect to /clients
            }
        },
        error: function (xhr, status, error) {
            // Handle errors
            console.error('Error inserting data:', error); // Log error for debugging
            clearErrors();
            $.notify(xhr.responseJSON.message);
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
            url: "{{ url('clients/edit') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                $('.edit-' + id).html(`Edit`);
                $('#staffModal').html("Edit Client");
                $('#addStaffModal').modal('show');
                $('#id').val(res.userId);
                $('#purpose').val('update');
                $('#name').val(res.name);
                $('#email').val(res.email);
                $('#mobile').val(res.mobile);
                $('#mobile').attr('disabled', true);
                $('#address').val(res.address)
                $("#btn-save").html('Update');
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
                    url: "{{ url('clients/disable') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $.notify("Successfully disabled client", "success");
                        deleteButton.html(`Disable`);
                        var oTable = $('#dataTable').dataTable();
                        oTable.fnDraw(false);
                    },
                    error: function(err) {
                        $.notify("Error disableing client", "error");
                        deleteButton.html(`Disable`);
                    }
                });
            } else {
                deleteButton.html(`Disable`);
            }
        }
        if (document.URL.indexOf("#addnew") >= 0) {
        const urlParams = new URLSearchParams(window.location.hash.split('?')[1]);
        const mobileNumber = urlParams.get('mobile');

        if (mobileNumber) {
            // Call the add() function with mobileNumber
            add(mobileNumber);
        }
    }



</script>
