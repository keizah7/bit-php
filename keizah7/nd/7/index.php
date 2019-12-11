<style>
    body {
        max-width: 1000px;
        margin: 2em auto 0 auto;
    }

    label {
        display: block;
        margin-bottom: 1em;
    }

    label input {
        display: block;
    }

    .throw {
        color: white;
        padding: .5em 1em;
        background: blue;
        display: block;
        text-decoration: none;
        border-radius: 5px;
        max-width: 100px;
        margin-top: 1em;
        margin-right: 1em;
    }

    .throw:hover {
        background: red;
    }

    .orange {
        background: orange;
        display: inline-block;
    }

    .green {
        background: green;
        display: inline-block;
    }
</style>
<?php

/* 11. papildomas
Suprogramuokite žaidimą. Žaidimas prasideda dviem laukeliais, kuriuose žaidėjai įveda savo vardus ir mygtuku “pradėti”.
Šone yra rodomas žaidėjų rezultatas. Paspaudus “pradėti” turi atsirasti pirmo žaidėjo vardas ir mygtukas “mesti kauliuką”.
Jį nuspaudus skriptas automatiškai sugeneruoja skaičių nuo 1 iki 6 ir jį prideda prie žaidėjo rezultato,
o pirmo žaidėjo vardas pakeičiamas antro žaidėjo vardu (parodo kieno eilė “mesti kauliuką”).
Žaidimas tęsiamas iki tol, kol kažkuris žaidėjas surenka 30 taškų.
Tada parodomas pranešimas apie laimėjimą ir vėl leidžiama suvesti žaidėjų vardus ir pradėti žaidimą iš naujo. */

session_start();
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($id) {
    case 'register':
        if (!empty($_POST)) {
            if (empty($_POST['zaidejas1'])) setError('Neįvestas pirmo žaidėjo vardas');
            else if (empty($_POST['zaidejas2'])) setError('Neįvestas antro žaidėjo vardas');
            else startGame();
        }
        break;

    case 'game':
        $data = $_SESSION['data'];

        if ($data['action'] === 0) {
            echo '<h1>Pradėkime žaidimą:</h1><br>Pirmas meta <b>' . $data['zaidejas1'] . '</b>';
            echo '<a class="throw" href="index.php?id=throw">Mesti</a>';
        } elseif ($data['action'] === 'play') {
            echo '<h1>' . returnLastName() . ' gavo ' . $data['last'] . ' taškus.</h1><br>Dabar <b>' . returnLastName(true) . '</b> eilė';
            echo '<a class="throw" href="index.php?id=throw">Mesti</a>';
        } else {
            echo '<h1>Laimėjo ' . $data['turn'] . ', nes pirmas surinko 30 taškų</h1>';
        }

        echo '
            <h2>Rezultatai:</h2>
            ' . $data['zaidejas1'] . ': ' . $data['taskai1'] . ' taškų.<br>
            ' . $data['zaidejas2'] . ' : ' . $data['taskai2'] . ' taškų.<br>
        ';

        if ($data['action'] === 'win') echo '<a class="throw green" href="index.php?id=restart">Žaisti dar kartą</a>';
        echo '<a class="throw orange" href="index.php?id=exit">Baigti žaidimą</a>';

        break;

    case 'throw':
        $data           = $_SESSION['data'];
        $result         = rand(1, 6);
        $data['last']   = $result;
        $data['action'] = $data['action'] == 0 ? 'play' : $data['action'];

        if ($data['turn'] === 1) {
            $data['taskai1']    = $data['taskai1'] + $result;
            $data['turn']       = 2;
        } else {
            $data['taskai2']    = $data['taskai2'] + $result;
            $data['turn']       = 1;
        }

        if ($data['taskai1'] >= 30 | $data['taskai2'] >= 30) {
            $data['action'] = 'win';
            $data['turn']   = $data['taskai1'] > $data['taskai2'] ? $data['zaidejas1'] : $data['zaidejas2'];
        }

        $_SESSION['data'] = $data;
        header('Location: http://localhost/bit-php/nd/7/index.php?id=game');
        break;

    case 'restart':
        startGame();
        break;

    case 'exit':
        session_destroy();
        header('Location: http://localhost/bit-php/nd/7/');
        break;

    default:
        echo '
            <form method="POST" action="index.php?id=register">
                <label>
                    Pirmo žaidėjo vardas: 
                    <input type="text" name="zaidejas1">
                </label>
                <label>
                    Antro žaidėjo vardas: 
                    <input type="text" name="zaidejas2">
                </label>
                <button type="submit">Pradėti</button>
            </form>
        ';
        if (isset($_SESSION['error'])) echo $_SESSION['error'];
        break;
}

/**
 * Sets error text to session
 *
 * @param string $text
 * @param boolean $redirect
 * @return void
 */
function setError($text, $redirect = true)
{
    $_SESSION['error'] = $text;
    if ($redirect) header('Location: http://localhost/bit-php/nd/7/');
}

/**
 * Returns last player name
 *
 * @param boolean $reversed
 * @return string
 */
function returnLastName($reversed = false)
{
    global $data;

    if ($reversed) {
        return $data['turn'] === 1 ? $data['zaidejas1'] : $data['zaidejas2'];
    } else {
        return $data['turn'] === 1 ? $data['zaidejas2'] : $data['zaidejas1'];
    }
}

/**
 * Sets default data to session
 *
 * @return void
 */
function startGame()
{
    setError('', false);
    $restart = $_SESSION['data']['action'] == 'win';

    $data = [
        'zaidejas1' => $restart ? $_SESSION['data']['zaidejas1'] : $_POST['zaidejas1'],
        'zaidejas2' => $restart ? $_SESSION['data']['zaidejas2'] : $_POST['zaidejas2'],
        'taskai1'   => 0,
        'taskai2'   => 0,
        'action'    => 0,
        'turn'      => 1,
        'last'      => 0
    ];
    $_SESSION['data'] = $data;
    header('Location: http://localhost/bit-php/nd/7/index.php?id=game');
}
