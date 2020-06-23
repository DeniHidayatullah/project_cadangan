  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header animated fadeInDown">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1">
            <div class="card card-success card-outline">
              <div class="col-lg-3 col-12 ">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>
                      <?php foreach ($siswa as $sis) {
                        echo $sis['total'];
                      } ?></h3>

                    <p>Siswa</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <a href="<?php echo base_url(); ?>admin/pengguna/siswa" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right "></i></a>
                </div>
              </div>


              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3><?php foreach ($guru as $gu) {
                          echo $gu['total'];
                        } ?></h3>

                    <p>Guru</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <a href="<?php echo base_url(); ?>admin/pengguna/guru"" class=" small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                  <div class="inner">
                    <h3><?php foreach ($jurusan as $jur) {
                          echo $jur['total'];
                        } ?></h3>

                    <p>Jurusan</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-building-o"></i>
                  </div>
                  <a href="<?php echo base_url(); ?>admin/master/jurusan" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3><?php foreach ($kelas as $kel) {
                          echo $kel['total'];
                        } ?></h3>

                    <p>Kelas</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-institution"></i>
                  </div>
                  <a href="<?php echo base_url(); ?>admin/master/kelas" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>


            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->

      <section class="animated fadeInUp content">
        <div class="container-fluid">
          <!-- Info boxes -->

          <!-- /.row -->
          <div class="row">
            <!-- /.col -->
            <div class="col-md-6">
              <div class="card card-success card-outline">

                <!-- /.card-header -->
                <div class="card-body">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load('current', {
                        'packages': ['corechart']
                      });
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                          ['jenis_kelamin', ''],
                          <?php foreach ($home as $lin) {
                            echo "['" . strval($lin['jenis_kelamin']) . "', " . $lin['jumlah'] . "],";
                          } ?>
                        ]);

                        var options = {
                          title: 'Jumlah Siswa Menurut Jenis Kelamin'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                      }
                    </script>
                    </head>

                    <body>
                      <div id="piechart" style="width: 450px; height: 350px;"></div>
                    </body>


                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="card card-success card-outline">

                <div class="card-body p-0">
                  <div class="table-responsive">

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load('current', {
                        'packages': ['bar']
                      });
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Year', 'TKJ', 'TSM', 'TKR', 'KKR', 'MM'],
                          ['2017', 1, 2, 3, 2, 1],
                          ['2018', 1, 1, 2, 3, 1],
                          ['2019', 2, 1, 3, 1, 3]



                        ]);

                        var options = {
                          chart: {
                            title: 'Jumlah Siswa Per Tahun Per Jurusan'
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                    </script>


                    <body>
                      <div id="columnchart_material" style="width: 550px; height: 350px;"></div>
                    </body>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>

        </div>

        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->