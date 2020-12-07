
  <div class="row">
  <div class="col-sm">
<a href="index.php">

	 <img  alt="logo" src="imgs/logo_nav.png" alt="Logo" style="display: inline-block; padding: 1%;width:433px" >
</a>

</div><!-- end col-sm1 -->
  <div class="col-sm">
<!-- navbar -->
<div class="navbar justify-content-end">
    <!-- Logo -->

			<!-- alligner right -->

		<div class="ml-auto" ></div>
		<a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
		<!--<a href="#"><i class="fa fa-fw fa-search" ></i> Search</a>-->
		<a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a>
		<!-- Login / Register -->
		<?php 
                   if(isset($_SESSION['id_usuario'])){
				   
					
						
						$IDUser1 = $_SESSION['id_usuario'];
						
  						$query3 = "	SELECT COUNT(IDCart) AS cantidad FROM cart WHERE IDUser = '$IDUser1'";
    					$result3 = $conn->query($query3);
    					if($result3)
						while ($row = $result3->fetch_array()) {
	  				?>
				   	<a href="cart.php"><i class="fa fa-fw fa-shopping-cart"></i> (<?php echo  $row['cantidad'];?>)</a>
					<?php } ?>
					<a href="profile.php?IDUser=<?php echo $_SESSION['id_usuario'] ?>" ><span><img src="verimagen.php?id=<?php echo $_SESSION['id_usuario'] ?>&tipo=1"  style="width:30px; height:30px;border-radius: 50%; "></span> <?php echo $_SESSION['usuario']  ?></a>
					<a href="index.php?salir=true"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
					<?php } else {
                    ?>

					<a href="#" id="myBtnLogin"><i class="fa fa-fw fa-user"></i> Login</a>
						<!-- The Modal -->
						<div id="myModalLogin" class="modal">

						<!-- Modal content -->
						<div class="modal-content">

						  <span class="close">&times;</span>

						  <a href="index.php">
							<img  alt="logo" src="imgs/small_logo.png" alt="Logo" class ="center">
							</a>

							<div class="modal-body">
                        <div class="row">
                            <div class="container-fluid text-center" >
                                <form id="loginform" action="login.php" method="POST">
                                        <div class="container" >
										<h2 class ="h4" >Account or Email</h2>
											<input class="form-control" name="action1" id="action1" type="hidden" value="login">
                                        	<input class="form-control-large" name="email" id="email" type="text"  placeholder="Email">
												<br>
												<h2 class ="h4">Password</h2>
                                        	<input class="form-control-large" name="password" id="password" type="password" placeholder="Password">
                                        	<br>
                                        	<div class="clearfix">
                                        		<button type="submit"  id="btnLogin" class="mybutton"><i class="fa fa-sign-in"></i> Login</button>
                                        	</div><!-- div class clearfix -->
                                		</div><!-- div class container -->
                                </form>
                            </div><!-- div class container-fluid text-center -->
                        </div><!-- div class row -->
                        </div><!-- div class modal-body -->
						</div>
						</div>
						<a href="register.php" class="mybutton" allign="center"> Register</a>
						<?php } ?>
</div>
</div> <!-- end col-sm2 -->

</div> <!-- end row -->



					

        

	 <!-- Categories -->
     <div class ="navbar2" style ="background-color:black">
			<div class ="row" >
			
			<div class ="col-sm">
			<p></p>
			<div class="dropdown"  alt = "Popular"> 
					<a href="http://localhost/articles.php?articulo=1" class = "categories" >CommanderLegends</a>
				  </div>
				  </div> <!-- end col-sm -->
				  <div class ="col-sm">
				  <p></p>
			<div class="dropdown"  alt = "Popular"> 
					<a href="http://localhost/articles.php?articulo=3" class = "categories">ZendikarRising</a>
			</div>
			</div> <!-- end col-sm -->
			<div class ="col-sm">
			<p></p>
			<div class="dropdown"  alt = "Categories" > 
					<a href="#" class = "categories">Expansions</a>
					<div class="dropdown-content">
					  <a href="/articles.php?articulo=3">Zendikar Rising </a>
					  <a href="/articles.php?articulo=4">Double Masters</a>
					  <a href="/articles.php?articulo=5">Ikoria</a>
					  <a href="/articles.php?articulo=6">M21</a>
					  <a href="/articles.php?articulo=7">Theros Beyond Death</a>
					  <a href="/articles.php?articulo=8">War of the Spark</a>
					</div>
			</div>
			</div> <!-- end col-sm -->
			<div class ="col-sm">
			<p></p>
			<div class="dropdown"  alt = "Popular"> 
					<a href="comingsoon.php" class = "categories">DeckTechs</a>
				  </div>
			</div> <!-- end col-sm -->
			<div class ="col-sm">
			<p></p>
			<div class="dropdown"  alt = "BestSellers"> 
						<a href="comingsoon.php" class = "categories">HotSales</a>
			</div>
			</div> <!-- end col-sm -->
			<div class ="col-sm">
			<p></p>
			<div class="dropdown" alt = "NewProducts">
					<a href="comingsoon.php" class = "categories">NewProducts</a>
			</div>
			</div> <!-- end col-sm -->
			<div class ="col-sm">
			<p></p>
            <div class="dropdown"  alt = "NewProducts">
					<a href="comingsoon.php" class = "categories">Singles</a>
			</div>
			</div> <!-- end col-sm -->
			<div class ="col-sm">
			<p></p>
			<div class="dropdown" alt = "Eras" > 
					<a href="#" class = "categories">SealedProducts</a>
					<div class="dropdown-content">
					  <a href="/articles.php?articulo=3">Zendikar Rising </a>
					  <a href="/articles.php?articulo=5">Ikoria</a>
					  <a href="/articles.php?articulo=6">M21</a>
					  <a href="/articles.php?articulo=7">Theros Beyond Death</a>
					  <a href="/articles.php?articulo=8">War of the Spark</a>
					</div>
			</div>
			</div> <!-- end col-sm -->
			<div class ="col-sm">
			<p></p>
            <div class="dropdown"  alt = "NewProducts">
					<a href="comingsoon.php" class = "categories">Sleeves&Playmats</a>
			</div>
			</div> <!-- end col-sm -->
			<div class ="col-sm">
			<p></p>
            <div class="dropdown"  alt = "NewProducts">
					<a href="comingsoon.php" class = "categories">Collections</a>
			</div>
			</div> <!-- end col-sm -->
			</div> <!-- end row -->
	

			<p></p>
	
		
		<div class ="navbar3" style ="background-color:black">
			<form class="example" action="search.php" method="GET">
  				<input type="text" placeholder="Search.." name="search">
  			<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>	




<!-- javascript -->
<script>
// Get the modal
var modal = document.getElementById("myModalLogin");

// Get the button that opens the modal
var btn = document.getElementById("myBtnLogin");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>