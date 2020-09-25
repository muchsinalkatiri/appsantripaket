<?php 
$this->load->view('V_header');
?>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">5 Daftar Paket Terbaru</div>
                         <div class="h6 mb-0 text-gray-800">               
                      <?php 
                      $no=1;
                      foreach ($paket as $data_paket ) {
                      
                      ?>
                      <?php echo '('.$data_paket->nama_paket.')' ?>
                      <?php } ?>
                       </div>
                      <br>
                      <div><a href="<?php echo base_url('paket')?>" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> View All</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Paket Yang Disita</div>
                      <?php
                          $paket_sita = $this->db->query("SELECT COUNT(id_paket) as total_paket_sita FROM data_paket WHERE status_paket = 'Disita'");
                          $data_total_paket_sita = $paket_sita->result();
                          $paket_sita_total = $data_total_paket_sita[0]->total_paket_sita;
                      ?>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">Jumlah Paket Yang Disita <?php echo $paket_sita_total; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Paket Yang Belum Diambil</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <?php
                          $paket_blm_ambil = $this->db->query("SELECT COUNT(id_paket) as total_paket_blm_ambil FROM data_paket WHERE status_paket = 'Belum Diambil'");
                          $data_total_paket_blm_ambil = $paket_blm_ambil->result();
                          $total_blm_ambil = $data_total_paket_blm_ambil[0]->total_paket_blm_ambil;

                          $paket_ambil = $this->db->query("SELECT COUNT(id_paket) as total_paket_ambil FROM data_paket WHERE status_paket = 'Diambil'");
                          $data_total_paket_ambil = $paket_ambil->result();
                          $total_ambil = $data_total_paket_ambil[0]->total_paket_ambil;
                          $total_paket_ambil_dan_belum = $total_ambil + $total_blm_ambil;

                          $persentase_blm_ambil = ($total_blm_ambil * 100)/$total_paket_ambil_dan_belum;
                      ?>
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo round($persentase_blm_ambil); ?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo 'Paket yang belum diambil '.$total_blm_ambil.' dari '. $total_paket_ambil_dan_belum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-lg-9">
              <div class="card shadow mb-2">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Paket Masuk Per Bulan Ditahun Ini</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart2"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-lg-3 ">
              <div class="card shadow mb-2">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Per Kategori</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">

                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie ">
                    <canvas id="myPieChart2"></canvas>
                  </div>
                  <div class="mt-3 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Makanan Kering
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Makanan Basah
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Non Makanan
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>




</div>
<?php 
$this->load->view('v_footer');
?>

<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>

    <?php
    //Inisialisasi nilai variabel awal
    $nama_kategori= "";
    $jumlah=null;
    foreach ($kategori as $item)
    {
        $kat=$item->nama_kategori;
        $nama_kategori .= "'$kat'". ", ";
        $jum=$item->total;
        $jumlah .= "$jum". ", ";
    }
    ?>
<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart2");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: [<?php echo $nama_kategori; ?>],
    datasets: [{
      data: [<?php echo $jumlah; ?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

</script>


    <?php
    //Inisialisasi nilai variabel awal
    $nama_bulan= "";
    $jumlah=null;
    foreach ($bulan as $item)
    {
        $bul=$item->nama_bulan;
        if ($bul == 1) {
          $bul = "januari";
        }elseif ($bul == 2) {
          $bul = "februari";
        }elseif ($bul == 3) {
          $bul = "maret";
        }elseif ($bul == 4) {
          $bul = "april";
        }elseif ($bul == 5) {
          $bul = "mei";
        }elseif ($bul == 6) {
          $bul = "juni";
        }elseif ($bul == 7) {
          $bul = "juli";
        }elseif ($bul == 8) {
          $bul = "agustus";
        }elseif ($bul == 9) {
          $bul = "september";
        }elseif ($bul == 10) {
          $bul = "oktober";
        }elseif ($bul == 11) {
          $bul = "november";
        }elseif ($bul == 12) {
          $bul = "desember";
        }
        $nama_bulan .= "'$bul'". ", ";
        $jum=$item->total;
        $jumlah .= "$jum". ", ";
    }
    ?>
<script type="text/javascript">
  
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart2");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?php echo $nama_bulan; ?>],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php echo $jumlah; ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

</script>

