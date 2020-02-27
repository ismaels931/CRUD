<?php

	session_start();

	require 'conecta.php';

	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];

	$sql = "insert into tareas (titulo, descripcion) values ('$titulo', '$descripcion')";

	$result = mysqli_query($conn, $sql);

	if (!$result) {
		$_SESSION['message'] = 'La entrada ya existe.';
		$_SESSION['alert'] = 'danger';
	}
	else {
		$_SESSION['message'] = 'La operación se ha completado con éxito.';
		$_SESSION['alert'] = 'success';
	}

	header('Location: index.php');

?>
