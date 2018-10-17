<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 7/3/2018
 * Time: 2:32 PM
 */
require PATH_SYSTEM . '/core/Model.php';
class Room extends Model {
    public $pk = 'id_user';
    public $tblName = 'users';

    public function create($record) {
        $name = $record['name'];
        $mess = "";
        $status = false;
        if ($name == "") {
            $mess .= 'Tên phòng không được để trống';
        } else {
            $select = $this->select("room", $record);
            if ($select > 0) {
                $mess .= 'Phòng đã tồn tại';
            } else {
                $insert = $this->insert("room", $record);
                header('location:index.php?c=room&&a=update');
                $status = true;
            }
        }
        return array("status" => $status,
                    "mess" => $mess);
    }

    public function delete_room($condition) {
        $delete = $this->delete("room", $condition);
    }

    public function update_view() {
        $username = $_SESSION['user']['user_name'];

        $users = $this->selectSQL("*","room", "1");
        $user = $this->selectSQL("*","users","user_name = '$username'");

        return array("users" => $users,
                    "user" => $user);
    }

    public function update_name($condition, $name){
        $room = $this->select("room", "name = '$name'");
        $mess = "";

        if ($_POST['name'] == "") {
            $mess .= 'Tên phòng không được để trống!';
        } else if ($room > 0) {
            $mess .= "Tên phòng đã tồn tại!";
        } else {
            $record = array("name" => $_POST["name"]);
            $up = $this->update("room", $record, $condition);
        }
        return array("mess" => $mess);
    }

    public function delete_view() {
        $user = $_SESSION['user']['user_name'];
        $col = array("users.id_user", "users.user_name", "room.name", "register.time_start", "register.time_end", "room.id_room");
        $condition = "users.user_name = '$user' AND users.id_user = register.id_user AND room.id_room = register.id_room  ORDER BY register.id_user";
        $users = $this->selectSQL($col, "users, room, register,times", $condition);

        $username = $_SESSION['user']['user_name'];
        $user = $this->selectSQL("*","users","user_name = '$username'");

        return array("users" => $users,
                    "user" => $user);
    }

    public function delete_register($con) {
        $id = $con['id'];
        $id_user = $con['id_user'];
        $time_start = $con['time_start'];
        $time_end = $con['time_end'];

        $condition = "id_room = $id AND id_user = $id_user AND time_start = '$time_start' AND time_end = '$time_end'";
        $delete = $this->delete("register", $condition);
    }

    public function load() {
        $room = $this->selectSQL("*", "room", "1");

        $username = $_SESSION['user']['user_name'];
        $user = $this->selectSQL("*", "users","user_name = '$username'");

        $time = array("08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00");
        $check = $this->select("register", "1 ORDER BY register.id_room", ['id_register', 'id_user']);

        $select = $this->selectSQL("*",'register', '1');
        $registerArr = [];
        $activeArr = [];
        while ($data = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
            $activeArr[$data['id_room']] = [];

            if (!isset($registerArr[$data['id_room']])) $registerArr[$data['id_room']] = [];
            array_push($registerArr[$data['id_room']], $data);
        }

        foreach ($registerArr as $key => $value) {
            foreach ($value as $k => $v) {
                $time_start = explode(':', $v['time_start'])[0];
                $time_end = explode(':', $v['time_end'])[0];

                for ($i = $time_start; $i <= $time_end; $i++) {
                    $activeArr[$key][] = (int)$i;
                }
            }
        }

        $col = array("users.id_user", "users.user_name", "room.name", "times.khung_gio", "register.time_start", "register.time_end", "room.id_room");
        $con = "users.id_user = register.id_user AND room.id_room = register.id_room AND times.id_time = register.id_time";
        $checks = $this->selectSQL($col, "users, room, register,times", $con);

        $all_room = $this->selectSQL("*", "room", "1");

        return array('registerArr' => $registerArr,
            'activeArr' => $activeArr,
            "room" => $room,
            'user' => $user,
            'time' => $time,
            'check' => $check,
            'all_room' => $all_room);
    }

    public function register($record){
        $mess = "";

        $id_user = $record['id_user'];
        $id_room = $record['id_room'];
        $time_start = $record["time_start"];
        $time_end = $record["time_end"];

        $condition = array("id_room" => $id_room,
            "id_user" => $id_user,
            "time_start" => $time_start,
            "time_end" => $time_end);
        $check = 1;

        if ($time_start > 6 && $time_end < 19) {
            if (mysqli_num_rows($this->selectSQL("*", "register", "id_room = $id_room AND '$time_start' <= time_start AND time_start <= '$time_end' ")) > 0) {
                $check = 0;
            }
            if (mysqli_num_rows($this->selectSQL("*", "register", "id_room = $id_room AND '$time_start' <= time_end AND time_end <= '$time_end' ")) > 0) {
                $check = 0;
            }
        } else {
            $check = 0;
        }
        if ($check == 1) {
            $this->insert("register", $condition);
        } else {
            $mess .= "Bạn đã đăng ký trùng lịch. Vui lòng đăng ký lại";
        }

        return array(
            'mess' => $mess,
            'check' => $check,
            );
    }
}
?>