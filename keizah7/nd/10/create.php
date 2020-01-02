<?php

session_start();
require 'database.php';
require 'Account.php';

$acc = new Account($pdo);

if (!empty($_POST)) {
    if (!empty($_POST['firstname']) && !empty($_POST['lastname'])) {
        $arr = [$_POST['firstname'], $_POST['lastname']];

        if ($acc->getByFirstNameAndLastname($arr)) {
            $_SESSION['notification'] = 'Account already exist';
        } else {
            $acc->create([
                $_POST['firstname'],
                $_POST['lastname'],
                0,
            ]);
            $_SESSION['notification'] = 'Account is created successfully';
        }
    } else {
        $_SESSION['notification'] = 'Fields can\' be empty';
    }
    header('Location: create.php');
    die();
}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">

<section class="section">
    <div class="container">
        <form action="create.php" method="post">
            <div class="field">
                <label class="label">
                    Firstname:</label>
                <div class="control">
                    <input name="firstname" class="input" type="text" placeholder="Firstname">
                </div>
            </div>

            <div class="field">
                <label class="label">
                    Lastname:</label>
                <div class="control">
                    <input name="lastname" class="input" type="text" placeholder="Firstname">
                </div>
            </div>

            <?php

            if (isset($_SESSION['notification'])) {
                echo '
                    <div class="field">
                        <p class="help is-info">' . $_SESSION['notification'] . '</p>
                    </div>
                ';
                session_destroy();
            }


            ?>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Create</button>
                </div>
                <div class="control">
                    <a href="index.php" class="button is-text">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</section>