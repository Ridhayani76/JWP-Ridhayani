<?php

if (isset($_POST['add'])) {
    $nama_dsn = $_POST['nama_dsn'];
    $nip = $_POST['nip'];
    $status = $_POST['status'];

    include_once("config.php");

    $result = mysqli_query($mysqli, "INSERT INTO dosen(nama_dsn,nip,status) VALUES('$nama_dsn','$nip','$status')");
    header("Location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Dosen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Tambah Dosen</h2>
  <p>Isikan biodata Dosen di bawah ini : </p>
  <form method="POST" action="">
    <div class="form-floating mb-3 mt-3">
      <input name="nama_dsn" type="text" class="form-control" id="nama_dsn" placeholder="Enter nama_dsn">
      <label for="nama_dsn">Nama</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input name="nip" type="text" class="form-control" id="nip" placeholder="Enter NIP">
      <label for="nip">NIP</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input name="status" type="text" class="form-control" id="status" placeholder="Enter Status">
      <label for="status">Status</label>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>