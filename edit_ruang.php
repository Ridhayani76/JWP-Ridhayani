<?php
include_once('config.php');
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM ruang WHERE id=$id");

while($data = mysqli_fetch_array($result)) {
    $kode_ruang = $data['kode_ruang'];
    $kapasitas = $data['kapasitas'];
    $proyektor = $data['proyektor'];
}

if (isset($_POST['add'])) {
    $kode_ruang = $_POST['kode_ruang'];
    $kapasitas = $_POST['kapasitas'];
    $proyektor = $_POST['proyektor'];

    $result = mysqli_query($mysqli, "UPDATE ruang SET kode_ruang='$kode_ruang',kapasitas='$kapasitas',proyektor='$proyektor' WHERE id='".$id."'");
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
<h2>Tambah Ruangan</h2>
  <p>Isikan Ruangan yang akan di pakai di bawah ini : </p>
  <form method="POST" action="">
    <div class="form-floating mb-3 mt-3">
      <input name="kode_ruang" type="text" class="form-control" id="kode_ruang" placeholder="Enter Kode Ruangan" value="<?php echo $kode_ruang; ?>">
      <label for="kode_ruang">Kode Ruangan</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input name="kapasitas" type="text" class="form-control" id="kapasitas" placeholder="Enter Kapasitas" value="<?php echo $kapasitas; ?>">
      <label for="kapasitas">Kapasitas</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <select name="proyektor" class="form-control" value="<?php echo $proyektor; ?>">>
        <option disabled selected>Apakah ada Proyektor?</option>
        <option name="proyektor">Ada</option>
        <option name="proyektor">Tidak</option>
      </select><br>
    </div>"
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
