<?= $this->extend('template/login.php') ?>
<?= $this->section('content') ?>

<div>
    <table border="1" class="table table-bordered">
        <tr class="bg-dark text-white">
            <td>No</td>
            <td>Username</td>
            <td>Email</td>
            <td>Nama Lengkap</td>
            <td>Alamat</td>
            <td>Hak Akses</td>
            <td>Edit</td>
            <td>Hapus</td>
        </tr>
        <?php $nomor = 1;
        foreach ($data as $key) { ?>
            <tr>
                <td><?php echo $nomor ?></td>
                <td><?php echo ($key["Username"]) ?></td>
                <td><?php echo ($key["Email"]) ?></td>
                <td><?php echo ($key["NamaLengkap"]) ?></td>
                <td><?php echo ($key["Alamat"]) ?></td>
                <td><?php echo ($key["hak_akses"]) ?></td>
                <td>
                    <form action="/edit_user" method="post">
                        <input type="hidden" name="UserID" value="<?= $key['UserID'] ?>">
                        <input type="hidden" name="Username" value="<?= $key['Username'] ?>">
                        <input type="hidden" name="Password" value="<?= $key['Password'] ?>">
                        <input type="hidden" name="Email" value="<?= $key['Email'] ?>">
                        <input type="hidden" name="NamaLengkap" value="<?= $key['NamaLengkap'] ?>">
                        <input type="hidden" name="Alamat" value="<?= $key['Alamat'] ?>">
                        <input type="hidden" name="hak_akses" value="<?= $key['hak_akses'] ?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    </form>
                </td>
                <td>
                    <form action="/delete_user" method="post" class="formHapus">
                        <input type="hidden" name="nomor" value="<?=$nomor?>">
                        <input type="hidden" name="UserID" value="<?php echo ($key['UserID']) ?>">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php $nomor++;
        } ?>
    </table>
    <a href="http://localhost:8080/register" class="btn btn-success">tambah</a>
</div>
<script>
    document.querySelectorAll('.formHapus').forEach(function(form){
        form.addEventListener('submit', function(event){
            var nomor= this.querySelector('input[name="nomor"]').value
            if(!confirm('Hapus data nomor '+nomor+ ' ?')){
                event.preventDefault
            }
        })
    })
</script>
<!-- Navbar -->

<!-- /.navbar -->

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->

<?= $this->endSection() ?>