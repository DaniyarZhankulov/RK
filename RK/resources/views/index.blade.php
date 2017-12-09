<html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="http://localhost/RK/resources/assets/css/theme.css" type="text/css">
  <style>
    .pagination {
      display: flex;
      padding-left: 0;
      list-style: none;
      border-radius: 0.25rem; }

    .li:first-child a {
      margin-left: 0;
      border-top-left-radius: 0.25rem;
      border-bottom-left-radius: 0.25rem; }

    .li:last-child a {
      border-top-right-radius: 0.25rem;
      border-bottom-right-radius: 0.25rem; }

    .pagination a, .pagination .active, .pagination span {
      position: relative;
      display: block;
      padding: 0.5rem 0.75rem;
      margin-left: -1px;
      line-height: 1.25;
      color: #007bff;
      background-color: #fff;
      border: 1px solid #ddd; }

    .pagination a:focus, .pagination a:hover {
        color: #0056b3;
        text-decoration: none;
        background-color: #e9ecef;
        border-color: #ddd; }

  </style>
  <title>Employees</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
    <div class="container"><div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-tabs">
          <li class="nav-item text-white">
            <a class="nav-link" href="http://localhost/RK/public/">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/RK/public/1">Marketing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/RK/public/2">Finance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/RK/public/3">HR</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/RK/public/4">Production</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/RK/public/5">Development</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/RK/public/6">QM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/RK/public/7">Sales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/RK/public/8">Research</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/RK/public/9">Customer Service</a>
          </li>
        </ul>

        <form class="form-inline m-0" method="POST" action="http://localhost/RK/public/search" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input class="form-control mr-2" type="text" name="search" placeholder="Enter a name">
          <button class="btn btn-primary" type="submit">Search</button>
        </form>

      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Hire Date</th>
                <th>Manager</th>
                <th>Salary</th>
                <th>Title</th>
                <th>Department</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
                <tr>
                  <td>{{ $employee->emp_no }}</td>
                  <td>{{ $employee->first_name }}</td>
                  <td>{{ $employee->last_name }}</td>
                  <td>{{ $employee->gender }}</td>
                  <td>{{ $employee->hire_date }}</td>
                  <td>{{ $employee->dept_no }}</td>
                  <td>{{ $employee->salary }}</td>
                  <td>{{ $employee->title }}</td>
                  <td>{{ $employee->dept_name }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $employees->links() }}
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


</body></html>