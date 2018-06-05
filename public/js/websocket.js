$(function() {
    chat.init();

    $(".button-sned").click(function(){
        chat.sendMsg();
    });
});

var config = {
    server : 'ws://10.0.0.252:9501'
};

var chat = {
    data : {
        wsServer : null,
        info : {}
    },
    init : function() {
        this.data.wsServer = new WebSocket(config.server);
        this.open();
        this.close();
        this.messages();
        this.error();
    },
    open : function() {
        this.data.wsServer.onopen = function(evt) {
            // $.toast("连接成功");
        }
    },
    close : function() {
        this.data.wsServer.onclose = function(evt) {
            $.toast("连接失败");
        }
    },
    messages : function() {
        this.data.wsServer.onmessage = function (evt) {
            var data = jQuery.parseJSON(evt.data);
            switch (data.type) {
                case 'open':
                    chat.appendUser(data.name, data.uid);
                    chat.notice(data.message);
                    break;
                case 'close':
                    chat.removeUser(data.uid);
                    chat.notice(data.message);
                    break;
                case 'openSuccess':
                    // chat.data.info = data.user; // 聊天内容
                    chat.showAllUser(data.all); // 所有用户
                    break;
                case 'message':
                    chat.newMessage(data);
                    break;
            }
        };
    },
    error : function() {
        this.data.wsServer.onerror = function (evt, e) {
            console.log('Error occured: ' + evt.data);
        };
    },
    removeUser: function(uid) {
        $(".uid-"+uid).remove();
    },
    showAllUser: function(users) {
        for (i in users) {
            this.appendUser(users[i].name, users[i].id);
        }
    },
    sendMsg : function() {

        var content = $('#input-say').val();
        if (content.length > 30) {
            $.toast('发送内容不能超过30个字符~');
            return false;
        }
        $('#input-say').val('');
        this.data.wsServer.send(content);
    },
    newMessage : function(data) {
        var uid = $('.chat-content').attr('data-id');
        var chat_my = '';
        if (uid == data.uid) {
            chat_my = 'class="chat-my"';
        }
        var html = '<li "+chat_my+"><div class="user-name">+data.name+</div>'
            + '<div class="user-content">+data.message+</div></li>';
        $('.chart-list').append(html);
    },
    notice : function(msg) {
        $.toast(msg);
    },
    appendUser : function(name, uid) {
        var html = '<li class="uid-'+uid+'">'
            + '<div class="item-content">'
            + '<div class="item-inner">'
            + '<div class="item-title">+ name +</div>'
            + '</div></div></li>';
        $(".user-list").append(html);
    }
};