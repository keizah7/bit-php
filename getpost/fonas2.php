<!DOCTYPE html>
<html>
<body style="background:<?php echo $_GET['color']??'white' ?>;">

<h2>Spalvotas Fonas 2</h2>

<form action="">
  Spalva:<br>
  <input type="radio" name="color" value="red"> red<br>
  <input type="radio" name="color" value="blue"> blue<br>
  <input type="radio" name="color" value="black"> black<br>  
  <br><br>
  <input type="submit" value="Keisti">
</form> 

</body>
</html>