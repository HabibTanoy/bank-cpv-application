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
        <h3 class="text-center my-4">Applicant's Information</h3>
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="name" type="text" class="form-control" value="{{$application->name}}">
            @if($errors->has('name'))
              {{$errors->first('name')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input id="text2" name="phone" type="text" class="form-control" value="{{$application->phone_number}}" pattern="\+?(88)?01[3456789][0-9]{8}\b" required>
            @if($errors->has('phone'))
              {{$errors->first('phone')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="address" type="text" class="form-control" value="{{$application->present_address}}">
            @if($errors->has('address'))
              {{$errors->first('address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="officeName" type="text" class="form-control" value="{{$application->office_business_name}}">
            @if($errors->has('officeName'))
              {{$errors->first('officeName')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="officeAddress" type="text" class="form-control" value="{{$application->office_business_address}}">
            @if($errors->has('officeAddress'))
              {{$errors->first('officeAddress')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="designation" type="text" class="form-control" value="{{$application->designation}}">
            @if($errors->has('designation'))
              {{$errors->first('designation')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="nid" type="text" class="form-control" value="{{$application->nid}}">
            @if($errors->has('nid'))
              {{$errors->first('nid')}}
            @endif
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
              <input type="file" class="form-control-file border" name="applicant_image" id="customFile" name="filename">
              <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
            </div>
          </div>
        </div>
        <!--Co-Applicant Information-->
        @if($co_applicant_information == null)
        @else
        <h3 class="text-center my-4">Co-Applicant's Information</h3>
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="co_applicant_name" type="text" class="form-control" value="{{!is_null($co_applicant_information) ? $co_applicant_information->name : ''}}">
            @if($errors->has('co_applicant_name'))
              {{$errors->first('co_applicant_name')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input id="text2" name="co_applicant_phone" type="text" class="form-control" value="{{!is_null($co_applicant_information) ? $co_applicant_information->phone_number : ''}}">
            @if($errors->has('co_applicant_phone'))
              {{$errors->first('co_applicant_phone')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="co_applicant_address" type="text" class="form-control" value="{{!is_null($co_applicant_information) ? $co_applicant_information->present_address : ''}}">
            @if($errors->has('co_applicant_address'))
              {{$errors->first('co_applicant_address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="co_applicant_officeName" type="text" class="form-control" value="{{!is_null($co_applicant_information) ? $co_applicant_information->office_business_name : ''}}">
            @if($errors->has('co_applicant_officeName'))
              {{$errors->first('co_applicant_officeName')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="co_applicant_officeAddress" type="text" class="form-control" value="{{!is_null($co_applicant_information) ? $co_applicant_information->office_business_address : ''}}">
            @if($errors->has('co_applicant_officeAddress'))
              {{$errors->first('co_applicant_officeAddress')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="co_applicant_designation" type="text" class="form-control" value="{{!is_null($co_applicant_information) ? $co_applicant_information->designation : ''}}">
            @if($errors->has('co_applicant_designation'))
              {{$errors->first('co_applicant_designation')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="co_applicant_nid" type="text" class="form-control" value="{{!is_null($co_applicant_information) ? $co_applicant_information->nid_number : ''}}">
            @if($errors->has('co_applicant_nid'))
              {{$errors->first('co_applicant_nid')}}
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Image</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="form-control-file border" name="co_applicant_image" id="customFile" name="filename">
              <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
            </div>
          </div>
        </div>
        @endif
        
        <!--1st Guarantor Information-->
        <h3 class="text-center my-4">1st Guarantor's Information</h3>
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="guarantor_name" type="text" class="form-control" value="{{$guarantor_data[0]->name}}">
            @if($errors->has('guarantor_name'))
              {{$errors->first('guarantor_name')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input id="text2" name="guarantor_phone" type="text" class="form-control" value="{{$guarantor_data[0]->phone_number}}">
            @if($errors->has('guarantor_phone'))
              {{$errors->first('guarantor_phone')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="guarantor_address" type="text" class="form-control" value="{{$guarantor_data[0]->present_address}}">
            @if($errors->has('guarantor_address'))
              {{$errors->first('guarantor_address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="guarantor_officeName" type="text" class="form-control" value="{{$guarantor_data[0]->office_business_name}}">
            @if($errors->has('guarantor_officeName'))
              {{$errors->first('guarantor_officeName')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="guarantor_officeAddress" type="text" class="form-control" value="{{$guarantor_data[0]->office_business_address}}">
            @if($errors->has('guarantor_officeAddress'))
              {{$errors->first('guarantor_officeAddress')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="guarantor_designation" type="text" class="form-control" value="{{$guarantor_data[0]->designation}}">
            @if($errors->has('guarantor_designation'))
              {{$errors->first('guarantor_designation')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="guarantor_nid" type="text" class="form-control" value="{{$guarantor_data[0]->nid}}">
            @if($errors->has('guarantor_nid'))
              {{$errors->first('guarantor_nid')}}
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Image</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="form-control-file border" name="guarantor_image" id="customFile" name="filename">
              <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
            </div>
          </div>
        </div>
        <!--2nd guarantor's Information-->
        @if($second_guarantor == null)
        @else
        <h3 class="text-center my-4">2nd Guarantor's Information</h3>
        <div class="form-group row">
          <label for="text1" class="col-3 col-form-label">Name</label> 
          <div class="col-9">
            <input id="text1" name="second_guarantor_name" type="text" class="form-control" value="{{!is_null($second_guarantor) ? $second_guarantor->name : ''}}">
            @if($errors->has('second_guarantor_name'))
              {{$errors->first('second_guarantor_name')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text2" class="col-3 col-form-label">Phone Number</label> 
          <div class="col-9">
            <input id="text2" name="second_guarantor_phone" type="text" class="form-control" value="{{!is_null($second_guarantor) ? $second_guarantor->phone_number : ''}}">
            @if($errors->has('second_guarantor_phone'))
              {{$errors->first('second_guarantor_phone')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text5" class="col-3 col-form-label">Present Address</label> 
          <div class="col-9">
            <input id="text5" name="second_guarantor_address" type="text" class="form-control" value="{{ !is_null($second_guarantor) ? $second_guarantor->present_address : ''}}">
            @if($errors->has('second_guarantor_address'))
              {{$errors->first('second_guarantor_address')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text3" class="col-3 col-form-label">Office/Business Name</label> 
          <div class="col-9">
            <input id="text3" name="second_guarantor_officeName" type="text" class="form-control" value="{{!is_null($second_guarantor) ? $second_guarantor->office_business_name : ''}}">
            @if($errors->has('second_guarantor_officeName'))
              {{$errors->first('second_guarantor_officeName')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text" class="col-3 col-form-label">Office/Business Address</label> 
          <div class="col-9">
            <input id="text" name="second_guarantor_officeAddress" type="text" class="form-control" value="{{!is_null($second_guarantor) ? $second_guarantor->office_business_address : ''}}">
            @if($errors->has('second_guarantor_officeAddress'))
              {{$errors->first('second_guarantor_officeAddress')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text6" class="col-3 col-form-label">Designation</label> 
          <div class="col-9">
            <input id="text6" name="second_guarantor_designation" type="text" class="form-control" value="{{!is_null($second_guarantor) ? $second_guarantor->designation : ''}}">
            @if($errors->has('second_guarantor_designation'))
              {{$errors->first('second_guarantor_designation')}}
            @endif
          </div>
        </div>
        <div class="form-group row">
          <label for="text4" class="col-3 col-form-label">NID</label> 
          <div class="col-9">
            <input id="text4" name="second_guarantor_nid" type="text" class="form-control" value="{{!is_null($second_guarantor) ? $second_guarantor->nid_number : ''}}">
            @if($errors->has('second_guarantor_nid'))
              {{$errors->first('second_guarantor_nid')}}
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Image</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="form-control-file border" name="second_guarantor_image" id="customFile" name="filename">
              <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
            </div>
          </div>
        </div>
        @endif
        
        <!--Attachemnts-->
        <h2 class="text-center mb-3">Attachments</h2>
        <div class="row">
          <div class="col-sm-3">LOI</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="form-control-file border" name="loi_files[]" id="customFile" name="filename" multiple>
              <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Bank Withdrawal Letter</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="form-control-file border" name="bank_withdrawal_files[]" id="customFile" name="filename" multiple>
              <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Rental Deed</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="form-control-file border" name="rental_deed_files[]" id="customFile" name="filename" multiple>
              <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
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