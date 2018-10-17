<div class="container" style="margin: 0 auto;margin-top: 50px;">

    <?php

    while ($data = mysqli_fetch_array($user)) {

        echo '    
                    <div style="text-align: right;">ID : '.$data['id_user'].'</div>
                    <div style="text-align: right;">Đăng nhập dưới tên: '.$data['user_name'].'</div>			
			        <div style="text-align: right;">Quyền quản trị: Admin</div>
					';

    }
    ?>
    <div style="height: 30px;"></div>
<center>
    <div style="height: 30px;"></div>
<div style="width: 600px;" >
    <div class="row"">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color: #5A5B5E; color: white">Quản lý phòng máy</li>
                        <li class="list-group-item" style="text-align: left"><a href="index.php?c=room&&a=create" style="color: #080d17">Tạo mới phòng máy</a> </li>
                        <li class="list-group-item" style="text-align: left"><a href="index.php?c=room&&a=update" style="color: #080d17">Cập nhập thông tin phòng máy</a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6"">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush" >
                        <li class="list-group-item" style="background-color: #5A5B5E; color: white">Quản lý người dùng</li>
                        <li class="list-group-item" style="text-align: left"><a href="index.php?c=admin&&a=create" style="color: #080d17">Tạo mới tài khoản</a> </li>
                        <li class="list-group-item" style="text-align: left"><a href="index.php?c=admin&&a=update" style="color: #080d17">Cập nhật thông tin người dùng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

    <div style="height: 30px;"></div>
</center>
</div>
