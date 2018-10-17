<?php

while ($data = mysqli_fetch_array($user)) {
    $id = $data['id_user'];
    $username = $data['user_name'];
}
?>
<form method="post">
    <div class="container"  style="margin: 0 auto;margin-top: 20px">
<div>
    <b>Chú thích:</b> <br>
    <div>
        <div style="width: 30px; height: 15px;border: 1px solid black;background-color: #888888; float: left; margin-right: 5px;" ></div> <p>Đã có người đăng ký <br> </p>
        <div style="width: 30px; height: 15px; border: 1px solid black;float: left;margin-right: 5px;" ></div> Chưa có người đăng ký <br>
    </div>
</div>
<table  class="container table table-bordered" style="margin-top: 20px;text-align: center;">
    <?php

    while ($data = mysqli_fetch_array($room)) {
        echo '<tr>
            <td style="background-color: #d9534f;color: #FFF">' . $data["name"] . '</td>';

        for ($i = 7; $i <=18; $i++) {
            if (isset($activeArr[$data['id_room']]) && in_array($i, $activeArr[$data['id_room']])) {
                echo '<td style="background-color: #888888; color: #FFF">' . $i . ':00</td>';
            } else {
                echo '<td style="background-color: #f8f8f8">' . $i . ':00</td>';
            }
        }
        echo '</tr>';
        echo '<tr>
                <td colspan="13" style="height: 25px;" ></td>
              </tr>';
    }
    ?>
</table>
<center><a  class="btn btn-primary" data-toggle="modal" data-target="#Register">Đăng ký</a></center>
<div style="height: 30px;"></div>
        <div class="modal fade" id="Register" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="padding: 25px 0px 25px 75px; ">
                    <div class="body" style="padding: 25px 0px 25px 55px; ">
                        <div class="boder">
                            <div class="register">
                                <div style="text-align: left">Mã phòng</div>
                                <select name="all_room" style="width: 355px; height: 44px">
                                    <?php

                                    while ($data = mysqli_fetch_array($all_room)) {

                                        echo '<option value="'.$data['id_room'].'">'.$data['name'].'</option>';
                                    }
                                    ?>
                                </select>
                                <div style="height: 15px;"></div>
                                <input type="hidden" name="id_user" value="<?php echo $id ?>" readonly>
                                <div style="text-align: left">Thời gian bắt đầu:</div>
                                <input type="time" name="time_start" style="width: 355px; height: 44px" ">
                                <div style="text-align: left">Thời gian kết thúc:</div>
                                <input type="time" name="time_end" style="width: 355px; height: 44px"">

                                <div style="height: 15px;"></div>
                                    <input type="submit" class="btn btn-primary" id="create" class="btn btn-success" name="btn_submit" value="Đăng ký">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div style="height: 50px;"></div>
</div>
</form>

