<?php

function getVideoId($url) {

    // Format panjang (youtube.com/watch?v=)
    parse_str(parse_url($url, PHP_URL_QUERY), $params);
    if (isset($params['v'])) {
        return $params['v'];
    }

    // Format pendek (youtu.be/)
    $path = parse_url($url, PHP_URL_PATH);
    if ($path) {
        return trim($path, '/');
    }

    return null;
}