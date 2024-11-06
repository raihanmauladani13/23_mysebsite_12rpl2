<?php

$server    = "";
$username  = "root";
$password  = "";
$database  = "";

$konek  = mysqli_connect($server,$username,$password,$database);

if (!$konek){
    die("Gagal Koneksi <br>".mysqli_connect_error()."<br>".mysqli_connect_errno());
}else{
    //echo "Koneksi Berhasil";
}

?>