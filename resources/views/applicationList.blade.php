<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<style>
  .table td {
    vertical-align: inherit;
  }
  .table thead th {
    vertical-align: inherit;
  }
  .table td, .table th {
    padding: 0.1rem;
  }
  .font_modify {
    font-size:14px;
  }
  .demo {
    margin-left:10px;
    margin-right: 20px;
  }
  ul {
    margin-bottom:0.3rem;
    margin-left: -34px;
  }
  li {
    list-style-type: none;
  }
</style>
<body>
<h2 class="text-center my-3 mb-4">Application List</h2>
<table class="table table-bordered text-center">
  <thead class="font_modify">
    <tr>
      <th scope="col">Application No</th>
      <th scope="col">Name</th>
      <th scope="col">Phone number</th>
      <th scope="col">Address</th>
      <th scope="col">Office/Business Name</th>
      <th scope="col">Office/Business Address</th>
      <th scope="col">Designation</th>
      <th scope="col">NID No</th>
      <td scope="col">Application Type</td>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($application_list_data as $application_list)
  <tr>
    <td scope="row">{{$application_list->application_id}}</td>
    <td style="width:15%">{{$application_list->name}}</td>
    <td>{{$application_list->phone_number}}</td>
    <td>{{$application_list->present_address}}</td>
    <td>{{$application_list->office_business_name}}</td>
    <td>{{$application_list->office_business_address}}</td>
    <td>{{$application_list->designation}}</td>
    <td style="width:11%">{{$application_list->nid}}</td>
    <td>@foreach($application_list->types as $app_type)
    <ul>
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
    @endforeach</td>
    <td style="width:14%">
    <div class="row demo">
        <div class="col-md-4">
            <a href="{{route('application-update', $application_list->id)}}" type="submit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
        </div>
        <div class="col-md-4">
          <form action="{{route('application-delete', $application_list->id)}}" method='post'>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
          </form>
        </div>
        <div class="col-md-4">
        <a href="{{route('pdf-download', $application_list->id)}}" class="btn btn-primary"><i class="fa fa-download"></i></a>
        </div>
    <div>
    </td>
  </tr>
  </tbody>
  @endforeach
  </table>
  <div class="text-center">
  <a href="{{route('welcome-page')}}" type="submit" class="btn btn-primary">Create Application</a>
  </div>
</body>