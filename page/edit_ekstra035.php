<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Ekstrakurikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM ekstra_035 WHERE id_ekstra035='$id'"));

if(isset($_POST['edit'])){
    $id_ekstra_010 = $_POST['id_ekstra035'];
    $nama_ekstra_010 = $_POST['nama_ekstra035'];
    $ket_010 = $_POST['ket035'];
    $semester_010 = $_POST['semester035'];
    $thn_ajaran_010 = $_POST['thn_ajaran035'];

    $update = mysqli_query($koneksi,"UPDATE ekstra_035 SET nama_ekstra035='$nama_ekstra035', ket035='$ket035', semester035='$semester035', thn_ajaran035='$thn_ajaran035' WHERE id_ekstra035='$id_ekstra_035' ");
    if($update){
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra035">';
    }else{
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Gagal Disimpan</h4></div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="id_ekstra_010">ID Ekstra</label>
                            <input type="text" name="id_ekstra035" value="<?= $edit['id_ekstra035']; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_ekstra_010">Nama Ekstrakurikuler</label>
                            <input type="text" name="nama_ekstra_010" value="<?= $edit['nama_ekstra035']; ?>" id="nama_ekstra035" placeholder="Nama Ekstrakurikuler" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ket_010">Keterangan</label>
                            <input type="text" name="ket_010" value="<?= $edit['ket035']; ?>" id="ket035" placeholder="Keterangan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="semester035">Semester</label>
                            <select name="semester035" id="semester035" class="form-control">
                                <option value="">Pilih Semester</option>
                                <option value="1" <?= ($edit['semester035'] == '1') ? 'selected' : ''; ?>>Semester 1</option>
                                <option value="2" <?= ($edit['semester035'] == '2') ? 'selected' : ''; ?>>Semester 2</option>
                                <option value="3" <?= ($edit['semester035'] == '3') ? 'selected' : ''; ?>>Semester 3</option>
                                <option value="4" <?= ($edit['semester035'] == '4') ? 'selected' : ''; ?>>Semester 4</option>
                                <option value="5" <?= ($edit['semester035'] == '5') ? 'selected' : ''; ?>>Semester 5</option>
                                <option value="6" <?= ($edit['semester035'] == '6') ? 'selected' : ''; ?>>Semester 6</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="thn_ajaran_010">Tahun Ajaran</label>
                            <select name="thn_ajaran_010" id="thn_ajaran_010" class="form-control">
                                <option value="">Pilih Tahun Ajaran</option>
                                <option value="2023/2024" <?= ($edit['thn_ajaran035'] == '2023/2024') ? 'selected' : ''; ?>>2023/2024</option>
                                <option value="2024/2025" <?= ($edit['thn_ajaran035'] == '2024/2025') ? 'selected' : ''; ?>>2024/2025</option>
                                <option value="2025/2026" <?= ($edit['thn_ajaran035'] == '2025/2026') ? 'selected' : ''; ?>>2025/2026</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="edit" value="simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>