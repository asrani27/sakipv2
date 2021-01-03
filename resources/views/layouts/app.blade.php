<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>E-SAKIP</title>
  <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @stack('css')
  @toastr_css
  
  <style>
      .content-wrapper {
          background-image: url('https://c0.wallpaperflare.com/preview/807/1021/167/chart-graph-business-finance.jpg'); 
          background-size: cover;
          background-repeat: no-repeat;
      }
      
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white bg-gradient-primary">
      
        <table>
            <tr>
                <td rowspan="2">
                    <img src="/assets/logo3.png" height="50px">
                </td>
                <td rowspan="2">
                    <span class="brand-text font-weight">PEMERINTAH KOTA BANJARMASIN</span><br />
                    <span class="brand-text font-weight">E-SAKIP</span>
                </td>
            </tr>
            <tr>
            </tr>
        </table>
        
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          
      </div>
      
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <br />

    <!-- Main content -->
    <div class="content">

      @yield('contents')
      
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer  bg-gradient-primary">
    <!-- To the right -->
    <div class="text-center font-weight">
        Development By Diskominfotik 2K20
    </div>
    
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/dist/js/adminlte.min.js"></script>
@stack('js')
@toastr_js
@toastr_render

</body>
</html>
