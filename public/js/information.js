$(function () {
    createAppointmentDetail();
});

function getAppointmentDetail() {
    var appointment = [];
    var token = $('#token').val();
    var employee_id = $('#employee_id').val();
    $.ajax({
        type: 'post',
        url: 'getAppointment',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id
        },
        success: function (data) {
            if (data != null) {
                appointment = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return appointment;
}

function createAppointmentDetail() {
    var data = getAppointmentDetail();
    if (data != []) {
        var result = "";
        if (data[0].result === 'W') {
            result = "รอการยืนยัน";
        } else if (data[0].result === 'S') {
            result = "ยืนยันแล้ว";
        }
        var s_t = data[0].start_time.split(":");
        var start_time = s_t[0] + ":" + s_t[1];
        var e_t = data[0].end_time.split(":");
        var end_time = e_t[0] + ":" + e_t[1];

        var s_date = data[0].appointment_date.split("-");
        s_date[1] = setMonthString(s_date[1]);
        s_date[0] = setYearToBE(parseInt(s_date[0]));
        
        var date = s_date[2] + " " + s_date[1] + " " + s_date[0];

        $('#appointment_detail').append("<p style='font-weight: bold'>ผู้ให้การปรึกษา : " + data[0].first_name_th + " " + data[0].last_name_th + "</p>"
                + "<p style='font-weight: bold'>วันนัดหมาย : " + date + "</p>"
                + "<p style='font-weight: bold'>เวลานัดหมาย : " + start_time + " น. ถึง " + end_time + " น.</p>"
                + "<p style='font-weight: bold'>สถานะการจอง : " + result + "</p>");

        $('#rf_img').attr("src", "images/profile/" + data[0].images_name);
    }
}