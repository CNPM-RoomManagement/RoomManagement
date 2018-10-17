<!DOCTYPE>
<html>
<head>
    <meta content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo isset($title) ? $title : 'Default Title' ?></title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="div-alert">
    <?php if (hasMessage('success')) { ?>
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> <?php echo implode(' ', getMessage('success')) ?>
    </div>
    <?php } ?>
    <?php if (hasMessage('error')) { ?>
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> <?php echo implode(' ', getMessage('error')) ?>
        </div>
    <?php }
    $account = array("createAdmin","updateUser","updateAdmin", "update");

    $rooms = array("createRoom", "updateRoom", "updateRoomName","deleteUser");

    ?>
</div>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <?php if ($_SESSION['user']['role'] == 1) { ?>
        <ul class="nav navbar-nav">
            <li class="<?php echo isset($page) && $page == 'viewAdmin' ? 'active' : '' ?>"><a href="index.php?c=admin&&a=view">Trang chủ</a></li>
            <li class="dropdown  <?php echo isset($page) && in_array($page, $account) ? 'active' : '' ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Quản lý tài khoản<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?c=admin&&a=update">Cập nhật thông tin tài khoản</a></li>
                    <li><a href="index.php?c=admin&&a=create">Tạo mới tài khoản</a></li>
                </ul>
            </li>
            <li class="dropdown  <?php echo isset($page) && in_array($page, $rooms) ? 'active' : '' ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Quản lý phòng máy<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?c=room&&a=update">Cập nhật phòng máy</a></li>
                    <li><a href="index.php?c=room&&a=create">Tạo phòng mới</a></li>
                </ul>
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <a href='index.php?c=site&&a=logout' class="btn btn-danger" style="margin-right: 100px;margin-top: 10px;">Đăng xuất</a>
        </ul>

        <?php } else { ?>

        <ul class="nav navbar-nav">
            <li class="<?php echo isset($page) && $page == 'registerRoom' ? 'active' : '' ?>"><a href="index.php?c=room&&a=register">Trang chủ</a></li>
            <li class="dropdown <?php echo isset($page) && in_array($page, $rooms) ? 'active' : '' ?>"><a href="index.php?c=room&&a=delete_view&&user=<?php echo $_SESSION['user']['user_name'] ?>">Hủy đăng ký</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown <?php echo isset($page) && in_array($page, $account) ? 'active' : '' ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['user']['user_name'] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?c=user&&a=update&&id=<?php echo $_SESSION['user']['id_user'] ?>">Cập nhật thông tin tài khoản</a></li>
                    <li><a href='index.php?c=site&&a=logout' style="margin-right: 100px;margin-top: 10px;">Đăng xuất</a></li>
                </ul>
            </li>

        </ul>
        <?php } ?>
    </div>
</nav>

{{content}}

</body>
</html>
