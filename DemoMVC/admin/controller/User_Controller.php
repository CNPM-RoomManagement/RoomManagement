<?php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

session_start();


class User_Controller extends Base_Controller {

    public function __construct($is_controller = true) {
        if ($_SESSION['user']['role'] != 0)  header('location:index.php?c=login');

        parent::__construct($is_controller);
        $this->loadModel('user');
    }

    public function updateAction() {
        $this->setLayout('main');
        $update = new User();
        $id = $_GET['id'];
        $users = $update->load();

        $user = $update->select("users", "id_user = " . $id);
        $condition_job = array("id" => $user['job']);
        $job_result = $update->select("job", $condition_job);
        $condition_gender = array("id" => $user['gender']);
        $gender_result = $update->select("gender", $condition_gender);

        if (isset($_POST['btn-submit'])) {
            if ($_POST['password'] == $_POST['password2']) {
                $con = array('fullname' => $_POST['full_name'],
                    'dateOfBirth' => $_POST['date'],
                    'gender' => $_POST['gender'],
                    'email' => $_POST['email'],
                    'status' => $_POST['status'],
                    'job' => $_POST['job']
                );

                $u = $update->update_user($id, $con);

                if ($u['mess'] != "") {
                    setMessage('error', $u['mess']);
                } else if ($u['status'] == true) {
                    setMessage('success', "Cập nhật thông tin thành công");
                    redirect('index.php?c=user&&a=update&&id=' . $id);
                }
            } else {
                setMessage('error', "Mật khẩu không trùng khớp, vui lòng nhập lại");
            }
        }
        if (isset($_POST['reset'])) {
            redirect('index.php?c=user&&a=update&&id=' . $id);
        }

        $this->render('profile', ["user" => $user,
                                       "users" => $users,
                                        'job' => $job_result['job_name'],
                                        'gender' => $gender_result['gender'],
                                       "title" => "Cập nhật thông tin người dùng",
                                        "page" => "update"]);
    }

}
?>
