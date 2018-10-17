<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');


class Controller {
    protected $view = NULL;
    protected $model = NULL;
    protected $register = NULL;
    protected $config = NULL;
    protected $helper = NULL;
    protected $library = NULL;

    public function __construct() {
        if (!isset($_SESSION)) {
            session_start();
        }

        //Load config
        require_once PATH_SYSTEM . '/core/loader/Config_Loader.php';

        $this->config = new Config_Loader();
        $this->config->load('config');

        //Load library
        require_once PATH_SYSTEM . '/core/loader/Library_Loader.php';
        $this->library = new Library_Loader();

        //load helper
        require_once PATH_SYSTEM . '/core/loader/Helper_Loader.php';
        $this->helper = new Helper_Loader();

        //load view
        require_once PATH_SYSTEM . '/core/loader/View_Loader.php';
        $this->view = new View_Loader();

        //load model
        require_once PATH_SYSTEM . '/core/loader/Model_Loader.php';
        $this->model = new Model_Loader();
    }

}

?>