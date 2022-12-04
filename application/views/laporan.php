<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php' ?>
</head>
<style>
    @media screen {
        #printSection {
            display: none;
        }
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #printSection,
        #printSection * {
            visibility: visible;
        }

        #printSection {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>

<body id="page-top">
    <?php include 'navbar.php' ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cetak Laporan</h1>
        </div>

        <!-- Cards -->
        <div class="row">

            <div class="col-lg-8">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Laporan Yang Dapat Dicetak</h6>
                    </div>
                    <div class="card-body">

                        <div class="card-body table-responsive p-0" style="height: 350px;">
                            <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    if ($keputusan) {
                                        foreach ($keputusan as $k) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $k->nama_keputusan; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('dashboard/detail_kriteria/' . $k->id_keputusan) ?>" class="btn btn-sm btn-success"><span class="fas fa-search-plus"></span></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan=6>
                                                <center>Belum ada pendukung keputusan yang dibuat</center>
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
                        <h6 class="m-0 font-weight-bold text-primary">Catatan</h6>
                    </div>
                    <div class="card-body">
                        <!-- form tambah keputusan -->

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