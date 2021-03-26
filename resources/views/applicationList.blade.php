<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<h2 class="text-center my-3">Application List</h2>
<table class="table table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone number</th>
      <th scope="col">Address</th>
      <th>Office/Business Name</th>
      <th>Office/Business Address</th>
      <th>Designation</th>
      <th>NID</th>
      <th>Application Type</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($info as $fetchData)
  <tr>
    <td>{{$fetchData->name}}</td>
    <td>{{$fetchData->phone_number}}</td>
    <td>{{$fetchData->present_address}}</td>
    <td>{{$fetchData->office_business_name}}</td>
    <td>{{$fetchData->office_business_address}}</td>
    <td>{{$fetchData->designation}}</td>
    <td>{{$fetchData->nid}}</td>
    <td>
    @if($fetchData->type == 1) 
     City Amex
    @endif
    @if($fetchData->type == 2)
      City Visa  
    @endif
    @if($fetchData->type == 3)
      City Loan
    @endif</td>
    <td>
    <div class="row" style="display: -webkit-box">
        <div class="col-sm">
            <a href="{{route('application-update', $fetchData->id)}}" type="submit" class="btn btn-primary">Edit</a>
        </div>
        |
        <div class="col-sm">
            <form action="{{route('application-delete', $fetchData->id)}}" method='post'>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    <div>
    </td>
  </tr>
  @endforeach
  </tbody>
  </table>
</body>