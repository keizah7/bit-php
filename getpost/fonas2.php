<!DOCTYPE html>
<html>
<body style="background:<?= $_GET['color'.$_GET['mygtukas']??'']??'white'?>;">

<h2>Spalvotas Fonas 2</h2>

<form action="">
  Spalv0s 1:<br>
  <input type="radio" name="color1" value="red"> red<br>
  <input type="radio" name="color1" value="blue"> blue<br>
  <input type="radio" name="color1" value="black"> black<br>  
  <br><br>
  <button type="submit" name="mygtukas" value="1">Keisti</button>
  <br><br>
  Spalv0s 2:<br>
  <input type="radio" name="color2" value="green"> green<br>
  <input type="radio" name="color2" value="pink"> pink<br>
  <input type="radio" name="color2" value="yellow"> yellow<br>  
  <br><br>

  <button type="submit" name="mygtukas" value="2">Keisti</button>


</form> 

</body>
</html>

<?php

_dc($_GET);