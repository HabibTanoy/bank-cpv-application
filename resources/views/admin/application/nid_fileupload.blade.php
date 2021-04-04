@extends('admin.master')
@section('content')
<div>
<div class="file_change">
    <h2 class="text-center font-weight-bold py-3 text-uppercase mb-5">NID File Upload</h2>
    <h3 class="text-center mb-3">Applicant NID File Upload</h3>
  <form action="{{route('nid-store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mx-5">
          <div class="col-sm-3">NID Front Side</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="applicant_front_nid" id="customFile" name="filename">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <!-- <div class="form-group mx-5">
          <div class="offset-3 col-9">
            <button name="submit" type="submit" class="btn btn-primary">File Upload</button>
          </div>
        </div> -->
        <div class="row mx-5">
          <div class="col-sm-3">NID Back Side</div>
          <div class="col-sm-9">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="applicant_back_nid" id="customFile" name="filename">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <h3 class="text-center mb-3">Guarantor NID File Upload</h3>
        <div class="row mx-5">
            <div class="col-sm-3">NID Front Side</div>
            <div class="col-sm-9">
              <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="guarantor_front_nid" id="customFile" name="filename">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
          </div>
        </div>
        <div class="row mx-5">
            <div class="col-sm-3">NID back Side</div>
            <div class="col-sm-9">
              <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="guarantor_back_nid" id="customFile" name="filename">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group mx-5 text-center">
          <div class="">
            <button name="submit" type="submit" class="btn btn-primary">File Upload</button>
          </div>
        </div>
      </form>
    </div>
  
</div>
@endsection