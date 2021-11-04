<?php 
	include "koneksi.php";
	$id_user=$_GET['id'];
	$sql="delete from users where id_user= '$id_user'";
	mysqli_query($con, $sql);
 	mysqli_close($con);
	header('location:tampil_user.php');
 ?>