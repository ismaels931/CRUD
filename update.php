<?php 
	require 'cabecera.php';
	require 'conecta.php';
?>

<?php

	if (!empty($_POST['titulo']) && !empty($_POST['descripcion'])) {
		print($_POST['titulo'].' '.$_POST['descripcion']);
		print('<br>'.$_GET['id']);

		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$id = $_GET['id'];

		$sql = "update tareas set titulo = '$titulo', descripcion = '$descripcion' where id = '$id'";

		mysqli_query($conn, $sql);

		header('Location: index.php');
	}
?>

<div class = 'container pt-4'>
	<form method = "post" action = "update.php?id=<?php echo $_GET['id'] ?>" class = "pt-4" accept-charset="UTF-8">
		<div class = "form-group">
			<input type="text" name="titulo" placeholder="Escribe un título" style = "width: 300px" required>
		</div>
		<div class = "form-group">
			<textarea name="descripcion" placeholder="Escribe una descripción" rows="8" cols="29" style = "resize: none" required></textarea>
		</div>
		<button type="submit" class="btn btn-outline-primary" style="width: 300px">Enviar</button>
	</form>
</div>