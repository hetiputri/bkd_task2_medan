<?php 
include("koneksi.php");

$sql = "INSERT INTO tbl_pegawai (Nama,Usia,jenis_kelamin,id_pangkat)
			VALUES('".$_POST["nama"]."','".$_POST["usia"]."','".$_POST["jk"]."','".$_POST["id_pangkat"]."')";

mysqli_query($link,$sql);

header("location:index.php");


?>