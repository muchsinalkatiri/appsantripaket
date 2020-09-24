<?php 
    $this->load->view('v_header');
 ?>
 <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 
  </div>
<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Laporan Kategori & paket disita</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div class="row">
              <?php foreach ($laporan_kategori as $datalaporan ) {
                
                ?>
                <div class="col-lg-4 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                    <a class="text-white large" href="<?php echo base_url('laporan/laporankategori/'.$datalaporan->id_kategori)?>" > <?php echo $datalaporan->nama_kategori; ?></a>
                      
                      <div class="text-white-50 small">Total nya  : <?php echo $datalaporan->jumlah; ?></div>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                      <a class="text-white large" href="<?php echo base_url('laporan/laporanpaketsita/')?>" > Paket Yang Disita</a>
                    <?php
                          $paket_sita = $this->db->query("SELECT COUNT(id_paket) as total_paket_sita FROM data_paket WHERE status_paket = 'Disita'");
                          $data_total_paket_sita = $paket_sita->result();
                          $paket_sita_total = $data_total_paket_sita[0]->total_paket_sita;
                      ?>
                      <div class="text-white-50 small">Total nya  : <?php echo $paket_sita_total; ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                
                </div>
            </div>

            
<?php 
    $this->load->view('v_footer');
 ?>



    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
