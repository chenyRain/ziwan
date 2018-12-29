$(function () {
    $.init();

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
                    if ($.trim(self.find('.like-num').text()) == '') {
                        var like_num = 1;
                    } else {
                        var like_num = parseInt(self.find('.like-num').text()) + 1;
                    }
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
        $(this).attr('disabled', 'disabled');
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
                    $('.comment-textarea').val('');
                    $('.comment-button').removeAttr('disabled');
                    $.toast(back.msg);
                } else {
                    $.toast(back.msg);
                    return false;
                }
            }
        });
    });

    // 下拉分页评论列表
    var loading = false;
    var page = 1; // 分页数
    $(document).on('infinite', '.infinite-scroll-bottom',function() {
        // 如果正在加载，则退出
        if (loading) return;
        // 设置flag
        loading = true;
        page++; // 分页数
        var m_id = $('.comment-button').attr('attr-id'); // 应用ID
        $('.infinite-scroll-preloader').append('<div class="preloader"></div>'); // 加载图标

        $.ajax({
            url: '/comment/index',
            dataType: 'json',
            data: {'page' : page, 'm_id' : m_id},
            success: function (back) {
                if (back.code == 1) {
                    if (back.result == '') {
                        // 加载完毕，则注销无限加载事件，以防不必要的加载
                        $.detachInfiniteScroll($('.infinite-scroll'));
                        // 删除加载提示符
                        $('.infinite-scroll-preloader').remove();
                        $('.page-bottom').html('-- 我是有底线的 --');
                        return;
                    }
                    var html = '';
                    $.each(back.result, function (i, n) {
                        html += '<li>\n' +
                            '            <div class="item-inner">\n' +
                            '                    <div class="item-title-row">\n' +
                            '                        <div class="item-title comment-username">'+ n.name +'</div>\n' +
                            '                        <div class="item-after time-color">' + n.ctime + '</div>\n' +
                            '                    </div>\n' +
                            '                    <div class="item-text comment-content">' + n.content + '</div>\n' +
                            '                </div>\n' +
                            '        </li>';
                    });
                    $('.comment-list').append(html);
                    loading = false;
                } else {
                    $.toast(back.msg);
                    return false;
                }
            }
        });
    });
});