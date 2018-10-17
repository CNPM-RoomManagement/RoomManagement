<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 6/29/2018
 * Time: 10:27 AM
 */
    if (!defined('PATH_SYSTEM')) die ('Bad request');

    class Library_Loader {
        public function load($library, $args = array()) {
            //Nếu chưa load thư viện thì t/h load
            if (empty($this->{$library})) {
                $class = ucfirst($library) . '_Library';
                require_once(PATH_SYSTEM . '/library/' . $class . '.php');
                $this->{$library} = new $class($args);
            }
        }
    }
?>