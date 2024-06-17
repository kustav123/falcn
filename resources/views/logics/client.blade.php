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
        $('#staffForm').trigger("reset");
        $('#staffModal').html("Add Staff");
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
                $("#btn-save").html('Update');
            }
        });
    }

    const deleteStaff = (id) => {
        $('.delete-' + id).html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);

        if (confirm("Delete Record?") == true) {
            $.ajax({
                type: "POST",
                url: "{{ url('clients/delete') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $.notify("Successfully delete client", "success");
                    $('.delete-' + id).html(`Delete`)
                    var oTable = $('#dataTable').dataTable();
                    oTable.fnDraw(false);
                }
            });
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
            url: "{{ url('clients/store') }}",
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
                $("#btn-save").html('Add Client');
                $("#btn-save").attr("disabled", false);
            },
            error: function(data) {
                $.notify(data, "error");
            }
        });
    });
</script>
