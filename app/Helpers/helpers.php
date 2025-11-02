<?php

if (!function_exists('removeLeadingImage')) {
    function removeLeadingImage($content) {
        return preg_replace('/^<img[^>]*>/i', '', trim($content));
    }
}

if (!function_exists('limit_words')) {
    function limit_words($text, $limit) {
        $words = explode(' ', $text);
        if (count($words) > $limit) {
            return implode(' ', array_slice($words, 0, $limit)) . '...';
        }
        return $text;
    }
}

?>