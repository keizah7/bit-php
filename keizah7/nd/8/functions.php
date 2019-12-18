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
    echo isset($_SESSION['logged']) ? '<a href="login.php">Prisijungti</a>' : '<a href="logout.php">Atsijungti</a>';
}

/**
 * Check if @param is file and return extension
 *
 * @param string $string
 * @return string|null
 */
function isFile(string $string): ?string
{
    $info = pathinfo($string);

    return isset($info['extension']) ? $info['extension'] : null;
}

/**
 * Creates multidimensional array tree of directory and files structure
 *
 * @param string $parentDirectory
 * @return array
 */
function createDirTreeFrom(string $parentDirectory): array
{
    $files          = [];
    $dirs           = [];
    $directories    = array_diff(scandir($parentDirectory), ['.', '..']);

    foreach ($directories as $value) {
        if (is_dir($parentDirectory . DIRECTORY_SEPARATOR . $value)) {
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
    global $files, $currentDirectory;
    foreach ($files as $key => $value) {
        $name                   = isset($value['name']) ? $value['name'] : $key;
        $type                   = isset($value['type']) ? $value['type'] : '';
        $directory['directory'] = $currentDirectory . DIRECTORY_SEPARATOR . $name;

        if ($type) {
            if ($type === 'jpg') {
                $icon   = 'far fa-image';
                $url    = url([
                    'action'    => 'showImage',
                    'id'        => encodeParameter($directory)
                ]);
            } else if ($type === 'txt') {
                $icon   = 'far fa-file-alt';
                $url    = url([
                    'action'    => 'showFile',
                    'id'        => encodeParameter($directory)
                ]);
            } else {
                $icon   = 'far fa-file';
                $url    = url();
            }
            echo '<a href="' . $url . '" class="panel-block"><span class="panel-icon"><i class="' . $icon . '"></i></span>' . $name . '</a>';
        } else {
            $icon   = 'far fa-folder';
            $url    = url([
                'directory' => encodeParameter($directory)
            ]);

            echo '<div class="panel-block is-active"><span class="panel-icon"><i class="' . $icon . '"></i></span>';
            echo '<a href="' . $url . '" class="">' . $name . ' </a>';

            $url = url([
                'action'    => 'delete',
                'id'        => encodeParameter($directory)
            ]);
            echo '&emsp;<a href="' . $url . '"><i class="far fa-trash-alt"></i></a></div>';
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

    if ($directory['directory'] !== '.') {
        preg_match_all('/(.+)\//m', $directory['directory'], $matches, PREG_SET_ORDER, 0);
        $last = sizeof($matches) > 0 ? $matches[0][1] : '.';
        $last = base64_encode(json_encode([
            'directory' => $last
        ]));
        echo '<a href="?directory=' . $last . '" class="panel-block is-active"><span class="panel-icon"><i class="far fa-folder-open"></i></span>..</a>';
    }
}

/**
 * Redirects if user is not signed
 *
 * @return void
 */
function redirectIfNotSigned()
{
    if (!isset($_SESSION['logged'])) {
        header('Location: login.php');
        die();
    }
}

/**
 * Creates url
 *
 * @param array $array
 * @return string
 */
function url(array $array = []): string
{
    $path = $_SERVER['PHP_SELF'] . '?';
    parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $query);
    $query = array_merge($query, $array);
    $query = http_build_query($query);

    return $path . $query;
}

/**
 * Deletes directories tree with files
 *
 * @param string $directory
 * @return void
 */
function deleteTree(string $directory)
{
    $files = array_diff(scandir($directory), array('.', '..'));

    foreach ($files as $file) {
        (is_dir("$directory/$file")) ? deleteTree("$directory/$file") : unlink("$directory/$file");
    }
    return rmdir($directory);
}
