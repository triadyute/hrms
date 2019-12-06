<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link href='{{asset('/fullcalendar/core/main.css')}}' rel='stylesheet' />
    <link href='{{asset('/fullcalendar/daygrid/main.css')}}' rel='stylesheet' />
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/dist/css/adminlte.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--Calendar-->
    <link href="{{asset('/fullcalendar/core/main.css')}}" rel='stylesheet' />
    <link href="{{asset('fullcalendar/daygrid/main.css')}}" rel='stylesheet' />
    <!--Tags input-->
    <link rel="stylesheet" href="{{asset('/bootstrap-tagsinput-master/dist/bootstrap-tagsinput.css')}}">
    <link href="{{asset('/css/typehead.css')}}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app">


        @if (Auth::user()->hasAdminRole())
        @include('inc.admin-navbar')
        @include('inc.admin-sidebar')
        @else
        @include('inc.staff-navbar')
        @include('inc.staff-sidebar')
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('inc.dashboard-header')

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('inc.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <!--Input mask-->
    <script src="{{asset('/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{ asset('/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/dist/js/demo.js')}}"></script>
    <script src="../dist/js/demo.js"></script>
    <!--Algolia places-->
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.17.1"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src='{{asset('/fullcalendar/core/main.js')}}'></script>
    <script src='{{asset('/fullcalendar/daygrid/main.js')}}'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid']
            });

            calendar.render();
        });
    </script>

    <script src="{{asset('/js/typehead.js')}}"></script>
    <script src="{{asset('/bootstrap-tagsinput-master/dist/bootstrap-tagsinput.js')}}"></script>
    @yield('scripts')
</body>

</html>