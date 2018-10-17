<?php

class Model_Loader {
    private $__models = array();

    public function load($model) {
        if (file_exists(PATH_APPLICATION . '/model/' . ucfirst($model) . '.php')) {
            require_once PATH_APPLICATION . '/model/' . ucfirst($model) . '.php';
            $this->__models[] = $model;
        }
    }
}
?>