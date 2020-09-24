<?php 
    $this->load->view('v_header');
 ?>
 <a href="<?php echo base_url('santri/cetakpdf/').$santri->NIS ?>" class="d-none d-sm-inline-block btn btn-sm bg-warning text-gray-100 shadow-sm" ><i class="fa fa-print fa-sm "></i> Cetak PDF</a>
 </div>
<div class="container ">
	<div class="row ">
		<div class="col-lg-12">
		<!-- <a  class="d-none d-sm-inline-block btn btn-sm bg-danger text-gray-100 shadow-sm mb-2"  href="<?php echo base_url('kirim/kirim_email/')?>" ><i class="fas fa-envelope  text-white-50"></i> Send Detail Score to Email</a> -->
			<div class="card shadow mb-7">
				<div class="card-header py-3 ">
					<nav class="navbar">
						<h6 class="text-lg m-0 font-weight-bold text-gray-900">Profile</h6>
						<ul class="navbar-nav ml-auto">
							<a class="text-gray-900 text-lg" href="<?php echo base_url().'santri/update/'.$santri->NIS ?>" >
								<span class="fa fa-cog"></span> Edit Profile
							</a>
						</ul>
					</nav>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-8">
							<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
							<table class="table">
								<tr>
									<td><strong>NIS</strong></td>
									<td><?php echo $santri->NIS ?></td>
								</tr>
								<tr>
									<td><strong>Nama Santri</strong></td>
									<td><?php echo $santri->nama_santri ?></td>
								</tr>
								<tr>
									<td><strong>ALamat</strong></td>
									<td><?php echo $santri->alamat ?></td>
								</tr>
								<tr>
									<td><strong>Asrama</strong></td>
									<td><?php echo $santri->asrama_id ?></td>
								</tr>
								<tr>
									<td><strong>Total Paket Diterima</strong></td>
									<td><?php echo $santri->total_paket_diterima ?></td>
								</tr>
			
							</table>
					</div>
					<div class="col-sm-4 ">
						<center>
							<h2 >Foto</h2>
							<img class="card shadow mb-7" class="img-profile rounded-circle" id="gambar_nodin"  alt="Preview Gambar" style='width:300px;height:300px; border-radius: 50%;  ' src="<?php echo base_url()."uploads/img-user/default-user.png" ?>">
						</center>
</div>
</div>



<?php 
    $this->load->view('v_footer');
 ?>


<script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>


