<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Mahasiswa baru</h3>
                                <div class="d-inline-block">
                            
                                    <h2 class="text-white"><?=$countMahasiswa;?></h2>
                                    <p class="text-white mb-0">SNMPTN & SNMPN 2022</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Permohonan perubahan UKT</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$countPerubahanUkt;?></h2>
                                    <p class="text-white mb-0">SNMPTN & SNMPN 2022</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-bell"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Perubahan UKT Belum Divalidasi</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$countBelumDivalidasi;?></h2>
                                    <p class="text-white mb-0">SNMPTN & SNMPN 2022</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-check"></i></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--<div class="row">
                    <!-- /# column -->
                   <!-- <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Team</h4>
                                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                                    <script>
                                    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
                                    var yValues = [55, 49, 44, 24, 15];
                                    var barColors = ["red", "green","blue","orange","brown"];
                                    
                                    new Chart("myChart", {
                                      type: "bar",
                                      data: {
                                        labels: xValues,
                                        datasets: [{
                                          backgroundColor: barColors,
                                          data: yValues
                                        }]
                                      },
                                      options: {
                                        legend: {display: false},
                                        title: {
                                          display: true,
                                          text: "World Wine Production 2018"
                                        }
                                      }
                                    });
                                    </script>
                            </div>
                        </div>
                        <!-- /# card -->
            </div>
<!-- #/ container -->
</div>

<!--**********************************
            Content body end
        ***********************************-->
<?= $this->endSection(); ?>