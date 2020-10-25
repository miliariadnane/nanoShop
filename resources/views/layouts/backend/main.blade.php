<?php
/*$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;*/
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('layouts.backend.head')
  </head>
  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      @include('layouts.backend.sidebar')
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          @include('layouts.backend.navbar')
          <!-- Begin Page Content -->
          <div class="container-fluid">
            @yield('content')
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        @include('layouts.backend.footer')
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    @include('layouts.backend.js')
    
  </body>
</html>
</div>
</div>
</body>
</html>

<?php
/*$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Page generated in '.$total_time.' seconds.';*/
?>