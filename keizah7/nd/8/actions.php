<?php

$action = isset($_GET['action']) ? $_GET['action'] : '';
if($action) redirectIfNotSigned();

switch ($action) {
    case 'createFile':
        if(isset($_POST['name']))
        {
            $newFileName = str_replace('.txt', '', $_POST['directory'] . DIRECTORY_SEPARATOR . $_POST['name']);
        
            if (!file_exists($newFileName .'.txt') && !empty($_POST['name'])) {
                $text = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
                file_put_contents($newFileName . '.txt', $text);
                setNotification('Failas sėkmingai sukurtas');
            } else {
                setError('Toks failas jau egzistuoja');
            }
        }
        break;

    case 'createDir':
        if(isset($_POST['name']))
        {
            $newDirectoryName = $_POST['directory'] . DIRECTORY_SEPARATOR . $_POST['name'];
        
            if (!file_exists($newDirectoryName)) {
                mkdir($newDirectoryName, 0777);
                setNotification('Aplankas sėkmingai sukurtas');
            } else {
                setError('Toks aplankalas jau egzistuoja');
            }
        }
        break;

    case 'uploadImg':
        if (isset($_POST['directory'])) {
            $target_dir     = $_POST['directory'] . DIRECTORY_SEPARATOR;
            $target_file    = $target_dir . basename($_FILES["file"]["name"]);
            $uploadOk       = 1;
            $imageFileType  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (file_exists($target_file)) setError('Tokia nuotrauka jau egzistuoja');
            elseif ($_FILES['file']['size'] > 500000)  setError('Nuotraukos dydis per didelis');
            elseif ($imageFileType != 'jpg') setError('Netinkamas formatas');
            else {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) setNotification('Nuotrauka buvo sėkmingai įkelta');
                else setError('Nuotraukos įkelti nepavyko');
            }
        }
        break;

    case 'delete':
        $directoryName = decodeParameter($_GET['id'])['directory'];
        if (is_dir($directoryName)) {
            // rmdir($directoryName);
            system('rm -rf ' . escapeshellarg($directoryName)); // only UNIX !!
        }
        break;

    case 'deleteFile':
        $fileName = decodeParameter($_GET['id'])['directory'];

        preg_match_all('/(.+)\//m', $fileName, $matches, PREG_SET_ORDER, 0);
        $last = sizeof($matches) > 0 ? $matches[0][1] : '.';

        $last = base64_encode(json_encode([
            'directory' => $last
        ]));
        
        if (file_exists($fileName)) {
            unlink($fileName);
            header('Location: dashboard.php?directory='.$last.'');
            die();
        }
        break;

    case 'showImage':
        $fileName = decodeParameter($_GET['id'])['directory'];
        break;

    case 'showFile':
        $fileName = decodeParameter($_GET['id'])['directory'];
        $fileContent = file_get_contents($fileName);

        if(isset($_POST['description']))
        {
            // $newFileName = str_replace('.txt', '', $_POST['directory'] . DIRECTORY_SEPARATOR . $_POST['name']);
        
            if (file_exists($fileName)) {
                file_put_contents($fileName, htmlspecialchars($_POST['description']));
                $fileContent = file_get_contents($fileName);
                setNotification('Failo turinys pakeistas sėkmingai');
            } else setError('Klaida');
        }
        break;
}