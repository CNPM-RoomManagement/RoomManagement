<div class="container" style="margin-top: 50px; width: 500px;">
    <form method="post">
        <div class="body">
            <div class="boder">
                <div class="register"  style="width: 500px;">
                    <div class="card" >
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="background-color: #5A5B5E; color: white">Thông tin phòng máy</li>
                                <li class="list-group-item" style="text-align: left">Mã phòng:<input type="text" name="name" value="<?php echo $user['name'] ?>" class="form-control" id="inputPassword3"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            <div class="col-sm-offset-2 col-sm-10">
                <a href="index.php?c=room&&a=update" class="btn btn-success"> Trang trước</a>
                <button type="submit" name="update" class="btn btn-success">Cập nhật </button>

            </div>
        </center>
    </form>
</div>
