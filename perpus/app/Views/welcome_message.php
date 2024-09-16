<?= $this->extend('template/login2.php') ?>

<?= $this->section('welcome') ?><div class="login-box">

  <?php if (isset($messege)): ?>
    <script>
      alert('<?= $messege ?>')
    </script>
    <?php unset($messege) ?>

  <?php endif; ?>
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1><b>Selamat Datang</b></h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row pr-2">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
            <a href="/" class="btn btn-primary col-4">Sign In</a>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="/register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<?= $this->endSection() ?>
<!-- HEADER: MENU + HEROE SECTION -->
<script>
  var pesan = document.getElementById('pesan').value
  if (pesan) {
    alert(String(pesan))
  }
</script>

<!-- -->

</body>

</html>