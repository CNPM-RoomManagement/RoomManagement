<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 6/29/2018
 * Time: 10:57 AM
 */
    class Helper_Loader {
        public function load($helper) {
            $helper = ucfirst($helper) . '_Helper';
            require_once PATH_SYSTEM . '/helper/' . $helper . '.php';
        }
    }
?>