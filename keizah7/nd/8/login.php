<?php

require '_partials/header.php';

if (!empty($_POST)) {
    if (isset($users[$_POST['login']]) && password_verify($_POST['password'], $users[$_POST['login']])) {
        $_SESSION['logged'] = true;
        header('Location: dashboard.php');
        die();
    } else setError('Slapyvardis arba slaptažodis yra neteisingas');
}

if (isset($_SESSION['logged'])) {
    header('Location: dashboard.php');
    die();
}

?>

<section class="section">
    <div class="container has-text-centered">
        <div class="columns is-centered">
            <div class="column is-5 is-4-desktop">
                <form method="POST" action="./login.php">
                    <div class="field">
                        <div class="control">
                            <input class="input" name="login" type="text" placeholder="Slapyvardis">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input" name="password" type="password" placeholder="Slaptažodis">
                        </div>
                        <p class="help is-danger has-text-left"><?= isset($_SESSION['error']) ? $_SESSION['error'] : '' ?></p>
                    </div>
                    <div class="field is-grouped">
                        <div class="control is-expanded">
                            <a href="./" class="button is-primary is-outlined is-fullwidth">Atšaukti</a>
                        </div>
                        <div class="control is-expanded">
                            <button class="button is-primary is-fullwidth">Prisijungti</button>
                        </div>
                    </div>
                    <p>Prisijungdami Jūs sutinkate su <a href="">Taisyklėmis ir Sąlygomis</a> bei <a href="#">Privatumo politika</a>.</p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require '_partials/footer.php' ?>