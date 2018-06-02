$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.register').click(function () {
        $.showIndicator();
        var data = {
            'name': $('#name').val(),
            'password': $('#password').val(),
            'password_confirmation': $('#repassword').val()
        };
        if (data.name == '') {
            $.alert('用户名不能为空~');
            return false;
        }
        if (data.name.length > 20) {
            $.alert('用户名不能超过20个字符~');
            return false;
        }
        if (data.password == '') {
            $.alert('密码不能为空~');
            return false;
        }
        if (data.password_confirmation == '') {
            $.alert('确认密码不能为空~');
            return false;
        }
        if (data.password_confirmation !== data.password) {
            $.alert('2次密码不一致~');
            return false;
        }

        $.ajax({
            url: '/register-store',
            type: 'post',
            dataType: 'json',
            data: data,
            success: function (back) {
                $.hideIndicator();
                if (back.code == 200) {
                    $('.register').css("pointer-events", "none");
                    $.toast("注册成功,将前往登陆~");
                    setTimeout(function () {
                        window.location.href = '/login'
                    },2000);
                } else {
                    if (back.msg == '') {
                        $.toast("注册失败~");
                    } else {
                        $.toast(back.msg);
                    }
                    return false;
                }
            }
        });
    });


    $('.login').click(function () {
        $.showIndicator();
        var data = {
            'name': $('#name').val(),
            'password': $('#password').val()
        };
        if (data.name == '') {
            $.alert('用户名不能为空~');
            return false;
        }
        if (data.password == '') {
            $.alert('密码不能为空~');
            return false;
        }

        $.ajax({
            url: '/login-store',
            type: 'post',
            dataType: 'json',
            data: data,
            success: function (back) {
                $.hideIndicator();
                if (back.code == 200) {
                    $('.login').css("pointer-events", "none");
                    $.toast("登陆成功,将前往首页~");
                    setTimeout(function () {
                        window.location.href = '/';
                    },2000);
                } else {
                    $.toast(back.msg);
                    return false;
                }
            }
        });
    });
});