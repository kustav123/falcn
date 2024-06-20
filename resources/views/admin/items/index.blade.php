@extends('layouts.master')

@section('content')
   @include('links.datatables');

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="add()">
            Add </button>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Items</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Make</th>
                            <th>Accessories</th>
                            <th>complaint</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- boostrap blog model -->
    <div class="modal fade" id="addStaffModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staffModal"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="staffForm" class="form-horizontal">
                        <input type="hidden" name="purpose" id="purpose">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter name" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="make" class="col-sm-2 control-label">Make List</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="make" name="make"
                                    placeholder="Enter Make list ',' separeted " required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accessary" class="col-sm-2 control-label">Accessories</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="accessary" name="accessary"
                                    placeholder="Enter Accessories list ',' separeted " required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="complain" class="col-sm-2 control-label">Complaint List</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="complain" name="complain"
                                    placeholder="Enter Complaint list ',' separeted " required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remarks" class="col-sm-2 control-label">Remarks</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="remarks" name="remarks"
                                    placeholder="Remarks" >
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save">Add Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->

    @include('logics/items')
@endsection
