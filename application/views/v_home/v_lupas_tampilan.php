<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Tazkia- Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-warning">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="background: url('<?php echo base_url('assets/img/forgot.jpg'); ?>'); background-size: cover; background-position: center;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2"><?php echo $page_title ?></h1>
                    <p class="mb-4">Please enter your username</p>
                  </div>
                  <?php echo $this->session->flashdata('emailMsg'); ?>
                     <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

                   <form class="user" action="<?php echo base_url('lupas/action_lupas') ?>" method="post" enctype="multipart/form-data" >
                    <div class="row" id="notifications1"> <!-- open validasi -->
                      <div style="padding-left: 15px; " value="<?php echo set_value('username'); ?>" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('username'); ?></div>
                    </div> <!-- tutup validasi -->
                    <div class="form-group">
                      <input  name="text" required class="form-control form-control-user" value="<?php echo set_value('username'); ?>" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username...">
                    </div>
                    <button type="submit" class="btn bg-gradient-warning text-gray-100 btn-user btn-block">
                      Send
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url() ?>">Login!</a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/vendor/sb-admin-2.min.js"></script>

</body>

</html>


<script>   
  $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
  $('#notifications1').slideDown('slow').delay(5000).slideUp('slow')
</script>
