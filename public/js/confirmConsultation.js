$(function () {

    $("#nonaccept").click(function () {
        window.location.href = "/";
        firstAccept('N');
    });

    $("#accept").click(function () {
        var name = $("#signature").val();
        if (name != "") {
            firstAccept('Y');
        } else
            alert('กรุณาลงชื่อ');
    });

    mapEmployeeName();
});

function firstAccept(status) {
    var employee_id = $('#employee_id').val();
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'firstAccept',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id,
            'status': status
        },
        success: function (data) {
            if (status == 'Y')
                window.location.href = "topic";
            else if (status == 'N')
                window.location.href = "/";

            sendEmail();
        },
        error: function (data) {
            alert('update error');
        }
    });
}

getEmployeeName = function () {
    var employee = [];
    var token = $('#token').val();
    var employee_id = $('#employee_id').val();
    $.ajax({
        type: 'post',
        url: 'getEmployeeName',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id
        },
        success: function (data) {
            if (data != null) {
                employee = data;
            } else {
                alert('select fail');
            }

        },
        error: function (data) {
            alert('error');
        }
    });
    return employee;
}

function mapEmployeeName() {
    var obj = getEmployeeName();
    if (obj.length > 0) {
        $('#signature').val(obj[0].first_name_th);
    }
}

sendEmail = function () {
    var m_user = $('#m_user').val();
    var employee_id = $('#employee_id').val();
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'mailConsent',
        async: true,
        data: {
            '_token': token,
            'm_user': m_user,
            'employee_id': employee_id
        },
        success: function (data) {
            var test = data;
        },
        error: function (data) {
            alert('error');
        }
    });
}