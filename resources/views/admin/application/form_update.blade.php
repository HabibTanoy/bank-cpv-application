@extends('admin.master')
@section('content')
<div>
    <div class="row mx-3">
        <div class="col-md-6">
        <a href="{{route('application-list')}}" type="submit" class="btn btn-primary">Back</a>
        </div>
        <div class="col-md-6 text-right">
        <a href="{{route('allfile-show', $application->id)}}" type="submit" class="btn btn-primary">Show Files</a>
        </div>
    </div>
<h2 class="text-center font-weight-bold py-3 text-uppercase">Application Upadte</h2>
  <div class="d-flex justify-content-center" style="margin: 0 auto;">
    <form action="" style="width:86%" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="name" type="text" class="form-control" value="{{$application->name}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input id="text2" name="phone" type="text" class="form-control" value="{{$application->phone_number}}" pattern="\+?(88)?01[3456789][0-9]{8}\b" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="address" type="text" class="form-control" value="{{$application->present_address}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="officeName" type="text" class="form-control" value="{{$application->office_business_name}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="officeAddress" type="text" class="form-control" value="{{$application->office_business_address}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="designation" type="text" class="form-control" value="{{$application->designation}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="nid" type="text" class="form-control" value="{{$application->nid}}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-3">Application Type</label> 
          <div class="col-9">
            <div class="custom-control custom-checkbox custom-control-inline">
              <input id="checkbox_0" type="checkbox" name="city[]" class="form-check-input" value="1" {{ $types[0] ? "checked" : "" }}> 
              <label for="checkbox_0" class="">City Amex</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input id="checkbox_1" type="checkbox" name="city[]" class="form-check-input" value="2" {{ $types[1] ? "checked" : "" }}> 
              <label for="checkbox_1" class="">City Visa</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input id="checkbox_2" type="checkbox" name="city[]" class="form-check-input" value="3" {{ $types[2] ? "checked" : "" }}> 
              <label for="checkbox_2" class="">City Loan</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Image</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="applicant_image" id="customFile" name="filename">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <!--Guarantor Information-->
        <h2 class="text-center mb-3">Guarantor Information</h2>
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="guarantor_name" type="text" class="form-control" value="{{$guarantor_data[0]->name}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input id="text2" name="guarantor_phone" type="text" class="form-control" value="{{$guarantor_data[0]->phone_number}}" pattern="\+?(88)?01[3456789][0-9]{8}\b" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="guarantor_address" type="text" class="form-control" value="{{$guarantor_data[0]->present_address}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="guarantor_officeName" type="text" class="form-control" value="{{$guarantor_data[0]->office_business_name}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="guarantor_officeAddress" type="text" class="form-control" value="{{$guarantor_data[0]->office_business_address}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="guarantor_designation" type="text" class="form-control" value="{{$guarantor_data[0]->designation}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="guarantor_nid" type="text" class="form-control" value="{{$guarantor_data[0]->nid}}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Image</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="guarantor_image" id="customFile" name="filename">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <!--Attachemnts-->
        <h2 class="text-center mb-3">Attachments</h2>
        <div class="row">
          <div class="col-sm-3">LOI</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="loi_files[]" id="customFile" name="filename" multiple>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Bank Withdrawal Letter</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="bank_withdrawal_files[]" id="customFile" name="filename" multiple>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Rental Deed</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="rental_deed_files[]" id="customFile" name="filename" multiple>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-4 text-center">
          
          </div>
          <div class="col-md-4 text-center">
          <button type="submit" class="btn btn-primary">Update</button>
          </div>
          <div class="col-md-4">
          
          </div>
        </div>
      </form>
  </div>
</div>
@endsection