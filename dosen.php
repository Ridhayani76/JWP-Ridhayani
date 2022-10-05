<?php
include_once('header.php');
include_once('config.php');

$sql = "SELECT * FROM dosen";
$result = mysqli_query($mysqli, "SELECT * FROM dosen");

?>
 
<!-- Tab panes -->
 <div class="tab-content">
    <div id="dosen" class="container tab-pane active"><br>
     <div class="container mt-3">
      <h2>DOSEN</h2>
      <a href='tambah.php' class="btn btn-outline-dark">+ Tambah</a>          
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
          if($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()){
                  echo "
                      <tr>
                          <td>" . $row['nim'] . "</td>
                          <td>" . $row['nama'] . "</td>
                          <td>" . $row['prodi'] . "</td>
                          <td>" . $row['fakultas'] . "</td>
                          <td>" . $row['semester'] . "</td>
                          <td><a href='edit.php?id=". $row['id'] ."'>Edit</a> | <a href='hapus.php?id=". $row['id'] ."'>Hapus</a></td>
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