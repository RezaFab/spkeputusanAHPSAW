<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'head.php' ?>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
              </div>
              <form class="user" method="POST" action="<?php echo base_url('auth/aksi_daftar') ?>">
                <div class="form-group">
                  <input name="username" type="text" class="form-control form-control-user" placeholder="Username">
                </div>
                <div class="form-group">
                  <input name="nama_user" type="text" class="form-control form-control-user" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-user" placeholder="Alamat Email">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-user" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Daftar
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?php echo base_url('auth') ?>">Sudah punya akun? Masuk di sini!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php include 'footer.php' ?>

</body>

</html>
