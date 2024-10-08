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
                      <th>Designation</th>
                    </tr>
                  </thead>
                  <tbody class="render">
                   @foreach ($employees as $employee)
                   <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->mobile }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->designation->name }} ({{ $employee->designation->department->name }})</td>
                    <td>
                        <button class="btn btn-primary editRow" data-toggle="modal" data-target="#newModel" each-id="{{encrypt($employee->id)}}">Edit</button>
                    <td>
                        <button class="btn btn-danger deleteRow" each-id="{{encrypt($employee->id)}}">Delete</button>
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
    fetch-designation="{{route('fetch_designation')}}"
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
            <form>
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
                    <input type="integer" name="mobile" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email:</label>
                    <input type="email" name="email" class="form-control">
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


<script>
 $( function() {
       $(".datepicker").datepicker();

       $(".saveEmployee").click(function(){
           var name = $('input[name=name]').val();
           var gender = $('select[name=gender]').val();
           var dob = $('input[name=dob]').val();
           var address = $('textarea[name=address]').val();
           var mobile = $('input[name=mobile]').val();
           var email = $('input[name=email]').val();
           var departmentId = $('select[name=department_id]').val();
           var designationId = $('select[name=designation_id]').val();
           var doj = $('input[name=doj]').val();
           var image = $('input[name=image]').val();

           $.ajax({
            type:'POST',
            url:'/save',
            dataType:"json",
            data:{
                "_token": "{{ csrf_token() }}",
                'name':name,
                'gender':gender,
                'dob':dob,
                'address':address,
                'mobile':mobile,
                'email':email,
                'department_id':departmentId,
                'designation_id':designationId,
                'doj':doj,
                'image':image,
            },
            success:function(response){
                if (response.status ==200) {
                    renderTable(response.data);
                    $('#newModel').modal('hide');
                }
            },
            error:function(error){
                console.log(error);
            }
           });
       });


       $(".editRow").click(function(){
    var id = $(this).attr('each-id');
    console.log("ID being sent: ", id);

    $.ajax({
        type: 'GET',
        url: '/edit',
        dataType: "json",
        data: {
            "_token": "{{ csrf_token() }}",
            'id': id,
        },
        success: function(response) {
            if(response.status == 'success') {
                // Populate input fields with the response data
                $('#recipient-name').val(response.data.name); // Assuming 'name' field
                $('select[name=gender]').val(response.data.gender); // Gender dropdown
                $('input[name=dob]').val(response.data.dob); // Date of birth
                $('textarea[name=address]').val(response.data.address); // Address
                $('input[name=mobile]').val(response.data.mobile); // Mobile
                $('input[name=email]').val(response.data.email); // Email
                $('select[name=department_id]').val(response.data.department_id); // Department dropdown
                $('select[name=designation_id]').val(response.data.designation_id); // Designation dropdown
                $('input[name=doj]').val(response.data.doj); // Date of joining

                $('#newModel').modal('show');
            } else {
                alert(response.message);
            }
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});


$(".saveEmployee").click(function(){
    var employeeId = $('#employee-id').val();
    var name = $('input[name=name]').val();
    var gender = $('select[name=gender]').val();
    var dob = $('input[name=dob]').val();
    var address = $('textarea[name=address]').val();
    var mobile = $('input[name=mobile]').val();
    var email = $('input[name=email]').val();
    var departmentId = $('select[name=department_id]').val();
    var designationId = $('select[name=designation_id]').val();
    var doj = $('input[name=doj]').val();
    var image = $('input[name=image]').val();

    var url = employeeId ? '/update' : '/save';
    var method = employeeId ? 'POST' : 'POST';

    $.ajax({
        type: method,
        url: url,
        dataType: "json",
        data: {
            "_token": "{{ csrf_token() }}",
            'id': employeeId,
            'name': name,
            'gender': gender,
            'dob': dob,
            'address': address,
            'mobile': mobile,
            'email': email,
            'department_id': departmentId,
            'designation_id': designationId,
            'doj': doj,
            'image': image,
        },
        success: function(response){
            if (response.status == 200) {
                renderTable(response.data);
                $('#newModel').modal('hide');
                $('#employee-id').val('');
            }
        },
        error:function(error){
            console.log(error);
        }
    });
});



       $(".deleteRow").click(function(){
        var id = $(this).attr('each-id');
             $.ajax({
                        type:'POST',
                        url:'/delete',
                        dataType:"json",
                        data:{
                          "_token": "{{ csrf_token() }}",
                            'id': id,
                        },
                        success:function(response){
                            renderTable(response.data);
                        }
                    });
       });


                function renderTable(rows){
                    var tableRows= ``;
                            for (let i = 0; i < rows.length; i++) {
                                var element = rows[i];
                               tableRows+=` <tr>
                                <td>` + (i + 1) + `</td>
                                <td>`+element.name+`</td>
                                <td>`+element.mobile+`</td>
                                <td>`+element.email+`</td>
                                <td>`+element.designation.name+` (`+element.designation.department.name+`)</td>
                                <td>
                                    <button class="btn btn-primary editRow" each-id="`+element.id+`">
                                        Edit</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger deleteRow" each-id="`+element.id+`">
                                        Delete</button>
                                </td>
                                </tr>`;
                            }
                            $('.render').html(tableRows);
                 }



       $("select[name=department_id]").change(function(){
        var departmentId = $(this).val();
            if(departmentId != "")
                {
                    $.ajax({
                        type:'POST',
                        url:'/fetch_designation',
                        dataType:"json",
                        data:{
                            "_token": "{{ csrf_token() }}",
                            'department_id':departmentId,
                        },
                        success:function(response){
                           var optionHTML=``;
                           for (let i = 0; i < response.data.length; i++) {
                            const element = response.data[i];
                            optionHTML+=`<option value='`+element.id+`'>`+element.name+`</option>`;
                           }
                        $("select[name=designation_id]").html(optionHTML);

                        },

                        error:function(error){
                            console.log(error);
                        }
                    });

                }
       });



    } );

</script>




</body>
</html>
