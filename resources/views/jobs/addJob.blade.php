@extends('layouts.master')

@section('content')
 <style>
    .p-2 {
    padding: .1rem !important;
}
</style>
   @include('links.datatables')
   <div class="container">
      <form class="form-horizontal" id="jobForm">
         @csrf
         <input type="hidden" id="clid" name="clid">
         <input type="hidden" name="purpose" id="purpose" value="insert">
         <input type="hidden" name="itid" id="itid">


         <div class="row">
            <!-- Job ID and Queue Number Section - Read-only Centered -->
            <div class="col-md-6 offset-md-3 text-center">
                <div class="row">
                    <div class="col-md-5">
                        <label for="job_id">Temporary Job ID</label>
                        <input type="text" class="form-control text-center" id="job_id" name="job_id" readonly value="{{ $head }}/{{ $newJobId }}">
                    </div>
                    <div class="col-md-2">
                        <label for="queue_number">Queue </label>
                        <input type="text" class="form-control text-center" id="queue_number" name="queue_number" readonly value="{{ $newqueue }}">
                    </div>
                    <div class="col-md-5">
                        <fieldset class="border p-2">
                            <legend class="w-auto">Search by</legend>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="search_by" id="search_by_mobile" value="mobile" checked>
                                 <label class="form-check-label" for="search_by_mobile">Mobile</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="search_by" id="search_by_name" value="name">
                                <label class="form-check-label" for="search_by_name">Name</label>
                            </div>

                        </fieldset>
                    </div>


                </div>
            </div>
        </div>


         <div class="row mt-3">
            <div class="col-md-12 text-center">
                <h4 style="color: blue;">Client Details</h4>
            </div>
        </div>

         <div class="row mt-3">

            <!-- Mobile Number Section - Textbox -->
            <div class="col-md-4">
               <label for="mobile_number">Mobile Number</label>
               <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number">
            </div>

            <!-- Name, Address, GST No, Email - Read-only Side by Side -->
            <div class="col-md-4">
               <label for="name">Name</label>
               <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Pertial name for search">
               <div id="nameSuggestions"></div> <!-- Container for suggestions -->

            </div>
            <div class="col-md-4">
               <label for="address">Address</label>
               <input type="text" class="form-control" id="address" name="address" readonly>
            </div>
         </div>

         <div class="row mt-3">
            <div class="col-md-4">
               <label for="gst_no">GST No</label>
               <input type="text" class="form-control" id="gst_no" name="gst_no" readonly>
            </div>
            <div class="col-md-4">
               <label for="email">Email</label>
               <input type="email" class="form-control" id="email" name="email" readonly>
            </div>
            <div class="col-md-4">
               <label for="due_amount">Due Amount</label>
               <input type="text" class="form-control" id="due_amount" name="due_amount" readonly placeholder="">
            </div>
         </div>

         <div class="row mt-3 justify-content-center">
            <div class="col-md-4 text-center">
               <label for="remarks">Remarks</label>
               <input type="text" class="form-control" id="remarks" name="remarks" readonly >
            </div>
         </div>

         <div class="row mt-3">
            <div class="col-md-12 text-center">
                <h4 style="color: blue;">Item Details</h4>
            </div>
        </div>

         <div class="row">
            <div class="col-md-4">
               <label for="item">Item</label>
               <select class="form-control" id="item" name="item" required></select>
            </div>
            <div class="col-md-4">
               <label for="make">Make</label>
               <select class="form-control" id="make" name="make"></select>
            </div>
            <div class="col-md-4">
               <label for="model">Model</label>
               <input type="text" class="form-control" id="model" name="model" placeholder="Enter Model Number" >
            </div>
         </div>

         <div class="row mt-3">
            <div class="col-md-4">
               <label for="snno">Serial Number</label>
               <input type="text" class="form-control" id="snno" name="snno" placeholder="Enter Serial Number">
            </div>
            <div class="col-md-4">
               <label for="property">Property</label>
               <input type="text" class="form-control" id="property" name="property" placeholder="Enter Property">
            </div>
            <div class="col-md-4">
                <label for="rest">Rough Estimation</label>
                <input type="text" class="form-control" id="rest" name="rest" placeholder="Enter Estimation">
             </div>

         </div>

         <div class="row mt-3 justify-content-center">
            <div class="col-md-4">
               <label for="complain">Complain </label>
               <select class="form-control" id="complain" name="complain[]"  multiple> </select>
            </div>
            <div class="col-md-4">
                <label for="accessary">Accessory</label>
                <select class="form-control" id="accessary" name="accessary[]"  multiple></select>
             </div>
         </div>

         <div class="row mt-3">
            <div class="col-md-12 text-center">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
      </form>
   </div>
<!-- Modal -->
<div class="modal fade" id="jobDetailsModal" tabindex="-1" aria-labelledby="jobDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobDetailsModalLabel">Job Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody id="jobDetailsTableBody">
                            <!-- Table body will be populated dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                <button type="button" class="btn btn-primary" onclick="printJobDetails()">Print</button>
            </div>
        </div>
    </div>
</div>

   @include('logics/addjob')
@endsection
