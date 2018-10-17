
<?php

while ($data = mysqli_fetch_array($user)) {
    $id_user = $data['id_user'];
    $username = $data['user_name'];
    $_SESSION['id_user'] = $data['id_user'];
}

?>
<div class="container" style="margin: 0 auto;margin-top: 50px">
    <?php

    if (mysqli_num_rows($users) == 0)
        echo '<center>Chưa có phòng đăng ký!</center>';
    else {

        ?>
    <div style="text-align: center;font-size: 30px;margin-bottom: 20px;color: green">Phòng đã đăng ký</div>
    <table  class="container table table-hover table-bordered" style="margin-top: 20px;text-align: center;">
        <tbody>
        <tr class="info">
            <td style="font-size: 20px;">STT</td>
            <td style="font-size: 20px;">Mã Phòng</td>
            <td style="font-size: 20px;">Thời gian bắt đầu</td>
            <td style="font-size: 20px;">Thời gian kết thúc</td>
            <th style="font-size: 20px;text-align: center;" colspan="2">Thao tác</th>
        </tr>
        </tbody>
        <?php
        $stt = 1;
        while ($datas = mysqli_fetch_array($users)) {
            echo '<tr>
                    <td width="50px" >'.$stt.'</td>
					<td width="100px">'.$datas["name"].'</td>
					<td width="50px" >'.$datas["time_start"].'</td>
					<td width="50px">'.$datas["time_end"].'</td>
					<td style="padding: 3px 1px; width: 120px;text-align: center;"><a class=\'delete btn btn-danger\'  data-confirm=\'Bạn có chắc muốn hủy đăng ký?\' href="index.php?c=room&&a=delete_register&&id='.$datas["id_room"].'&&id_user='.$id_user.'&&start='.$datas["time_start"].'&&end='.$datas["time_end"].'">Hủy</a></td>			
					</tr>';

            $stt++;
        }
        ?>
    </table>

    <?php
        }
    ?>
</div>
<script type="text/javascript">
    var deleteLinks = document.querySelectorAll('.delete');

    for (var i = 0; i < deleteLinks.length; i++) {
        deleteLinks[i].addEventListener('click', function(event) {
            event.preventDefault();

            var choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                window.location.href = this.getAttribute('href');

            }
        });
    };
</script>
</body>
</html>
