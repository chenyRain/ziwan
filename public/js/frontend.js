$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 注册
    $('.register').click(function () {
        $.showIndicator();
        var data = {
            'name': $('#name').val(),
            'password': $('#password').val(),
            'password_confirmation': $('#repassword').val()
        };
        if (data.name == '') {
            $.alert('用户名不能为空~');
            $.hideIndicator();
            return false;
        }
        if (data.name.length > 20) {
            $.alert('用户名不能超过20个字符~');
            $.hideIndicator();
            return false;
        }
        if (data.password == '') {
            $.alert('密码不能为空~');
            $.hideIndicator();
            return false;
        }
        if (data.password_confirmation == '') {
            $.alert('确认密码不能为空~');
            $.hideIndicator();
            return false;
        }
        if (data.password_confirmation !== data.password) {
            $.alert('2次密码不一致~');
            $.hideIndicator();
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
                    },1000);
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

    // 登录
    $('.login').click(function () {
        $.showIndicator();
        var data = {
            'name': $('#name').val(),
            'password': $('#password').val()
        };
        if (data.name == '') {
            $.alert('用户名不能为空~');
            $.hideIndicator();
            return false;
        }
        if (data.password == '') {
            $.alert('密码不能为空~');
            $.hideIndicator();
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
                    },1000);
                } else {
                    $.toast(back.msg);
                    return false;
                }
            }
        });
    });

    // 点赞
    $('.like').click(function () {
        var self = $(this);
        $.ajax({
            url: '/main/like',
            type: 'post',
            dataType: 'json',
            data: {'m_id' : self.attr('attr-mid')},
            success: function (back) {
                if (back.code == 1) {
                    self.addClass('already-like');
                    var like_num = parseInt(self.find('.like-num').text()) + 1;
                    self.find('.like-num').text(like_num);
                } else {
                    $.toast(back.msg);
                    return false;
                }
            }
        });
    });

    // 评论
    $('.comment-button').click(function () {
        var content = $('.comment-textarea').val();
        var m_id = $(this).attr('attr-id');

        if (content == '') {
            $.alert('请输入评论内容！');
            $.hideIndicator();
            return false;
        }
        if (content.length > 140) {
            $.alert('评论内容不能超过140个字！');
            $.hideIndicator();
            return false;
        }

        $.ajax({
            url: '/comment/store',
            type: 'post',
            dataType: 'json',
            data: {'content' : content, 'm_id' : m_id},
            success: function (back) {
                if (back.code == 1) {
                    var html = '<li>\n' +
                        '            <div class="item-inner">\n' +
                    '                    <div class="item-title-row">\n' +
                    '                        <div class="item-title comment-username">'+ back.result.nickname +'</div>\n' +
                    '                        <div class="item-after time-color">' + back.result.ctime + '</div>\n' +
                    '                    </div>\n' +
                    '                    <div class="item-text comment-content">' + back.result.content + '</div>\n' +
                    '                </div>\n' +
                        '        </li>';

                    $('.comment-list').append(html);
                } else {
                    $.toast(back.msg);
                    return false;
                }
            }
        });
    });
});