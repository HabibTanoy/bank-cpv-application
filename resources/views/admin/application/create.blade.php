@extends('admin.master')
@section('content')
    <div>
    <h2 class="text-center font-weight-bold py-3 text-uppercase">Application Form</h2>
  <div class="d-flex justify-content-center" style="margin: 0 auto;">
    <form action="{{route('insert-data')}}" onsubmit="return myfun()" style="width:86%" method="post" enctype="multipart/form-data">
          @csrf
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="name" type="text" class="form-control" value="{{$response_applicant_front_nid_data->name_en}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input id="checkNumber" name="phone" type="text" class="form-control" pattern="\+?(88)?01[3456789][0-9]{8}\b" required >
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="address" type="text" class="form-control" >
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">NID Address</label> 
          <div class="col-9">
            <input id="text5" name="applicant_nid_address" type="text" class="form-control" value="{{$response_applicant_back_nid_data->address}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="officeName" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="officeAddress" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="designation" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="nid" type="text" class="form-control" value="{{$response_applicant_front_nid_data->nid_no}}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Image</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="image_upload" id="customFile" name="filename">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <!--Guarantor Information-->
        <h2 class="text-center mb-3">Guarantor Information</h2>
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="guarantor_name" type="text" class="form-control" value="{{isset($response_guarantor_front_data) ? $response_guarantor_front_data->name_en : ''}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input id="checkNumber" name="guarantor_phone" type="text" class="form-control" >
          </div>
          <span id="message"></span>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="guarantor_address" type="text" class="form-control" >
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">NID Address</label> 
          <div class="col-9">
            <input id="text5" name="nid_address" type="text" class="form-control" value="{{isset($response_guarantor_back_data) ? $response_guarantor_back_data->address : ''}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="guarantor_officeName" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="guarantor_officeAddress" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="guarantor_designation" type="text" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="guarantor_nid" type="text" class="form-control" value="{{isset($response_guarantor_front_data) ? $response_guarantor_front_data->nid_no : ''}}">
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
        <!--Attachments-->
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
          <div class="offset-3 col-9">
            <button name="submit" type="submit" class="btn btn-primary">Create Application</button>
          </div>
        </div>
      </form>
  </div>
    </div>
    <script>
      function myfun() {
        let a = document.getElementById("checkNumber").value;
        if(a === "") {
          document.getElementById("message").innHTML = "Enter a Number";
          return false;
        }
        if(isNaN(a)) {
          document.getElementById("message").innHTML = "Only number allowed";
          return false;
        }
        if(a.length < 11) {
          document.getElementById("message").innHTML = "number must be 11 digit";
        }
      }
    </script>
@endsection