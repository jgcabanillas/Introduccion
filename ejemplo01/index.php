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
		 echo 'Matricula; '.$alumno['MATRICULA'].', Alumno: '.$alumno['NOMBRE'].', Email: '
		 .$alumno['EMAIL'].', Telefono: '.$alumno['TELEFONO'];
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
				echo '<td>'.$alumnos['MATRICULA'].'</td>';
				echo '<td>'.$alumnos['NOMBRE'].'</td>';
				echo '<td>'.$alumnos['EMAIL'].'</td>';
				echo '<td>'.$alumnos['TELEFONO'].'</td>';
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
	<?php } ?>
	
</body>
</html>