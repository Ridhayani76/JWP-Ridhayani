<?php

if (isset($_POST['add'])) {
    $nama_mhs = $_POST['nama_mhs'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $fakultas = $_POST['fakultas'];
    $semester = $_POST['semester'];

    include_once("config.php");

    $result = mysqli_query($mysqli, "INSERT INTO mhs(nama_mhs,nim,prodi,fakultas,semester) VALUES('$nama_mhs','$nim','$prodi','$fakultas','$semester')");
    header("Location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Tambah Mahasiswa</h2>
  <p>Isikan biodata Mahasiswa di bawah ini : </p>
  <form method="POST" action="">
    <div class="form-floating mb-3 mt-3">
      <input name="nama_mhs" type="text" class="form-control" id="nama_mhs" placeholder="Enter nama_mhs">
      <label for="nama_mhs">Nama</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input name="nim" type="text" class="form-control" id="nim" placeholder="Enter NIM">
      <label for="nim">NIM</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input name="prodi" type="text" class="form-control" id="prodi" placeholder="Enter Prodi">
      <label for="prodi">Prodi</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input name="fakultas" type="text" class="form-control" id="fakultas" placeholder="Enter Fakultas">
      <label for="fakultas">Fakultas</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input name="semester" type="text" class="form-control" id="semester" placeholder="Enter Semester">
      <label for="semester">Semester</label>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>