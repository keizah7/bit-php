<?php

$host = '127.0.0.1';
$db   = 'karve';
$user = 'root';
$pass = '123';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


?>

<form action="" method="post">
    Pavadinimas<input type="text" name="title">
    <br> <br>
    Aprasymas<textarea name="desc" cols="30" rows="10"></textarea>
    <br> <br>
    <button type="submit">Deti</button>
</form>


<?php

if (!empty($_POST)) {

    $stmt = $pdo->prepare('INSERT INTO posts (`title`, `desc`) values(?, ?)');
    $stmt->execute([$_POST['title'], $_POST['desc']]);

}

if(empty($_GET)) {
    $stmt = $pdo->query('SELECT * FROM posts');
}
else {
    $stmt = $pdo->query("SELECT * FROM posts WHERE id = ".$_GET['id']."");
}

while ($row = $stmt->fetch())
{
    echo '<a href="?id='.$row['id'].'">';
    echo $row['title'] . "<br>";
    echo '</a>';
}


