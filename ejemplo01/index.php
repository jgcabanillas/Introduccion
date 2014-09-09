<?php include_once('lib/miconexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejemplo de conexion</title>
</head>
<body>
	<?php
	$conexion = new miconexion();
	if ($conexion) {
		echo '<h1>Conexión exitosa</h1>';
		//$conexion->desconectar();
		//$conexion->desconectar
	}
	//consulta de informacion de la tabla alumnos
	$query='select * from alumnos';
	$rst=mysqli_query($conexion->conexion,$query);
	
	if (mysqli_num_rows($rst)==0)
	     echo'<h2>sin registros</h2>';
	elseif (mysqli_num_rows($rst)==1){
	     $alumno=mysqli_fetch_assoc($rst);
		 echo 'Matricula; '.$alumno['matricula'].', Alumno: '.$alumno['nombre'].', Email: '
		 .$alumno['email'].', Telefono: '.$alumno['telefono'];
	}else {
	?>
	<!-- table>(thead>tr>th{Matricula}+th{Nombre}+th{Email}+th{Telefono}) -->
	<table border="1">
		<thead>
			<tr>
				<th>Matricula</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Telefono</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($alumnos = mysqli_fetch_assoc($rst)) {
				echo '<tr>';
				echo '<td>'.$alumnos['matricula'].'</td>';
				echo '<td>'.$alumnos['nombre'].'</td>';
				echo '<td>'.$alumnos['email'].'</td>';
				echo '<td>'.$alumnos['telefono'].'</td>';
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
	<?php } ?>
	
</body>
</html>