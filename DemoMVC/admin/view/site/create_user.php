<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" type="text/css" href="public\css\login_demo.css"/>
    <script type="text/javascript" src="public\js\register.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css"></style>
</head>
<body>
    <div class="login-screen" ></div>
    <div class="login-center">
        <div class="container min-height" style="margin-top: 150px;" >
            <div class="row" style="height: 500px;">
                <div class="col-xs-4 col-md-offset-8" style="height: 500px;">
                    <div class="login" id="card" style="height: 500px;">
                        <div class="front signin_form">
                            <p>Sign Up An Account</p>
                            <form class="login-form" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Type your username">
                                        <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-user"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Type your password">
                                        <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-lock"></i>
                                      </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Retype your password">
                                        <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-lock"></i>
                                      </span>
                                    </div>
                                </div>
                                <div style="height: 20px;">
                                </div>
                                <div class="form-group sign-btn">
                                    <input type="submit" class="btn" name="btn_submit" id="btn_submit" value="Sign up"> <br>
                                    <a href="#" class="forgot" style="color: #ac2925;"><i><?php if (isset($message)) echo $message; ?></i></a>
                                    <p>You have already an account so <br><a href="index.php?c=site&&a=login" id="flip-btn" class="signup signup_link">Go to sign in</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>