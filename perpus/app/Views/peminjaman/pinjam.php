<?= $this->extend('template/login.php') ?>
<?= $this->section('content') ?>

    
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    <?php if (isset($messege)): ?>
        <script>
            alert('<?= $messege ?>')
        </script>
        <?php unset($messege) ?>
    <?php endif; ?>
    <div class="register-box">
        <div class="register-logo">
            <b>Pinjam</b>Buku
        </div>

        <div class="card mb-5">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Isi detail peminjaman</p>

                <form action="/pinjam_buku" method="post" id="registerForm">
                    <label for="Username">Username</label>
                    <div class="input-group mb-4">
                        <select name="Username" id="Username" class="form-control" required>
                            <?php foreach ($User as $key) { ?>
                                <option value="<?= $key["Username"] ?>"><?= $key["Username"] ?></option>
                            <?php }; ?>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <label for="BukuID">Judul Buku</label>
                    <div class="input-group mb-4">
                        <select name="BukuID" id="BukuID" class="form-control">
                            <?php foreach ($Buku as $key) { ?>
                                <option value="<?= $key["id_buku"] ?>"><?= $key["judul"] ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-book"></span>
                            </div>
                        </div>
                    </div>
                    <label for="TanggalPeminjaman" class="form-label">Tanggal Peminjaman</label>
                    <div class="input-group mb-4">
                        <input required type="text" class="form-control" placeholder="Tanggal peminjaman" name="TanggalPeminjaman" id="TanggalPeminjaman" value="<?php echo date('Y/m/d') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-calendar-plus"></span>
                            </div>
                        </div>
                    </div>
                    <label for="TanggalPengembalian">Tanggal Pengembalian</label>
                    <div class="input-group mb-4">
                        <input required type="text" class="form-control" placeholder="Tanggal pengembalian" name="TanggalPengembalian" id="TanggalPengembalian" value="<?php echo date('Y/m/d', strtotime('+3 days')) ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-calendar-check"></span>
                            </div>
                        </div>
                    </div>

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                    <!-- /.col -->
            </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    <script type="text/javascript">
        // document.addEventListener('submit', function(event) {
        //         var messege = document.getElementById('pe');
        //         var pw = document.getElementById('password').value;
        //         var rtpw = document.getElementById('retypePassword').value;
        //         console.log(pw);
        //         console.log(rtpw);


        //         // Cek jika password dan retype password tidak sama
        //         if (pw != rtpw) {
        //             event.preventDefault()
        //             alert('Password dan retype password tidak sama!');; // Mencegah form dari submit
        //         }
        //     }
        // );
        $(function() {
            $('#TanggalPeminjaman').datepicker({
                minDate: '0',
                dateFormat: 'yy/mm/dd'

            })
        })
        $(function() {
            $('#TanggalPengembalian').datepicker({
                minDate: '1',
                maxDate: '14',
                dateFormat: 'yy/mm/dd'
            })
        })
    </script>


    <?= $this->endSection() ?>