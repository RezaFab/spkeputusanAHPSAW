<!-- Logout Modal-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda ingin keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih keluar jika anda benar-benar ingin keluar.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?php echo base_url('auth/keluar') ?>">Keluar</a>
      </div>
    </div>
  </div>
</div>
<?php
$id = $this->session->userdata('id_user');
$userdata = $this->db->query("SELECT * FROM user WHERE id_user = ' $id ' ")->result_array();
?>
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="<?php echo base_url('dashboard/update_profile') ?>" method="post">
          <div class="card-body">
            <?php foreach ($userdata as $p) { ?>
              <input type="hidden" name="id_user" value="<?= $p['id_user']; ?>">
              <div class="form-group">
                <label for="user">Nama User</label>
                <input name="user" type="text" class="form-control" value="<?php echo $p['nama_user']; ?>">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="text" class="form-control" value="<?php echo $p['email'] ?>">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" value="<?php echo $p['username'] ?>">
              </div>
              <div class="form-group">
                <label for="pass">Password</label>
                <input name="pass" type="text" class="form-control" value="" placeholder="Tulis untuk mengganti">
              </div>
              <div class="form-group">
                <label for="role">Role</label>
                <input name="role" type="text" class="form-control" value="<?php echo $p['peran'] ?>">
                <br>
                <button type="submit" class="btn btn-primary"> Simpan</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">Kembali</button>
              </div>
            <?php } ?>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>