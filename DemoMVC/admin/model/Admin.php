<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 7/4/2018
 * Time: 2:42 PM
 */

require PATH_SYSTEM . '/core/Model.php';

class Admin extends Model {
    public $pk = 'id_user';
    public $tblName = 'users';
    public $tblName2 = 'register';
    public $tblName3 = 'room';

    public function create($record){
        $username = $record["user_name"];
        $password = $record["password"];
        $password2 = $record["password2"];
        $role = $record["role"];

        $mess = "";
        $status = false;
        $condition = array("user_name" => $username);
        $record2 = $record = array("user_name" => $username,
            "password" => $password,
            "role" => $role);
        if ($username == "" || $password == "" || $password2 == "" || $role == "") {
            $mess .= "Mọi thông tin đều là bắt buộc </br>";
        } else {
            if (strlen($password) > 20 or strlen($password) < 6) {
                $mess .= "Mật khẩu phải nhiều hơn 6 ký tự </br>";
            } else {
                if ($password2 != $password) {
                    $mess .= "Mật khẩu không trùng nhau </br>";
                } else {
                    $select = $this->select($this->tblName, $condition);
                    if ($select > 0) {
                        $mess .= "Tài khoản đã tồn tại </br>";
                    } else {
                        $status = true;
                        $insert = $this->insert($this->tblName, $record2);
                    }
                }
            }
        }
        return array('status' => $status,
                    'mess' => $mess);
    }

    public function delete_user($id) {
        $condition = "id_user = $id";
        $this->delete($this->tblName, $condition);
    }

    public function update_view($username) {
        $users = $this->selectSQL("*",$this->tblName, "1");
        $user = $this->selectSQL("*","users","user_name = '$username'");

        return array($users, $user);
    }

    public function update_user($record, $condition) {
        $new_user = $record['new_user'];
        $new_pass = $record['new_pass'];
        $role = $record['role'];

        $mess = "";
        $status = null;
        if ($new_pass == "" || $role == "") {
            $mess .= "Vui lòng nhập đầy đủ thông tin </br>";
        }
        else if ($role > 1 || $role < 0) {
            $mess .= "Vui lòng nhập đúng định dạng: 0 - user hoặc 1 - admin";
        }
        else {
            if ($role == 0 && $new_user == $_SESSION['user']['user_name']) {
                $record = array("password" => $_POST["new_pass"],
                                "role" => $_POST["role"]);

                $up = $this->update($this->tblName, $record, $condition);
                $status = "true_user";
            }
            else {

                $record = array("password" => $_POST["new_pass"],
                    "role" => $_POST["role"]);
                $up = $this->update($this->tblName, $record, $condition);

                $status = "true_admin";
            }
        }

        return array("status" => $status,
                    "mess" => $mess);
    }
    public function view() {
        $column = "users.id_user, users.user_name, room.name, times.khung_gio, register.time_start, register.time_end, room.id_room";
        $condition = "users.id_user = register.id_user AND room.id_room = register.id_room AND times.id_time = register.id_time";

        $users = $this->selectSQL($column, "users, room, register,times", $condition);
        $username = $_SESSION['user']['user_name'];
        $user = $this->selectSQL("*","users","user_name = '$username'");

        return array("users" => $users,
                    "user" => $user);
    }
}

?>