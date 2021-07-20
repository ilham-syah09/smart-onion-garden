<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>img/favicon.png">
  <title>
    <?= $title; ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="<?= base_url('assets/'); ?>css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?= base_url('assets/'); ?>css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url('assets/'); ?>demo/demo.css" rel="stylesheet" />
  <link href="<?= base_url('assets/'); ?>js/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- printdatatables -->
</head>
    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>
<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-normal text-center">
            Menu
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="<?= base_url('dashboard/index'); ?>">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="<?= base_url('dashboard/data'); ?>">
              <i class="tim-icons icon-book-bookmark"></i>
              <p>Data</p>
            </a>
          </li>
          <li>
            <a href="<?= base_url('auth/logout'); ?>">
              <i class="tim-icons icon-button-power"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand text-center" href="javascript:void(0)">Monitoring Bawang</a>
          </div>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="<?= base_url('assets/'); ?>img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="<?= base_url('dashboard/profile'); ?>" class="nav-item dropdown-item">Profile</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="<?= base_url('auth/logout'); ?>" class="nav-item dropdown-item">Logout</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- End Navbar -->
      <!-- content -->
      <?php $this->load->view($page); ?>
      
      <footer class="footer">
        <div class="container-fluid">
        </div>
      </footer>
    </div>
  </div>
  
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/'); ?>js/core/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/core/popper.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/core/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="<?= base_url('assets/'); ?>js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/'); ?>js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/'); ?>js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?= base_url('assets/'); ?>demo/demo.js"></script>
  <!-- sweetalert -->
  <script src="<?= base_url('assets/js/swal/sweetalert2.all.js'); ?> "></script>
  <script src="<?= base_url('assets/js/swal/script.js'); ?> "></script>
  <!-- datatables -->
  <script src="<?= base_url('assets/'); ?>js/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
  <!-- chartjs -->
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    })
  </script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>

</html>