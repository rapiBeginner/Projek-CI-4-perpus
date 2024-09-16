<?= $this->extend('template/login2.php') ?>
<?= $this->section('welcome') ?>
  <?php if (isset($messege)): ?>
    <script>
      alert('<?= $messege ?>')
    </script>
    <?php unset($messege) ?>
  <?php endif; ?>
  <div class="register-box mb-5">
    <div class="register-logo">
      <a href="../../index2.html"><b>Registrasi</b></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="/register" method="post" id="registerForm">
          <div class="input-group mb-3">
            <input required type="text" class="form-control" placeholder="Username" name="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input required type="text" class="form-control" placeholder="Nama lengkap" name="NamaLengkap">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input required type="email" class="form-control" placeholder="Email" name="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input required type="password" class="form-control" placeholder="Password" name="Password" id="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input required type="password" class="form-control" placeholder="Retype password" id="retypePassword">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input required type="text" class="form-control" placeholder="Alamat" name="Alamat">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-home"></span>
              </div>
            </div>
          </div>

          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
      </div>
      </form>



      <a href="/" class="text-center mb-3">Saya sudah memiliki akun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
  <script>
    document.addEventListener('submit', function(event) {
        var messege = document.getElementById('pesan');
        var pw = document.getElementById('password').value;
        var rtpw = document.getElementById('retypePassword').value;

        if(pw.length < 6){
          event.preventDefault()
          alert('Panjang password minimal 6 karakter')
        }
        // Cek jika password dan retype password tidak sama
        else if (pw != rtpw) {
          event.preventDefault()
          alert('Password dan retype password tidak sama!');; // Mencegah form dari submit
        }
      }

    );
  </script>


  <?= $this->endSection() ?>