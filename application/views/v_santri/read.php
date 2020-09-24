<?php 
    $this->load->view('v_header');
 ?>
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  

            <a href="<?php echo base_url('admin/admin/create') ?>" class="d-none d-sm-inline-block btn btn-sm bg-gray-900 text-gray-100 shadow-sm" ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
          </div> <!-- TUTUP HEADER -->

  <nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
<!--     <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li> -->
    <li class="breadcrumb-item active" aria-current="page">Data Santri</li>
  </ol>
</nav> <!-- tutup breadcumb -->

          <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

          <div class="card shadow mb-4">
          	<div class="card-body">
          		<div class="table-responsive">
          			<table class="table table-bordered text-center" id="dataTable"  cellspacing="0">
          				<thead>
          					<tr>
          						<th>NIS</th>
                      <th>NAMA</th>
                      <th>ALAMAT</th>
                      <th>ASRAMA</th>
                      <th>TOTAL PAKET</th>
          						<th>ACTION</th>
          					</tr>
          				</thead>
          				<tbody>
          					<?php foreach ($santri as $data_santri ) {
                      
                      ?>
          						<tr>
                        <td><?php echo $data_santri->NIS ?></td>
                        <td><?php echo $data_santri->nama_santri ?></td>
                        <td><?php echo $data_santri->alamat ?></td>
                        <td><?php echo $data_santri->nama_asrama ?></td>
                        <td><?php echo $data_santri->total_paket_diterima ?></td>
          							<td>
                          <center>
                            <a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#ModalDetail<?php echo $data_santri->NIS; ?>" ><i class="fa fa-info"></i></a>
            								<a href="<?php echo base_url(). 'santri/update/' . $data_santri->NIS ?>" class="btn btn-primary btn-circle"  ><i class="fa fa-edit"></i></a>
            								<a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $data_santri->NIS; ?>" ><i class="fa fa-trash"></i></a>
                          </center>
          							</td>
          						</tr>


            <!-- MODAL Detail -->
            <div  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalDetail<?php echo $data_santri->NIS; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <strong>ID</strong> : <?php echo $data_santri->NIS; ?><br>
                    <strong>Nama Santri</strong> : <?php echo $data_santri->NIS; ?><br>
                    <strong>Alamat</strong> : <?php echo $data_santri->alamat; ?><br>
                    <strong>Asrama</strong> : <?php echo $data_santri->nama_asrama; ?><br>
                    <strong>Gedung</strong> : <?php echo $data_santri->gedung; ?><br>
                    <strong>Total Paket Diterima</strong> : <?php echo $data_santri->total_paket_diterima; ?><br>
                    
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!--END MODAL detail-->

            <!-- MODAL Hapus -->
            <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $data_santri->NIS; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete this data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Apakah kamu yakin ingin menghapus <?php echo $data_santri->nama_santri; ?> ?</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo base_url(). 'santri/delete/' . $data_santri->NIS?>" class="btn btn-danger btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Delete</span>
                      </a>
                  </div>
                </div>
              </div>
            </div>
            <!--END MODAL Hapus-->

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
<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable({
      columnDefs: [ {
        targets: [1   ],
        render: function ( data, type, row ) {
          return data.length > 10 ?
          data.substr( 0, 10 ) +'…' :
          data;
        }
      } ]
    });
  });

</script>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>


