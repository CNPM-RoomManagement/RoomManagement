<?php
class DB {
    private $_conn;

    function __construct() {
        require PATH_SYSTEM . '/config/config.php';
        $this->_conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('không thể kết nối tới database');

        mysqli_query($this->_conn,"SET NAMES 'UTF8'");

    }


    function selectSQL($column, $table, $conditions) {
        if (is_array($column)) {
            $col = implode(",", $column);
        }
        else
            $col = $column;
        if(is_array($conditions)) {
            $sql = "SELECT DISTINCT $col FROM $table";
            if ($conditions != null) {
                $cond = array();
                foreach ($conditions as $key => $value) {
                    //array_push($cond, "`$key` = $value");
                    array_push($cond, "`$key` = '$value'");
                }
                $cond = implode(" AND ", $cond);
                $sql .= " WHERE ";
                $sql .= $cond;
                $query = mysqli_query($this->_conn, $sql);
                return $query;
            }
            else {
                $query = mysqli_query($this->_conn, $sql);
                return $query;
            }
        }
        else if(is_string($conditions)) {
            $sql = "SELECT DISTINCT $col FROM $table where $conditions";

            $query = mysqli_query($this->_conn, $sql);
            return $query;
        }
    }


    function select($table, $conditions = null, $columns = null) {

        if ($columns) {
            $columnsText = is_array($columns) ? implode(', ', $columns) : $columns;

        } else $columnsText = '*';

        if ($conditions) {

            if (is_array($conditions)) {

                $sql = "SELECT " . $columnsText . " FROM `$table`";

                $cond = array();
                foreach ($conditions as $key => $value) {
                    //array_push($cond, "`$key` = $value");
                    array_push($cond, "`$key` = '$value'");
                }

                $sql .= " WHERE " . implode(" AND ", $cond);


                $query = mysqli_query($this->_conn, $sql);

                $row = mysqli_fetch_assoc($query);

            } else if(is_string($conditions)) {
                $sql = "SELECT " . $columnsText . " FROM `$table` WHERE $conditions";
                $query = mysqli_query($this->_conn, $sql);

                $row = mysqli_fetch_assoc($query);
            }
        } else {
            $sql = "SELECT " . $columnsText . " FROM `$table`";
            $query = mysqli_query($this->_conn, $sql);
            $row = mysqli_fetch_assoc($query);
        }
        return $row;
    }


    function insert($table, $record) {
        $con = array();
        $keys = [];
        $values = [];
        if (!empty($record)) {
            foreach ($record as $key => $value) {
                $keys[] = $key;
                $values[] = $value;
            }
        }

        $keys= implode(",", $keys);
        $str = "'" . implode("', '", $values) . "'";

        $sql = "INSERT INTO `$table`($keys) VALUES($str)";

        $query = mysqli_query($this->_conn, $sql);
        return $query;

    }

    function update($table, $record, $conditions) {
        if(is_array($conditions)) {
            if ($conditions != null) {
                if (!empty($record)) {
                    $con = array();
                    foreach ($conditions as $key => $value) {
                        foreach ($record as $key2 => $value2) {
                            array_push($con, "`$key2`='$value2'");
                        }
                        $con = implode(", ", $con);
                        $sql = "UPDATE `$table` SET $con WHERE `$key` = $value";

                        $query = mysqli_query($this->_conn, $sql);
                        return $query;
                    }
                }
            }
        }

        if(is_string($conditions)) {
            $con = array();
            foreach ($record as $key2 => $value2) {
                array_push($con, "`$key2`='$value2'");
            }
            $con = implode(",", $con);
            $sql = "UPDATE `$table` SET $con WHERE $conditions";;
            $query = mysqli_query($this->_conn, $sql);
            return $query;
        }
    }

    function delete($table, $conditions) {
        if(is_array($conditions)) {
            if ($conditions != null) {
                foreach ($conditions as $key => $value) {
                    $sql = $sql = "DELETE FROM `$table` WHERE `$key`='$value'";
                    $query = mysqli_query($this->_conn, $sql);
                    return $query;
                }
            }
        }
        else if(is_string($conditions)) {
            $sql = "DELETE FROM `$table` WHERE $conditions";
            $query = mysqli_query($this->_conn, $sql);
            return $query;
        }
    }
}
?>
