<?php
if (!function_exists('getYouTubeVideoId')) {
    function getYouTubeVideoId($url) {
        $regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|shorts\/)([^#\&\?]*).*/';
        if (preg_match($regExp, $url, $match) && strlen($match[2]) == 11) {
            return $match[2];
        }
        return null;
    }
}