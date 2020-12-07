<?php include "main_headers.php";?>
<body>
<?php include "main_navs.php";?>
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

.checked {
  color: orange;
}
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>



</div>
</br></br>
  <h3 style = "text-align: center">echo get message here</h3>
</div>

<div class ="container">
<form action="/action_page.php" style ="">
    <label for="fname" ><h3>Message Subject</h3></label>
</br>
<label for="subject">Username</label>
    </br>
    <label for="subject">Message text in here</label>
    </br>


    <textarea id="subject" name="subject" placeholder="" style="height:100px"></textarea>
    <div class = "row" style ="text-align: right">
    <div class ="col-sm" > 
    </div>

</div>
    <input type="submit" class="mybutton" style ="float: right"value="Send Reply">

  </form>
</div>
</body>

</html>