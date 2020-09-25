<?php 
$this->load->view('v_header');
?> 
<link href="<?php echo base_url(); ?>assets/vendor/datetimepicker/css/bootstrap-datepicker.css" rel="stylesheet">
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('user/data_user') ?>">Data User</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data User</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div class="row ">
	<div class="col-lg-12">
		<div class="card shadow mb-7">
			<div class="card-header py-3 ">
			</div>
			<div class="card-body">
				<form class="user" action="<?php echo base_url('user/update_user/').$datauser->id_user ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-12" >
							<div id="notifications">
								<?php echo $this->session->flashdata('msg'); ?>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="row" id="notifications1"> <!-- open validasi -->
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nama_user'); ?></div>
								</div>
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('username'); ?></div>
								</div> 
							</div> <!-- tutup validasi -->
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user" value="<?php echo $datauser->nama_user?>" id="nama_user" placeholder="Nama User" name="nama_user">
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control form-control-user" value="<?php echo $datauser->username?>" id="username" name="username" placeholder="Username">
								</div>
							</div>
							<div class="row" id="notifications2" > <!-- open validasi -->
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('password'); ?></div>
								</div>
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nama_role'); ?></div>
								</div> 
							</div> <!-- tutup validasi -->
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" class="form-control form-control-user"  id="notlp2" value="<?php echo $datauser->password?>" name="password" placeholder="Passsword...">
								</div>
								<div class="col-sm-6" >
									<select class="form-control" name="nama_role">
					                <option value="" disabled selected>Nama Role</option>
								   <?php                                
								        foreach ($role as $data_role) {  
										  echo "<option value='".$data_role->id_role."'>".$data_role->nama_role."</option>";
										  }
										  echo"
										</select>"
										?>
								</div>
							</div>
						
							<br>
							<hr>
							<br>
							<button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
								Update
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
	<script type="text/javascript">
		$(document).ready(function(e) {
			$('#btnFile').click(function(){
				$('#inputFile').click();
			});

		});
	</script>