<?php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

session_start();

class Site_Controller extends Base_Controller {
    public function __construct() {
        parent::__construct();
        $this->loadModel('site');
    }

    public function loginAction() {
        $this->view->setLayout('login');
        $log = new Site();
        $message = "";

        if (isset($_POST["submit_button"])) {
            $condition = array("user_name" => $_POST["username"],
                                "password" => $_POST["password"]);
            $login = $log->login($condition);
            if ($login['message'] != "") {
                $message = $login['message'];
            }
            else if ($login['status'] == "login_admin") {
                redirect('index.php?c=admin&&a=view');
            }
            else if ($login['status'] == "login_user"){
                redirect('index.php?c=room&&a=register');
            }
        }
        $this->render('login', ['message' => $message]);
    }
    public function logoutAction() {
        session_destroy();
        redirect('index.php');
    }

    public function registerAction() {
        $register = new Site();
        $message =  "";
        if (isset($_POST["btn_submit"])) {
            $record = array("user_name" => $_POST["username"],
                            "password" => $_POST["password"],
                            "password2" => $_POST["password2"],
                            "role" => 0);

            $res = $register->register($record);
            if ($res['message'] != "") {
                $message = $res['message'];
            }
            else if ($res['status'] == true) {
                $link = "index.php?c=user&&a=update&&id=". $_SESSION['user']['id_user'];
                ?>
                <script>
                alert("Đăng ký thành công!");
                window.location = '<?php echo $link?>';
                </script>
                <?php
            }
        }
        $this->render('create_user', ['message' => $message]);
    }
}
?>