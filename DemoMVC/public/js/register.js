function dangky() {
    //Check User
    var tb = "";
    var tk = document.getElementById('user').value;
    var str = tk.toLowerCase();
    if(tk=="")
        tb += "Tên đăng nhập không được bỏ trống!" + "<br>";
    if(tk != str)
        tb += "Tên đăng nhập chỉ gồm chữ thường!"+"<br>";

    //Check password
    var mk = document.getElementById('pass').value;
        if(mk=="")
                tb += "Mật khẩu không được bỏ trống!" + "<br>";
        if(mk.length < 6 || mk.length > 20)
            tb += "Độ dài password chỉ gồm 6-20 ký tự!" + "<br>";

    //Check repass
    var mk2 = document.getElementById('repass').value;
        if(mk2=="")
                tb += "Nhập lại mật khẩu" + "<br>";
        if(mk != mk2)
            tb += "Nhập lại mật khẩu sai!" + "<br>";

    document.getElementById('thongbao').innerHTML = tb;

    if(tb=="")
        alert("Đăng ký thành công");

}
