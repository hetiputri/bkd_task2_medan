<?php
include("koneksi.php");

$id = $_GET["id"];
echo $id;
$sql = "DELETE FROM tbl_pegawai WHERE id_pegawai=".$id."";
mysqli_query($link,$sql);

header("location:index.php");

?>