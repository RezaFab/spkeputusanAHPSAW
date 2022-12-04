<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'head.php' ?>
</head>
<style>
  .lcfont {
    font-family: "Lucida Console";
  }

  .page[size="A4"] {
    background: white;
    font: "Lucida Console";
    width: 21cm;
    height: 29.7cm;
    display: block;
    margin: 0 auto;
    box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
  }

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
      position: fixed;
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
      <h1 class="h3 mb-0 text-gray-800">Detail Pemberian Bobot Kriteria</h1>
    </div>

    <!-- Cards -->
    <div class="row">

      <div class="col-lg-6">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bobot Kriteria</h6>
          </div>
          <div class="card-body">
            <table class="table">
              <tr>
                <th>Keputusan</th>
                <th>Kriteria</th>
                <th>Bobot Kriteria</th>
                <th>Atribut</th>
              </tr>
              <?php
              if ($kriteria) {
                foreach ($kriteria as $k) { ?>
                  <tr>
                    <td><?php echo $k->id_keputusan; ?></td>
                    <td><?php echo $k->nama_kriteria; ?></td>
                    <td><?php echo $k->bobot_kriteria; ?></td>
                    <td><?php echo $k->atribut; ?></td>
                  </tr>
                <?php }
              } else { ?>
                <tr>
                  <td colspan=2>
                    <center>Belum ada kriteria yang dibuat</center>
                  </td>
                </tr>
              <?php } ?>
            </table>
            <button type="button" class="btn btn-warning" onclick="history.back(-1)">Kembali</button>
            <button class="btn btn-primary status" data-toggle="modal" data-target="#printKriteria">Print</button>
          </div>
        </div>
      </div>

    </div>

    <!-- End of Cards -->
    <div class="modal fade" id="printKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Print Laporan Kriteria</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <page size="A4">
            <div id="printThis1">
              <div class="modal-body">
                <div class="lcfont">
                  <p style="text-align: center;"><strong> </strong><span style="text-decoration: underline;"><strong>Laporan Perhitungan Kriteria</strong></span></p>
                  <table class="table">
                    <tr>
                      <th>Keputusan</th>
                      <th>Kriteria</th>
                      <th>Bobot Kriteria</th>
                      <th>Atribut</th>
                    </tr>
                    <?php
                    if ($kriteria) {
                      foreach ($kriteria as $k) { ?>
                        <tr>
                          <td><?php echo $k->id_keputusan; ?></td>
                          <td><?php echo $k->nama_kriteria; ?></td>
                          <td><?php echo $k->bobot_kriteria; ?></td>
                          <td><?php echo $k->atribut; ?></td>
                        </tr>
                      <?php }
                    } else { ?>
                      <tr>
                        <td colspan=2>
                          <center>Belum ada kriteria yang dibuat</center>
                        </td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </page>
          <div class="modal-footer">
            <button class="btn btn-primary" id="printLaporanKriteria">print</button>
          </div>
        </div>
      </div>
      <div id="printThis2" style="display: none;">
        <?php
        date_default_timezone_set('Asia/Jakarta');
        echo 'Dicetak Pada ' . date('d-m-Y H:i:s');
        ?>
      </div>
    </div>

  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <?php include 'footer.php' ?>



  <script>
    document.getElementById("printLaporanKriteria").onclick = function() {
      printElement(document.getElementById("printThis1"));
      $('#printThis2').show();
      printElement(document.getElementById("printThis2"), true, "<hr />");
      $('#printThis2').hide();
      window.print();
    }

    function printElement(elem, append, delimiter) {
      var domClone = elem.cloneNode(true);

      var $printSection = document.getElementById("printSection");

      if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
      }

      if (append !== true) {
        $printSection.innerHTML = "";
      } else if (append === true) {
        if (typeof(delimiter) === "string") {
          $printSection.innerHTML += delimiter;
        } else if (typeof(delimiter) === "object") {
          $printSection.appendChlid(delimiter);
        }
      }

      $printSection.appendChild(domClone);
    }
  </script>