<?php 
$this->load->view('v_header');
?> 
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 
<link href="<?php echo base_url(); ?>assets/vendor/datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet"> 
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('paket') ?>">Data Paket</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data Paket</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div class="row ">
	<div class="col-lg-12">
		<div class="card shadow mb-7">
			<div class="card-header py-3 ">
			</div>
			<div class="card-body">
				<form class="user" action="<?php echo base_url('paket/create') ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-12" >
							<div id="notifications">
								<?php echo $this->session->flashdata('msg'); ?>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="row" id="notifications1"> <!-- open validasi -->
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nama_paket'); ?></div>
								</div>
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('tanggal_diterima'); ?></div>
								</div> 
							</div> <!-- tutup validasi -->
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control" value="<?php echo set_value('nama_paket'); ?>" id="nama_paket" placeholder="Nama Paket" name="nama_paket">
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control time" value="<?php echo set_value('tanggal_diterima'); ?>" id="tanggal_diterima" name="tanggal_diterima" placeholder="Tanggal Diterima">
								</div>
							</div>
							<div class="row" id="notifications2" > <!-- open validasi -->
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nama_kategori'); ?></div>
								</div>
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nama_santri'); ?></div>
								</div> 
							</div> <!-- tutup validasi -->
							<div class="form-group row">
								<div class="col-sm-6" >
									<select class="form-control" name="nama_kategori">
					                <option value="" disabled selected>Nama Kategori</option>
								   <?php                                
								        foreach ($kategori as $data_kategori) {  
										  echo "<option value='".$data_kategori->id_kategori."'>".$data_kategori->nama_kategori."</option>";
										  }
										  echo"
										</select>"
										?>
								</div>
								<div class="col-sm-6" >
									<select class="form-control" name="penerima_paket">
					                <option value="" disabled selected>Penerima Paket</option>
								   <?php                                
								        foreach ($santri as $data_santri) {  
										  echo "<option value='".$data_santri->nis."'>".$data_santri->nama_santri."</option>";
										  }
										  echo"
										</select>"
										?>
								</div>
							</div>
							<div class="row" id="notifications4"> <!-- open validasi -->
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger  text-uppercase mb-1"><?php echo form_error('nama_asrama'); ?></div>
								</div>
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger  text-uppercase mb-1"><?php echo form_error('pengirim_paket'); ?></div>
								</div>
							</div> <!-- tutup validasi -->
							<div class="form-group row">
								<div class="col-sm-6" >
									<select class="form-control" name="nama_asrama">
					                <option value="" disabled selected>Asrama</option>
								   <?php                                
								        foreach ($asrama as $data_asrama) {  
										  echo "<option value='".$data_asrama->id_asrama."'>".$data_asrama->nama_asrama."</option>";
										  }
										  echo"
										</select>"
										?>
								</div>
								<div class="col-sm-6 ">
									<input type="text" class="form-control" value="<?php echo set_value('pengirim_paket'); ?>" id="pengirim_paket" name="pengirim_paket" placeholder="Pengirim Paket">
								</div>
							</div>
							<div class="row" id="notifications5"> <!-- open validasi -->
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger  text-uppercase mb-1"><?php echo form_error('isi_paket_sita'); ?></div>
								</div>
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger  text-uppercase mb-1"><?php echo form_error('status_paket'); ?></div>
								</div>
							</div> <!-- tutup validasi -->
							<div class="form-group row">
								<div class="col-sm-6 ">
									<input type="text" class="form-control" value="<?php echo set_value('isi_paket_sita'); ?>" id="isi_paket_sita" name="isi_paket_sita" placeholder="Isi Paket Sita Paket">
								</div>
								<div class="col-sm-6" >
									<select class="form-control" name="status_paket">
					                	<option value="" disabled selected>Status Paket</option>
								   		<option value="Disita">Disita</option>;  
								   		<option value="Diambil">Diambil</option>;  
								   		<option value="Belum Diambil">Belum Diambil</option>;  
									</select>
									
								</div>
							</div>
							<hr>
							<br>
							<button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
								Tambahkan
							</button>
						</div>
		
					</div>
				</form>
			</div>
		</div>
	</div>


	<?php 
	$this->load->view('v_footer');
	?>

	<script>   
		$('#notifications').slideDown('slow').delay(5000).slideUp('slow');
		$('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
		$('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
		$('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
		$('#notifications4').slideDown('slow').delay(5000).slideUp('slow');
		$('#notifications5').slideDown('slow').delay(5000).slideUp('slow');
	</script>
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