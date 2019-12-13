<?php

/**
 * Sets error text to session
 *
 * @param string $text
 * @param boolean $redirect
 * @return void
 */
function setError($text)
{
    $_SESSION['error'] = $text;
}

/**
 * Sets notification text to session
 *
 * @param string $text
 * @param boolean $redirect
 * @return void
 */
function setNotification($text)
{
    $_SESSION['notification'] = $text;
}

/**
 * Prints log in or log off link
 *
 * @return void
 */
function showLink()
{
    if (isset($_SESSION['logged'])) {
        echo '<a href="login.php">Prisijungti</a>';
    } else {
        echo '<a href="logout.php">Atsijungti</a>';
    }
}

function isFile(string $string): ?string
{
    preg_match_all('/\.([a-z]+)/', $string, $matches, PREG_SET_ORDER, 0);

    if (isset($matches[0])) {
        return $matches[0][1];
    } else return null;
}


/**
 * Creates multidimensional array with directories and files
 *
 * @param string $parentDirectory
 * @return array
 */
function createDirTreeFrom(string $parentDirectory): array
{
    $files  = [];
    $dirs   = [];
    $directories = array_diff(scandir($parentDirectory), ['.', '..']);
    
    foreach ($directories as $value)
    {
        if(is_dir($parentDirectory . DIRECTORY_SEPARATOR . $value)) {
            $dirs[$value] = createDirTreeFrom($parentDirectory . DIRECTORY_SEPARATOR . $value);
        } else {
            $files[] = [
                'name' => $value,
                'type' => isFile($value),
            ];
        }
    }

    return array_merge($dirs, $files);
}

/**
 * Encodes string
 *
 * @param array|string $string
 * @return string
 */
function encodeParameter($string): string
{
    return base64_encode(json_encode($string));
}

/**
 * Decodes string
 *
 * @param string $string
 * @return string|array
 */
function decodeParameter(string $string)
{
    return json_decode(base64_decode($string), true);
}

/**
 * Prints files from array
 *
 * @return void
 */
function printFiles()
{
    global $files, $currentDirectory, $url;
    foreach ($files as $key => $value) {
        $name       = isset($value['name']) ? $value['name'] : $key;
        $type       = isset($value['type']) ? $value['type'] : '';
        $parameters = '';
        $directory['directory'] = $currentDirectory . DIRECTORY_SEPARATOR . $name;

        if ($type) {
            if ($type === 'jpg') {
                $icon       = 'far fa-image';
                $parameters = 'action=showImage&id='. encodeParameter($directory);
            } else if ($type === 'txt') {
                $icon       = 'far fa-file-alt';
                $parameters = 'action=showFile&id='. encodeParameter($directory);
            } else {
                $icon = 'far fa-file';
            }
            // $directory['directory'] = '.';
            // echo $directory['directory'];
            echo '<a href="'. $url . $parameters .'" class="panel-block"><span class="panel-icon"><i class="'.$icon.'"></i></span>'.$name.'</a>';
        } else {
            $icon = 'far fa-folder';
            // $directory['directory'] = $currentDirectory . DIRECTORY_SEPARATOR . $name;

            echo '<div class="panel-block is-active"><span class="panel-icon"><i class="'.$icon.'"></i></span>';
            echo '<a href="?directory='.encodeParameter($directory).'" class="">'.$name.' </a>';
            echo '&emsp;<a href="'.$url.'action=delete&id='.encodeParameter($directory).'"><i class="far fa-trash-alt"></i></a></div>';
        }
    }
}

/**
 * Prints link backwardslink
 *
 * @return void
 */
function printBackwardsLink()
{
    global $directory;

    if($directory['directory'] !== '.') {
        preg_match_all('/(.+)\//m', $directory['directory'], $matches, PREG_SET_ORDER, 0);
        $last = sizeof($matches) > 0 ? $matches[0][1] : '.';
        $last = base64_encode(json_encode([
            'directory' => $last
        ]));
        echo '<a href="?directory='.$last.'" class="panel-block is-active"><span class="panel-icon"><i class="far fa-folder-open"></i></span>..</a>';
    }
}

/**
 * Redirects if user is not signed
 *
 * @return void
 */
function redirectIfNotSigned()
{
    if(!isset($_SESSION['logged'])) {
        header('Location: login.php');
        die();
    }
}