<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 7/3/2018
 * Time: 2:32 PM
 */
require PATH_SYSTEM . '/core/Model.php';
class Site extends Model {
    public $pk = 'id_user';
    public $tblName = 'users';

    public function login($condition) {
        $message = "";
        $status = "";
        $username = $condition['user_name'];
        $password = $condition['password'];
        $login = $this->select($this->tblName, $condition);

        $row = $this->select("users", "user_name = '$username'");

        $admin = array("user_name" => $row["user_name"],
                        "password" => $row["password"],
                        "role" => $row["role"]);

        if ($login == 0) {
            $message = "Username or password is incorrect! Please retry!";
        }
        else if ($username == $admin['user_name'] && $password == $admin['password'] && $admin['role'] == 1) {
            $_SESSION['user'] = [
                'id_user' => $row["id_user"],
                'user_name' => $row["user_name"],
                'role' => $row["role"],
                'job' => $row['job'],
                'gender' => $row['gender']
            ];
            $status = "login_admin";
        }
        else {
            $_SESSION['user'] = [
                'id_user' => $row["id_user"],
                'user_name' => $row["user_name"],
                'role' => $row["role"],
                'job' => $row['job'],
                'gender' => $row['gender']
            ];
            $status = "login_user";
        }
        return array("message" => $message,
                    "status" => $status);
    }

    public function register($record) {
        $status = false;
        $message = "";
        $id = "";
        $record2 = array("user_name" => $record["user_name"],
                                    "password" => $record["password"],
                                    "job" => 3,
                                    "gender" => 2,
                                    "role" => 0);
        $condition = array("user_name" => $record["user_name"]);
        if ($record["user_name"] == "" || $record["password"] == "" || $record["password2"] == "") {
            $message .= "<p class = 'text2'> Mọi thông tin đều là bắt buộc</p>";
        } else {
            if (strlen($record["password"]) > 20 or strlen($record["password"]) < 6) {
                $message .= "<p class = 'text2'>Mật khẩu phải nhiều hơn 6 ký tự</p>";
            } else {
                if ($record["password2"] != $record["password"]) {
                    $message .= "<p class = 'text2'>Mật khẩu không trùng nhau</p>";
                } else {
                    $select = $this->select($this->tblName, $condition);
                    if ($select > 0) {
                        $message .= "<p class = 'text2'>Tài khoản đã tồn tại</p>";
                    } else {
                        $insert = $this->insert($this->tblName, $record2);
                        $user = $this->select("users", $condition);
                        $_SESSION['user'] = [
                            'id_user' => $user["id_user"],
                            'user_name' => $user["user_name"],
                            'role' => $user["role"],
                            'job' => $user['job'],
                            'gender' => $user['gender']
                        ];
                        $id = $user['id_user'];
                        $status = true;
                    }
                }
            }
        }

        return array("message" => $message,
                    "status" => $status,
                    "id" => $id);
    }
}
?>