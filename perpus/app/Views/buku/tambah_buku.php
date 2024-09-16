<?= $this->extend('template/login') ?>

<?= $this->section('content') ?>
<?php if (isset($messege)): ?>
    <input type="hidden" name="" id="pesan" value="<?= $messege ?>">
<?php endif; ?>
<div class="register-box">

    <div class="container mt-5">
        <h2>Tambah Buku</h2>
        <form action="">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" placeholder="Masukkan judul" required>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" class="form-control" id="penulis" placeholder="Masukkan penulis" required>
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" placeholder="Masukkan penerbit" required>
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" placeholder="Masukkan tahun terbit" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="tambah()">Simpan</button>
        </form>
    </div>
</div>

<script>
    function tambah() {
        var judul = document.getElementById('judul').value
        var penerbit = document.getElementById('penerbit').value
        var tahun_terbit = document.getElementById('tahun_terbit').value
        var penulis = document.getElementById('penulis').value

        let formulir = new FormData()
        formulir.append('judul', judul)
        formulir.append('penulis', penulis)
        formulir.append('penerbit', penerbit)
        formulir.append('tahun_terbit', tahun_terbit)
        formulir.append('status', 'tersedia')
        if (!judul || !penerbit || !penulis || !tahun_terbit) {
            alert('Isi seluruh data dengan lengkap')
        } else {
            fetch(
                `http://localhost:8080/tambahBuku`, {
                    method: 'POST',
                    body: formulir
                }
            ).then(response => {
                window.location.href='http://localhost:8080/buku'
            })
        }
    }
    var pesan = document.getElementById('pesan').value
    if (pesan) {
        alert(String(pesan))
    }
</script>
<?= $this->endSection() ?>