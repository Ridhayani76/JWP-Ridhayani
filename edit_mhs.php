<?php
include_once('config.php');
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM mhs WHERE id=$id");

while($data = mysqli_fetch_array($result)) {
    $nama_mhs = $data['nama_mhs'];
    $nim = $data['nim'];
    $prodi = $data['prodi'];
    $fakultas = $data['fakultas'];
    $semester = $data['semester'];
}

if (isset($_POST['add'])) {
    $nama_mhs = $_POST['nama_mhs'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $fakultas = $_POST['fakultas'];
    $semester = $_POST['semester'];

    $result = mysqli_query($mysqli, "UPDATE mhs SET nama_mhs='$nama_mhs',nim='$nim',prodi='$prodi',fakultas='$fakultas',semester='$semester' WHERE id='".$id."'");
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
  <h2>Update Mahasiswa</h2>
  <p>Melakukan Pengeditan pada data Mahasiswa :</p>
  <form method="POST" action="">
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="nama_mhs" placeholder="Enter nama_mhs" name="nama_mhs" value="<?php echo $nama_mhs; ?>">
      <label for="nama_mhs">Nama</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="text" class="form-control" id="nim" placeholder="Enter NIM" name="nim" value="<?php echo $nim; ?>">
      <label for="nim">NIM</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="prodi" placeholder="Enter Prodi" name="prodi" value="<?php echo $prodi; ?>">
      <label for="prodi">Prodi</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="text" class="form-control" id="fakultas" placeholder="Enter Fakultas" name="fakultas" value="<?php echo $fakultas; ?>">
      <label for="fakultas">Fakultas</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="semester" placeholder="Enter Semester" name="semester" value="<?php echo $semester; ?>">
      <label for="semester">Semester</label>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
