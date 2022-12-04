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
      <h1 class="h3 mb-0 text-gray-800">Hitung Bobot Kriteria</h1>
    </div>

    <!-- Cards -->
    <div class="row">

      <div class="col-lg-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Masukkan Rasio Prioritas</h6>
          </div>
          <div class="card-body">
            <form action="aksi_hitung_bobot" method="post">
              <table class="table">
                <tr>
                  <td colspan="1"><b>Data Kriteria</b><br></td>
                  <?php
                  foreach ($kriteria as $k) {; ?>
                    <td><?php echo $k->nama_kriteria; ?></td>
                  <?php } ?>
                </tr>
                <?php
                $j = 0;
                foreach ($kriteria as $k) {
                  $j++; ?>
                  <tr>
                    <td><?php echo $k->nama_kriteria; ?></td>
                    <?php
                    $i = 0;
                    foreach ($kriteria as $k) {
                      $i++; ?>
                      <td><input type="text" maxlength="4" size="3" name="<?php echo 'k' . $i . $j ?>"></td>
                    <?php } ?>
                  </tr>
                <?php } ?>
              </table>
              <input type="hidden" name="jumlah_kriteria" value="<?php echo $this->MainModel->tampil_jumlah('id_keputusan = ' . $k->id_keputusan, 'kriteria'); ?>">
              <input type="hidden" name="id_kriteria" value="<?php echo $k->id_kriteria; ?>">
              <input type="hidden" name="id_keputusan" value="<?php echo $k->id_keputusan; ?>">
              <button type="submit" class="btn btn-primary">Lanjut</button>
              <button type="button" class="btn btn-warning" onclick="history.back(-1)">Batal</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tingkat Kepentingan</h6>
          </div>
          <div class="card-body">
            <table class="table">
              <tr>
                <td><b>9</b></td>
                <td>Mutlak lebih penting</td>
              </tr>
              <tr>
                <td><b>7</b></td>
                <td>Sangat lebih penting</td>
              </tr>
              <tr>
                <td><b>5</b></td>
                <td>Lebih penting</td>
              </tr>
              <tr>
                <td><b>3</b></td>
                <td>Cukup penting</td>
              </tr>
              <tr>
                <td><b>1</b></td>
                <td>Sangat penting</td>
              </tr>
            </table>
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