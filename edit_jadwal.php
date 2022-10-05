<?php
include_once('config.php');
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM jadwal WHERE id=$id");

while($data = mysqli_fetch_array($result)) {
    $kd_makul = $data['kd_makul'];
    $kd_waktu = $data['kd_waktu'];
    $kd_ruang = $data['kd_ruang'];
    $nip = $data['nip'];
    $nim = $data['nim'];
}

if (isset($_POST['add'])) {
    $kd_makul = $_POST['kd_makul'];
    $kd_waktu = $_POST['kd_waktu'];
    $kd_ruang = $_POST['kd_ruang'];
    $nip = $_POST['nip'];
    $nim = $_POST['nim'];

    $result = mysqli_query($mysqli, "UPDATE jadwal SET kd_makul='$kd_makul',kd_waktu='$kd_waktu',kd_ruang='$kd_ruang',nip='$nip',nim='$nim' WHERE id='".$id."'");
    header("Location:index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
<h2>Tambah Jadwal</h2>
  <p>Pengisian Jadwal di bawah ini : </p>
  <form method="POST" action="">
    <div class="form-floating mb-3 mt-3">
      <select name="kd_makul" class="form-control">
        <option disabled selected>Pilih Mata Kuliah</option>
        <?php
        include_once('config.php');
        $query = mysqli_query($mysqli,"SELECT * FROM makul") or die (mysqli_error($mysqli));
        while($data = mysqli_fetch_array($query)){
            echo "<option value = $data[kd_makul]> $data[nama_mk] </option>";
        }
        ?>
      </select>
    </div>
    <div class="form-floating mt-3 mb-3">
      <select name="kd_waktu" class="form-control">
        <option disabled selected>Pilih Waktu Kuliah</option>
        <?php
        include_once('config.php');
        $query = mysqli_query($mysqli,"SELECT * FROM waktu") or die (mysqli_error($mysqli));
        while($data = mysqli_fetch_array($query)){
            echo "<option value = $data[kd_waktu]> $data[hari], $data[mulai_pukul] - $data[selesai_pukul] </option>";
        }
        ?>
      </select>
    </div>
    <div class="form-floating mb-3 mt-3">
      <select name="kd_ruang" class="form-control">
        <option disabled selected>Pilih Ruangan</option>
        <?php
        include_once('config.php');
        $query = mysqli_query($mysqli,"SELECT * FROM ruang") or die (mysqli_error($mysqli));
        while($data = mysqli_fetch_array($query)){
            echo "<option value = $data[kd_ruang]> $data[kode_ruang] </option>";
        }
        ?>
      </select>
    </div>
    <div class="form-floating mb-3 mt-3">
      <select name="nip" class="form-control">
        <option disabled selected>Pilih Dosen</option>
        <?php
        include_once('config.php');
        $query = mysqli_query($mysqli,"SELECT * FROM dosen") or die (mysqli_error($mysqli));
        while($data = mysqli_fetch_array($query)){
            echo "<option value = $data[nip]> $data[nama_dsn] </option>";
        }
        ?>
      </select>
    </div>
    <div class="form-floating mb-3 mt-3">
      <select name="nim" class="form-control">
        <option disabled selected>Pilih Mahasiswa</option>
        <?php
        include_once('config.php');
        $query = mysqli_query($mysqli,"SELECT * FROM mhs") or die (mysqli_error($mysqli));
        while($data = mysqli_fetch_array($query)){
            echo "<option value = $data[nim]> $data[nama_mhs] </option>";
        }
        ?>
      </select>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
