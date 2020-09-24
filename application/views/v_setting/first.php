<?php 
$this->load->view('v_header');
?>
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 
<link href="<?php echo base_url(); ?>assets/vendor/datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet"> 
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Backup, Restore & Custom</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 


<div class="row">
      <div class="col-lg-4">
        <div class="card shadow mb-4">
          <div class="card-header py-2 ">
            Backup Database 
          </div>
          <div class="card-body" style="padding-bottom: 60px; ">
            <a href="<?php echo base_url('setting/backup')?>" class="btn btn-sm btn-primary shadow-sm" ><i class="fas fa-download fa-sm text-white-50"></i> Backup Database</a>

                
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card shadow mb-4">
              <div class="card-header py-2 ">
                Restore Database
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <form class="user" action="<?php echo base_url('setting/restore') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group row ">
            <div class="col-sm-4">
              <input type="file"  class="form-control" value="<?php echo set_value('file_sql'); ?>" required id="file_sql" name="file_sql" placeholder="File Sql" ">
            </div>
            <div class="col-sm-6">
              <button type="submit" class="btn btn-sm btn-danger shadow-sm">
                Restore
              </button>
              
            </div>
          </div>
            </div>
            </div>  
            </div>
          </div>
        </form>
                </div>
          <div class="row">
          </div>
      <div class="col-lg-12">
        <div class="card shadow mb-4">
          <div class="card-header py-2 ">
            Custom Query
          </div>
          <div class="card-body">
          <form class="user" action="<?php echo base_url('setting/custom') ?>" method="post" enctype="multipart/form-data">
              <textarea rows="5" type="text" class="form-control" id="custom_query" placeholder="Custom Query (Khusus  Query Yang Tidak Menampilkan Tabel)" name="custom_query"></textarea>
              <hr>
            <button type="submit" class="btn  btn-warning shadow-sm">
                Excute
              </button>
              </form>


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