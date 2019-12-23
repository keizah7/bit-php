<?php require 'db.php'; ?>

<?php

$id = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($id)) {
    $data = $db->prepare('SELECT * FROM posts WHERE id = ?');
    // $data = $db->query("SELECT * FROM posts WHERE id = '$id'");
    $data->execute([$id]);

    $irasas = $data->fetch();

    echo $irasas['title'] . ' - ' . $irasas['description'] . '<br>';

    echo '<a href="delete.php?id=' . $id . '">Istrinti</a>';
?>
    <hr>
    <form action="update.php" method="post">
        <label for="title">Pavadinimas:</label><br>
        <input type="text" name="title" value="<?= $irasas['title'] ?>"><br>
        <input type="hidden" name="id" value="<?= $irasas['id'] ?>">
        <label for="description">Turinys:</label><br>
        <textarea name="description" cols="30" rows="10"><?= $irasas['description'] ?></textarea><br>

        <input type="submit" value="Atnaujinti įrašą">
    </form>
<?php



    exit;
}


if (isset($_POST)) {
    if (empty($_POST['title'])) {
        echo 'Laukelis negali būti tuščias';
    } else {
        $insert = $db->prepare('INSERT INTO posts (title, description) VALUES(?, ?)');
        $insert->execute([$_POST['title'], $_POST['description']]);
    }
}

$data = $db->query('SELECT * FROM posts');

while ($read = $data->fetch()) {
    echo '<a href="index.php?id=' . $read['id'] . '">' . $read['title'] . '</a><br>';
    echo $read['description'];

    echo '<hr>';
}


?>
<form action="" method="post">
    <label for="title">Pavadinimas:</label><br>
    <input type="text" name="title"><br>

    <label for="description">Turinys:</label><br>
    <textarea name="description" cols="30" rows="10"></textarea><br>

    <input type="submit" value="Kurti įrašą">
</form>
<?php

$db = null;
