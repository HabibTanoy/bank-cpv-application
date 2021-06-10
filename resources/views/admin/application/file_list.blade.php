@extends('admin.master')
@section('content')
<div>
    <div class="ml-3">
        <a href="{{route('application-update', $application_files->id)}}" class="btn btn-primary">Back</a>
    </div>
<h3 class="text-center mt-3 mb-4">File List</h3>
        <table class="table table-bordered text-center">
        <thead>
            <tr>
            <th>File List</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($application_files->attachments as $attachFile)
        <tr>
            <td>
                <a href="{{url($attachFile->file_path)}}" target="_blank" style="text-decoration:none">
                    @if($attachFile->type == 1) 
                        Loi
                    @endif
                    @if($attachFile->type == 2)
                        Bank Withdrawal Letter
                        @endif
                    @if($attachFile->type == 3)
                    Rental Deed
                    @endif
                    - {{$attachFile->id}}
                </a>
             </td>
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
</div>
@endsection