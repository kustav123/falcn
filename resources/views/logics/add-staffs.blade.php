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

            ajax: "{{ url('staffs') }}",
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

    const changePasswordFieldChange = () => {
        $("#password").attr('disabled', $("#changePassword").is(":checked") ? false : true)
    }

    const add = () => {
        $('#staffForm').trigger("reset");
        $('#staffModal').html("Add Staff");
        $('#addStaffModal').modal('show');

        $('#id').val('');
        $('#purpose').val('insert');

        $(".container-field-password").html(`
            <label class="col-sm-12 control-label">Password (Min Characters:8)</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="password" name="password"
                    placeholder="Enter password" required="">
            </div>
        `);

        $("#btn-save").html('Add');
    }

    const editStaff = (id) => {
        $('.edit-' + id).html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);

        $.ajax({
            type: "POST",
            url: "{{ url('staffs/edit') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                $('.edit-' + id).html(`Edit`);

                $('#staffModal').html("Edit Staff");
                $('#addStaffModal').modal('show');
                $('#id').val(res.id);
                $('#purpose').val('update');
                $('#name').val(res.name);
                $('#email').val(res.email);
                $("#btn-save").html('Update');

                $(".container-field-password").html(`
                    <div class="col-sm-12 ml-4">
                        <input type="checkbox" class="form-check-input" id="changePassword" name="changePassword" onclick="changePasswordFieldChange()">
                        <label class="form-check-label" for="changePassword">Change Password (Min Characters:8)</label>
                    </div>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="password" name="password" disabled
                            placeholder="Enter new password">
                    </div>
                `);
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
                url: "{{ url('staffs/delete') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $.notify("Successfully delete staff", "success");
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
            url: "{{ url('staffs/store') }}",
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
                $("#btn-save").html('Add Staff');
                $("#btn-save").attr("disabled", false);
            },
            error: function(data) {
                $.notify(data, "error");
            }
        });
    });
</script>
