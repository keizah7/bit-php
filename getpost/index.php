<?php
session_start();

// _dc($_GET);


if(isset($_GET['vardas'] )) {
    echo 'vardas yra ' . $_GET['vardas'];
}

if(!empty($_GET)) {
    echo 'vardas yra ' . $_GET['vardas'];
}

if(isset($_POST['vardas'] )) {

    $_SESSION['lala'] = $_POST['vardas'];
    $_SESSION['lala333'] = $_POST['lastname'];

    header('Location: http://localhost/10/getpost/');
    die();


    echo 'vardas yra ' . $_POST['vardas'];
}


echo $_SESSION['lala'] ?? '';




class B {
    public function H($text, $t)
    {
        echo "<h$t>$text</h$t>";
        return $this;
    }
}

$obj = new B;

$obj->
H('Labas Babas', 1)->
H('Viso Bobai', 1)->
H('Lelelelelel', 1);
















?>


<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="" method="POST">
  First name:<br>
  <input type="text" name="vardas" value="Mickey">
  <br>
  Last name:<br>
  <input type="text" name="lastname" value="Mouse">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>