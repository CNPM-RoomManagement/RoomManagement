<?php
/**
 * Created by PhpStorm.
 * User: kydonvn
 * Date: 02/07/2018
 * Time: 11:27
 */
require PATH_SYSTEM . '/core/Model.php';
class User extends Model {
    public $pk = 'id_user';
    public $tblName = 'users';

    public function load() {
        $username = $_SESSION['user']['user_name'];
        $users = $this->selectSQL("*", "users", "user_name = '$username'");

        return $users;
    }

    public function update_user($id, $con) {
        $condition = "id_user = ". $id;
        $user = $this->select("users", "id_user = " . $id);

        $mess = "";
        $status = false;

        $full_name = $con['fullname'];
        $date = $con['dateOfBirth'];
        $gender = $con['gender'];
        $job = $con['job'];
        $email = $con['email'];
        $status_user = $con['status'];

        if ($full_name == "" || $date == "" || $gender == "" || $job == "" || $email == "" || $status_user == "") {
            $mess .= "Vui lòng nhập đầy đủ thông tin";
        } else {
            if ($gender == "Nữ") {
                $con['gender'] = 0;
            }
            if ($gender == "Nam") {
                $con['gender'] = 1;
            }
            $up = $this->update("users", $con, $condition);
            $status = true;
        }
        return array(
            "status" => $status,
            "mess" => $mess,
        );
    }

}

?>