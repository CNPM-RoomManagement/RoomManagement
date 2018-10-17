
<link rel="stylesheet" type="text/css" href="public\css\register.css"/>
<script type="text/javascript" src="public\js\register.js"></script>

<form method="post">
    <div class="body">
        <div class="boder">
            <div class="register">
                <div class="title">
                    <center>
                        <span style="font-size: 24px;color: green">Tạo mới tài khoản</span>
                    </center>
                </div>
                <input type="text" id="user" name="username" placeholder="Nhập tên đăng nhập">
                <input type="password" id="pass" name="password" placeholder="Nhập mật khẩu">
                <input type="password" id="repass" name="password2" placeholder="Nhập lại mật khẩu">
                <input type="text" id="role" name="role" placeholder="Quyền quản trị: 1 - admin hoặc 0 - user">
                <center>
                    <a href="index.php?c=admin&&a=view" class="btn btn-success">Trang chủ</a>
                    <input type="submit" class="btn btn-primary" id="create" class="btn btn-success" name="btn_submit" value="Tạo mới">
                </center>
            </div>
        </div>
    </div>
</form>
