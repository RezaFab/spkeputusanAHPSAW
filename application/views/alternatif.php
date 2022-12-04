<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'head.php' ?>
</head>

<body id="page-top">
  <?php include 'navbar.php' ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Daftar Alternatif</h1>
    </div>

    <!-- Cards -->
    <div class="row">

      <div class="col-lg-8">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="fa fa-sign-in" class="m-0 font-weight-bold text-primary"><a href="#" data-toggle="modal" data-target="#importModal"> Import Alternatif</a></h6>
          </div>
          <div class="card">

            <div class="card-body table-responsive p-0" style="height: 350px;">
              <table class="table table-head-fixed">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Keputusan</th>
                    <th>Alternatif</th>
                    <th>NISN</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  if ($alternatif) {
                    foreach ($alternatif as $k) {
                      $i++; ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $k->nama_keputusan; ?></td>
                        <td><?php echo $k->nama_alternatif; ?></td>
                        <td><?php echo $k->nisn_alternatif; ?></td>
                        <td>
                          <a href="<?php echo base_url('dashboard/edit_alternatif/' . $k->id_alternatif) ?>" class="btn btn-sm btn-warning"><span class="fas fa-edit"></span></a>
                          <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="<?php echo base_url('dashboard/aksi_hapus_alternatif/' . $k->id_alternatif) ?>" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span></a>
                        </td>
                      </tr>
                    <?php }
                  } else { ?>
                    <tr>
                      <td colspan=4>
                        <center>Belum ada alternatif yang dibuat</center>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>


      <div class="col-lg-4">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Alternatif Baru</h6>
          </div>
          <div class="card-body">
            <!-- form tambah keputusan -->
            <form role="form" action="aksi_tambah_alternatif" method="post">
              <div class="card-body">
                <?php if ($this->session->flashdata('notifsukses') == TRUE) echo '<p class="login-box-msg text-success" id="flash-messages">' . $this->session->flashdata('notifsukses') . '</p>'; ?>
                <div class="form-group">
                  <label for="NISN">NISN</label>
                  <input name="nisn" type="text" class="form-control" placeholder="Masukkan NISN...">
                </div>
                <div class="form-group">
                  <label for="Nama Alternatif">Nama Alternatif</label>
                  <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama...">
                </div>
                <div class="form-group">
                  <label for="Jenis Kelamin">Jenis Kelamin</label>
                  <select name="jk" class="form-control" placeholder="Pilih Jenis Kelamin">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Tanggal Lahir">Tanggal Lahir</label>
                  <input class="form-control" class type="date" name="tanggalLahir" id="tanggalLahir">
                </div>
                <div class="form-group">
                  <label for="Nama Alternatif">Kelas</label>
                  <select name="Kelas" class="form-control" placeholder="Pilih Kelas">
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                  </select>
                  <select name="Jurusan" class="form-control" placeholder="Pilih Jurusan">
                    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                    <option value="Tata Busana">Tata Busana</option>
                    <option value="Teknik kendaraan ringan">Teknik kendaraan ringan</option>
                    <option value="Teknik pengelasan">Teknik pengelasan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="th">Tahun Masuk</label>
                  <input name="th" type="number" min="1900" max="2099" step="1" value="2022" class="form-control" placeholder="Masukkan Tahun Masuk...">
                </div>
                <div class="form-group">
                  <label for="Keputusan">Pilih Pendukung Keputusan</label>
                  <select name="id_keputusan" class="form-control">
                    <?php foreach ($keputusan as $j) { ?>
                      <option value="<?php echo $j->id_keputusan; ?>"><?php echo $j->nama_keputusan; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            <!-- end of form tambah keputusan -->
          </div>
        </div>
      </div>

    </div>
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Alternatif</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('Dashboard/import_excel'); ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Pilih File Excel</label>
                <input type="file" name="fileExcel">
              </div>
              <div class="form-group">
                <label for="Keputusan">Pilih Pendukung Keputusan</label>
                <select name="id_keputusan" class="form-control">
                  <?php foreach ($keputusan as $j) { ?>
                    <option value="<?php echo $j->id_keputusan; ?>"><?php echo $j->nama_keputusan; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div>
                <button class='btn btn-success' type="submit">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                  Import
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Cards -->

  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <?php include 'footer.php' ?>