@extends('layouts.master')

@section('content')
   @include('links.datatables')
   <div class="container">
      <form method="POST">
         @csrf
         <input type="hidden" id="clid" name="clid">

         <div class="row">
            <!-- Job ID and Queue Number Section - Read-only Centered -->
            <div class="col-md-6 offset-md-3 text-center">
               <div class="row">
                  <div class="col-md-6">
                     <label for="job_id">Job ID</label>
                     <input type="text" class="form-control text-center" id="job_id" name="job_id" readonly value="{{ $head }}/{{ $newJobId }}">
                  </div>
                  <div class="col-md-6">
                     <label for="queue_number">Queue Number</label>
                     <input type="text" class="form-control text-center" id="queue_number" name="queue_number" readonly value="{{ $newqueue }}">
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
               <input type="text" class="form-control" id="name" name="name" readonly>
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
               <label for="complain">Complain</label>
               <select class="form-control" id="complain" name="complain" multiple> </select>
            </div>
            <div class="col-md-4">
                <label for="accessary">Accessory</label>
                <select class="form-control" id="accessary" name="accessary" multiple></select>
             </div>
         </div>

         <div class="row mt-3">
            <div class="col-md-12 text-center">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
      </form>
   </div>

   @include('logics/addjob')
@endsection
