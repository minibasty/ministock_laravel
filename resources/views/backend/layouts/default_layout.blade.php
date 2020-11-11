<!DOCTYPE html>
<html>
@include('backend.includes.head_style')

<head>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Navbar -->
    @include('backend.includes.navbar')

    <!-- Main Sidebar Container -->
    @include('backend.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('backend.includes.footer')
    <!-- ./footer -->

  </div>
  <!-- ./wrapper -->

  @include('backend.includes.foot_script')
</body>

</html>