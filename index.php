<?php session_start() ?>

<!DOCTYPE html>
<html lang = 'es'>
<head>
	<meta charset="utf-8">

	<?php require 'cabecera.php'; ?>

	<?php require 'conecta.php'; ?>

	<title>IndexPHP</title>

</head>
<body>
	<div class = "container pt-4">

		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#create">Create</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#read">Read</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#update">Update</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#delete">Delete</a>
		  </li>
		</ul>

		<div class="tab-content pt-5">

		  <div class="tab-pane container active" id="create">

		  	<?php if (isset($_SESSION['message'])): ?>
		  		<?php if ($_SESSION['alert'] == 'success'): ?>
		  			<div class = 'alert alert-success'><?=$_SESSION['message']?></div>
		  		<?php else: ?>
		  			<div class = 'alert alert-danger'><?=$_SESSION['message']?></div>
		  		<?php endif; ?>
		  	<?php session_unset(); endif; ?>

		  	<form method = "post" action = "create.php" class = "pt-4" accept-charset="UTF-8">
		  		<div class = "form-group">
		  			<input type="text" name="titulo" placeholder="Escribe un título" style = "width: 300px" required>
		  		</div>
		  		<div class = "form-group">
		  			<textarea name="descripcion" placeholder="Escribe una descripción" rows="8" cols="29" style = "resize: none" required></textarea>
		  		</div>
		  		<button type="submit" class="btn btn-outline-primary" style="width: 300px">Enviar</button>
		  	</form>

		  </div>
		  <div class="tab-pane container fade" id="read">
		  	<?php require 'read.php'; ?>
		  </div>

		  <div class="tab-pane container fade" id="update">
		  			  	<?php

							$sql = "select * from tareas;";

							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result) > 0) {

								echo "<div class = 'container'>";
								echo "<table class = 'table'>";
								echo "<thead>";
								echo "<tr>";
								echo "<th>Título</th>";
								echo "<th>Descripción</th>";
								echo "<th>Fecha</th>";
								echo "<th>Tarea</th>";
								echo "</tr>";
								echo "</thead>";
								echo "<tbody>";


								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>".$row['titulo']."</td>";
									echo "<td>".$row['descripcion']."</td>";
									echo "<td>".$row['fecha']."</td>";
									$id = $row['id'];
									echo "<td><a href = 'update.php?id=$id'><button class = 'btn btn-outline-info'><i class = 'fa fa-edit'></i></button></a></td>";
									echo "<tr>";
								}

								echo "</tbody>";
								echo "</table>";
								echo "</div>";

							}
						?>
		  </div>

		  <div class="tab-pane container fade" id="delete">
		  	<?php

				$sql = "select * from tareas;";

				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {

					echo "<div class = 'container'>";
					echo "<table class = 'table'>";
					echo "<thead>";
					echo "<tr>";
					echo "<th>Título</th>";
					echo "<th>Descripción</th>";
					echo "<th>Fecha</th>";
					echo "<th>Tarea</th>";
					echo "</tr>";
					echo "</thead>";
					echo "<tbody>";


					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>".$row['titulo']."</td>";
						echo "<td>".$row['descripcion']."</td>";
						echo "<td>".$row['fecha']."</td>";
						$id = $row['id'];
						echo "<td><a href = 'delete.php?id=$id'><button class = 'btn btn-outline-secondary'><i class = 'fa fa-trash'></i></button></a></td>";
						echo "<tr>";
					}

					echo "</tbody>";
					echo "</table>";
					echo "</div>";

				}
			?>

		  </div>
		</div>
	</div>
</body>
</html>
