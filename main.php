<?php

function pasar_array_utf8($arr) {
    $out = [];
    foreach ($arr as $key => $value) {
        $out[utf8_encode($key)] = utf8_encode($value);
    }
    return $out;
}