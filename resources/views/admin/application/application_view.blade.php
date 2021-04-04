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
    <h2 class="text-center mb-5">Application Information</h2>
    <h3 class="text-center mb-3">Apllicant's Information</h3>
    <table class="table table-bordered table-modify mx-3 mb-5">
  <thead>
    <tr class="text-center">
      <th scope="col" style="width:35%">Form</th>
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
  </tbody>
</table>
<!--For Guarantor-->
<h3 class="text-center mb-3">Guarantor's Information</h3>
    <table class="table table-bordered table-modify mx-3 mb-5">
  <thead>
    <tr class="text-center">
      <th scope="col" style="width:35%">Form</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Guarantor Name</td>
      <td>{{$guarantor_data->name}}</td>
    </tr>
    <tr>
      <td>Phone Number</td>
      <td>{{$guarantor_data->phone_number}}</td>
    </tr>
    <tr>
      <td>Present Address</td>
      <td>{{$guarantor_data->present_address}}</td>
    </tr>
    <tr>
      <td>Office/Business Name</td>
      <td>{{$guarantor_data->nid_address}}</td>
    </tr>
    <tr>
      <td>Office/Business Name</td>
      <td>{{$guarantor_data->office_business_name}}</td>
    </tr>
    <tr>
      <td>Office/Business Address</td>
      <td>{{$guarantor_data->office_business_address}}</td>
    </tr>
    <tr>
      <td>Designation</td>
      <td>{{$guarantor_data->designation}}</td>
    </tr>
    <tr>
      <td>NID Number</td>
      <td>{{$guarantor_data->nid}}</td>
    </tr>
  </tbody>
</table>
</div>
@endsection