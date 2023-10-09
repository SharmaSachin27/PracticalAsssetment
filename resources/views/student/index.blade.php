<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-dark">
<!-- Links -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="text-light" href="/"></a>
  </li>
</ul>
</nav>
    <div class="container" >
        <div class="text-right">
            <a href="student/create" class="btn btn-dark mt-2 ">Add Student</a>
        </div>
    <table class="table table-hover mt-3">
    <thead>
      <tr>
        <th>Sr No.</th>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $student->name }}</td>
        <td>
            <image src="students/{{ $student->image }}"  class="rounded-circle" width="50px" height="50px" />
        </td>
        <td>
            <a href="student/{{ $student->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
            <a href="student/{{ $student->id }}/destroy" class="btn btn-danger btn-sm">soft Delete</a>
            <a href="student/{{ $student->id }}/delete" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
      @endforeach 
    </tbody>
  </table>
    </div>
</body>
</html>