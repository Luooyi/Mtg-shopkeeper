<?php include "main_headers.php";?>
<body>
<?php include "main_navs.php";?>
</div>



<style>
ul {
  list-style: none;
}
</style>


<div class ="container">
</br></br>
<ul>
<h3>My Erasers </h3>

</ul>

</div>

</div>
<div class ="container">
<ul>

<?php if(isset($_SESSION['open']) && isset($_GET['id'])){

		$cn= OpenCon();
		$id = $_GET['id'];
		$q= "CALL MOSTRAR_BORRADOR('$id')";

		if($res = $cn->query($q)){

		while($row = $res->fetch_array()){

		
 ?>	
<hr class ="new1"> </hr>
<li> <a href = "edit_eraser.php?id=<?php echo $row['id_borrador']; ?>"> <?php echo $row['nombre_articulo'];?> </a>
<a href ="edit_eraser.php?id=<?php echo $row['id_borrador']; ?>" style ="width: 6%; float: right">Edit...</a> <br><a href ="saveArticle.php?publicar=<?php echo $row['id_borrador']; ?>" style ="width: 6%; float: right">Publish</a> </li>
<p><?php echo $row['fecha'];?></p>


<?php 
		}
		$res->close();
}



else{
		echo "<hr> No hay borradores para mostrar. </hr>";
}

$cn->close();
}
else{
	echo "<hr> No hay borradores para mostrar. </hr>";
}
?>	
</ul>
</div>












</body>

</html>