@include('layouts.header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
@include('layouts.admin-sidebar')

  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
@yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('layouts.footer')