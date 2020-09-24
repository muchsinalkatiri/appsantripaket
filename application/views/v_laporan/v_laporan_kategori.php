<?php 
    $this->load->view('v_header');
 ?>
 <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 
  </div>
<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('laporan/laporan_kategori_dan_sita') ?>">Laporan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Laporan Kategori </li>
  </ol>
</nav> <!-- tutup breadcumb -->

    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable"  cellspacing="0">
            <thead>
              <tr class="text-xs ">
                <th>NAMA Paket</th>
                <th>Tanggal Diterima</th>
                <th>Pengirim</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($kategori as $datalaporan ) {
                
                ?>
                <tr>
                  <td><?php echo $datalaporan->nama_paket ?></td>
                  <td><?php echo $datalaporan->tanggal_diterima ?></td>
                  <td><?php echo $datalaporan->pengirim_paket ?></td>
                  <td><?php echo $datalaporan->status_paket ?></td>
                  <?php } ?>
                </tbody>
              </table>
            </div>
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
