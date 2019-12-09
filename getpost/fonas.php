<?php 
    session_start();
    
?>
<!DOCTYPE html>
<html>
<body style="background:<?= $_SESSION['color']??'white' ?>;">

<h2>Spalvotas Fonas 1</h2>

<form action="" method="post">
  Spalva:<br>
  <input type="text" name="color" value="<?= $_SESSION['color']??'' ?>">
  <br><br>
  <input type="submit" value="Keisti">
</form> 

</body>
</html>

<?php

if (!empty($_POST)) {
    $_SESSION['color'] = $_POST['color'];
    header('Location: http://localhost/10/getpost/fonas.php');
    die();
}