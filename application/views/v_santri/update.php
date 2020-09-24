<?php 
$this->load->view('v_header');
?> 
<link href="<?php echo base_url(); ?>assets/vendor/datetimepicker/css/bootstrap-datepicker.css" rel="stylesheet">
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('santri') ?>">Data Santri</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update Data Santri</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div class="row ">
  <div class="col-lg-12">
    <div class="card shadow mb-7">
      <div class="card-header py-3 ">
      </div>
      <div class="card-body">
        <form class="user" action="<?php echo base_url('santri/update') ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12" >
              <div id="notifications">
                <?php echo $this->session->flashdata('msg'); ?>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="row" id="notifications1"> <!-- open validasi -->
                <div class="col-sm-6">
                  <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nis'); ?></div>
                </div>
                <div class="col-sm-6">
                  <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nama_santri'); ?></div>
                </div> 
              </div> <!-- tutup validasi -->
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" value="<?php echo $santri->NIS?>" id="nis" placeholder="NIS" name="nis">
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-user" value="<?php echo $santri->nama_santri?>"" id="nama_santri" name="nama_santri" placeholder="Nama Santri">
                </div>
              </div>
              <div class="row" id="notifications2" > <!-- open validasi -->
                <div class="col-sm-6">
                  <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('alamat'); ?></div>
                </div>
                <div class="col-sm-6">
                  <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('asrama'); ?></div>
                </div> 
              </div> <!-- tutup validasi -->
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user"  id="notlp2" value="<?php echo $santri->alamat?>"" name="alamat" placeholder="Alamat...">
                </div>
                <div class="col-sm-6" >
                  <select class="form-control" name="asrama">
                          <option value="" disabled selected>Asrama</option>
                   <?php                                
                        foreach ($asrama as $data_asrama) {  
                      echo "<option value='".$data_asrama->id_asrama."'>".$data_asrama->nama_asrama."</option>";
                      }
                      echo"
                    </select>"
                    ?>
                </div>
              </div>
              <div class="row" id="notifications4"> <!-- open validasi -->
                <div class="col-sm-6">
                  <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger  text-uppercase mb-1"><?php echo form_error('total_paket_diterima'); ?></div>
                </div>
                <div class="col-sm-6">
                  <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger  text-uppercase mb-1"><?php echo form_error('foto'); ?></div>
                </div>
              </div> <!-- tutup validasi -->
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="number"  name="total_paket_diterima" id="total_paket_diterima" class=" form-control form-control-user" value="<?php echo $santri->total_paket_diterima?>" placeholder="Total Paket" />
                </div>
                <div class="col-sm-6 ">
                  <a style="text-decoration: none;" id="btnFile" class="text-gray-600 form-control form-control-user" href="#" onclick="return false;" >Foto</a>
                  <input style="display:none" type="file"  name="foto" id="inputFile"  class=" form-control form-control-user"  />
                </div>
              </div>
            
              <br>
              <hr>
              <br>
              <button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
                Update
              </button>
            </div>
            <div class="col-sm-4 ">
              <center>
                <h2 >Foto</h2>
                <img class="card shadow mb-7" id="gambar_nodin"  alt="Preview Gambar" style='width:300px;height:300px; border-radius: 50%;  ' src="<?php echo base_url()."assets/img/default-user.png"?>"> 
                <h7>Max Size 1 mb</h7>
              </center>
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

    function bacaGambar(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#gambar_nodin').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#inputFile").change(function(){
      bacaGambar(this);
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(e) {
      $('#btnFile').click(function(){
        $('#inputFile').click();
      });

    });
  </script>