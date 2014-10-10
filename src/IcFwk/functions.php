<?php

/**
 * Replace the first matched pattern.
 * @param string $search
 * @param string $replace
 * @param string $subject
 * @return string
 */
function str_replace_first($search, $replace, $subject) {
    $pos = strpos($subject, $search);
    if ($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}