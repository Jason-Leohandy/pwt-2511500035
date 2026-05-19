<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Ekstrakurikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi, "SELECT max(id_ekstra035) FROM ekstra_035") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);

if($datakode[0]) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "E-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "E-001";
}
$_SESSION["KODE"] = $hasilkode;

if(isset($_POST['tambah'])){
    $id_ekstra035 = mysqli_real_escape_string($koneksi, $_POST['id_ekstra035']);
    $nama_ekstra035 = mysqli_real_escape_string($koneksi, $_POST['nama_ekstra035']);
    $ket035 = mysqli_real_escape_string($koneksi, $_POST['ket035']);
    $semester035 = mysqli_real_escape_string($koneksi, $_POST['semester035']);
    $thn_ajaran035 = mysqli_real_escape_string($koneksi, $_POST['thn_ajaran035']);

    $cek = mysqli_query($koneksi, "SELECT * FROM ekstra_035 WHERE id_ekstra035 = '$id_ekstra035'");
    if(mysqli_num_rows($cek) > 0) {
        echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
            ID Ekstra sudah ada!
        </div>';
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO ekstra_035 (id_ekstra035, nama_ekstra035, ket035, semester035, thn_ajaran035) VALUES ('$id_ekstra035','$nama_ekstra035','$ket035','$semester035','$thn_ajaran035')");
        if ($insert){
            echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                Data Berhasil Disimpan
            </div>';
            echo '<script>setTimeout(function(){ window.location="index.php?page=ekstra035"; }, 1000);</script>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                Data Gagal Disimpan: '.mysqli_error($koneksi).'
            </div>';
        }
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambahkan Ekstrakurikuler ❤️❤️❤️</h3>
            </div>
            <div class="card-body p-2">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="id_ekstra035">ID Ekstra</label>
                        <input type="text" name="id_ekstra035" value="<?= $hasilkode; ?>" placeholder="ID Ekstra" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_ekstra035">Nama Ekstrakurikuler</label>
                        <input type="text" name="nama_ekstra035" id="nama_ekstra035" placeholder="Nama Ekstrakurikuler" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ket035">Keterangan</label>
                        <input type="text" name="ket035" id="ket035" placeholder="Keterangan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="semester035">Semester</label>
                        <select name="semester035" id="semester035" class="form-control" required>
                            <option value="">Pilih Semester</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="thn_ajaran035">Tahun Ajaran</label>
                        <select name="thn_ajaran035" id="thn_ajaran035" class="form-control" required>
                            <option value="">Pilih Tahun Ajaran</option>
                            <option value="2023/2024">2023/2024</option>
                            <option value="2024/2025">2024/2025</option>
                            <option value="2025/2026">2025/2026</option>
                        </select>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                        <a href="index.php?page=ekstra035" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>