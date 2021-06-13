<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>NID File Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
      .file_change {
        margin-top:30px;
      }
      hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>
  <body>
    <div class="file_change">
    <h2 class="text-center font-weight-bold py-3 text-uppercase mb-5">NID File Upload <hr class="hr-edit"></h2>
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

  </body>
</html>
