<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    QR code generator | Sheikhoo Steel
  </title>

<style type="text/css">
  @media print {
   .noprint {
      visibility: hidden;
   }
  }

  .nav-item{
    padding-top: 20px;
  }
</style>


<link rel="icon" type="image/png" href="{{ asset('images/icon-logo.png') }}">


<link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

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
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('images/icon-logo.png') }}" style=""  class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Sheikhoo Steel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              



          <li class="nav-item">
            <a href="{{ url('home') }}" class="nav-link">
              <i class="nav-icon fas fa-qrcode"></i><p> QR Codes</p> 
              <!-- show new 100 or 200 qr codes -->
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('qr/generate') }}" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i><p> Generate New QR</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('qr/previous') }}" class="nav-link">
              <i class="nav-icon fas fa-history"></i><p> All Previous QR Codes</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('customer/view') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i><p> All Customers</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('customer/create') }}" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i><p> Add New Customer</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('users') }}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i><p> Settings</p>
              <!-- this is admin user settings, password change, name edit....etc -->
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('customer') }}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i><p> QR Configuration</p>
              <!-- qr image size and other settings related to qr -->
            </a>
          </li>



          <li class="nav-item">
            <a href="{{ route('logout') }}"
                                       onclick='event.preventDefault();
                                                     document.getElementById("logout-form").submit();' class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
            </form>
            
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
@yield('content')


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Main Footer -->
  <footer class="main-footer noprint">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <!-- Anything you want -->
    </div>
    <!-- Default to the left -->
    All rights reserved to <strong><a href="http://sheikhoosteel.com">sheikhoosteel.com </a></strong> 
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>



<script type="text/javascript">
  $(document).ready(function(){
  setTimeout(function(){
    $('.alert').hide(400);
  }, 700);

$(function () {
    $('.datatables').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": false,
    });
  });

});
</script>
@yield('scripts')

</body>
</html>








