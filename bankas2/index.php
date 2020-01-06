<?php

require 'Bankas.php';
require 'Mysql.php';

?>
<h3 style="display:inline-block;">Menu:</h3>
<a href="?action=new">Add New Account</a>
<a href="?action=list">List All Accounts</a>
<?php

if (isset($_GET['action']) && $_GET['action'] == 'list') {
    $all = Bankas::allAccounts($_POST);
    echo '<h2>List All Accounts</h2>';
    foreach($all as $val) {
        echo
                 $val['id']
        . ' - '. $val['firstname']
        . ' - '. $val['lastname']
        . ' - '. $val['amount'].
        ' <a href="?action=add&id='.$val['id'].'">ADD</a> '
        .'<br>';
    }
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
        Bankas::addAccount($_POST);
        header('Location: http://localhost/10/bankas2');
        die();
    }
    ?>
    
    <h2>Add New Account</h2>
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