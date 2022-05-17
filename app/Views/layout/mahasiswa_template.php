<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="description" content="Sistem Registrasi Ulang Calon Mahasiswa Baru 2022 Politeknik Negeri Media Kreatif">
    <meta name="keywords" content="Pendaftaran, Penerimaan, Mahasiswa Baru, SBMPTN, SNPTN, SBMPN, SNMPN, PoliMedia">
    <meta name="author" content="Authentic Tech">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title?></title>
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url();?>/favicon/polimedia_logo.ico">
    <!-- Pignose Calender -->
    <link href="<?= base_url();?>/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <link rel="stylesheet" href="<?= base_url();?>/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="<?= base_url();?>/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="<?= base_url();?>/css/style.css" rel="stylesheet">

</head>

<body>
<!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">


        <?= $this->include('layout/mahasiswa_sidebar'); ?>

        <?= $this->include('layout/mahasiswa_topbar'); ?>

        <?= $this->renderSection('content'); ?>



        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by Authentic Tech</a> 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
       <script src="<?= base_url();?>/plugins/chart.js/Chart.bundle.min.js"></script>
       
    <script src="<?= base_url();?>plugins/common/common.min.js"></script>
    <script src="<?= base_url();?>js/custom.min.js"></script>
    <script src="<?= base_url();?>js/settings.js"></script>
    <script src="<?= base_url();?>js/gleek.js"></script>
    <script src="<?= base_url();?>js/styleSwitcher.js"></script>
    <script src="<?= base_url();?>/js/plugins-init/chartjs-init.js"></script>
    <!-- Circle progress -->
    <script src="<?= base_url();?>/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="<?= base_url();?>/plugins/d3v3/index.js"></script>
    <script src="<?= base_url();?>/plugins/topojson/topojson.min.js"></script>
    <script src="<?= base_url();?>/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="<?= base_url();?>/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url();?>/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="<?= base_url();?>/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url();?>/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="<?= base_url();?>/plugins/chartist/js/chartist.min.js"></script>
    <script src="<?= base_url();?>/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <script src="<?= base_url();?>/js/dashboard/dashboard-1.js"></script>
   <!-- Data table -->
    <script src="<?= base_url();?>/plugins/common/common.min.js"></script>
    <script src="<?= base_url();?>/js/custom.min.js"></script>
    <script src="<?= base_url();?>/js/settings.js"></script>
    <script src="<?= base_url();?>/js/gleek.js"></script>
    <script src="<?= base_url();?>/js/styleSwitcher.js"></script>

    <script src="<?= base_url();?>/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url();?>/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
 



    <script src="<?= base_url();?>/js/dashboard/dashboard-1.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</body>

</html>