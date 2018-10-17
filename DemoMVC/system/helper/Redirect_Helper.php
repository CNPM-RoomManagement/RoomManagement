<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 8/8/2018
 * Time: 9:06 AM
 */
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

function redirect($address) {
    if (strpos($address, 'http://') !== false && strpos($address, 'https://') !== false) {
        header('location:' . $address);
    } else {
        header('location:' . $address);
    }
}
