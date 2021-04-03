<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Application Type</title>
</head>
<body>
    <h3 class="text-center mt-5 pt-5">Application Type</h3> 
    <form action="{{route('store-type')}}" method="post">
    @csrf
        <div class="col-9 mt-5" style="margin-left:480px">
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
</body>
</html>