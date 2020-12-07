<?php
	
include("connection.php");
$conn = OpenCon();

$imgUno = NULL;
$imgDos = NULL;
$imgTres = NULL;
$video = NULL;
$tipo = NULL;

	if(isset($_POST['borradorNuevo'])){
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['desc'];
		$id = $_POST['id'];
		$tipo = 0;

		if(isset($_FILES['img1'])){
			$imgUno = file_get_contents($_FILES['img1']['tmp_name']);
			$imgUno = mysqli_real_escape_string($conn, $imgUno);
		}
		else{
			$imgUno = NULL;
		}
		
		if(isset($_FILES['img2'])){
			$imgDos = file_get_contents($_FILES['img2']['tmp_name']);
			$imgDos = mysqli_real_escape_string($conn, $imgDos);
		}
		else{
			$imgDos = NULL;
		}

		if(isset($_FILES['img3'])){
			$imgTres = file_get_contents($_FILES['img3']['tmp_name']);
			$imgTres = mysqli_real_escape_string($conn, $imgTres);
		}
		else{
			$imgTres = NULL;
		}

		if(isset($_FILES['video'])){
			 $loc = $_SERVER['DOCUMENT_ROOT']."/";
			 $temp = $_FILES['video']['tmp_name'];
			 $nm =  explode('.',$_FILES['video']['name']);

			 $ext = strtolower(end($nm));
			 
			 $name = date("Ymd-his")  . $id ."." . $ext;
			 $path = "video/" . $name;
			 $video = $path;
    		 move_uploaded_file($temp,$loc.$path);
			
		}
		else{
			$video = NULL;
		}


		$q = "CALL PUBLICAR('$tipo', '$id', '$titulo', '$descripcion', '$video', '$imgUno', '$imgDos', '$imgTres');";
		//$q = "CALL PUBLICAR(?,?,?,?,?,?,?,?);";
		//$stmt = $conn->prepare($q);
		//$stmt->bind_param("iisssbbb", $tipo, $id, $titulo, $descripcion, $video, $imgUno, $imgDos, $imgTres);

		if($conn->query($q)){
			$var = 'Location: profile.php?IDUser='.$id;

			header($var);
				
		}
		else{
			echo $conn->error;
		}


		$conn->close();

	}
	elseif(isset($_POST['publicarlo'])){
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['desc'];
		$id = $_POST['id'];
		$tipo = 1;

		if(isset($_FILES['img1'])){
			$imgUno = file_get_contents($_FILES['img1']['tmp_name']);
			$imgUno = mysqli_real_escape_string($conn, $imgUno);
		}
		else{
			$imgUno = NULL;
		}
		
		if(isset($_FILES['img2'])){
			$imgDos = file_get_contents($_FILES['img2']['tmp_name']);
			$imgDos = mysqli_real_escape_string($conn, $imgDos);
		}
		else{
			$imgDos = NULL;
		}

		if(isset($_FILES['img3'])){
			$imgTres = file_get_contents($_FILES['img3']['tmp_name']);
			$imgTres = mysqli_real_escape_string($conn, $imgTres);
		}
		else{
			$imgTres = NULL;
		}

		if(isset($_FILES['video'])){
			 $loc = $_SERVER['DOCUMENT_ROOT']."/";
			 $temp = $_FILES['video']['tmp_name'];
			 $nm =  explode('.',$_FILES['video']['name']);

			 $ext = strtolower(end($nm));
			 
			 $name = date("Ymd-his")  . $id ."." . $ext;
			 $path = "video/" . $name;
			 $video = $path;
    		 move_uploaded_file($temp,$loc.$path);
			
		}
		else{
			$video = NULL;
		}


		$q = "CALL PUBLICAR('$tipo', '$id', '$titulo', '$descripcion', '$video', '$imgUno', '$imgDos', '$imgTres');";
		//$q = "CALL PUBLICAR(?,?,?,?,?,?,?,?);";
		//$stmt = $conn->prepare($q);
		//$stmt->bind_param("iisssbbb", $tipo, $id, $titulo, $descripcion, $video, $imgUno, $imgDos, $imgTres);

		if($row = $conn->query($q)){

				$s = NULL;
			while($res = $row->fetch_array()){
				$s = $res['idArticulo'];
			}
				$location = "Location: articles.php?articulo=".$s;
			header($location);
				
		}
		else{
			echo $conn->error;
		}


		$conn->close();
	}
	elseif (isset($_GET['publicar'])) {
		$tipo = 2;
		$id = $_GET['publicar'];
		$q = "CALL PUBLICAR('$tipo', '$id', null, null, null, null, null, null);";
		//$q = "CALL PUBLICAR(?,?,?,?,?,?,?,?);";
		//$stmt = $conn->prepare($q);
		//$stmt->bind_param("iisssbbb", $tipo, $id, $titulo, $descripcion, $video, $imgUno, $imgDos, $imgTres);

		if($row=$conn->query($q)){
			$s = NULL;
			while($res = $row->fetch_array()){
				$s = $res['idArticulo'];
			}
				$location = "Location: articles.php?articulo=".$s;
			header($location);
		}
	}
	elseif (isset($_POST['submit'])) {
		$tipo = 2;
		$id = $_POST['idBorrador'];
		$q = "CALL PUBLICAR('$tipo', '$id', null, null, null, null, null, null);";
		//$q = "CALL PUBLICAR(?,?,?,?,?,?,?,?);";
		//$stmt = $conn->prepare($q);
		//$stmt->bind_param("iisssbbb", $tipo, $id, $titulo, $descripcion, $video, $imgUno, $imgDos, $imgTres);

		if($row=$conn->query($q)){
			$s = NULL;
			while($res = $row->fetch_array()){
				$s = $res['idArticulo'];
			}
				$location = "Location: articles.php?articulo=".$s;
			header($location);
		}
	}
	elseif (isset($_POST['delete'])) {
		$tipo = 0;
		$id = $_POST['idBorrador'];
		$user = $_POST['userId'];
		$q = "CALL BORRAR('$tipo', '$id');";
		//$q = "CALL PUBLICAR(?,?,?,?,?,?,?,?);";
		//$stmt = $conn->prepare($q);
		//$stmt->bind_param("iisssbbb", $tipo, $id, $titulo, $descripcion, $video, $imgUno, $imgDos, $imgTres);

		if($conn->query($q)){
			echo "<script>alert('Se ha eliminado el borrador.');</script>";
				$var = "Refresh:0; url=my_erasers.php?id=".$user;
			header($var);
		}
	}
	elseif (isset($_POST['save'])) {
		$tipo = 0;
		$id = $_POST['idBorrador'];
		$nombre = $_POST['nombre'];
		$desc = $_POST['subject'];
		
		$desc = mysqli_real_escape_string($conn, $desc);
		
		$user = $_POST['userId'];
		$q = "UPDATE borrador SET nombre_articulo='" . $nombre . "', descripcion='".$desc ."' WHERE id_borrador = " . $id. ";";
		//$q = "CALL PUBLICAR(?,?,?,?,?,?,?,?);";
		//$stmt = $conn->prepare($q);
		//$stmt->bind_param("iisssbbb", $tipo, $id, $titulo, $descripcion, $video, $imgUno, $imgDos, $imgTres);

		if($conn->query($q)){
			echo "<script>alert('Se ha modificado el borrador.');</script>";
			$var = "Refresh:0; url=my_erasers.php?id=".$user;
			header($var);
		}
		else{
echo  $conn->error;
	}
	}
	else{
echo  $conn->error;
	}


?>

