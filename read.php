<?php
	require 'conecta.php';

	require 'cabecera.php';

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
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";


		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row['titulo']."</td>";
			echo "<td>".$row['descripcion']."</td>";
			echo "<td>".$row['fecha']."</td>";
			echo "<tr>";
		}

		echo "</tbody>";
		echo "</table>";
		echo "</div>";

	}
?>