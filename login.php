<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?
		if($_POST != null){
			$con = mysqli_connect('localhost','ruben','ruben123');
			mysqli_select_db($con, 'pruebas');
			$usu = $_POST['usuario'];
			$pwd = $_POST['password'];
			$consulta = "SELECT usuario , password FROM usuarios WHERE usuario='$usu' AND password=SHA2('$pwd',512)";
			$resultat = mysqli_query($con, $consulta);
			$num = mysqli_num_rows($resultat);
			if (!$resultat) {
	     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
	     			$message .= 'Consulta realitzada: ' . $consulta;
	     			die($message);
			}
			if($num == 1){
				echo "<h1 style='color:green'>hola</h1>";
			}else{
				echo "<h1 style='color:red'>adios</h1>";
			}
 		}
 		?>
 		<form method="post" action="#">
	 		<label>Usuario:</label>
	 		<input type="text" name="usuario">
	 		<label>Password:</label>
	 		<input type="password" name="password">
	 		<input type="submit" value="Enviar">
		</form>
</body>
</html>