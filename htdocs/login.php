<?php
	
	include_once("connection.php");
	$conn = OpenCon();
	
    global $mysqli;
	$email = $_POST['email'];
    $password = $_POST['password'];

    $usuarioSesion = NULL;
    $emailSesion = NULL;
    $passSesion = NULL;
    $id = NULL;
	
	$sql = "CALL LOGIN (0, '$email', '$password')";
	$result1 = $conn->query($sql);

	if($result1){
		while ($row = $result1->fetch_array()) {

			$usuarioSesion = $row['nombre_usuario'];
			$emailSesion = $row['correo'];
			$passSesion = $row['pass'];
			$id = $row['id_usuario'];
		}

		$result1->close();	
	}
	
	
	$conn->close();


	session_start();
	if(isset($usuarioSesion) && isset($passSesion)){
		$loginPass = hash('sha256', $password);

		if(($usuarioSesion == $email && $loginPass == $passSesion) || ($emailSesion == $email && $loginPass == $passSesion)){
			session_start();
			$_SESSION['open'] = TRUE;
			$_SESSION['usuario'] = $usuarioSesion;
			$_SESSION['email'] = $emailSesion;
			$_SESSION['id_usuario'] = $id;
			header("Location: index.php?login=ok");
		}
		else{
			
					echo "<script> alert('El usuario y/o contraseña son incorrectos. Por favor ingrese con credenciales válidas o cree una cuenta para iniciar sesión.'); </script>";
					Header("Location: index.php?login=error");
				
		}


	}


	//header("location: index.php");
?>

