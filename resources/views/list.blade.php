<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('fontawesome-free/css/all.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte.css')}}">

 <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('menu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><button class="btn btn-primary" data-toggle="modal" data-target="#newModel">Add New</button></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employees</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Department</th>
                      <th>Label</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($employees as $employee)
                   <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>

                    </td>
                    <td>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                  </tr>

                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>


<div class="modal" id="newModel"
    save-action="{{route('save')}}" 
    fetch-designation="{{route('fetch.designation')}}"
    token="{{ csrf_token()}}"
    tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Name:</label>
                  <input type="text" name="name" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Gender:</label>
                   <select name="gender" class="form-control">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Others</option>
                   </select>
                  </div>

                <div class="form-group">
                  <label for="message-text" class="col-form-label">Date of Birth:</label>
                  <input type="text" class="form-control datepicker" name="dob"></input>
                </div>

                <div class="form-group">
                    <label for="message-text" class="col-form-label">Address:</label>
                    <textarea class="form-control" name="address" id="message-text"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Mobile:</label>
                    <input type="integer" name="mobile" class="form-control" id="recipient-name">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email:</label>
                    <input type="text" name="email" class="form-control" id="recipient-name">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Departments:</label>
                   <select name="department_id" class="form-control">
                    <option value="">Select an Option</option>

                    @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>

                    @endforeach
                   </select>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Designation:</label>
                   <select name="designation_id" class="form-control">
                   </select>
                  </div>

                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Date of Joining:</label>
                    <input type="text" class="form-control datepicker" name="doj">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                  </div>

              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary saveEmployee">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('jquery/jquery.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte.js')}}"></script>
<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>


<script src="{{asset('main.js')}}"></script>




</body>
</html>
