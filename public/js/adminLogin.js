/**
 * Created by Champ on 13/6/2560.
 */
$(function () {

    $('.enterLogin').keypress(function (e) {
        var key = e.which;
        if (key == 13)  // the enter key code
        {
            login();
        }
    });


    $('#login').click(function () {
        login() ;
    });

    $('#logout').click(function () {
        var token = $('#token').val();

        $.ajax({
            type: 'post',
            url: 'logout',
            data: {
                '_token': token
            },
            success: function (data) {
                alert('bye bye');
            },
            error: function (data) {
                alert('error');
            }
        });
    });


});

function login() {
    
    var token = $('#token').val();
    var username = $('#username').val();
    var password = $('#password').val();

    $.ajax({
        type: 'post',
        url: 'checkAdminLogin',
        data: {
            '_token': token,
            'username': username,
            'password': password
        },
        success: function (data) {
            if (data.msg == 'success') {
                window.location.href = "/adminConsole";
            }
            else {
                alert('คุณใส่รหัสผ่านไม่ถูกต้อง');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}