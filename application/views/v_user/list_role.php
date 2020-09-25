<?php 
    $this->load->view('v_header');
 ?>
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  
<a href="<?php echo base_url('user/create_user') ?>" class="d-none d-sm-inline-block btn btn-sm bg-gray-900 text-gray-100 shadow-sm" ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>

          </div> <!-- TUTUP HEADER -->

  <nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Role</li>
  </ol>
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
                      <th>Nama Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;
                    foreach ($user as $data_role ) {
                      
                      ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data_role->nama_role ?></td>
                        <td>
                          <center>
                            <a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#ModalDetail<?php echo $data_role->id_role; ?>" ><i class="fa fa-info"></i></a>
                            <a href="<?php echo base_url(). 'user/update_role/' . $data_role->id_role ?>" class="btn btn-primary btn-circle"  ><i class="fa fa-edit"></i></a>
                          </center>
                        </td>
                      </tr>


            <!-- MODAL Detail -->
            <div  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalDetail<?php echo $data_role->id_role; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <strong>Nama Role</strong> : <?php echo $data_role->nama_role; ?><br>
                    <strong>Hak Akses</strong> : 
                    <ul>
                    <?php
                        $menu = explode(",", $data_role->menu);
                        foreach($menu as $menue) {?>
                        <li><?php echo $menue; ?></li>
                        <?php } ?>
                    
                    </ul>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!--END MODAL detail-->

            

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


