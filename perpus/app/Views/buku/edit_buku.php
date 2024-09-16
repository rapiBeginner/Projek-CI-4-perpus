<?= $this->extend('template/login') ?>
<?= $this->section('content') ?>
<div class="register-box m-5">
   <div class="card-primary">
      <div class="card-header">
         <h3 class="card-title">Edit Buku</h3>
      </div>
      <form method="post">
         <input type="hidden" name="id_buku" id="id_buku" class="form-control" value="<?= $id_buku ?>">
         <div class="form-group">
         </div>
         <div class="form-group mb-4">
            <label for="">Judul Buku</label>
            <input type="text" name="judul" id="judul" value="<?= $judul ?>" class="form-control">
         </div>
         <div class="form-group mb-4">
            <label for="">Penulis</label>
            <input type="text" name="penulis" id="penulis" value="<?= $penulis ?>" class="form-control">
         </div>
         <div class="form-group mb-4">
            <label for="">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" value="<?= $penerbit ?>" class="form-control">
         </div>
         <div class="form-group mb-4">
            <label for="">Tahun terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit" value="<?= $tahun_terbit ?>" class="form-control">
         </div>
         <button type="submit" onclick="edit()" class="btn btn-primary">Simpan</button>
      </form>
   </div>
</div>
<script>
   function edit() {
      var formulir = new FormData()
      formulir.append('id_buku', document.getElementById('id_buku').value)
      formulir.append('judul', document.getElementById('judul').value)
      formulir.append('penulis', document.getElementById('penulis').value)
      formulir.append('penerbit', document.getElementById('penerbit').value)
      formulir.append('tahun_terbit', document.getElementById('tahun_terbit').value)
      fetch('http://localhost:8080/editBuku', {
         method: 'POST',
         body: formulir
      }).then(
         response => {
            window.location.href = 'http://localhost:8080/buku'
         }
      )

   }
</script>
<?= $this->endSection() ?>