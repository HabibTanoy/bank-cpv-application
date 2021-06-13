@extends('admin.master')
@section('content')
<div>
<h2 class="text-center font-weight-bold py-3 text-uppercase mb-5">NID File Upload <hr class="hr-edit-nid"></h2>
<h3 class="text-center mb-3">Applicant's NID File Upload</h3>
<form action="{{route('nid-store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="row mx-5">
    <div class="col-sm-3">NID Front Side</div>
      <div class="col-sm-9">
      <div class="custom-file mb-3">
      <input type="file" class="form-control-file border" name="applicant_front_nid" id="customFile" name="filename">
{{--      <label class="" for="customFile">Choose file</label>--}}
      @if ($errors->has('applicant_front_nid'))
      {{ $errors->first('applicant_front_nid') }}
      @endif
      </div>
    </div>
  </div>
<!--End of applicant front nid-->
  <div class="row mx-5">
      <div class="col-sm-3">NID Back Side</div>
      <div class="col-sm-9">
        <div class="custom-file mb-3">
          <input type="file" class="custom-file-input" name="applicant_back_nid" id="customFile" name="filename">
          <label class="custom-file-label" for="customFile">Choose file</label>
          @if ($errors->has('applicant_back_nid'))
            {{ $errors->first('applicant_back_nid') }}
          @endif
        </div>
      </div>
    </div>
<!--End of applicant back nid-->
<div id="accordion">
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="text-decoration:none; font-size:1.7rem; color:#858796;">
              Co-Applicant's NID Upload
            </a>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse my-4" aria-labelledby="headingTwo" data-parent="#accordion">
        <!-- <h3 class="text-center my-3">2nd Guarantor's NID File Upload</h3> -->
      <div class="row mx-5">
        <div class="col-sm-3">NID Front Side</div>
          <div class="col-sm-9">
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" name="co_applicant_front_nid" id="customFile" name="filename">
            <label class="custom-file-label" for="customFile">Choose file</label>
            @if ($errors->has('co_applicant_front_nid'))
            {{ $errors->first('co_applicant_front_nid') }}
            @endif
          </div>
        </div>
      </div>
<!--End of co-applicant nid front-->
<div class="row mx-5">
      <div class="col-sm-3">NID Back Side</div>
      <div class="col-sm-9">
        <div class="custom-file mb-3">
          <input type="file" class="custom-file-input" name="co_applicant_back_nid" id="customFile" name="filename">
          <label class="custom-file-label" for="customFile">Choose file</label>
          @if ($errors->has('co_applicant_back_nid'))
            {{ $errors->first('co_applicant_back_nid') }}
          @endif
        </div>
      </div>
    </div>
        </div>
      </div>
    </div>

<!--End of co-applicant nid back-->

<h3 class="text-center my-3">1st Guarantor's NID File Upload</h3>
<div class="row mx-5">
  <div class="col-sm-3">NID Front Side</div>
    <div class="col-sm-9">
    <div class="custom-file mb-3">
      <input type="file" class="custom-file-input" name="guarantor_front_nid" id="customFile" name="filename">
      <label class="custom-file-label" for="customFile">Choose file</label>
      @if ($errors->has('guarantor_front_nid'))
      {{ $errors->first('guarantor_front_nid') }}
      @endif
    </div>
  </div>
</div>
<!--End of guarantor nid front-->
<div class="row mx-5">
      <div class="col-sm-3">NID Back Side</div>
      <div class="col-sm-9">
        <div class="custom-file mb-3">
          <input type="file" class="custom-file-input" name="guarantor_back_nid" id="customFile" name="filename">
          <label class="custom-file-label" for="customFile">Choose file</label>
          @if ($errors->has('guarantor_back_nid'))
            {{ $errors->first('guarantor_back_nid') }}
          @endif
        </div>
      </div>
    </div>
<!--End of guarantor nid back-->
<div id="accordion">
      <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0 text-center">
            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="text-decoration:none; font-size:1.7rem; color:#858796;">
              2nd Guarantor's NID Upload
            </a>
          </h5>
        </div>
        <div id="collapseThree" class="collapse my-4" aria-labelledby="headingThree" data-parent="#accordion">
        <!-- <h3 class="text-center my-3">2nd Guarantor's NID File Upload</h3> -->
      <div class="row mx-5">
        <div class="col-sm-3">NID Front Side</div>
          <div class="col-sm-9">
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" name="second_guarantor_front_nid" id="customFile" name="filename">
            <label class="custom-file-label" for="customFile">Choose file</label>
            @if ($errors->has('second_guarantor_front_nid'))
            {{ $errors->first('second_guarantor_front_nid') }}
            @endif
          </div>
        </div>
      </div>
<!--End of 2nd guarantor nid front-->
<div class="row mx-5">
      <div class="col-sm-3">NID Back Side</div>
      <div class="col-sm-9">
        <div class="custom-file mb-3">
          <input type="file" class="custom-file-input" name="second_guarantor_back_nid" id="customFile" name="filename">
          <label class="custom-file-label" for="customFile">Choose file</label>
          @if ($errors->has('second_guarantor_back_nid'))
            {{ $errors->first('second_guarantor_back_nid') }}
          @endif
        </div>
      </div>
    </div>
        </div>
      </div>
    </div>
    <!--End of 2nd guarantor nid back-->
    <div class="form-group mx-5 text-center mt-3">
          <div class="">
            <button name="submit" type="submit" class="btn btn-primary">File Upload</button>
          </div>
        </div>
        </form>
</div>
@endsection
