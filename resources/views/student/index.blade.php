<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   
    <title>student data</title>
</head>
<body>
<div class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger mt-2">
                @foreach ($errors->all() as $error)
                    <p class="pb-0 pt-0 mb-0">{{ $error }}</p>
                @endforeach
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block mt-2">
            <button type="button" class="close btn btn-danger" data-bs-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

<div class="modal fade" id="importmodal" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Products</h5>
                <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="import_product_modal" action="{{ route('student.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Upload File:</strong>
                                <input type="file" name="file" id="file" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
                @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </form>
        </div>
    </div>
</div>

<!-- // Create two button to trigger the actions -->
<div class="buttons mt-5">
<h3 class='d-flex justify-content-center'>Student Data importing Through CSV</h3>
<div class="d-flex justify-content-end">
    <a class="btn btn-primary" href="#" id="productimportbtn" style="margin-right:2%">Import Products</a>
    <a class="btn btn-primary ml-2" href="{{ route('student.export') }}" id="productexportbtn">Export Products</a>
</div>
<table class="table table-striped text-center mt-3">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>MiddleName</th>
        <th>Lastname</th>
        <th>State</th>
        <th>City</th>
        <th>Gender</th>
        <th>Photo Link</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{ $d->student_f_name}}</td>
                <td>{{ $d->student_m_name}}</td>
                <td>{{ $d->student_l_name}}</td>
                <td>{{ $d->student_state}}</td>
                <td>{{ $d->student_city}}</td>
                <td>{{ $d->gender}}</td>
                <td>{{ $d->profile_photo_link}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>

</div>
<script>
$('#productimportbtn').on('click', function() {
    $('#importmodal').modal('show');
});
</script>
</body>
</html>