<?php 
    $this->load->view('v_header');
 ?>
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  
<a href="<?php echo base_url('user/create_user') ?>" class="d-none d-sm-inline-block btn btn-sm bg-gray-900 text-gray-100 shadow-sm" ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>

          </div> <!-- TUTUP HEADER -->

  <nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data User</li>
  </ol>
 <a href="<?php echo base_url('user/exportExcel2/')?>" class=" btn btn-sm bg-success text-gray-100 shadow-sm" ><i class="fa fa-file-excel fa-sm "></i> Export Excel</a>
 <hr>
</nav> <!-- tutup breadcumb -->

          <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
  <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable"  cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama User</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;
                    foreach ($user as $data_user ) {
                      
                      ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data_user->nama_user ?></td>
                        <td><?php echo $data_user->username ?></td>
                        <td><?php echo $data_user->nama_role ?></td>
                        <td>
                          <center>
                            <a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#ModalDetail<?php echo $data_user->id_user; ?>" ><i class="fa fa-info"></i></a>
                            <a href="<?php echo base_url(). 'user/update_user/' . $data_user->id_user ?>" class="btn btn-primary btn-circle"  ><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $data_user->id_user ?>" ><i class="fa fa-trash"></i></a>
                          </center>
                        </td>
                      </tr>


            <!-- MODAL Detail -->
            <div  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalDetail<?php echo $data_user->id_user; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <strong>Nama User</strong> : <?php echo $data_user->nama_user; ?><br>
                    <strong>Usernmae</strong> : <?php echo $data_user->username; ?><br>
                    <strong>Nama Role</strong> : <?php echo $data_user->nama_role; ?><br>
                    <strong>Menu</strong> : <?php echo $data_user->menu; ?><br>
                    
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!--END MODAL detail-->

            <!-- MODAL Hapus -->
            <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $data_user->id_user ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete this data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Apakah kamu yakin ingin menghapus <?php echo $data_user->nama_user; ?> ?</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo base_url(). 'user/delete_user/' . $data_user->id_user;?>" class="btn btn-danger btn-icon-split">
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
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
        $('#dataTable').DataTable({

        });
  
      });


    $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
  </script>


