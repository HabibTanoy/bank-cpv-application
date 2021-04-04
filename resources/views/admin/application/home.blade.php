@extends('admin.master')
@section('content')
<div>
    <h1 class="text-center mt-5 pt-5">Welcome To CBL Trace</h1>
    <div class="text-center" style="margin-top:150px;">
        <a href="{{route('type-show')}}" type="button" style="font-size:18px" class="btn btn-primary">Create Application</a>
    </div>
</div>
@endsection