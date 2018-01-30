$(function () {
    var clientData = getClientVerify();
    mappingData(clientData[0]);

    $("#btn_submit").click(function () {
        var validate = false;
        $('.validate input,select').each(function (i) {
            if ($(this).val() == "") {
                alert('คุณใส่ข้อมูลไม่ครบ');
                validate = true;
            }
        });
        if (!validate) {
            updateProfile();
        }
    });

    $("#btn_cancel").click(function () {
        window.history.back();
    });
});

updateProfile = function () {
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var age = $('#age').val();
    var status = $('#status').val();
    var username = $('#username').val();
    var position = $('#position').val();
    var company_name = $('#company_name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();

    var source = {
        'first_name': first_name,
        'last_name': last_name,
        'age': age,
        'status': status,
        'username': username,
        'unit': position,
        'company_name': company_name,
        'email': email,
        'phone': phone
    }
    var token = $('#token').val();
    var employee_id = $('#employee_id').val();
    var department_id = $('#department_id').val();
    $.ajax({
        type: 'post',
        url: 'updateProfile',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id,
            'department_id': department_id,
            'source': JSON.stringify(source)
        },
        success: function (data) {
            if (data != null) {
                alert('บันทึกเรียบร้อย');
                checkScoreToPage();
            } else {
                alert('update fail');
            }
        },
        error: function (data) {
            alert('update error');
        }
    });
}

populate = function (result) {
    var options = $("#options");
    $.each(result, function () {
        options.append($("<option />").val(this.ImageFolderID).text(this.Name));
    });
}

mappingData = function (data) {
    $('#first_name').val(data.first_name_th);
    $('#last_name').val(data.last_name_th);
    $('#age').val(cal_bd(data.birth_date));
    $('#status').val(data.status);
    $('#username').val(data.username);
    $('#password').val(data.password);
    $('#position').val(data.unit);
    $('#company_name').val(data.company_name);
    $('#email').val(data.email);
    $('#phone').val(data.phone);
}

function cal_bd(dob) {
    if (dob != null || dob != "") {
        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
        return age;
    }
    else
        return 0;
}

getClientVerify = function () {
    var client_data = [];
    var token = $('#token').val();
    var employee_id = $('#employee_id').val();
    $.ajax({
        type: 'post',
        url: 'getClientVerify',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id
        },
        success: function (data) {
            if (data != null) {
                client_data = data;
            } else {
                alert('select fail');
            }

        },
        error: function (data) {
            alert('error');
        }
    });
    return client_data;
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