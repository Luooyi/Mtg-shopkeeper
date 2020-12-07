<?php
	include("connection.php");
	$conn = OpenCon();
$imgUno	=NULL;
if(isset($_POST['registro'])){	

    
	$nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $nombre_usuario = $_POST['nombre_usuario'];
	$correo = $_POST['correo'];
	$calle1 = $_POST['calle1'];
	$calle2 = $_POST['calle2'];
	$codigo_postal = $_POST['codigo_postal'];
	$ciudad = $_POST['ciudad'];
	$pais = $_POST['pais'];
	$estado = $_POST['estado'];
	$Telefono = $_POST['Telefono'];
	$pass = $_POST['pass'];

	if(isset($_FILES['avatar'])){
			$imgUno = file_get_contents($_FILES['avatar']['tmp_name']);
			$imgUno = mysqli_real_escape_string($conn, $imgUno);
	}	
	$stmt ="CALL REGISTRO ('$nombre', '$apellidos', '$Telefono', '$nombre_usuario', '$correo', '$pass', '$calle1', '$calle2', '$pais', '$estado', '$ciudad', '$codigo_postal','$imgUno');";
	$resultado = $conn->query($stmt);


	if ($resultado) {
		 echo '<script type="text/javascript"> alert(\'REGISTRO EXITOSO.\'); </script>';
             header("Refresh: 0; url=index.php");
	} else {
		echo "Error: " . $stmt . "<br>" . $conn->error;
	}
	
	$conn->close();
}
?>

