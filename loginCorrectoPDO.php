<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?
		if($_POST != null){
			$db = new PDO('mysql:host=localhost;dbname=pruebas;charset=utf8mb4', 'ruben', 'ruben123');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$usu = $_POST['usuario'];
			$pwd = $_POST['password'];
			$consulta = $db->prepare('SELECT usuario, password FROM usuarios WHERE usuario=:usua AND password=SHA2(:pwds,512);');
			$consulta -> bindValue(':usua',$usu);
			$consulta -> bindValue(':pwds',$pwd);
			$consulta->execute();
			$num = $consulta->rowCount();
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