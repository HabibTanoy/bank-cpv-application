@extends('.admin.master')
@section('title','Registration')
@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register A User</h1>
                            </div>
                            <form action="{{route('register.existing.user.post')}}" method="POST">
                                {{csrf_field()}}
                                <div class="col-sm-12 mb-3">
                                    <input type="text" class="form-control" id="exampleFirstName"
                                           name="email"
                                           placeholder="User Email">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <select name="company_id" id="" class="form-control">
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Register Account
                                    </button>
                                </div>
                            </form>
                            @if($errors->any())
                                <small class="text-danger">{{$errors->first()}}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
