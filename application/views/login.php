<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTEM PENENTUAN STATUS GIZI BURUK</title>
    
    <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>">
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  </head>
  <body class="vh-100">
    <div class="authincation h-100">
      <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
          <div class="col-md-5">
            <div class="authincation-content">
              <div class="row no-gutters">
                <div class="col-xl-12">
                  <div class="auth-form">
                    <h2 class="text-center mb-4">SISTEM PENENTUAN STATUS GIZI BURUK</h2>
                    <form action="<?= base_url('auth/login') ?>" method="post">
                      <div class="form-group">
                        <label class="mb-1"><strong>Username</strong></label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
                      </div>
                      <div class="form-group">
                        <label class="mb-1"><strong>Password</strong></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        <a href="<?= base_url('auth/daftar') ?>" class="btn btn-default btn-block">Daftar</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="<?= base_url('assets/') ?>vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/deznav-init.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/sweetalert2/dist/sweetalert2.min.js"></script>

    <script>
      if( '<?= $this->session->flashdata('alert') ?>' == 'success' ) Swal.fire( 'Berhasil!', '<?= $this->session->flashdata('message') ?>', 'success' );
      if( '<?= $this->session->flashdata('alert') ?>' == 'warning' ) Swal.fire( 'Peringatan!', '<?= $this->session->flashdata('message') ?>', 'warning' );
      if( '<?= $this->session->flashdata('alert') ?>' == 'error' ) Swal.fire( 'Gagal!', '<?= $this->session->flashdata('message') ?>', 'error' );
    </script>
</body>
</html>