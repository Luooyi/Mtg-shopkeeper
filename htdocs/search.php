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
	<?php 
	if(isset($_GET['search'])){

?>
<h3>Search Results with (<?php echo $_GET['search'];?>)... </h3>

</ul>




</div>
<div class ="container">
	<ul>
<?php 
	$buscar = $_GET['search'];
	$op = 1;
	$com = "CALL BUSQUEDA_ARTICULOS('$op','$buscar');";

	$cnn = OpenCon();
	$res = $cnn->query($com);
	if($res){

		while($row=$res->fetch_array()){

?>



<hr class ="new1"> </hr>
<li> <a href = "articles.php?articulo=<?php echo $row['id_articulo']; ?>"><?php echo $row['nombre_articulo']; ?> </a>
<a href ="articles.php?articulo=<?php echo $row['id_articulo']; ?>"><img src ="<?php echo 'data:png;base64,'. base64_encode($row['img1']) ?>" style ="width: 6%; float: right"></img></a> </li>
</br></br>



<?php 
		}
	}
	echo $cnn->error;
} 

?>
</ul>

</div>












</body>

</html>