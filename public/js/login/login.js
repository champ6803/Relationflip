/**
 * Created by Champ on 13/6/2560.
 */
$(function () {
    if ($('#m_user').val() != "") {
        checkScoreToPage();
    }

    $('.enterLogin').keypress(function (e) {
        var key = e.which;
        if (key == 13)  // the enter key code
        {
            login();
        }
    });


    $('#login').click(function () {
        login();
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

    var status = getUrlParameter("status");

    $.ajax({
        type: 'post',
        url: 'checkLogin',
        data: {
            '_token': token,
            'username': username,
            'password': password
        },
        success: function (data) {
            if (data.msg == 'Employee') {
                alert('ยินดีต้อนรับคุณ ' + data.name);
                //$('#header_name').html(data.msg.first_name_th +' '+data.msg.last_name_th);
                if (status == 'post') {
                    window.location.href = 'verifyProfile?status=' + status;
                } else
                    window.location.href = 'verifyProfile';

            } else if (data.msg == 'Counselor') {
                alert('ยินดีต้อนรับคุณ ' + data.name);
                window.location.href = '/';
            } else {
                alert('คุณใส่รหัสผ่านไม่ถูกต้อง');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};