@extends('layouts.master')

@section('content')
   @include('links.datatables')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Active Jobs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Job ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Estimation</th>
                            <th>Assigned to</th>
                            <th>Item</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="jobDetailsModal" tabindex="-1" role="dialog" aria-labelledby="jobDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document"> <!-- Added modal-lg class here -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jobDetailsModalLabel">Job Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="jobDetailsBody">
                    <!-- Job details will be populated here -->
                </div>
                <div class="modal-footer">
                    <div class="row w-100">
                        <div class="col-9">
                            <input type="text" class="form-control" id="comment" name="comment" placeholder="Add Comment">
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-primary btn-block" id="submitComment">Submit</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary mt-2 float-right" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="updateJobModal" tabindex="-1" role="dialog" aria-labelledby="updateJobModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateJobModalLabel">Update Job Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateJobForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Pending approval">Pending approval</option>
                                <option value="Assign">Assign Job</option>
                                <option value="Ready for delivery">Ready for delivery</option>
                                <option value="Hold">Hold</option>
                                <option value="Pending item">Pending item</option>
                            </select>
                        </div>
                        <div class="form-group" id="assignStaffGroup" style="display: none;">
                            <label for="assigned_to">Assigned To</label>
                            <select class="form-control" id="assigned_to" name="assigned_to">
                                <!-- Options will be populated dynamically -->
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submitUpdate">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('logics.listjob')

    @endsection



