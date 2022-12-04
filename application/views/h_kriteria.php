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
            <h1 class="h3 mb-0 text-gray-800">Hitung Bobot Kriteria (Menggunakan Metode AHP)</h1>
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
                      <th>Kriteria</th>
                      <th>Alternatif</th>
                      <th>Status</th>
                      <th>Konsistensi</th>
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
                      <td><?php echo $this->MainModel->tampil_jumlah('id_keputusan = '.$k->id_keputusan,'kriteria'); ?></td>
                      <td><?php echo $this->MainModel->tampil_jumlah('id_keputusan = '.$k->id_keputusan,'alternatif'); ?></td>
                      <td><?php if($k->status == 'terisi') echo '<p class="login-box-msg text-success">Sudah Terisi</p>'; else echo '<p class="login-box-msg text-danger">Belum Diisi</p>'; ?></td>
                      <td><?php if($k->konsis == 'konsisten') echo '<p class="login-box-msg text-success">Konsisten</p>'; else echo '<p class="login-box-msg text-danger">Tidak Konsisten</p>'; ?></td>
                      <td>
                        <a href="<?php echo base_url('dashboard/detail_kriteria/'.$k->id_keputusan) ?>" class="btn btn-sm btn-success"><span class="fas fa-search-plus"></span></a>
                      </td>
                    </tr>
                    <?php }} else { ?>
                    <tr><td colspan=6><center>Belum ada pendukung keputusan yang dibuat</center></td></tr>
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
                  <h6 class="m-0 font-weight-bold text-primary">Hitung Bobot Kriteria</h6>
                </div>
                <div class="card-body">
                  <!-- form tambah keputusan -->
                  <form role="form" action="input_raspri" method="post">
                  <div class="card-body">
                  <?php if($this->session->flashdata('notifsukses')==TRUE) echo '<p class="login-box-msg text-success" id="flash-messages">'.$this->session->flashdata('notifsukses').'</p>';?>
                  <div class="form-group">
                    <label for="Pendukung Keputusan">Pilih Pendukung Keputusan</label>
                    <select name="id_keputusan" class="form-control">
                      <?php foreach($keputusan as $j){?>
                      <option value="<?php echo $j->id_keputusan; ?>"><?php echo $j->nama_keputusan; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Lanjut</button>
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