@extends('admin.master')
@section('content')
    <div>
   
    <h2 class="text-center font-weight-bold py-3 text-uppercase">Application Form</h2>
  <div class="d-flex justify-content-center" style="margin: 0 auto;">
    <form action="{{route('insert-data')}}" style="width:86%" method="post" enctype="multipart/form-data">
          @csrf
          <h3 class="text-center my-3">Applicant's Information</h3>
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="name" type="text" class="form-control" value="{{$response_applicant_front_nid_data['info']['name_en']}}">
            @if($errors->has('name'))
              {{$errors->first('name')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input id="checkNumber" name="phone" type="text" class="form-control">
            @if($errors->has('phone'))
              {{$errors->first('phone')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="address" type="text" class="form-control">
            @if($errors->has('address'))
              {{$errors->first('address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">NID Address</label> 
          <div class="col-9">
            <input id="text5" name="applicant_nid_address" type="text" class="form-control" value="{{$response_applicant_back_nid_data['info']['address']}}">
            @if($errors->has('applicant_nid_address'))
              {{$errors->first('applicant_nid_address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="officeName" type="text" class="form-control">
            @if($errors->has('officeName'))
              {{$errors->first('officeName')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="officeAddress" type="text" class="form-control">
            @if($errors->has('officeAddress'))
              {{$errors->first('officeAddress')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="designation" type="text" class="form-control">
            @if($errors->has('designation'))
              {{$errors->first('designation')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="nid" type="text" class="form-control" value="{{$response_applicant_front_nid_data['info']['nid_no']}}">
            @if($errors->has('nid'))
              {{$errors->first('nid')}}
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Image</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="image_upload" id="customFile" name="filename">
              <label class="custom-file-label" for="customFile">Choose file</label>
              @if($errors->has('image_upload'))
                {{$errors->first('image_upload')}}
              @endif
            </div>
          </div>
        </div>
        <!--End of applicant information-->
        @if($response_co_applicant_front_nid_data == null && $response_co_applicant_back_nid_data == null)
        @else 
        <h3 class="text-center my-3">Co-Applicant's Information</h3>
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="co_applicant_name" type="text" class="form-control" value="{{ !is_null($response_co_applicant_front_nid_data) ? $response_co_applicant_front_nid_data['info']['name_en'] : ''}}">
            @if($errors->has('co_applicant_name'))
              {{$errors->first('co_applicant_name')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input name="co_applicant_phone" type="text" class="form-control">
            @if($errors->has('co_applicant_phone'))
              {{$errors->first('co_applicant_phone')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="co_applicant_address" type="text" class="form-control">
            @if($errors->has('co_applicant_address'))
              {{$errors->first('co_applicant_address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">NID Address</label> 
          <div class="col-9">
            <input id="text5" name="co_applicant_nid_address" type="text" class="form-control" value="{{ !is_null($response_co_applicant_back_nid_data) ? $response_co_applicant_back_nid_data['info']['address'] : ''}}">
            @if($errors->has('co_applicant_nid_address'))
              {{$errors->first('co_applicant_nid_address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="co_applicant_officeName" type="text" class="form-control">
            @if($errors->has('co_applicant_officeName'))
              {{$errors->first('co_applicant_officeName')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="co_applicant_officeAddress" type="text" class="form-control">
            @if($errors->has('co_applicant_officeName'))
              {{$errors->first('co_applicant_officeName')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="co_applicant_designation" type="text" class="form-control">
            @if($errors->has('co_applicant_designation'))
              {{$errors->first('co_applicant_designation')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="co_applicant_nid" type="text" class="form-control" value="{{ !is_null($response_co_applicant_front_nid_data) ? $response_co_applicant_front_nid_data['info']['nid_no'] : ''}}">
            @if($errors->has('co_applicant_nid'))
              {{$errors->first('co_applicant_nid')}}
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Image</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="co_applicant_image" id="customFile" name="filename">
              <label class="custom-file-label" for="customFile">Choose file</label>
              @if($errors->has('co_applicant_image'))
                {{$errors->first('co_applicant_image')}}
              @endif
            </div>
          </div>
        </div>
        @endif
       
        <!--Guarantor Information-->
        <h3 class="text-center mb-3">1st Guarantor's Information</h3>
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="guarantor_name" type="text" class="form-control" value="{{ !is_null($response_guarantor_front_data) ? $response_guarantor_front_data['info']['name_en'] : ''}}">
            @if($errors->has('guarantor_name'))
              {{$errors->first('guarantor_name')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input id="checkNumber" name="guarantor_phone" type="text" class="form-control">
            @if($errors->has('guarantor_phone'))
              {{$errors->first('guarantor_phone')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="guarantor_address" type="text" class="form-control">
            @if($errors->has('guarantor_address'))
              {{$errors->first('guarantor_address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">NID Address</label> 
          <div class="col-9">
            <input id="text5" name="nid_address" type="text" class="form-control" value="{{!is_null($response_guarantor_back_data) ? $response_guarantor_back_data['info']['address'] : ''}}">
            @if($errors->has('nid_address'))
              {{$errors->first('nid_address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="guarantor_officeName" type="text" class="form-control">
            @if($errors->has('guarantor_officeName'))
              {{$errors->first('guarantor_officeName')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="guarantor_officeAddress" type="text" class="form-control">
            @if($errors->has('guarantor_officeAddress'))
              {{$errors->first('guarantor_officeAddress')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="guarantor_designation" type="text" class="form-control">
            @if($errors->has('guarantor_designation'))
              {{$errors->first('guarantor_designation')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="guarantor_nid" type="text" class="form-control" value="{{!is_null($response_guarantor_front_data) ? $response_guarantor_front_data['info']['nid_no'] : ''}}">
            @if($errors->has('guarantor_nid'))
              {{$errors->first('guarantor_nid')}}
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Image</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="guarantor_image" id="customFile" name="filename">
              <label class="custom-file-label" for="customFile">Choose file</label>
              @if($errors->has('guarantor_image'))
                {{$errors->first('guarantor_image')}}
              @endif
            </div>
          </div>
        </div>
        <!--2nd guarantor-->
        @if($response_second_guarantor_front_data == null && $response_second_guarantor_back_data == null)
        @else
        <h3 class="text-center mb-3">2nd Guarantor's Information</h3>
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="second_guarantor_name" type="text" class="form-control" value="{{ !is_null($response_second_guarantor_front_data) ? $response_second_guarantor_front_data['info']['name_en'] : ''}}">
            @if($errors->has('second_guarantor_name'))
              {{$errors->first('second_guarantor_name')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input id="checkNumber" name="second_guarantor_phone" type="text" class="form-control">
            @if($errors->has('second_guarantor_phone'))
              {{$errors->first('second_guarantor_phone')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="second_guarantor_address" type="text" class="form-control">
            @if($errors->has('second_guarantor_address'))
              {{$errors->first('second_guarantor_address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">NID Address</label> 
          <div class="col-9">
            <input id="text5" name="second_nid_address" type="text" class="form-control" value="{{!is_null($response_second_guarantor_back_data) ? $response_second_guarantor_back_data['info']['address'] : ''}}">
            @if($errors->has('second_nid_address'))
              {{$errors->first('second_nid_address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="second_guarantor_officeName" type="text" class="form-control">
            @if($errors->has('second_guarantor_officeName'))
              {{$errors->first('second_guarantor_officeName')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="second_guarantor_officeAddress" type="text" class="form-control">
            @if($errors->has('second_guarantor_officeAddress'))
              {{$errors->first('second_guarantor_officeAddress')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="second_guarantor_designation" type="text" class="form-control">
            @if($errors->has('second_guarantor_designation'))
              {{$errors->first('second_guarantor_designation')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="second_guarantor_nid" type="text" class="form-control" value="{{!is_null($response_second_guarantor_front_data) ? $response_second_guarantor_front_data['info']['nid_no'] : ''}}">
            @if($errors->has('second_guarantor_nid'))
              {{$errors->first('second_guarantor_nid')}}
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Image</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="second_guarantor_image" id="customFile" name="filename">
              <label class="custom-file-label" for="customFile">Choose file</label>
              @if($errors->has('second_guarantor_image'))
                {{$errors->first('second_guarantor_image')}}
              @endif
            </div>
          </div>
        </div>
        @endif
        <!--Attachments-->
        <h2 class="text-center mb-3">Attachments</h2>
        <div class="row">
          <div class="col-sm-3">LOI</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="loi_files[]" id="customFile" name="filename" multiple>
              <label class="custom-file-label" for="customFile">Choose file</label>
              @if($errors->has('loi_files'))
                {{$errors->first('loi_files')}}
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Bank Withdrawal Letter</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="bank_withdrawal_files[]" id="customFile" name="filename" multiple>
              <label class="custom-file-label" for="customFile">Choose file</label>
              @if($errors->has('bank_withdrawal_files'))
                {{$errors->first('bank_withdrawal_files')}}
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Rental Deed</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="rental_deed_files[]" id="customFile" name="filename" multiple>
              <label class="custom-file-label" for="customFile">Choose file</label>
              @if($errors->has('rental_deed_files'))
                {{$errors->first('rental_deed_files')}}
              @endif
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