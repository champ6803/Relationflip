$(function () {
    $('#btn_confirm_password').click(function () {
        var validate = false;
        $('.pass_validate input').each(function (i) {
            if ($(this).val() == "") {
                alert('คุณใส่ข้อมูลไม่ครบ');
                validate = true;
                return false;
            }
        });
        if (!validate) {
            var new_password = $('#new_password').val();
            var renew_password = $('#renew_password').val();

            if (new_password == renew_password) {
                updatePassword();
            } else {
                alert('รหัสผ่านใหม่ไม่ตรงกัน');
            }
        }
    });

    $('#btn_cancel_password').click(function () {
        window.history.back();
    });
});

updatePassword = function () {
    var username = $('#m_user').val();
    var password = $('#password').val();
    var new_password = $('#new_password').val();

    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'updatePassword',
        async: false,
        data: {
            '_token': token,
            'username': username,
            'password': password,
            'new_password': new_password
        },
        success: function (data) {
            if (data == 'E') {
                alert('บันทึกเรียบร้อย');
                window.location.href = "/verifyProfile";
            } else if (data == 'C') {
                alert('บันทึกเรียบร้อย');
                window.location.href = "/";
            } else {
                alert('รหัสผ่านเดิมไม่ถูกต้อง');
            }
        },
        error: function (data) {
            alert('update error');
        }
    });
};