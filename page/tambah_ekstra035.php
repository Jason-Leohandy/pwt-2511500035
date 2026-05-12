<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pilih Ekstrakulikuler</h1>
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
    $hasilkode = "G-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "G-001";
}
$_SESSION["ID_EKSTRAKULIKULER"] = $hasilkode;


if(isset($_POST['tambah'])){
    $id_esktra035 = mysqli_real_escape_string($koneksi, $_POST['id_ekstra035']);
    $nama_ekstra035 = mysqli_real_escape_string($koneksi, $_POST['nama_ekstra035']);
    $ket035 = mysqli_real_escape_string($koneksi, $_POST['Ket035']);
    $semester035 = mysqli_real_escape_string($koneksi, $_POST['semester035']);
    $thn_ajaran035 = mysqli_real_escape_string($koneksi, $_POST['thn_ajaran035']);
    

    $cek = mysqli_query($koneksi, "SELECT * FROM ekstra_035 WHERE id_ekstra035 = '$id_ekstra035'");
    if(mysqli_num_rows($cek) > 0) {
        echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
            Kode Guru sudah ada! Gunakan kode yang berbeda.
        </div>';
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO ekstra_035 (id_esktra035, nama_esktra035 , ket035, semester035, thn_ajaran035) 
                                          VALUES ('$id_ekstra035', '$nama_ekstra035', '$ket035', '$semester035', '$thn_ajaran035')");
        
        if ($insert){
            echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                Data Berhasil Disimpan
            </div>';
            echo '<script>setTimeout(function(){ window.location="index.php?page=esktra_035"; }, 1000);</script>';
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
                <h3 class="card-title">Pilih Ekstrakulikuler</h3>
            </div>
            <div class="card-body p-2">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="id_esktra035">Id Ekstrakulikuler</label>
                        <input type="text" name="id_ekstra035" value="<?= $hasilkode; ?>" placeholder="ID Ekstrakulikuler" class="form-control" readonly>
                        <small class="text-muted">Id Ekstrakulikuler otomatis (G-001, G-002, dst)</small>
                    </div>
                    <div class="form-group">
                        <label for="nama_esktra035">Nama Ekstrakulikuler</label>
                        <input type="text" name="nama_esktra035" id="nama_esktra035" placeholder="Nama Ekstrakulikuler" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="ket035">Keterangan</label>
                        <select name="ket035" id="ket035" class="form-control" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester035">Semester</label>
                        <select name="semester035" id="semester035" class="form-control" required>
                            <option value="">-- Pilih Pendidikan Terakhir --</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                     <div class="form-group">
                        <label for="thn_ajaran035">Tahun Ajaran</label>
                        <select name="thn_ajaran035" id="thn_ajaran035" class="form-control" required>
                            <option value="">-- Pilih tahun ajaran --</option>
                            <option value="2006/2007">2006/2007</option>
                            <option value="2006/2007">2007/2008</option>
                        </select>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                        <a href="index.php?page=Ekstrakulikuer" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>