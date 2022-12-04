<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard/') ?>">
      <div class="sidebar-brand-text mx-6">SPK Siswa Terbaik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($this->uri->segment(1) == "dashboard") {
                          echo "active";
                        } ?>">
      <a class="nav-link" href="<?php echo base_url('dashboard/') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Input Data
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item  <?php if ($this->uri->segment(2) == "keputusan") {
                            echo "active";
                          } ?>">
      <a class="nav-link" href="<?php echo base_url('dashboard/keputusan') ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Keputusan</span></a>
    </li>
    <li class="nav-item  <?php if ($this->uri->segment(2) == "kriteria") {
                            echo "active";
                          } ?>">
      <a class="nav-link" href="<?php echo base_url('dashboard/kriteria') ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Kriteria</span></a>
    </li>
    <li class="nav-item  <?php if ($this->uri->segment(2) == "alternatif") {
                            echo "active";
                          } ?>">
      <a class="nav-link" href="<?php echo base_url('dashboard/alternatif') ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Alternatif</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Hitung Data
    </div>

    <li class="nav-item  <?php if ($this->uri->segment(2) == "hitungkriteria") {
                            echo "active";
                          } ?>">
      <a class="nav-link" href="<?php echo base_url('dashboard/hitungkriteria') ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Hitung Kriteria</span></a>
    </li>
    <li class="nav-item  <?php if ($this->uri->segment(2) == "hitungalternatif") {
                            echo "active";
                          } ?>">
      <a class="nav-link" href="<?php echo base_url('dashboard/hitungalternatif') ?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Hitung Alternatif</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama_user') ?></span>
              <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
              <i class="fas fa-user fa-fw "></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" data-toggle="modal" data-target="#profileModal">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
      <!-- End of Topbar -->