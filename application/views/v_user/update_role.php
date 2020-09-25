<?php 
    $this->load->view('v_header');
 ?>
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  


          </div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('user/role') ?>">Data Role</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Roler</li>
  </ol>
</nav> <!-- tutup breadcumb -->

          <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

          <div class="row">
  <div class="col-sm-12">
        <form class="user" action="<?php echo base_url('user/update_role/'.$role->id_role) ?>" method="post" enctype="multipart/form-data">
    <div class="card shadow mb-4">
      <div class="card-header py-2 ">
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6"> <!-- mulai judul -->
            <div class="row">
              <div class="col-sm-12">
                <div  class="font-weight-bold  mb-1">Nama Role </div>
              </div>
            </div><!-- tutup judul -->
            <div class="row mb-4">
              <div class="col-sm-12">
                <input type="text" readonly class="form-control" value="<?php echo $role->nama_role ?>" id="nama_role"  name="nama_role">
                <input type="hidden" readonly class="form-control" value="<?php echo set_value('id_role', $role->id_role) ?>" id="id_role"  name="id_role">
              </div>
              </div>
              <div class="row mb-4">
              <div class="col-sm-12">
              <div  class="font-weight-bold  mb-1">Hak Akses Terdaftar :</div>
                <ol>
                    <?php
                        $menu = explode(",", $role->menu);
                        foreach($menu as $menue) {?>
                        <li><?php echo $menue; ?></li>
                        <?php } ?>
                    
                    </ol>
              </div>
              </div>
          </div> 
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-12">
                <div  class="font-weight-bold  mb-1">Pilihan Menu Hak Akses</div>
                <div class="input-group mb-1 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">1.</div>
                  </div>
                  <select class="form-control" name="hak1">
                    <option value="" disabled selected>Pilih</option>
                    <option value="" ></option>
                    <option value="dashboard">Dashboard</option>
                    <option value="data santri">Data Santri</option>
                    <option value="data paket">Data Paket</option>
                    <option value="laporan data paket">Laporan Data Paket</option>
                    <option value="laporan kategori dan paket sita">Laporan Kategori dan Paket Sita</option>
                    <option value="data user">Data User</option>
                    <option value="set">setting</option>
                </select>
                </div>
                <div class="input-group mb-1 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">2.</div>
                  </div>
                  <select class="form-control" name="hak2">
                    <option value="" disabled selected>Pilih</option>
                    <option value="" ></option>
                    <option value="dashboard">Dashboard</option>
                    <option value="data santri">Data Santri</option>
                    <option value="data paket">Data Paket</option>
                    <option value="laporan data paket">Laporan Data Paket</option>
                    <option value="laporan kategori dan paket sita">Laporan Kategori dan Paket Sita</option>
                    <option value="data user">Data User</option>
                    <option value="set">setting</option>
                    </select>
                </div>
                <div class="input-group mb-1 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">3.</div>
                  </div>
                  <select class="form-control" name="hak3">
                    <option value="" disabled selected>Pilih</option>
                    <option value="" ></option>
                    <option value="dashboard">Dashboard</option>
                    <option value="data santri">Data Santri</option>
                    <option value="data paket">Data Paket</option>
                    <option value="laporan data paket">Laporan Data Paket</option>
                    <option value="laporan kategori dan paket sita">Laporan Kategori dan Paket Sita</option>
                    <option value="data user">Data User</option>
                    <option value="set">setting</option>
                    </select>
                </select>
                </div>
                <div class="input-group mb-1 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">4.</div>
                  </div>
                  <select class="form-control" name="hak4">
                    <option value="" disabled selected>Pilih</option>
                    <option value="" ></option>
                    <option value="dashboard">Dashboard</option>
                    <option value="data santri">Data Santri</option>
                    <option value="data paket">Data Paket</option>
                    <option value="laporan data paket">Laporan Data Paket</option>
                    <option value="laporan kategori dan paket sita">Laporan Kategori dan Paket Sita</option>
                    <option value="data user">Data User</option>
                    <option value="set">setting</option>
                    </select>
                </div>
                <div class="input-group mb-1 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">5.</div>
                  </div>
                  <select class="form-control" name="hak5">
                    <option value="" disabled selected>Pilih</option>
                    <option value="" ></option>
                    <option value="dashboard">Dashboard</option>
                    <option value="data santri">Data Santri</option>
                    <option value="data paket">Data Paket</option>
                    <option value="laporan data paket">Laporan Data Paket</option>
                    <option value="laporan kategori dan paket sita">Laporan Kategori dan Paket Sita</option>
                    <option value="data user">Data User</option>
                    <option value="set">setting</option>
                </select>
                </div>
                <div class="input-group mb-1 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">6.</div>
                  </div>
                  <select class="form-control" name="hak6">
                    <option value="" disabled selected>Pilih</option>
                    <option value="" ></option>
                    <option value="dashboard">Dashboard</option>
                    <option value="data santri">Data Santri</option>
                    <option value="data paket">Data Paket</option>
                    <option value="laporan data paket">Laporan Data Paket</option>
                    <option value="laporan kategori dan paket sita">Laporan Kategori dan Paket Sita</option>
                    <option value="data user">Data User</option>
                    <option value="set">setting</option>
                    </select>
                </div>
                <div class="input-group mb-1 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">7.</div>
                  </div>
                  <select class="form-control" name="hak7">
                    <option value="" disabled selected>Pilih</option>
                    <option value="" ></option>
                    <option value="dashboard">Dashboard</option>
                    <option value="data santri">Data Santri</option>
                    <option value="data paket">Data Paket</option>
                    <option value="laporan data paket">Laporan Data Paket</option>
                    <option value="laporan kategori dan paket sita">Laporan Kategori dan Paket Sita</option>
                    <option value="data user">Data User</option>
                    <option value="set">setting</option>
                </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if($this->session->userdata('level')=='0'){ ?>
          <button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
            Update
          </button>
          <?php }else{ ?>
            <button type="submit" class="btn bg-gray-700 text-gray-100 btn-user btn-block">
              Update
            </button>
            <?php } ?>
            </form>
      </div>
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

        });
  
      });


    $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
  </script>


