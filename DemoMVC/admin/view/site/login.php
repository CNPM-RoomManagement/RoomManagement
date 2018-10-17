
<body class="main">

<div class="login-screen" ></div>
<div class="login-center">
    <div class="container min-height" style="margin-top: 150px;" >
        <div class="row" style="height: 500px;">
            <div class="col-xs-4 col-md-offset-8" style="height: 500px;">
                <div class="login" id="card" style="height: 500px; position: fixed;">
                    <div class="front signin_form">
                        <p>Login Your Account</p>
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
                            <div class="checkbox">
                                <label><input type="checkbox">Remember me next time.</label>
                            </div>
                            <div class="form-group sign-btn">
                                <input type="submit" class="btn" name="submit_button" id="submit_button" value="Log in">
                                <p><a href="#" class="forgot" style="color: #ac2925;"><i><?php if (isset($message)) echo $message; ?></i></a></p>

                                <p>Create a new account. It's free and always will be.<br><a href="index.php?c=site&&a=register" id="flip-btn" class="signup signup_link">Sign up for a new account</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

