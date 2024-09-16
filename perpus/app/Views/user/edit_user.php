<?= $this->extend('template/login') ?>
<?= $this->section('content') ?>

<?php if (isset($messege)) { ?>
  <input type="hidden" name="" id="pesan" value="<?= $messege ?>">
<?php } ?>
<!-- Main content -->
<div class="register-box">

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data pengguna</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/editUser" method="post">
      <input type="hidden" name="UserID" value="<?= $UserID ?>">
      <div class="card-body">
        <div class="form-group">
          <label for="username">Username</label>
          <input required type="text" class="form-control" id="username" name="Username" placeholder="Enter email" value="<?= $Username ?>">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input required type="password" class="form-control" id="password" name="Password" placeholder="Password" value="<?= base64_decode($Password) ?>">
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input required type="email" class="form-control" id="email" name="Email" placeholder="Email" value="<?= $Email ?>">
        </div>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input required type="text" class="form-control" id="nama" name="NamaLengkap" placeholder="Nama" value="<?= $NamaLengkap ?>">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input required type="text" class="form-control" id="alamat" name="Alamat" placeholder="Alamat" value="<?= $Alamat ?>">
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
  </div><!-- /.container-fluid -->
  <!-- /.content -->
</div>


<script>
  document.addEventListener('submit',function(event){
    var pw= document.getElementById('password').value
    if(pw.length < 6){
      event.preventDefault()
      alert('Panjang password minimal 6 karakter')
    }
  })
  var pesan = document.getElementById('pesan').value
  if (pesan) {
    alert(pesan)
    // event.preventDefault()
  }
</script>
<?= $this->endSection() ?>