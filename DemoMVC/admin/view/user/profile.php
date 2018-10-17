<link rel="stylesheet" type="text/css" href="public\css\profileUser.css"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<form method="post">
<div class="container bootstrap snippet">
    <h1><center>Update Profile</center></h1>
    <div style="height: 50px;"></div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->
            <div class="text-center">
                <img src="<?php if ($user['avatar'] == "") { echo "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAY1BMVEXTz80AAABUU1IgIB/Oysh/fHsqKSlNS0vJxcMZGBhGRER1cnGEgYAHBwdXVVRKSUglJSS9ube1srAUExOVkpGppqR3dXRhX148OjqLiIcbGxtta2o3NjWfnJrCvryQjYwvLi5mmRAKAAAEe0lEQVR4nO2d25aqMAyGbTkpJwfk4ICi7/+UW2Tcow4ihyatWfmuvOy/aJo0TeJqxTAMwzAMwzAMQ488DKT03Su+lEGY617RdNLQs0QPlhemutc2nize9Im4sYkz3SscQ1ruhlR07ErTv0vovlfR4Ya61/oau6jGymipHFv3inuxixF76mmHFQZKOfaeUu+wjrrX/USznSOjZdvoXvs9YTRXhxCROVa/nv05fj7KWreCjnSWddxjGeFVlmyrGyZsr2C5jJZAt45SjQ4hSq0ybE+VDiE8nUIWHlePbPXpULavOrTtLkV2/osmi/9WrUOIbx06cgX+45lIw61+vdif92HhRysKD9570A9hB0aHEA6ujgTAQDqiBFWIUk/4CKpfPMLpEALx9mtPypZMpcLLSCh36Y+gOXh7ct5nGjusTwJ29N5AOoLtwRS1CjY4nySE1iEEzhV+dJ56Pi6GjhxehxAYUbDia2E/GJdFcFNv2cDryDB0CAH/OhfjCInBhaDsLIS9leLoEAI6rw0entyADlOArup/gb68g+RO+rBgddhYOoSADRxR4pMO2CgFIE36Ctj0aY0npAYVguTXW2B9u48nxAcVcsATcgAV8oUn5IuFjAE0xfgIbPxLRgiZrUVGCJnjl4xDJBOikAkayYTxZC5WZK66ZJIPdNJBZBJ0aClT8KceKklsOs8KZB56yDy90XkMJfM8TaZggE4JB5mimlUBLaTA0UGn8IxMKSCd4kzYqztqy8IeTsceUwedknIyRf502i7oNMKQaU2i0ywGcMXS1oio2OA1NrlSaXGl03RMpg18Racxn86ohItnXHw7qQwZvEVlnMgFZ8mAF/R4d4hkdiWBj3z/eEs2y1IqA4ef2fX0sVS1gWOpLqynSdnV5hj5M7Yzug7qy9B5Z//Jxw3TM8RzDJPJ4fGG0kALf0VabHufUdxtYcQIqmmkWSHloRsBepCyyD5QA8MwDMMwDMMwDMMwDChpnjlOLa9s3W33o3acLP+QTMpl/bHvDr+WRK4fXxTpXuor0lPtT6uzsfz6ZNb3abLyPPfJKjqXmRH/rpCG3vJKzUrzP/fYWamu3LQqMz3vDGmwV12wFe0D7A+T1FAtC26N9ziaBGcgFR3nAEXLCbDk9z/7E7CKUX9SpQTQf7r6RhyUcOEAU+G4LpBaKe/YFMofsJsSrIZ8kKhU6vZTT4+MK54yY0mlPhVXpBIpidT4NX6I5GLP0sT6ZbRE8TJbKcyQ0RItaIXL0AY8jMKaWfmRYsQi09jPsHq7NmdX/RJNrlSb9++GCEz7A8U14qyjycTjw5YMP6qawmak0du6Hfl75BhLyU21jnus9+k9Iw+rv0Rvpm8luFenJRyGwq8j1kVWBbvXBzFwm7pyXjTPLG2e0EBvv0aKOEtSGT1///pR5vHLH0NR0SilhafuLMTxi8q58ygq2yI14N0ClvXneMF+Dt3h1cDm1jE4t5mJBmE4EzhugzhBEhQrWelegiIqKkIECzENFmIaLMQ0WIhpsBDTYCGm8Q+4VGSmKEbYJgAAAABJRU5ErkJggg=="; } else echo $user['avatar'] ?>" style="width: 300px; height: 250px; cursor: pointer" class="avatar img-circle img-thumbnail" alt="avatar" onclick="avatar()">
                <input type="file" id="change" class="text-center center-block file-upload" style="display: none">
            </div></hr><br>

            <div class="panel panel-default">
                <div class="panel-heading">Status <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body">
                    <?php
                    echo $user['status'];
                    ?>
                </div>
                <div class="panel-heading">Khoa <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body">Toán - Cơ - Tin</div>
                <div class="panel-heading">Ngành <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body">Máy tính và Khoa học thông tin</div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">
                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                            <a href="#" class="btn btn-social btn-block btn-google">
                                <i class="fa fa-google"></i> </a>
                        </div>
                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                            <a href="#" class="btn btn-social btn-block btn-facebook">
                                <i class="fa fa-facebook"></i> </a>
                        </div>
                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                            <a href="#" class="btn btn-social btn-block btn-twitter">
                                <i class="fa fa-twitter"></i> </a>
                        </div>
                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                            <a href="#" class="btn btn-social btn-block btn-linkedin">
                                <i class="fa fa-linkedin"></i> </a>
                        </div>
                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                            <a href="#" class="btn btn-social btn-block btn-github">
                                <i class="fa fa-github"></i> </a>
                        </div>
                        <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                            <a href="#" class="btn btn-social btn-block btn-stackoverflow">
                                <i class="fa fa-stack-overflow"></i> </a>
                        </div>
                </div>
            </div>
        </div><!--/col-3-->
        <div class="col-sm-9">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="name"><h4>Fullname</h4></label>
                                <input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo $user['fullname'] ?>" title="enter your fullname.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="date"><h4>Date Of Birth</h4></label>
                                <input type="text" class="form-control" name="date" id="date" value="<?php echo $user['dateOfBirth'] ?>" title="enter your date of birth.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="gender"><h4>Gender</h4></label>
                                <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $gender ?>" title="enter your gender.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone"><h4>Phone</h4></label>
                                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user['phone'] ?>" title="enter your phone number if any.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email'] ?>" title="enter your email.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="job"><h4>Job</h4></label>
                                <input type="text" class="form-control" name="job" id="job" value="<?php echo $job ?>" title="enter a job">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="password"><h4>Password</h4></label>
                                <input type="password" class="form-control" name="password" id="password" value="<?php echo $user['password'] ?>" title="enter your password.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="password2"><h4>Verify</h4></label>
                                <input type="password" class="form-control" name="password2" id="password2" value="<?php echo $user['password'] ?>" title="enter your password2.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="status"><h4>Status</h4></label>
                                <input type="text" class="form-control" name="status" id="status" value="<?php echo $user['status'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" name="btn-submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                                <button class="btn btn-lg" type="submit" name="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                        </div>
                    <hr>
                </div><!--/tab-pane-->
            </div>
        </div>
    </div>
</div>
</form>

<script>
    function avatar()
    {
        document.getElementById("demo").innerHTML;

    }
</script>

