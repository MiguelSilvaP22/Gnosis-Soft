<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrador</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!--Date Picker-->
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!--Time Picker-->
  <link rel="stylesheet" href="/adminlte/plugins/timepicker/bootstrap-timepicker.min.css">
  <!--Select2-->
  <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
  <!--FullCalendar-->
  <link rel="stylesheet" href="/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="/adminlte/bower_components/fullcalendar/dist/fullcalendar.print.min.css"  media="print">
  <!--DataTable-->
  <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!--iCheck-->
  <link rel="stylesheet" href="/adminlte/plugins/iCheck/all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/css/AdminLTE.min.css">
  
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="/adminlte/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Gnosis</b>Soft</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

        {{--
          
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="/adminlte/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->
       
          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>


          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>

          --}}
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              @if(session()->exists('Usuario') && session('Usuario')->id_perfil==1)  
                <img src="/adminlte/img/usuarioAdm.jpg" class="user-image" alt="User Image">
              @elseif(session()->exists('Usuario') && session('Usuario')->id_perfil==2)
               <img src="/adminlte/img/usuarioColab.jpg" class="user-image" alt="User Image">
              @elseif(session()->exists('Usuario') && session('Usuario')->id_perfil==3)
               <img src="/adminlte/img/usuarioEmpre.jpg" class="user-image" alt="User Image">
              @elseif(session()->exists('Usuario') && session('Usuario')->id_perfil==4)
                <img src="/adminlte/img/usuarioFaci.png" class="user-image" alt="User Image">
              @endif
              
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              @if(session()->exists('Usuario'))            
                <span class="hidden-xs">{{session('Usuario')->nombre_usuario}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
              @if(session()->exists('Usuario') && session('Usuario')->id_perfil==1)  
                <img src="/adminlte/img/usuarioAdm.jpg" class="img-circle" alt="User Image">
              @elseif(session()->exists('Usuario') && session('Usuario')->id_perfil==2)
                <img src="/adminlte/img/usuarioColab.jpg" class="img-circle" alt="User Image">
              @elseif(session()->exists('Usuario') && session('Usuario')->id_perfil==3)
                <img src="/adminlte/img/usuarioEmpre.jpg"class="img-circle" alt="User Image">
              @elseif(session()->exists('Usuario') && session('Usuario')->id_perfil==4)
                <img src="/adminlte/img/usuarioFaci.png" class="img-circle" alt="User Image">
              @endif
                <p>

                {{session('Usuario')->nombre_usuario}} - {{session('Usuario')->perfil->nombre_perfil}}
                @if(session('Usuario')->id_perfilocu != null)
                  <small>{{session('Usuario')->perfilocupacional->nombre_perfilocu}}</small>
                @endif
                  
                </p>
              </li>
              <!-- Menu Body -->
             {{-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>--}}
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          @endif
          <!-- Control Sidebar Toggle Button -->
          {{-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>--}}
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
               @if(session()->exists('Usuario') && session('Usuario')->id_perfil==1)  
                <img src="/adminlte/img/usuarioAdm.jpg" class="img-circle" alt="User Image">
              @elseif(session()->exists('Usuario') && session('Usuario')->id_perfil==2)
                <img src="/adminlte/img/usuarioColab.jpg" class="img-circle" alt="User Image">
              @elseif(session()->exists('Usuario') && session('Usuario')->id_perfil==3)
                <img src="/adminlte/img/usuarioEmpre.jpg"class="img-circle" alt="User Image">
              @elseif(session()->exists('Usuario') && session('Usuario')->id_perfil==4)
                <img src="/adminlte/img/usuarioFaci.png" class="img-circle" alt="User Image">
              @endif
        </div>
        <div class="pull-left info">
          @if(session()->exists('Usuario'))            
            <span class="hidden-xs">{{session('Usuario')->nombre_usuario}}</span><br/>
            <span class="hidden-xs">{{session('Usuario')->run_usuario}}</span>
          @endif
          <!-- Status -->
        
        </div>
      </div>
      {{--
      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->
      --}}
      @if(session()->exists('Usuario'))
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">GnosisSoft</li>
        <!-- Optionally, you can add icons to the links -->
        @if(session('Usuario')->id_perfil==1 || session('Usuario')->id_perfil==3)
        <li><a href="/admin"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        @endif
        @if(session('Usuario')->id_perfil==1 )
        <li class="treeview">
        <a href="#"><i class="fa fa-folder-o"></i> <span>Mantenedores</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
        <ul class="treeview-menu">  
        {{--<li class="treeview">
            <a href="#"><i class="fa fa-group"></i> <span>Usuarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/usuario"><i class="fa fa-user-secret"></i> <span>Usuarios</span></a></li>
              <li><a href="/perfil"><i class="fa fa-user-secret"></i> <span>Perfiles</span></a></li>
            </ul>
          </li>--}}
          <li><a href="/usuario"><i class="fa fa-user-secret"></i> <span>Usuarios</span></a></li>
          <li><a href="/colaborador"><i class="fa fa-user"></i> <span>Colaboradores</span></a></li>
          <li><a href="/empresa"><i class="fa fa-building"></i> <span>Empresas</span></a></li>
          <li><a href="/curso"><i class="fa fa-graduation-cap"></i> <span>Cursos</span></a></li>
          <li><a href="/actividad"><i class="fa fa-book"></i> <span>Actividad</span></a></li>
          <li><a href="/competencia"><i class="fa fa-th-list"></i> <span>Competencias</span></a></li>
          <li><a href="/encuesta"><i class="fa fa-paper-plane"></i> <span>Encuesta</span></a></li>
          </ul>
        </li>
        @endif
        @if(session('Usuario')->id_perfil==1 || session('Usuario')->id_perfil==3)
        <li class="treeview">
        <a href="#"><i class="fa fa-sitemap"></i> <span>Empresa</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
        <ul class="treeview-menu">  
          <li class="treeview">
          <li><a href="/vistaEmpresa"><i class="fa fa-pie-chart"></i> <span>Dashboard</span></a></li>
          <li><a href="/vistaColaborador"><i class="fa fa-user"></i> <span>Colaboradores</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-mortar-board"></i> <span>Curso</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/verEstadoCurso"><i class="fa fa-sticky-note-o"></i> <span>Estado Curso</span></a></li>
              <li><a href="/vistacurso"><i class="fa fa-exclamation"></i> <span>Información Curso</span></a></li>
            </ul>
          </li>
          <li><a href="/vistacompetencia"><i class="fa fa-street-view"></i> <span>Competencias</span></a></li>
          </ul>
        </li>
        @endif
        @if(session('Usuario')->id_perfil==1 || session('Usuario')->id_perfil==4)
        <li class="treeview">
        <a href="#"><i class="fa fa-graduation-cap"></i> <span>Facilitador</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
        <ul class="treeview-menu">  
          <li class="treeview">
            <li><a href="/facilitador"><i class="fa fa-edit"></i> <span>Actividades</span></a></li>
          </ul>
        </li>
        @endif
        @if(session('Usuario')->id_perfil==1 || session('Usuario')->id_perfil==2)
        <li class="treeview">
        <a href="#"><i class="fa fa-graduation-cap"></i> <span>Colaborador</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
        <ul class="treeview-menu">  
          <li class="treeview">
            <li><a href="/evaluarEncuesta"><i class="fa fa-edit"></i> <span>Encuesta</span></a></li>
          </ul>
        </li>
        @endif
      </ul>
      @endif
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content container-fluid">

     @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">MCJ</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!--ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<!--Date Picker-->
<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!--Time Picker-->
<script src="/adminlte/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- FullCalendar-->
<script src="/adminlte/bower_components/moment/moment.js"></script>
<script src="/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src='/adminlte/bower_components/fullcalendar/dist/locale/es.js'></script>

<!--Select2-->
<script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>

<!--iCheck-->
<script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/js/adminlte.min.js"></script>

<!-- Validador -->
<script src="/adminlte/js/validacion.js"></script>

<!--DataTable-->
<script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
@yield('script-js')

</body>
</html>