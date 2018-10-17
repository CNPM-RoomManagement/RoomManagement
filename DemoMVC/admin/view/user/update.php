<div class="container" style="margin-top: 50px; width: 500px;">
    <form method="post">
        <div class="body">
            <div class="boder">
                <div class="register"  style="width: 500px;">
                    <div class="card" >
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="background-color: #5A5B5E; color: white">Thông tin người dùng</li>
                                <li class="list-group-item" style="text-align: left">Tên đăng nhập:<input type="text" name="new_user" class="form-control" id="inputEmail3" value="<?php echo $_SESSION['user']['user_name'] ?>" readonly></li>
                                <li class="list-group-item" style="text-align: left">Mật khẩu:<input type="password" name="new_pass" class="form-control" id="inputPassword3"></li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <div>
                    <a href='index.php?c=room&&a=register' class="btn btn-primary">Trang trước</a>

                    <button type="submit" name="update" class="btn btn-success"> Cập nhật </button>
                </div>
            </center>
        </div>
    </form>
</div>
