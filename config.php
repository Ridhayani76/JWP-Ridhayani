<?php

$host = 'localhost';
$dbname = 'sistemkrs';
$user = 'root';
$password = '';

$mysqli = mysqli_connect($host,$user,$password,$dbname);

if(!$mysqli){
    dir("Koneksi Gagal" . mysqli_connect_error());
}

?>