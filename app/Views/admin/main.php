<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <base href="<?= base_url() ?>">
  <link rel="shortcut icon" href="assets/admin/images/favicon.ico" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo.png" />
  <!-- Bootstrap Core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link href="/assets/admin/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/admin/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="/assets/admin/node_modules/morrisjs/morris.css" rel="stylesheet" />
  <link href="/assets/admin/node_modules/c3-master/c3.min.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link href="/css/admin/css/style.css" rel="stylesheet" />
  <!-- Dashboard 1 Page CSS -->
  <link href="/css/admin/css/pages/dashboard1.css" rel="stylesheet" />
  <!-- You can change the theme colors from here -->
  <link href="/css/admin/css/colors/default.css" id="theme" rel="stylesheet" />
  <link rel="stylesheet" href="assets/admin/css/easion.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
  <script src="assets/admin/js/chart-js-config.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <?php foreach ($cssFile as $cssLink) : ?>
    <link rel="stylesheet" href="<?= $cssLink ?>">
  <?php endforeach ?>

</head>

<body class="fix-header fix-sidebar card-no-border">
  <div class="preloader">
    <div class="loader">
      <div class="loader__figure"></div>
      <p class="loader__label">Loading...</p>
    </div>
  </div>
  <div id="main-wrapper">
    <header class="topbar">
      <?= $header ?>
    </header>
    <aside class="left-sidebar">
      <?= $leftMenu ?>
    </aside>
    <div class="page-wrapper">
      <?= $content ?>
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer">© 2023 Copyright: BamBee</footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="/assets/admin/node_modules/jquery/jquery.min.js"></script>
  <!-- Bootstrap popper Core JavaScript -->
  <script src="/assets/admin/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="/css/admin/js/perfect-scrollbar.jquery.min.js"></script>
  <!--Wave Effects -->
  <script src="/css/admin/js/waves.js"></script>
  <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon" />


  <!--Menu sidebar -->
  <script src="/css/admin/js/sidebarmenu.js"></script>
  <!--Custom JavaScript -->
  <script src="/css/admin/js/custom.min.js"></script>
  <?php foreach ($jsFile as $jsLink) : ?>
    <script src="<?= $jsLink ?>"></script>
  <?php endforeach ?>
  <!-- ============================================================== -->
  <!-- This page plugins -->
  <!-- ============================================================== -->
  <!--morris JavaScript -->
  <script src="/assets/admin/node_modules/raphael/raphael-min.js"></script>
  <script src="/assets/admin/node_modules/morrisjs/morris.min.js"></script>
  <!--c3 JavaScript -->
  <script src="/assets/admin/node_modules/d3/d3.min.js"></script>
  <script src="/assets/admin/node_modules/c3-master/c3.min.js"></script>
  <!-- Chart JS -->
  <script src="/css/admin/js/dashboard1.js"></script>
</body>

</html>