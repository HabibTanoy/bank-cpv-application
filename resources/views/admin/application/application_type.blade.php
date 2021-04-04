@extends('admin.master')
@section('content')
<div>
<h3 class="text-center mt-5 pt-5">Application Type</h3> 
    <form action="{{route('store-type')}}" method="post">
    @csrf
        <div class="col-9 mt-5" style="margin-left:378px">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input name="city[]" id="checkbox_0" type="checkbox" class="custom-control-input" value="1"> 
                <label for="checkbox_0" class="custom-control-label">City Amex</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input name="city[]" id="checkbox_1" type="checkbox" class="custom-control-input" value="2"> 
                <label for="checkbox_1" class="custom-control-label">City Visa</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input name="city[]" id="checkbox_2" type="checkbox" class="custom-control-input" value="3"> 
                <label for="checkbox_2" class="custom-control-label">City Loan</label>
            </div>
        </div>  
        <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection