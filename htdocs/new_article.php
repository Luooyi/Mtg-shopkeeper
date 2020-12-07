<?php include "main_headers.php";?>
<body>
<?php include "main_navs.php";?>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}


.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

</div>
</br></br>
  <h3 style = " margin: 30px">Create New Article</h3>
</div>

<div class ="container">
<form method="POST" action="saveArticle.php" runat="server" enctype="multipart/form-data" >
    <label for="titulo">Title</label>
    <input type="text" id="titulo" name="titulo" placeholder="" required>

    <input type="hidden" id="idU" name="id" value=<?php echo $_SESSION['id_usuario']; ?>>


    <label for="descripcion">Description</label>
    <textarea maxlength="255" id="descripcion" name="desc" placeholder="" style="height:200px" required></textarea>

<br>
<br>
    <label for="img1">Imagen 1</label>
    
    <input type="file" id="img1" name="img1" placeholder="" required>
      <br>

      <label for="img2">Imagen 2</label>
    
    <input type="file" id="img2" name="img2" placeholder="" required>
      <br>


      <label for="img3">Imagen 3</label>
    
    <input type="file" id="img3" name="img3" placeholder="" required>
      <br>
      <br>

      <label for="video">Video </label>
    
    <input type="file" id="video" name="video" placeholder="" required>
      <br>
      <br>
      <span style="text-align: right;"><input type="submit" value=Borrador class="btn btn-primary" name="borradorNuevo"></span>
      <span style="text-align: right;"><input type="submit" class="btn btn-success" value=Publicacion name="publicarlo"></span>
    
  </form>
</div>
</body>



</html>