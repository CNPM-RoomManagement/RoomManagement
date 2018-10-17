<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 8/3/2018
 * Time: 4:03 PM
 */
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

function setMessage($type, $message) {
    if (!isset($_SESSION['message'])) $_SESSION['message'] = [];
    if (!isset($_SESSION['message'][$type])) $_SESSION['message'][$type] = [];

    $_SESSION['message'][$type][] = $message;
}

function hasMessage($type) {
    return isset($_SESSION['message'][$type]) && count($_SESSION['message'][$type]) > 0;
}

function getMessage($type) {
    $response = null;
    if (isset($_SESSION['message'][$type])) {
        $response = $_SESSION['message'][$type];
        $_SESSION['message'][$type] = [];
    }
    return $response;

}