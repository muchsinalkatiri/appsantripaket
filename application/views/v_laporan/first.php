<?php 
$this->load->view('v_header');
?>
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 
<link href="<?php echo base_url(); ?>assets/vendor/datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet"> 
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Laporan Data Paket</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="card shadow mb-4">

  <div class="card-body">
    <form class="user" action="<?php echo base_url('laporan/laporandatapaket') ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-12">
          <div class="row" > 
            <div class="col-sm-4">
              <div  class="font-weight-bold  mb-1">Tipe</div> 
            </div>
            <div class="col-sm-4">
              <div  class="font-weight-bold  mb-1">Rentang Tanggal 1</div> 
            </div> 
            <div class="col-sm-4">
              <div  class="font-weight-bold  mb-1">Rentang Tanggal 2</div> 
            </div> 
          </div> <!-- tutup validasi -->
          <div class="row" > <!-- open validasi -->
            <div class="col-sm-4">
              <div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('tipe'); ?></div> 
            </div>
            <div class="col-sm-4">
              <div id="notifications2" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('tgl1'); ?></div> 
            </div>
            <div class="col-sm-4">
              <div id="notifications3" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('tgl2'); ?></div>  
            </div> 
          </div> <!-- tutup validasi -->
          <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <select class="form-control" name="asrama">
                <option value="" disabled selected>Hari/Bulan/Tahun</option>
                <option value=""  >Hari</option>
                <option value=""  >Bulan</option>
                <option value=""  >Tahun</option>
              </select>
            </div>
            <div class="col-sm-4">
              <input type="text"  class="form-control time" value="<?php echo set_value('tgl1'); ?>" id="tgl1" name="tgl1" placeholder="Waktu Dimulai" >
            </div>
            <div class="col-sm-4">
              <input type="text"  class="form-control time" value="<?php echo set_value('tgl2'); ?>" id="tgl2" name="tgl2" placeholder="Waktu Berakhir" >
            </div>
          </div>
            <button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
              Tampilkan
            </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable"  cellspacing="0">
            <thead>
              <tr class="text-xs ">
                <th>NAMA Paket</th>
                <th>Tanggal Diterima</th>
                <th>Penerima</th>
                <th>Asrama</th>
                <th>Pengirim</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($laporan as $datalaporan ) {
                
                ?>
                <tr>
                  <td><?php echo $datalaporan->nama_paket ?></td>
                  <td><?php echo $datalaporan->tanggal_diterima ?></td>
                  <td><?php echo $datalaporan->nama_santri ?></td>
                  <td><?php echo $datalaporan->nama_asrama ?></td>
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
        <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/vendor/datetimepicker/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#dataTable').DataTable({
            });
          });

          $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
          $('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
          $('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
          $('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
        </script>
        <script type="text/javascript">
          $(document).ready(function () {
            $('.time').datetimepicker({format: 'yyyy-mm-dd', todayBtn: true,
              autoclose: true,
              pickerPosition: "top-left"});
          });
        </script>