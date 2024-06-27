<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

            }
        });
         $('#dataTable').DataTable({
             processing: true,
             serverSide: true,

             ajax: "{{ url('listjob') }}",

             columns: [{
                     data: 'Job',
                     name: 'Job',
                     orderable: false
                 },
                 {
                     data: 'name',
                     name: 'name'
                 },
                 {
                     data: 'status',
                     name: 'status'
                 },
                 {
                     data: 'echarge',
                     name: 'echarge'
                 },
                 {
                     data: 'uname',
                     name: 'uname'
                 },
                 {
                     data: 'item',
                     name: 'item'
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
    function getJob(jobId) {
        $.ajax({
            url: '/listjob/jbdtl',
            type: 'GET',
            data: { jobid: jobId },
            success: function(response) {

                populateJobDetailsModal(response);

            },
            error: function(xhr, status, error) {
                // Handle errors if any
                console.error("AJAX Error: ", status, error);
            }
        });
    }

    function populateJobDetailsModal(data) {
    var modalBody = $('#jobDetailsBody');
    modalBody.empty(); // Clear any existing content

    // Loop through the received data and create the content
    data.forEach(function(item) {
        var icon = item.type === 'App' ? '<i class="fa fa-info-circle" aria-hidden="true"></i>' : '<i class="fa fa-users" aria-hidden="true"></i>';
        var details = `
            <p>
                <strong>Created At:</strong> ${item.created_at}
                <strong>By User:</strong> ${item.name} Action is
                <strong>Action:</strong> ${item.message}
                ${icon} <br>
            </p>
            <hr>
        `;
        modalBody.append(details);
    });
    var jobId = data.length > 0 ? data[0].jbid : null; // Assuming the first item has the jobid
    $('#jobDetailsModal').data('jobid', jobId);
    // Show the modal
    $('#jobDetailsModal').modal('show');


}

$('#submitComment').click(function() {
    var comment = $('#comment').val();
    var jobId = $('#jobDetailsModal').data('jobid'); // Get jobid from modal data attribute

    // AJAX POST request to submit comment data
    $.ajax({
        url: 'listjob/addcmnt', // Replace with your actual endpoint
        type: 'POST',
        data: {
            jobid: jobId,
            comment: comment
        },
        success: function(response) {
            // Handle success response if needed
            console.log('Comment submitted successfully:', response);

            // Close the modal if submission is successful
            $('#jobDetailsModal').modal('hide');
        },
        error: function(xhr, status, error) {
            // Handle error response if any
            console.error('Error submitting comment:', status, error);
        }
    });
});

function updateJob(jobId) {
        // Set the job ID in the modal data attribute
        $('#updateJobModal').data('jobid', jobId);

        // Show the modal
        $('#updateJobModal').modal('show');
    }

    $('#updateJobForm').submit(function(event) {
            event.preventDefault();
            var jobId = $('#updateJobModal').data('jobid');
            var formData = $(this).serialize();

            $.ajax({
                url: '/listjob/update', // Replace with your actual endpoint
                type: 'POST',
                data: formData + '&jobid=' + jobId, // Append jobid to form data
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Job updated successfully:', response);
                    $('#updateJobModal').modal('hide'); // Close modal on success
                    window.location.href = '/listjob';
                },
                error: function(xhr, status, error) {
                    console.error('Error updating job:', status, error);
                    // Handle error scenario
                }
            });
        });

        // Show/hide assigned_to dropdown based on status selection
        $('#status').change(function() {
            if ($(this).val() === 'Assign') {
                $('#assignStaffGroup').show();
                // Fetch staff list and populate the dropdown dynamically
                $.ajax({
                    url: '/staffs/getlist', // Replace with your actual endpoint
                    type: 'POST',
                    success: function(response) {
                        var options = '';
                        response.forEach(function(staff) {
                            options += `<option value="${staff.id}">${staff.name}</option>`;
                        });
                        $('#assigned_to').html(options);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching staff list:', status, error);
                    }
                });
            } else {
                $('#assignStaffGroup').hide();
            }
        });


</script>
