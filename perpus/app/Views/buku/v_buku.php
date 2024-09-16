<?= $this->extend('template/login') ?>

<?= $this->section('content') ?>

<div>
    <table border="1" class="table table-bordered">
        <tr class="bg-dark text-white">
            <td>No</td>
            <td>Judul</td>
            <td>Penulis</td>
            <td>penerbit</td>
            <td>Tahun terbit</td>
            <td>Status peminjaman</td>
            <td>Edit</td>
            <td>Hapus</td>
        </tr>
        <?php $nomor = 1;
        foreach ($hasil as $key) { ?>
            <tr>
                <td><?php echo $nomor ?></td>
                <td><?php echo ($key["judul"]) ?></td>
                <td><?php echo ($key["penulis"]) ?></td>
                <td><?php echo ($key["penerbit"]) ?></td>
                <td><?php echo ($key["tahun_terbit"]) ?></td>
                <td><?php echo ($key["status"]) ?></td>
                <td>
                    <form action="/buku_edit" method="post">
                        <input type="hidden" name="id_buku" value="<?php echo($key['id_buku'])?>">
                        <input type="hidden" name="judul" value="<?= $key['judul']?>">
                        <input type="hidden" name="penerbit" value="<?= $key['penerbit']?>">
                        <input type="hidden" name="penulis" value="<?= $key['penulis']?>">
                        <input type="hidden" name="tahun_terbit" value="<?= $key['tahun_terbit']?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    </form>
                </td>
                <td><button class="btn btn-danger" onclick="busek(<?php echo ($key['id_buku']) ?>,<?php echo ($nomor) ?>)"><i class="fas fa-trash"></i></button></td>
            </tr>
        <?php $nomor++;
        } ?>
    </table>
    <a href="http://localhost:8080/buku_tmbh" class="btn btn-success">tambah</a>
</div>
<script>
    function busek(id, nomor) {
        konfirmasi = confirm(`Hapus buku nomor ${nomor}?`)
        if (konfirmasi == true) {
            fetch(
                `http://localhost:8080/hapusBuku/${id}`, {
                    method: 'DELETE'
                }
            ).then(
                response => {
                    window.location.reload()
                }
            )
        }
    }

</script>
<!-- /.login-box -->
<?= $this->endSection() ?>