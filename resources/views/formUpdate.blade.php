<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Form Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <h2 class="text-center font-weight-bold py-3 text-uppercase">Application Upadte</h2>
  <div class="d-flex justify-content-center" style="margin: 0 auto;">
    <form action="" class="w-75" method="POST" enctype="multipart/form-data">
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
            <input id="text2" name="phone" type="text" class="form-control" value="{{$application->phone_number}}">
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
              <input id="checkbox_0" type="radio" name="city" class="form-check-input" value="1" {{ $application->type == 1 ? "checked" : "" }}> 
              <label for="checkbox_0" class="">City Amex</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input id="checkbox_1" type="radio" name="city" class="form-check-input" value="2" {{ $application->type == 2 ? "checked" : "" }}> 
              <label for="checkbox_1" class="">City Visa</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input id="checkbox_2" type="radio" name="city" class="form-check-input" value="3" {{ $application->type == 3 ? "checked" : "" }}> 
              <label for="checkbox_2" class="">City Loan</label>
            </div>
          </div>
        </div>
        <!-- <div class="form-group row attachment-section">
          <label class="col-3">Attachments</label> 
          <div class="col-9">
            <div class="custom-control custom-checkbox custom-control-inline">
              <input id="checkbox1_0" type="radio" name="type" class="form-check-input file" value="1" {{ $application->attachments[0]->type == 1 ? "checked" : "" }}> 
              <label for="checkbox1_0" class="">LOI</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input id="checkbox1_1" type="radio" name="type" class="form-check-input file" value="2" {{ $application->attachments[0]->type == 2 ? "checked" : "" }}> 
              <label for="checkbox1_1" class="">Bank Withdrawal Letter</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <input id="checkbox1_2" type="radio" name="type" class="form-check-input file" value="3" {{ $application->attachments[0]->type == 3 ? "checked" : "" }}> 
              <label for="checkbox1_2" class="">Rental Deed</label>
            </div>
          </div>
        </div>  -->
        <h2 class="text-center">Attachments</h2>
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
        
        <!-- <div class="custom-file mb-3">
        <input type="file" class="custom-file-input" name="files[]" id="customFile" name="filename" multiple>
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div> -->
        <div class="form-group row">
          <div class="offset-3 col-9">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </form>
  </div>
  <!--file list-->
  <h3 class="text-center">File List</h3>
        <table class="table table-bordered text-center">
        <thead>
            <tr>
            <th scope="col">File</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($application->attachments as $attachFile)
        <tr>
            <td>
            @if($attachFile->type == 1) 
                Loi
            @endif
            @if($attachFile->type == 2)
                Bank Withdrawal Letter
                @endif
            @if($attachFile->type == 3)
            Rental Deed
            @endif
             - {{$attachFile->id}}</td>
            <td>
                <form action='{{route("upload-file-delete", $attachFile->id)}}' method='post'>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
  </body>
</html>
