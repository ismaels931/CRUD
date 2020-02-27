<?php
	require 'conecta.php';

	$id = $_GET['id'];

	$sql = "delete from tareas where id = '$id'";

	mysqli_query($conn, $sql);

	header ('Location: index.php');
?>