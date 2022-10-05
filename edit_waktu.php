<?php
include_once('config.php');
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM waktu WHERE id=$id");

while($data = mysqli_fetch_array($result)) {
    $hari = $data['hari'];
    $mulai_pukul = $data['mulai_pukul'];
    $selesai_pukul = $data['selesai_pukul'];
}

if (isset($_POST['add'])) {
    $hari = $_POST['hari'];
    $mulai_pukul = $_POST['mulai_pukul'];
    $selesai_pukul = $_POST['selesai_pukul'];

    $result = mysqli_query($mysqli, "UPDATE waktu SET hari='$hari',mulai_pukul='$mulai_pukul',selesai_pukul='$selesai_pukul' WHERE id='".$id."'");
    header("Location:index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Waktu Perkuliahan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
<h2>Edit Waktu</h2>
  <p>Isikan Waktu Mata Kuliah di bawah ini : </p>
  <form method="POST" action="">
    <div class="form-floating mb-3 mt-3">
      <select name="hari" class="form-control">
        <option disabled selected>Hari</option>
        <option name="hari">Senin</option>
        <option name="hari">Selasa</option>
        <option name="hari">Rabu</option>
        <option name="hari">Kamis</option>
        <option name="hari">Jum'at</option>
        <option name="hari">Sabtu</option>
        <option name="hari">Minggu</option>
      </select><br>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input name="mulai_pukul" type="time" class="form-control" id="mulai_pukul" placeholder="Enter Waktu Mulai" value="<?php echo $mulai_pukul; ?>">
      <label for="mulai_pukul">Mulai Kuliah</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input name="selesai_pukul" type="time" class="form-control" id="selesai_pukul" placeholder="Enter Waktu Selesai" value="<?php echo $selesai_pukul; ?>">
      <label for="selesai_pukul">Selesai Kuliah</label>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
