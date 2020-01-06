<?php

require 'Bankas.php';
require 'Mysql.php';

?>
<h3 style="display:inline-block;">Menu:</h3>
<a href="?action=new">Add New User</a>
<a href="?action=list">List All Users</a>
<?php

if (isset($_GET['action']) && $_GET['action'] == 'list') {
    $all = Bankas::allUsers($_POST);
    echo '<h2>List All Users</h2>';
    foreach($all as $val) {
        echo
                 $val['id']
        . ' - '. $val['firstname']
        . ' - '. $val['lastname'].
        ' <a href="?action=add-account&id='.$val['id'].'">ADD ACCOUNT</a> '.
        ' <a href="?action=list-accounts&id='.$val['id'].'">LIST ACCOUNTS</a> '
        .'<br>';
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'list-accounts') {
    $all = Bankas::allAccounts($_POST, $_GET['id']);
    $user = Bankas::getUser($_GET['id']);
    ?>
    
    <h2>
        <?= $user['firstname'] ?>
        <?= $user['lastname'] ?>
        ACCOUNTS:
    </h2>

    <?php
    foreach($all as $val) {
        echo
                 $val['id']
        . ' - '. $val['amount'].
        ' <a href="?action=add-amount&id='.$val['id'].'">ADD AMOUNT</a> '.
        ' <a href="?action=minus-amount&id='.$val['id'].'">MINUS AMOUNT</a> '
        .'<br>';
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'add-account') {
    if (!empty($_POST)) {
        Bankas::addAccount($_POST, $_GET['id']);
        header('Location: http://localhost/10/bankas2');
        die();
    }
    $user = Bankas::getUser($_GET['id']);
    ?>
    <h2>Add Account to:
        <?= $user['firstname'] ?>
        <?= $user['lastname'] ?>
    </h2>
    <form action="" method="post">
        <input name="b" type="submit" value="Add Account">
    </form> 

    <?php


}

if (isset($_GET['action']) && $_GET['action'] == 'add') {
    if (!empty($_POST)) {
        Bankas::addAmmount($_POST, $_GET['id']);
        header('Location: http://localhost/10/bankas2');
        die();
    }
    $user = Bankas::getUser($_GET['id']);
    ?>
    
    <h2>Add Money to:
        <?= $user['firstname'] ?>
        <?= $user['lastname'] ?>
    </h2>
    <form action="" method="post">
    Amount:<br>
    <input type="text" name="amount">
    <br><br>
    <input type="submit" value="Add">
    </form> 

    <?php
}



if (isset($_GET['action']) && $_GET['action'] == 'new') {
    if (!empty($_POST)) {
        Bankas::addUser($_POST);
        header('Location: http://localhost/10/bankas2');
        die();
    }
    ?>
    
    <h2>Add New User</h2>
    <form action="" method="post">
    First name:<br>
    <input type="text" name="firstname">
    <br>
    Last name:<br>
    <input type="text" name="lastname">
    <br>
    Personal code:<br>
    <input type="text" name="personalcode">
    <br><br>
    <input type="submit" value="Add">
    </form> 

    <?php
}