<?= $this->extend('template/login.php') ?>
<?= $this->section('content') ?>

<div>
    <table border="1" class="table table-bordered">
        <tr class="bg-dark text-white">
            <td>No</td>
            <td>Peminjam</td>
            <td>Judul</td>
            <td>Tanggal peminjaman</td>
            <td>Tangal Pengembalian</td>
            <td>Status peminjaman</td>
            <td>Edit</td>
            <td>Hapus</td>
        </tr>
        <?php $nomor = 1;
        foreach ($dataPinjam as $key) { ?>
            <tr>
                <td><?php echo $nomor ?></td>

                <td><?php echo ($key["Username"]) ?></td>
                <td><?php echo ($key["judul"]) ?></td>
                <td><?php echo ($key["TanggalPeminjaman"]) ?></td>
                <td><?php echo ($key["TanggalPengembalian"]) ?></td>
                <td><?php echo ($key["StatusPeminjaman"]) ?></td>

                <td>
                    <form action="/edit_pinjam" method="post">
                        <input type="hidden" name="PeminjamanID" value="<?= $key["PeminjamanID"] ?>">
                        <input type="hidden" name="UserID" value="<?= $key["UserID"] ?>">
                        <input type="hidden" name="judul" value="<?= $key["judul"] ?>">
                        <input type="hidden" name="Username" value="<?= $key["Username"] ?>">
                        <input type="hidden" name="TanggalPeminjaman" value="<?= $key["TanggalPeminjaman"] ?>">
                        <input type="hidden" name="TanggalPengembalian" value="<?= $key["TanggalPengembalian"] ?>">
                        <input type="hidden" name="BukuID" value="<?= $key["id_buku"] ?>">
                        <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    </form>
                </td>
                <td>
                    <form action="/hapus_pinjam" method="post" class="formHapus">
                        <input type="hidden" value="<?= $nomor ?>" name="nomor">
                        <input type="hidden" name="PeminjamanID" value="<?= $key["PeminjamanID"] ?>">
                        <?php if ($key["StatusPeminjaman"] == "belum kembali") { ?>
                            <button disabled="disabled" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        <?php } ?>

                    </form>
                </td>
                <?php if ($key["StatusPeminjaman"] == "belum kembali"): ?>
                    <form action="/kembali_buku" method="post">
                        <input type="hidden" name="BukuID" value="<?= $key["id_buku"] ?>">
                        <input type="hidden" name="PeminjamanID" value="<?= $key["PeminjamanID"] ?>">
                        <td>
                            <button type="submit" class="btn btn-primary">
                                kembalikan
                            </button>
                        </td>
                    </form>
                <?php endif; ?>

            </tr>
        <?php $nomor++;
        } ?>
    </table>
    <a href="http://localhost:8080/pinjam_buku" class="btn btn-success">tambah</a>
</div>
<script>
    document.querySelectorAll('.formHapus').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            var nomor = this.querySelector('input[name="nomor"]').value
            if (!confirm("Hapus data dengan nomor " + nomor + "?")) {
                event.preventDefault();
            }
        })
    })
</script>

<!-- Navbar -->

<!-- /.navbar -->

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->

<?= $this->endSection() ?>