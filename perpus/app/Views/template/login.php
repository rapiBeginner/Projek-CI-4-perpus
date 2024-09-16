<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('asset/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('asset/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('asset/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/css/adminlte.min.css') ?>">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- jQuery -->
  <script src="<?= base_url('asset/jquery-3.7.1.min.js') ?>"></script>
  <style>
    td{
      text-align: center;
    }
    .sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #343a40;
      padding: 20px;
      z-index: 100;
    }
    .sidebar .nav-link {
      color: #ffffff;
    }
    .sidebar .nav-link:hover{
      background-color: #007bff;
    }
    .sidebar .nav-link.active {
      background-color: #007bff;
      color: #ffffff;
    }
    .content-wrapper {
      margin-left: 260px;
      padding: 20px;
    }
    .content {
      margin-top: 20px;
    }
  </style>
</head>

<body class="hold-transition login-page pt-5">
  <div class="sidebar">
    <h4 class="text-white">Admin Panel</h4>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="/buku">Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/data_user">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/data_pinjam">Lending</a>
      </li>
    </ul>
  </div>

  <div class="content-wrapper">
    <?= $this->renderSection('content') ?>
    <?= $this->renderSection('welcome') ?>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url('asset/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('asset/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('asset/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/js/adminlte.min.js') ?>"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>
