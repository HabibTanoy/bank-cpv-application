@extends('admin.master')
@section('content')
    <div>
      <div class="mr-3" style="text-align:end">
        <a href="{{route('type-show')}}" type="submit" class="btn btn-primary">Create Application</a>
      </div>
    <h2 class="text-center my-3 mb-4">Application List</h2>
<table class="table table-bordered text-center table-edit mx-2">
  <thead >
    <tr>
      <th scope="col">Application No</th>
      <th scope="col">Name</th>
      <th scope="col">Phone number</th>
      <th scope="col">Address</th>
      <th scope="col">Office/Business Name</th>
      <th scope="col">Office/Business Address</th>
      <th scope="col">Designation</th>
      <th scope="col">NID No</th>
      <td scope="col" style="font-weight:700">Application Type</td>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($application_list_data as $application_list)
  <tr>
    <td scope="row">{{$application_list->application_id}}</td>
    <td style="width:18%">{{$application_list->name}}</td>
    <td>{{$application_list->phone_number}}</td>
    <td>{{$application_list->present_address}}</td>
    <td>{{$application_list->office_business_name}}</td>
    <td>{{$application_list->office_business_address}}</td>
    <td>{{$application_list->designation}}</td>
    <td style="width:11%">{{$application_list->nid}}</td>
    <td style="width:9%">@foreach($application_list->types as $app_type)
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
    <td style="width:28%">
    <div class="row demo">
    <div class="col-md-3">
            <a href="{{route('application-show', $application_list->id)}}" type="submit" class="btn btn-primary"><i class="fas fa-eye"></i></a>
        </div>
        <div class="col-md-3">
            <a href="{{route('application-update', $application_list->id)}}" type="submit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
        </div>
        <div class="col-md-3">
          <form action="{{route('application-delete', $application_list->id)}}" method='post'>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
          </form>
        </div>
        <div class="col-md-3">
        <a href="{{route('pdf-download', $application_list->id)}}" class="btn btn-primary"><i class="fa fa-download"></i></a>
        </div>
    <div>
    </td>
  </tr>
  </tbody>
  @endforeach
  </table>
    </div>
@endsection