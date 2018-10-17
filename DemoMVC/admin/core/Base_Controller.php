<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Base_Controller extends Controller {
    public function __construct() {
        parent::__construct();

        $this->library->load('site');
        $this->helper->load('session');
        $this->helper->load('redirect');
    }

    public function render($view, $data) {
        $controller = explode('_', get_class($this))[0];
        $data['base_url'] = $this->config->item('base_url');
        $this->view->load(strtolower($controller) . '/' . $view, $data);
        $this->view->show();
    }

    public function setLayout($layout) {
        $this->view->setLayout($layout);
    }

    public function loadModel($model) {
        if (is_array($model)) {
            foreach ($model as $m) {
                $this->model->load($m);
            }
        } else
            $this->model->load($model);

    }

    public function loadHelper($helper) {
        if (is_array($helper)) {
            foreach ($helper as $h) {
                $this->helper->load($h);
            }
        } else
            $this->helper->load($helper);

    }

    public function loadLibrary($lib) {
        if (is_array($lib)) {
            foreach ($lib as $l) {
                $this->library->load($l);
            }
        } else
            $this->library->load($lib);

    }
}