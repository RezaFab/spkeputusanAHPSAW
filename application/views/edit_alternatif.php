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
      <h1 class="h3 mb-0 text-gray-800">Alternatif</h1>
    </div>

    <!-- Cards -->
    <div class="row">

      <div class="col-lg-6">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Alternatif</h6>
          </div>
          <div class="card-body">
            <!-- form tambah keputusan -->
            <form role="form" action="<?php echo base_url('dashboard/update_alternatif') ?>" method="post">
              <div class="card-body">
                <?php foreach ($alternatif as $a) { ?>
                  <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input name="nisn" type="text" class="form-control" value="<?php echo $a->nisn_alternatif ?>">
                  </div>
                  <div class="form-group">
                    <label for="Nama Alternatif">Nama Alternatif</label>
                    <input name="nama" type="text" class="form-control" value="<?php echo $a->nama_alternatif ?>">
                  </div>
                  <div class="form-group">
                    <label for="Jenis Kelamin">Jenis Kelamin</label>
                    <select name="jk" class="form-control" placeholder="Pilih Jenis Kelamin">
                      <option value="Laki-Laki" <?php if ($a->jk_alternatif == "Laki-Laki") echo 'selected="selected"'; ?>>Laki-Laki</option>
                      <option value="Perempuan" <?php if ($a->jk_alternatif == "Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tglLahir">Tanggal Lahir</label>
                    <input name="tanggalLahir" type="date" class="form-control" value="<?php echo $a->tglLahir_alternatif ?>">
                  </div>
                  <div class="form-group">
                    <label for="Nama Alternatif">Kelas</label>
                    <select name="Kelas" class="form-control" placeholder="Pilih Kelas">
                      <option value="X" <?php if ($a->kelas_alternatif == "X") echo 'selected="selected"'; ?>>X</option>
                      <option value="XI" <?php if ($a->kelas_alternatif == "XI") echo 'selected="selected"'; ?>>XI</option>
                      <option value="XII" <?php if ($a->kelas_alternatif == "XII") echo 'selected="selected"'; ?>>XII</option>
                    </select>
                    <select name="Jurusan" class="form-control" placeholder="Pilih Jurusan">
                      <option value="Teknik Komputer dan Jaringan" <?php if ($a->jurusan_alternatif == "Teknik Komputer dan Jaringan") echo 'selected="selected"'; ?>>Teknik Komputer dan Jaringan</option>
                      <option value="Tata Busana" <?php if ($a->jurusan_alternatif == "Tata Busana") echo 'selected="selected"'; ?>>Tata Busana</option>
                      <option value="Teknik kendaraan ringan" <?php if ($a->jurusan_alternatif == "Teknik kendaraan ringan") echo 'selected="selected"'; ?>>Teknik kendaraan ringan</option>
                      <option value="Teknik pengelasan" <?php if ($a->jurusan_alternatif == "Teknik pengelasan") echo 'selected="selected"'; ?>>Teknik pengelasan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="th">Tahun Masuk</label>
                    <input name="th" type="number" min="1900" max="2099" step="1" class="form-control" value="<?php echo $a->tahunMasuk_alternatif ?>">
                  </div>
                  <input type="hidden" name="id_alternatif" value="<?php echo $a->id_alternatif ?>">
                <?php } ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-warning" onclick="history.back(-1)">Kembali</button>
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
  <?php include 'footer.php' ?>