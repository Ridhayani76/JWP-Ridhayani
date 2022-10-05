<?php
include_once('config.php');
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM makul WHERE id=$id");

while($data = mysqli_fetch_array($result)) {
    $kode_mk = $data['kode_mk'];
    $nama_mk = $data['nama_mk'];
    $sks = $data['sks'];
    $jenis_mk = $data['jenis_mk'];
}

if (isset($_POST['add'])) {
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];
    $jenis_mk = $_POST['jenis_mk'];

    $result = mysqli_query($mysqli, "UPDATE makul SET kode_mk='$kode_mk',nama_mk='$nama_mk',sks='$sks',jenis_mk='$jenis_mk' WHERE id='".$id."'");
    header("Location:index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
<h2>Edit Mata Kuliah</h2>
  <p>Isikan Detail Mata Kuliah di bawah ini : </p>
  <form method="POST" action="">
    <div class="form-floating mb-3 mt-3">
      <input name="kode_mk" type="text" class="form-control" id="kode_mk" placeholder="Enter Kode MK" value="<?php echo $kode_mk; ?>">
      <label for="kode_mk">Kode MK</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input name="nama_mk" type="text" class="form-control" id="nama_mk" placeholder="Enter Nama MK" value="<?php echo $nama_mk; ?>">
      <label for="nama_mk">Nama MK</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input name="sks" type="text" class="form-control" id="sks" placeholder="Enter SKS" value="<?php echo $sks; ?>">
      <label for="sks">SKS</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input name="jenis_mk" type="text" class="form-control" id="jenis_mk" placeholder="Enter Jenis MK" value="<?php echo $jenis_mk; ?>">
      <label for="jenis_mk">Jenis MK</label>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
