<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'head.php'?>
</head>

<body id="page-top">
<?php include 'navbar.php' ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Keputusan</h1>
          </div>

          <!-- Cards -->
          <div class="row">

            <div class="col-lg-8">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Pendukung Keputusan</h6>
                </div>
                <div class="card-body">

              <div class="card-body table-responsive p-0" style="height: 350px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i = 0;
                    if($keputusan){
                    foreach($keputusan as $k) { $i++;?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $k->nama_keputusan; ?></td>
                      <td><?php echo $k->deskripsi; ?></td>
                      <td>
                        <a href="<?php echo base_url('dashboard/edit_keputusan/'.$k->id_keputusan) ?>" class="btn btn-sm btn-warning"><span class="fas fa-edit"></span></a>
                        <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="<?php echo base_url('dashboard/aksi_hapus_keputusan/'.$k->id_keputusan) ?>" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span></a>
                      </td>
                    </tr>
                    <?php }} else { ?>
                    <tr><td colspan=4><center>Belum ada pendukung keputusan yang dibuat</center></td></tr>
                    <?php }?>
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
                  <h6 class="m-0 font-weight-bold text-primary">Pendukung Keputusan Baru</h6>
                </div>
                <div class="card-body">
                  <!-- form tambah keputusan -->
                  <form role="form" action="aksi_tambah_keputusan" method="post">
                  <div class="card-body">
                  <?php if($this->session->flashdata('notifsukses')==TRUE) echo '<p class="login-box-msg text-success" id="flash-messages">'.$this->session->flashdata('notifsukses').'</p>';?>
                  <div class="form-group">
                    <label for="Nama Pendukung Keputusan">Nama Pendukung Keputusan</label>
                    <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama...">
                  </div>
                  <div class="form-group">
                    <label for="Deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi..."></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  </form>
                  <!-- end of form tambah keputusan -->
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
<?php include 'footer.php'?>