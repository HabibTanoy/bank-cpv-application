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
<h3 class="text-center mt-3 mb-4">File List</h3>
        <table class="table table-bordered text-center">
        <thead>
            <tr>
            <th>File List</th>
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
        <div class="text-center">
        <a href="{{route('application-update', $application->id)}}" class="btn btn-primary">Previous</a>
        </div>
</body>
</html>