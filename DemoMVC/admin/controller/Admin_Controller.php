<?php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

session_start();

class Admin_Controller extends Base_Controller {
    public function __construct() {
        parent::__construct();
        $this->loadModel('admin');
    }

    public function createAction() {
        if ($_SESSION['user']['role'] == 1)  {
            $register = new Admin();

            $this->setLayout('main');
            if (isset($_POST["btn_submit"])) {

                $record = array("user_name" => $_POST["username"],
                    "password" => $_POST["password"],
                    "password2" => $_POST["password2"],
                    "role" => $_POST["role"]);

                $array = $register->create($record);


                if ($array['status'] == true) {
                    redirect('index.php?c=admin&&a=update');
                }
                else {
                    setMessage('error', $array['mess']);
                }
            }
            $this->render('createAdmin',["title" => "Tạo mới tài khoản",
                                                'page' => "createAdmin"]);
        }
        else
            redirect('index.php');
    }

    public function delete_userAction() {

        if ($_SESSION['user']['role'] == 1)  {
            $delete = new Admin();
            $id = $_GET['id'];

            $delete->delete_user($id);

            require PATH_APPLICATION .'/view/admin/deleteAdmin.php';
        }
        else
            redirect('index.php');
    }

    public function updateAction() {
        $this->setLayout('main');
        $title = "Cập nhật thông tin người dùng";

        if ($_SESSION['user']['role'] == 1)  {
            $update = new Admin();
            $username = $_SESSION['user']['user_name'];

            $updateView = $update->update_view($username);

            $users = $updateView[0];
            $user = $updateView[1];

            $this->render('updateAdmin', ["users"=>$users,
                                                'user' => $user,
                                                'title' => $title,
                                                'page' => "updateAdmin"]);
        }
        else
            redirect('index.php');
    }


    public function update_userAction() {
        $this->setLayout('main');
        $title = "Cập nhật thông tin người dùng";
        $user = [];
        if ($_SESSION['user']['role'] == 1)  {
            $update = new Admin();
            $id_user = $_GET['id'];
            $condition = array("id_user" => $id_user);
            $user = $update->select("users", $condition);

            if(isset($_POST['update'])) {
                $record = array("new_user" => $_POST["new_user"],
                                "new_pass" => $_POST["new_pass"],
                                "role" => $_POST["role"]);
                $update_user = $update->update_user($record, $condition);

                if ($update_user['mess'] != "") {
                    setMessage('error', $update_user['mess']);
                } else if ($update_user['status'] == "true_user") {
                    $_SESSION['user']['role'] = 0;

                    header('location:index.php?c=room&&a=register');
                }
                else if($update_user['status'] == "true_admin"){
                    header('location:index.php?c=admin&&a=update');
                }
            }
            $this->render('updateUser', ['user' => $user,
                                               'title' => $title,
                                               'page' => "updateUser"]);
        }
        else
            redirect('index.php');
    }

    public function viewAction() {
        $this->setLayout('main');
        $title = "Quản lý phòng máy";

        if ($_SESSION['user']['role'] == 1)  {
            $view = new Admin();
            $v = $view->view();

            $this->render('viewAdmin', ['page' => "viewAdmin",
                                              'users' => $v['users'],
                                              'user' => $v['user'],
                                              'title' => $title]);
        }
        else
            redirect('index.php');
    }

//    public function ajaxAction() {
//        $password = $_POST['password'];
//        if ($password) {
//            // xử lý update abc xyz gì đó....
//            $response = [
//                'error' => 0,
//                'message' => 'Cập nhật mật khẩu thành công.'
//            ];
//        } else {
//            $response = [
//                'error' => 1,
//                'message' => 'Username trống.'
//            ];
//        }
//        echo json_encode($response); // đẩy cái mảng này thành dạng string.
//        die;
//    }
}

?>