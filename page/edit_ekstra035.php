<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Ekstrakulikuer</h1>
            </div>
        </div>
    </div>
</div>

<?php
// Proses hapus data guru
if(isset($_GET['action'])) {
    if($_GET['action'] == "hapus") {
        $id_ekstra035 = $_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM ekstrakulikuler WHERE id_ekstra035 = '$id_ekstra035'");
        if ($query){
            echo '
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-trash"></i> Data Berhasil Dihapus
            </div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=Ekstrakulikuler">';
        } else {
            echo '
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-ban"></i> Gagal Menghapus Data: '.mysqli_error($koneksi).'
            </div>';
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Ekstrakulikuler</h3>
            </div>
            <div class="card-body">
                <a href="index.php?page=tambah_guru" class="btn btn-primary btn-sm mb-3">pilih Ekstrakulikuler</a>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>Id Ekstrakulikuer</th>
                            <th>Nama Ekstrakulikuer</th>
                            <th>Keterangan</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi, "SELECT * FROM Ekstrakulikuler ORDER BY id_esktra035 ASC");
                        if(mysqli_num_rows($query) > 0) {
                            while ($result = mysqli_fetch_array($query)) {
                                $no++;
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $result['id_ekstra035']; ?></td>
                                <td><?= $result['nama_esktra035']; ?></td>
                                <td><?= $result['ket035']; ?></td>
                                <td><?= $result['Semester035']; ?></td>
                                <td><?= $result['thn_ajaran035']; ?></td>
                                <td>
                                    <a href="index.php?page=esktrakulikuler&action=hapus&kd=<?= $result['id_ekstra035'] ?>" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus data ekstrakulikuler <?= $result['nama_ekstrakulikuler']; ?>?')" 
                                       title="Hapus">
                                        <span class="badge badge-danger">Hapus</span>
                                    </a>
                                    <a href="index.php?page=edit_ekstra035&id=<?= $result['id_ekstra035'] ?>" 
                                       title="Edit">
                                        <span class="badge badge-warning">Edit</span>
                                    </a>
                                </td>
                            </tr>
                        <?php 
                            }
                        } else {
                            echo '
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data ekstrakulikuler</td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>