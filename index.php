<?php
include_once('config.php');

$mahasiswa = mysqli_query($mysqli, "SELECT * FROM mhs");

$dosen = mysqli_query($mysqli, "SELECT * FROM dosen");

$makul = mysqli_query($mysqli, "SELECT * FROM makul");

$ruang = mysqli_query($mysqli, "SELECT * FROM ruang");

$waktu = mysqli_query($mysqli, "SELECT * FROM waktu");

$jadwal = mysqli_query($mysqli, "SELECT jadwal.id,makul.nama_mk,waktu.hari,waktu.mulai_pukul,waktu.selesai_pukul,ruang.kode_ruang,dosen.nama_dsn,mhs.nama_mhs 
FROM (((((jadwal INNER JOIN makul on jadwal.kd_makul = makul.kode_mk) 
INNER JOIN waktu on jadwal.kd_waktu = waktu.id) 
INNER JOIN ruang on jadwal.kd_ruang = ruang.kode_ruang) 
INNER JOIN dosen on jadwal.nip = dosen.nip) 
INNER JOIN mhs on jadwal.nim = mhs.nim)");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>SISTEM INFORMASI KRS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>SISTEM INFORMASI KRS</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" href="#mahasiswa">MAHASISWA</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#dosen">DOSEN</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#matakuliah">MATA KULIAH</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#ruangkuliah">RUANG KULIAH</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#waktukuliah">WAKTU KULIAH</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#penjadwalan">PENJADWALAN</a>
    </li>
  </ul>
 <!-- Tab panes -->
<div class="tab-content">
  <!-- Menampilkan Mahasiswa -->
    <div id="mahasiswa" class="container tab-pane active"><br>
     <div class="container mt-3">
      <h2>MAHASISWA</h2>
      <a href='tambah_mhs.php' class="btn btn-outline-dark">+ Tambah</a>          
      <table class="table table-striped">
        <thead>
          <tr>
            <th>NIM</th>
            <th>NAMA</th>
            <th>PRODI</th>
            <th>FAKULTAS</th>
            <th>SEMESTER</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($mahasiswa->num_rows > 0) {
              while ($row = $mahasiswa->fetch_assoc()){
                  echo "
                      <tr>
                          <td>" . $row['nim'] . "</td>
                          <td>" . $row['nama_mhs'] . "</td>
                          <td>" . $row['prodi'] . "</td>
                          <td>" . $row['fakultas'] . "</td>
                          <td>" . $row['semester'] . "</td>
                          <td><a href='edit_mhs.php?id=". $row['id'] ."'>Edit</a> | <a href='hapus_mhs.php?id=". $row['id'] ."'>Hapus</a></td>
                      </tr>
                  ";
              }
          } else {
              echo "0 results";
          }
          ?>
        </tbody>
      </table>
    </div>
    </div>
    <!-- Menampilkan Dosen -->
    <div id="dosen" class="container tab-pane fade"><br>
    <div class="container mt-3">
      <h2>DOSEN</h2>
      <a href='tambah_dsn.php' class="btn btn-outline-dark">+ Tambah</a>          
      <table class="table table-striped">
        <thead>
          <tr>
            <th>NAMA</th>
            <th>NIP</th>
            <th>STATUS</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($dosen->num_rows > 0) {
              while ($row = $dosen->fetch_assoc()){
                  echo "
                      <tr>
                          <td>" . $row['nama_dsn'] . "</td>
                          <td>" . $row['nip'] . "</td>
                          <td>" . $row['status'] . "</td>
                          <td><a href='edit_dsn.php?id=". $row['id'] ."'>Edit</a> | <a href='hapus_dsn.php?id=". $row['id'] ."'>Hapus</a></td>
                      </tr>
                  ";
              }
          } else {
              echo "0 results";
          }
          ?>
        </tbody>
      </table>
    </div>
    </div>
    <div id="matakuliah" class="container tab-pane fade"><br>
    <div class="container mt-3">
      <h2>MATA KULIAH</h2>
      <a href='tambah_mk.php' class="btn btn-outline-dark">+ Tambah</a>          
      <table class="table table-striped">
        <thead>
          <tr>
            <th>KODE MK</th>
            <th>NAMA MATA KULIAH</th>
            <th>SKS</th>
            <th>JENIS MK</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($makul->num_rows > 0) {
              while ($row = $makul->fetch_assoc()){
                  echo "
                      <tr>
                          <td>" . $row['kode_mk'] . "</td>
                          <td>" . $row['nama_mk'] . "</td>
                          <td>" . $row['sks'] . "</td>
                          <td>" . $row['jenis_mk'] . "</td>
                          <td><a href='edit_mk.php?id=". $row['id'] ."'>Edit</a> | <a href='hapus_mk.php?id=". $row['id'] ."'>Hapus</a></td>
                      </tr>
                  ";
              }
          } else {
              echo "0 results";
          }
          ?>
        </tbody>
      </table>
    </div>
    </div>
    <div id="ruangkuliah" class="container tab-pane fade"><br>
    <div class="container mt-3">
      <h2>RUANG KULIAH</h2>
      <a href='tambah_ruang.php' class="btn btn-outline-dark">+ Tambah</a>          
      <table class="table table-striped">
        <thead>
          <tr>
            <th>KODE RUANG</th>
            <th>KAPASITAS</th>
            <th>PROYEKTOR</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($ruang->num_rows > 0) {
              while ($row = $ruang->fetch_assoc()){
                  echo "
                      <tr>
                          <td>" . $row['kode_ruang'] . "</td>
                          <td>" . $row['kapasitas'] . "</td>
                          <td>" . $row['proyektor'] . "</td>
                          <td><a href='edit_ruang.php?id=". $row['id'] ."'>Edit</a> | <a href='hapus_ruang.php?id=". $row['id'] ."'>Hapus</a></td>
                      </tr>
                  ";
              }
          } else {
              echo "0 results";
          }
          ?>
        </tbody>
      </table>
    </div>
    </div>
    <div id="waktukuliah" class="container tab-pane fade"><br>
    <div class="container mt-3">
      <h2>WAKTU KULIAH</h2>
      <a href='tambah_waktu.php' class="btn btn-outline-dark">+ Tambah</a>          
      <table class="table table-striped">
        <thead>
          <tr>
            <th>HARI</th>
            <th>MULAI</th>
            <th>SELESAI</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($waktu->num_rows > 0) {
              while ($row = $waktu->fetch_assoc()){
                  echo "
                      <tr>
                          <td>" . $row['hari'] . "</td>
                          <td>" . $row['mulai_pukul'] . "</td>
                          <td>" . $row['selesai_pukul'] . "</td>
                          <td><a href='edit_waktu.php?id=". $row['id'] ."'>Edit</a> | <a href='hapus_waktu.php?id=". $row['id'] ."'>Hapus</a></td>
                      </tr>
                  ";
              }
          } else {
              echo "0 results";
          }
          ?>
        </tbody>
      </table>
    </div>
    </div>
    <div id="penjadwalan" class="container tab-pane fade"><br>
    <div class="container mt-3">
      <h2>PENJADWALAN</h2>
      <a href='tambah_jadwal.php' class="btn btn-outline-dark">+ Tambah</a>          
      <table class="table table-striped">
        <thead>
          <tr>
            <th>MATA KULIAH</th>
            <th>WAKTU</th>
            <th>RUANG</th>
            <th>DOSEN</th>
            <th>MAHASISWA</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($jadwal->num_rows > 0) {
              while ($row = $jadwal->fetch_assoc()){
                  echo "
                      <tr>
                          <td>" . $row['nama_mk'] . "</td>
                          <td>" . $row['hari'] . ", " . $row['mulai_pukul'] . " - " . $row['selesai_pukul'] . "</td>
                          <td>" . $row['kode_ruang'] . "</td>
                          <td>" . $row['nama_dsn'] . "</td>
                          <td>" . $row['nama_mhs'] . "</td>
                          <td><a href='edit_jadwal.php?id=". $row['id'] ."'>Edit</a> | <a href='hapus_jadwal.php?id=". $row['id'] ."'>Hapus</a></td>
                      </tr>
                  ";
              }
          } else {
              echo "0 results";
          }
          ?>
        </tbody>
      </table>
    </div>
    </div>
  </div>

</div>

<!-- Tab panes -->
<div class="tab-content">
    
 </div>

</body>
</html> 
