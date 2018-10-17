<div class="container" style="margin-top: 50px; width: 500px;">
    <form method="post">
        <div class="body">
            <div class="boder">
                <div class="register"  style="width: 500px;">
                    <div class="card" >
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="background-color: #5A5B5E; color: white">Thông tin người dùng</li>
                                <li class="list-group-item" style="text-align: left">Tên đăng nhập:<input type="text" name="new_user" class="form-control" id="inputEmail3" value="<?php echo $user['user_name'] ?>" readonly></li>
                                <li class="list-group-item" style="text-align: left">Mật khẩu:<input type="password" name="new_pass" value="<?php echo $user['password'] ?>" class="form-control" id="inputPassword3"></li>
                                <li class="list-group-item" style="text-align: left">Quyền quản trị:<input type="text" name="role" value="<?php echo $user['role'] ?>" class="form-control" id="inputPassword3"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="index.php?c=admin&&a=update" class="btn btn-success"> Trang trước</a>
                    <button type="submit" id="update" name="update" class="btn btn-success">Cập nhật </button>
                </div>
            </center>
        </div>
    </form>
</div>

