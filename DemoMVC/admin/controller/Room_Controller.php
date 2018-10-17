<?php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
session_start();

class Room_Controller extends Base_Controller {
    public function __construct() {
        parent::__construct();
        $this->loadModel('room');
    }

    public function createAction() {
        $this->setLayout('main');
        if ($_SESSION['user']['role'] == 1) {
            $create = new Room();
            if (isset($_POST["btn_submit"])) {
                $record = array("name" => $_POST["name"]);
                $c = $create->create($record);
                if ($c['mess'] != "") {
                    setMessage('error', $c['mess']);
                } else if ($c['status'] == true) {
                    setMessage('success', 'Tạo phòng thành công');
                    header('location:index.php?c=room&&a=update');
                }
            }
            $this->render('createRoom', ["title" => "Tạo mới phòng máy",
                                                "page" => "createRoom"]);
        }
        else
            redirect('index.php');
    }

    public function deleteAction() {
        if ($_SESSION['user']['role'] == 1)  {
            $delete = new Room();
            $id = $_GET['id'];
            $condition = "id_room = $id";

            $delete->delete_room($condition);

            require PATH_APPLICATION .'/view/room/deleteRoom.php';
        }
        else
            redirect('index.php');
    }

    public function updateAction() {
        $this->setLayout('main');
        $user_name = null;
        if ($_SESSION['user']['role'] == 1)  {
            $update = new Room();
            $u = $update->update_view();

            $this->render('updateRoom', ["users"=> $u['users'],
                                               'user' => $u['user'],
                                               'title' => "Cập nhật phòng máy",
                                               'page' => 'updateRoom']);
        }
        else
            redirect('index.php');
    }
    public function update_nameAction() {
        $this->setLayout('main');

        if ($_SESSION['user']['role'] == 1)  {
            $update = new Room();
            $condition = array("id_room" => $_GET['id']);
            $user = $update->select("room", $condition);

            if(isset($_POST['update'])) {
                $name = $_POST["name"];
                $u = $update->update_name($condition, $name);

                if ($u['mess'] != "") {
                    setMessage('error', $u['mess']);
                }
                else {
                    header('location:index.php?c=room&&a=update');
                }
            }
            $this->render('updateRoomName', ["user" => $user,
                                                   "title" => "Cập nhật thông tin phòng máy",
                                                    "page" => "updateRoomName"]);
        }
        else
            redirect('index.php');
    }
    public function delete_viewAction() {
        $this->setLayout('main');
        $delete = new Room();

        $del = $delete->delete_view();

        $this->render('deleteUser', ['users' => $del['users'],
                                           'user' => $del['user'],
                                           'title' => "Hủy đăng ký",
                                           'page' => "deleteUser"]);
    }

    public function delete_registerAction() {
        $del = new  Room();

        $con = array("id" => $_GET['id'],
                    "id_user" => $_GET['id_user'],
                    "time_start" => $_GET['start'],
                    "time_end" => $_GET['end']);

        $del->delete_register($con);

        require PATH_APPLICATION .'/view/room/delete.php';
    }
    public function registerAction() {
        $this->setLayout('main');

        $register = new Room();
        $reg = $register->load();

        if (isset($_POST["btn_submit"])) {
            $record = array("id_user" => $_POST['id_user'],
                    "id_room" => $_POST['all_room'],
                    "time_start" => $_POST["time_start"],
                    "time_end" => $_POST["time_end"]);

            $r = $register->register($record);

            if ($r['mess'] != "") {
                setMessage('error', $r['mess']);
            }
            else {
                $us = $_SESSION['user']['user_name'];
                redirect("index.php?c=room&&a=delete_view&&user=$us");
            }
        }

        $this->render('registerRoom', [
            'title' => "Đăng ký phòng máy",
            'page' => 'registerRoom',
            'registerArr' => $reg['registerArr'],
            'activeArr' => $reg['activeArr'],
            "room" => $reg['room'],
            'user' => $reg['user'],
            'time' => $reg['time'],
            'all_room' => $reg['all_room'],
            'page' => "registerRoom"]);
    }
}

?>