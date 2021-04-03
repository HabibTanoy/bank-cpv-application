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
                                  <h1 class="h4 text-gray-900 mb-4">Register User / Company</h1>
                            </div>
                            <form action="" method="POST">
                                             {{csrf_field()}}

                                    <div class="col-sm-12 mb-3">
                                        <input type="text" class="form-control" id="exampleFirstName" name="name"
                                               placeholder="User / Company Name">
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <input type="text" class="form-control" id="exampleFirstName" name="email"
                                               placeholder="Email">
                                    </div>
                                <div class="col-sm-12 mb-3">
                                    <input type="text" class="form-control" id="exampleFirstName" name="phone"
                                           placeholder="Phone Number">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <input type="password" class="form-control" id="exampleFirstName" name="password"
                                           placeholder="Password">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <input type="password" class="form-control" id="exampleFirstName"
                                           placeholder="Confirm Password">
                                </div>
                                <input type="hidden" id="custId" name="userType" value="2">
                                <!-- <div class="col-sm-12 mb-3">
                                    <select name="company_id" id="" class="form-control">
                                        <option value="-1">New Company</option>
                                       
                                    </select>
                                </div> -->
                                <div class="col-sm-12 mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Register Account
                                    </button>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
