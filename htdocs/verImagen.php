<?php 

	if(isset($_GET['id'])){

		include("connection.php");

		$id = $_GET['id'];
		$tipo = $_GET['tipo'];
		$conn = OpenCon();
		$img = NULL;

		$cmd = "CALL VER_IMAGEN('$tipo', '$id'); ";
		

		if($result = $conn->query($cmd)){
			if($tipo == 1){
				while($imagen = $result->fetch_array()){
					$img =  $imagen['imagen_avatar'];
				}
				$result->close();
					
			
					
			}
			else{
				while($imagen = $result->fetch_array()){
					$img =  $imagen['imagen_portada'];
				}
				$result->close();	
			}
			
			

		}
		header ('Content-type:image/jpeg;');
		echo $img;
		$conn->close();
			
		}

	

?>