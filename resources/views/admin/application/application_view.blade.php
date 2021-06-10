@extends('admin.master')
@section('content')
<div>
<div class="row mx-3">
        <div class="col-md-6">
        <a href="{{route('application-list')}}" type="submit" class="btn btn-primary">Back</a>
        </div>
        <div class="col-md-6 text-right">
        <!-- <a href="{{route('application-list')}}" type="submit" class="btn btn-primary">Show Files</a> -->
        </div>
    </div>
    <h2 class="text-center mb-5 pb-5 application-info">Application Information <hr class="hr-edit"></h2>
    
    <h3 class="text-center mb-5">Applicant's Information <hr class="applicant-edit"></h3>
    <div class="text-center mb-3">
      <img src="{{URL::asset($applicant_data->applicant_image)}}" width="21%" height="200px" alt="">
    </div>
    <table class="table table-bordered table-modify mx-3 mb-5">
  <thead>
    <tr class="text-center">
      <th scope="col" style="width:35%"></th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Applicant Name</td>
      <td>{{$applicant_data->name}}</td>
    </tr>
    <tr>
      <td>Phone Number</td>
      <td>{{$applicant_data->phone_number}}</td>
    </tr>
    <tr>
      <td>Present Address</td>
      <td>{{$applicant_data->present_address}}</td>
    </tr>
    <tr>
      <td>Office/Business Name</td>
      <td>{{$applicant_data->nid_address}}</td>
    </tr>
    <tr>
      <td>Office/Business Name</td>
      <td>{{$applicant_data->office_business_name}}</td>
    </tr>
    <tr>
      <td>Office/Business Address</td>
      <td>{{$applicant_data->office_business_address}}</td>
    </tr>
    <tr>
      <td>Designation</td>
      <td>{{$applicant_data->designation}}</td>
    </tr>
    <tr>
      <td>NID Number</td>
      <td>{{$applicant_data->nid}}</td>
    </tr>
    <tr>
      <td>Application Type</td>
      <td>@foreach($applicant_data->types as $app_type)
    <ul class="for-ul">
    @if($app_type->type == 1)
      <li>City Amex</li>
    @endif
    @if($app_type->type == 2) 
      <li>City Visa</li>
    @endif
    @if($app_type->type == 3) 
      <li>City Loan</li>
    @endif
    </ul>
    @endforeach
    </td>
    </tr>
    <tr>
    <td>File</td>
    <td style="padding: 0">
    
          <div style="display: flex; flex-direction: column">
            @foreach($app_attach as $attachment)
              <div style="border: 1px solid #e3e6f0; padding: 6px 0px 6px 10px;">
                <a style="" href="{{url($attachment->file_path)}}" target="_blank" style="text-decoration:none">
                      @if($attachment->type == 1) 
                          Loi
                      @endif
                      @if($attachment->type == 2)
                          Bank Withdrawal Letter
                          @endif
                      @if($attachment->type == 3)
                      Rental Deed
                      @endif
                      - {{$attachment->id}}
                  </a>
              </div>
            @endforeach
          </div>
            
           
          
        </table>
        
    </td>
    </tr>
  </tbody>
</table>
<!--End of applicant information-->
@if ($co_applicant_information == null)
@else
<h3 class="text-center mb-5">Co-Applicant's Information <hr class="co_applicant-edit"></h3>
<div class="text-center mb-3"> 
  <img src="{{URL::asset(!is_null($co_applicant_information)? $co_applicant_information->co_applicants_image : '')}}" width="21%" height="200px" alt="">
    </div>
    <table class="table table-bordered table-modify mx-3 mb-5">
  <thead>
    <tr class="text-center">
      <th scope="col" style="width:35%"></th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Guarantor Name</td>
      <td>{{(!is_null($co_applicant_information)? $co_applicant_information->name : '')}}</td>
    </tr>
    <tr>
      <td>Phone Number</td>
      <td>{{(!is_null($co_applicant_information)? $co_applicant_information->phone_number : '')}}</td>
    </tr>
    <tr>
      <td>Present Address</td>
      <td>{{(!is_null($co_applicant_information)? $co_applicant_information->present_address : '')}}</td>
    </tr>
    <tr>
      <td>Office/Business Name</td>
      <td>{{(!is_null($co_applicant_information)? $co_applicant_information->nid_address : '')}}</td>
    </tr>
    <tr>
      <td>Office/Business Name</td>
      <td>{{(!is_null($co_applicant_information)? $co_applicant_information->office_business_name : '')}}</td>
    </tr>
    <tr>
      <td>Office/Business Address</td>
      <td>{{(!is_null($co_applicant_information)? $co_applicant_information->office_business_address : '')}}</td>
    </tr>
    <tr>
      <td>Designation</td>
      <td>{{(!is_null($co_applicant_information)? $co_applicant_information->designation : '')}}</td>
    </tr>
    <tr>
      <td>NID Number</td>
      <td>{{(!is_null($co_applicant_information)? $co_applicant_information->nid_number : '')}}</td>
    </tr>
  </tbody>
</table>
  @endif
<!--Co-applicant information-->
<!--For Guarantor-->
<h3 class="text-center mb-5">1st Guarantor's Information <hr class="second-guarantor-edit"></h3>
    <div class="text-center mb-3">
      <img src="{{URL::asset(!is_null($guarantor_data) ? $guarantor_data->guarantor_image : '')}}" width="21%" height="200px" alt="">
    </div>
  <table class="table table-bordered table-modify mx-3 mb-5 text-left">
    <thead>
      <tr>
        <th scope="col" style="width:35%"></th>
        <th scope="col">Details</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Guarantor Name</td>
        <td>{{(!is_null($guarantor_data) ? $guarantor_data->name : '')}}</td>
      </tr>
      <tr>
        <td>Phone Number</td>
        <td>{{(!is_null($guarantor_data) ? $guarantor_data->phone_number : '')}}</td>
      </tr>
      <tr>
        <td>Present Address</td>
        <td>{{(!is_null($guarantor_data) ? $guarantor_data->present_address : '')}}</td>
      </tr>
      <tr>
        <td>Office/Business Name</td>
        <td>{{(!is_null($guarantor_data) ? $guarantor_data->nid_address : '')}}</td>
      </tr>
      <tr>
        <td>Office/Business Name</td>
        <td>{{(!is_null($guarantor_data) ? $guarantor_data->office_business_name : '')}}</td>
      </tr>
      <tr>
        <td>Office/Business Address</td>
        <td>{{(!is_null($guarantor_data) ? $guarantor_data->office_business_address : '')}}</td>
      </tr>
      <tr>
        <td>Designation</td>
        <td>{{(!is_null($guarantor_data) ? $guarantor_data->designation : '')}}</td>
      </tr>
      <tr>
        <td>NID Number</td>
        <td>{{(!is_null($guarantor_data) ? $guarantor_data->nid : '')}}</td>
      </tr>
    </tbody>
  </table>
<!--2nd guarantor-->
@if ($second_guarantor == null)
@else 
<h3 class="text-center mb-5">2nd Guarantor's Information <hr class="guarantor-edit"></h3>
<div class="text-center mb-3">
        <img src="{{URL::asset(!is_null($second_guarantor)? $second_guarantor->second_guarantors_image : '')}}" width="21%" height="200px" alt="">
      </div>
    <table class="table table-bordered table-modify mx-3 mb-5">
  <thead>
    <tr class="text-center">
      <th scope="col" style="width:35%"></th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Guarantor Name</td>
      <td>{{(!is_null($second_guarantor)? $second_guarantor->name : '')}}</td>
    </tr>
    <tr>
      <td>Phone Number</td>
      <td>{{(!is_null($second_guarantor)? $second_guarantor->phone_number : '')}}</td>
    </tr>
    <tr>
      <td>Present Address</td>
      <td>{{(!is_null($second_guarantor)? $second_guarantor->present_address : '')}}</td>
    </tr>
    <tr>
      <td>Office/Business Name</td>
      <td>{{(!is_null($second_guarantor)? $second_guarantor->nid_address : '')}}</td>
    </tr>
    <tr>
      <td>Office/Business Name</td>
      <td>{{(!is_null($second_guarantor)? $second_guarantor->office_business_name : '')}}</td>
    </tr>
    <tr>
      <td>Office/Business Address</td>
      <td>{{(!is_null($second_guarantor)? $second_guarantor->office_business_address : '')}}</td>
    </tr>
    <tr>
      <td>Designation</td>
      <td>{{(!is_null($second_guarantor)? $second_guarantor->designation : '')}}</td>
    </tr>
    <tr>
      <td>NID Number</td>
      <td>{{(!is_null($second_guarantor)? $second_guarantor->nid_number : '')}}</td>
    </tr>
  </tbody>
</table>
@endif
</div>
@endsection