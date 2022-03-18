
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cloth Management System</title>

    <!-- Bootstrap core CSS -->
<link href="{{url('/admin/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="{{url('/admin/css/sb-admin.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>

    <div id="wrapper">

      @include('admin.fixed.sideber')


      @include('admin.fixed.header')
 

     <div id="page-wrapper">
      @yield('content')
     </div>
       
    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="{{url('/admin/js/jquery-1.10.2.js')}}"></script>
    <script src="{{url('/admin/js/bootstrap.js')}}"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="{{url('/admin/js/chart-data-morris.js')}}"></script>
    <script src="{{url('/admin/js/jquery.tablesorter.js')}}"></script>
    <script src="{{url('/admin/js/tables.js')}}"></script>

  </body>
</html>
