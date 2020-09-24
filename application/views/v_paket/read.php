<?php 
    $this->load->view('v_header');
 ?>
 <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 
  </div>
<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Paket</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-soal-tab" data-toggle="tab" href="#nav-soal" role="tab" aria-controls="nav-soal" aria-selected="true">Data Paket Masuk</a>
    <a class="nav-item nav-link" id="nav-example-tab" data-toggle="tab" href="#nav-kelompok" role="tab" aria-controls="nav-kelompok" aria-selected="false">Data Paket Keluar</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-soal" role="tabpanel" aria-labelledby="nav-soal-tab">
    <hr>
    <div class="row mb-2  ">
      <div class="col-lg-10">
        <!-- <h1 class="h3 mb-3 text-gray-800">Data Soal Paket : <?php echo $paket_dan_part_soal->nama_paket ?></h1> -->
 <a href="<?php echo base_url('paket/exportExcel1/')?>" class=" btn btn-sm bg-success text-gray-100 shadow-sm" ><i class="fa fa-file-excel fa-sm "></i> Export Excel</a>
      </div>
      <div class="col-lg-2" style="text-align: right;  ">
        <a href="<?php echo base_url('paket/create') ?>" class="d-none d-sm-inline-block btn btn-sm bg-gray-900 text-gray-100 shadow-sm" ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Paket</a>
        
      </div>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-2 ">
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered nowrap text-center" id="dataTable"  cellspacing="0">
            <thead>
             <tr>
              <th>NO</th>
              <th>Nama Paket</th>
              <th>Tanggal Diterima</th>
              <th>Nama Kategori</th>
              <th>Penerima</th>
              <th>Status</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no=1;
            foreach ($paket as $data_paket ) {
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data_paket->nama_paket ?></td>
                <td><?php echo $data_paket->tanggal_diterima ?></td>
                <td><?php echo $data_paket->nama_kategori ?></td>
                <td><?php echo $data_paket->nama_santri?></td>
                <td>
                  <a  href="<?php echo base_url(). 'paket/sita/' . $data_paket->id_paket ?>" class="mb-1 text-xs btn btn-info btn-icon-split">
                    <span class="text ">Sita Paket</span>
                  </a>
                  <br>
                  <a href="<?php echo base_url(). 'paket/diambil/' . $data_paket->id_paket ?>" class="text-xs btn btn-warning btn-icon-split">
                    <span class="text ">Paket Diambil</span>
                  </a>
                </td>
                </td>
                <td><center>
                 <a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#ModalDetail<?php echo $data_paket->id_paket; ?>" ><i class="fa fa-info"></i></a>
                  <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-circle"  ><i class="fa fa-edit"></i></a>
                  <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $data_paket->id_paket; ?>" ><i class="fa fa-trash"></i></a>
                </center></td>
              </tr>

<!-- MODAL Detail -->
            <div  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalDetail<?php echo $data_paket->id_paket; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <strong>Nama Paket</strong> : <?php echo $data_paket->nama_paket; ?><br>
                    <strong>Tanggal Diterima</strong> : <?php echo $data_paket->tanggal_diterima; ?><br>
                    <strong>Kategori</strong> : <?php echo $data_paket->nama_kategori; ?><br>
                    <strong>Penerima</strong> : <?php echo $data_paket->nama_santri; ?><br>
                    <strong>Asrama</strong> : <?php echo $data_paket->nama_asrama; ?><br>
                    <strong>Gedung</strong> : <?php echo $data_paket->gedung; ?><br>
                    <strong>Pengirim Paket</strong> : <?php echo $data_paket->pengirim_paket; ?><br>
                    <strong>Isi Paket_sita</strong> : <?php echo $data_paket->isi_paket_sita; ?><br>
                    <strong>Status Paket</strong> : <?php echo $data_paket->status_paket; ?><br>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!--END MODAL detail-->
              <!-- MODAL Hapus -->
              <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $data_paket->id_paket; ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete this data?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Apakah kamu yakin ingin menghapus data ini ?</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a href="<?php echo base_url(). 'paket/delete/' . $data_paket->id_paket?>" class="btn btn-danger btn-icon-split">
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
  </div>
  <div class="tab-pane fade" id="nav-kelompok" role="tabpanel" aria-labelledby="nav-kelompok-tab">
    <hr>
     <a href="<?php echo base_url('paket/exportExcel2/')?>" class=" btn btn-sm bg-success text-gray-100 shadow-sm" ><i class="fa fa-file-excel fa-sm "></i> Export Excel</a>
    <div class="row">
          <div class="col-lg-12">
            <div class="card shadow mb-4">
              <div class="card-header py-2 ">
                Data Paket Keluar
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered nowrap text-center" id="dataTable"  cellspacing="0">
            <thead>
             <tr>
              <th>NO</th>
              <th>Nama Paket</th>
              <th>Tanggal Diterima</th>
              <th>Nama Kategori</th>
              <th>Penerima</th>
              <th>Status</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no=1;
            foreach ($paket2 as $data_paket2 ) {
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data_paket2->nama_paket ?></td>
                <td><?php echo $data_paket2->tanggal_diterima ?></td>
                <td><?php echo $data_paket2->nama_kategori ?></td>
                <td><?php echo $data_paket2->nama_santri?></td>
                <td><?php echo $data_paket2->status_paket?></td>
                </td>
                <td><center>
                 <a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#ModalDetail<?php echo $data_paket2->id_paket; ?>" ><i class="fa fa-info"></i></a>
                  <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-circle"  ><i class="fa fa-edit"></i></a>
                  <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $data_paket2->id_paket; ?>" ><i class="fa fa-trash"></i></a>
                </center></td>
              </tr>

<!-- MODAL Detail -->
            <div  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalDetail<?php echo $data_paket2->id_paket; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <strong>Nama Paket</strong> : <?php echo $data_paket2->nama_paket; ?><br>
                    <strong>Tanggal Diterima</strong> : <?php echo $data_paket2->tanggal_diterima; ?><br>
                    <strong>Kategori</strong> : <?php echo $data_paket2->nama_kategori; ?><br>
                    <strong>Penerima</strong> : <?php echo $data_paket2->nama_santri; ?><br>
                    <strong>Asrama</strong> : <?php echo $data_paket2->nama_asrama; ?><br>
                    <strong>Gedung</strong> : <?php echo $data_paket2->gedung; ?><br>
                    <strong>Pengirim Paket</strong> : <?php echo $data_paket2->pengirim_paket; ?><br>
                    <strong>Isi Paket_sita</strong> : <?php echo $data_paket2->isi_paket_sita; ?><br>
                    <strong>Status Paket</strong> : <?php echo $data_paket2->status_paket; ?><br>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!--END MODAL detail-->
              <!-- MODAL Hapus -->
              <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $data_paket2->id_paket; ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete this data?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Apakah kamu yakin ingin menghapus data ini ?</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a href="<?php echo base_url(). 'paket/delete/' . $data_paket2->id_paket?>" class="btn btn-danger btn-icon-split">
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
