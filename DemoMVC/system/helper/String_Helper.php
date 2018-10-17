<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 6/29/2018
 * Time: 10:56 AM
 */
 if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

// Chuyển đổi chữ thành số
function string_to_int($str) {
    return sprintf("%u", crc32($str));
}

?>