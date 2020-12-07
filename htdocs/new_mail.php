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

<div style ="padding: 0 300px;">
</br></br>
  <h3 style = "padding: 10px">Compose New Mail</h3>
</div>

<div class ="container">
<form action="/action_page.php">
    <label for="fname">Recipients</label>
    <input type="text" id="fname" name="firstname" placeholder="Username..">

    <label for="lname">Subject</label>
    <input type="text" id="lname" name="lastname" placeholder="Subject..">

    <label for="subject">Message</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" class="mybutton" value="Submit">
  </form>
</div>
</body>

</html>