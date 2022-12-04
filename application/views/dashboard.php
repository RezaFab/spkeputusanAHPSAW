<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'head.php' ?>
</head>
<?php
$keputusan = $this->db->query("SELECT count(id_keputusan) AS keputusan FROM pendukung_keputusan ")->row_array()['keputusan'];
$kriteria = $this->db->query("SELECT count(id_kriteria) AS kriteria FROM kriteria ")->row_array()['kriteria'];
$alternatif = $this->db->query("SELECT count(id_alternatif) AS alternatif FROM alternatif ")->row_array()['alternatif'];

?>

<body id="page-top">
  <?php include 'navbar.php' ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-md-6 col-xl-3">
        <div class="small-box bg-gradient-info d-flex align-items-baseline" style="height: 128px;">
          <div class="col">
            <h5 style="color:white;" class="card-title font-weight-bold mb-0">Jumlah Keputusan</h5>
            <span style="color:white;" class="h2 font-weight-bold mb-0"><?= $keputusan ?></span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
              <i class="ni ni-single-02"></i>
            </div>
          </div>
          <i style="color:white;" class="fa fa-bookmark-o fa-3x"></i>
        </div>
      </div>
      <div class="col-md-6 col-xl-3">
        <div class="small-box bg-gradient-warning d-flex align-items-baseline" style="height: 128px;">
          <div class="col">
            <h5 style="color:white;" class="card-title font-weight-bold mb-0">Jumlah Kriteria</h5>
            <span style="color:white;" class="h2 font-weight-bold mb-0"><?= $kriteria ?></span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
              <i class="ni ni-single-02"></i>
            </div>
          </div>
          <i style="color:white;" class="fa fa-bookmark-o fa-3x"></i>
        </div>
      </div>
      <div class="col-md-6 col-xl-3">
        <div class="small-box bg-gradient-success d-flex align-items-baseline" style="height: 128px;">
          <div class="col">
            <h5 style="color:white;" class="card-title font-weight-bold  mb-0">Jumlah Alternatif</h5>
            <span style="color:white;" class="h2 font-weight-bold mb-0"><?= $alternatif ?></span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
              <i class="ni ni-single-02"></i>
            </div>
          </div>
          <i style="color:white;" class="fa fa-bookmark-o fa-3x"></i>
        </div>
      </div>
    </div>
    <br></br>
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="card mb-3">
          <div class="card-header-tab card-header-tab-animation card-header">
            <div class="row">
              <div class="h5 mb-0 text-gray-800">
                <i class="fas fa-bars mr-1"></i>
                <!-- Page Heading -->
                <br> Selamat datang di Sistem Pendukung Keputusan menggunakan metode Analytical Hierarchy Process (AHP) dan <br> Simple Additive Weighting (SAW). Sistem ini dapat membantu memberikan keputusan dengan lebih efektif dan <br>efisien dibandingkan dengan perhitungan manual. Pada sistem ini terdapat kombinasi dari 2 metode, yaitu metode <br>AHP digunakan untuk mencari bobot kriteria dan metode SAW untuk menghitung pembobotan alternatif sehingga<br> menghasilkan alternatif terbaik.</h5>
                <!-- Scroll to Top Button-->
                </h5>

              </div>


              <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
              </a>
              <?php include 'footer.php' ?>