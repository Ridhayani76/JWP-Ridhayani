<?php
include_once('config.php');
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM dosen WHERE id=$id");

while($data = mysqli_fetch_array($result)) {
    $nama_dsn = $data['nama_dsn'];
    $nip = $data['nip'];
    $status = $data['status'];
}

if (isset($_POST['add'])) {
    $nama_dsn = $_POST['nama_dsn'];
    $nip = $_POST['nip'];
    $status = $_POST['status'];

    $result = mysqli_query($mysqli, "UPDATE dosen SET nama_dsn='$nama_dsn',nip='$nip',status='$status' WHERE id='".$id."'");
    header("Location:index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Dosen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
<h2>Edit Dosen</h2>
  <p>Isikan biodata Dosen di bawah ini : </p>
  <form method="POST" action="">
    <div class="form-floating mb-3 mt-3">
      <input name="nama_dsn" type="text" class="form-control" id="nama_dsn" placeholder="Enter nama_dsn" value="<?php echo $nama_dsn; ?>">
      <label for="nama_dsn">Nama</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input name="nip" type="text" class="form-control" id="nip" placeholder="Enter NIP" value="<?php echo $nip; ?>">
      <label for="nip">NIP</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input name="status" type="text" class="form-control" id="status" placeholder="Enter Status" value="<?php echo $status; ?>">
      <label for="status">Status</label>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
