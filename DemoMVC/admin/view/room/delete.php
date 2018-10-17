<?php
 setMessage('success',"Hủy đăng ký thành công");
 session_start();
 $user = $_SESSION['user']['user_name'];
 redirect("index.php?c=room&&a=delete_view&&user=$user");
?>
