$(function () {
    setValidateField();
    checkUser();
    $('#calendar').eCalendar();
    renderCounselor();
    $('#btn_timetable').click(function () {
        window.location.href = 'timeTable';
    });
    $('#btn_booking').click(function () {
        var counselor_id = getUrlParameter('id');
        if (counselor_id === undefined) {
            counselor_id = localStorage['counselor'];
        }
        window.location.href = "selectDateTable?id=" + counselor_id;
    });
    $('#btn_check_app').click(function () {
        $('#checkAppModal').modal();
        listAppointment();
    });
    $('body').css({"min-width": "1200px", "overflow-x": "scroll"});
});

function checkUser() {
    var employee_id = $('#employee_id').val();
    var counselor_id = $('#counselor_id').val();
    if (employee_id !== "") {
        $('#btn_booking').show();
    } else if (counselor_id !== "") {
        $('#btn_timetable').show();
        $('#btn_check_app').show();
    }
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

function getCounselorDetail() {
    var yetVisited = getUrlParameter('id');
    if (yetVisited !== undefined) {
        localStorage['counselor'] = getUrlParameter('id');
    }

    var counselor = '';
    var counselor_id = $('#counselor_id').val();
    if (counselor_id == "") {
        counselor_id = getUrlParameter('id');
        if (counselor_id === undefined) {
            counselor_id = localStorage['counselor'];
        }
    }

    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'getCounselorDetail',
        async: false,
        data: {
            '_token': token,
            'counselor_id': counselor_id
        },
        success: function (data) {
            if (data != null) {
                counselor = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return counselor;
}

function renderCounselor() {
    var counselorDetail = getCounselorDetail();
    var obj = counselorDetail[0];
    if (obj != '') {
        $('#rf_img').attr("src", "images/profile/" + obj.images_name);
        $('#counselor_name').html(obj.first_name_th + " " + obj.last_name_th);
        $('#rf_id').append(obj.rf_id);
        $('#about_me').html(obj.about_me);
        $('#training').html(obj.training);
        $('#education').html(obj.education);
        $('#topic').html(obj.topic);
        $('#rf_about').html(obj.rf_about);

//        var time_weekday_start = obj.time_weekday_start.split(':');
//        time_weekday_start = time_weekday_start[0] + ":" + time_weekday_start[1];
//
//        var time_weekday_end = obj.time_weekday_end.split(':');
//        time_weekday_end = time_weekday_end[0] + ":" + time_weekday_end[1];
//
//
//        var time_weekend_start = obj.time_weekend_start.split(':');
//        time_weekend_start = time_weekend_start[0] + ":" + time_weekend_start[1];
//
//        var time_weekend_end = obj.time_weekend_end.split(':');
//        time_weekend_end = time_weekend_end[0] + ":" + time_weekend_end[1];
//
//        var time_sun_start = obj.time_sun_start.split(':');
//        time_sun_start = time_sun_start[0] + ":" + time_sun_start[1];
//
//        var time_sun_end = obj.time_sun_end.split(':');
//        time_sun_end = time_sun_end[0] + ":" + time_sun_end[1];
//
//        $('#time_weekday').html(time_weekday_start + " - " + time_weekday_end + " น.");
//        $('#time_sat').html(time_weekend_start + " - " + time_weekend_end + " น.");
//        $('#time_sun').html(time_sun_start + " - " + time_sun_end + " น.");
    }
}

function getClientAppointment() {
    var appointment = [];
    var counselor_id = $('#counselor_id').val();
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'getClientAppointment',
        async: false,
        data: {
            '_token': token,
            'counselor_id': counselor_id
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

//function listAppointment() {
//    var obj = getClientAppointment();
//    if (obj.length > 0) {
//        //$("#myTable tbody tr:not(:first-child)").remove();
//        $("#appointmentBody").empty();
//        $.each(obj, function (key, val) {
//            var result = "";
//            if (val["result"] === 'W') {
//                result = "รอการยืนยัน";
//            } else if (val["result"] === 'S') {
//                result = "ยืนยันแล้ว";
//            } else if (val["result"] === 'P') {
//                result = "ปรึกษาแล้ว";
//            }
//            var s_t = val["start_time"].split(":");
//            var start_time = s_t[0] + ":" + s_t[1];
//            var e_t = val["end_time"].split(":");
//            var end_time = e_t[0] + ":" + e_t[1];
//
//            var tr = "<tr>";
//            tr = tr + "<td>" + val["username"] + "</td>";
//            tr = tr + "<td>" + val["appointment_date"] + "</td>";
//            tr = tr + "<td>" + start_time + " - " + end_time + " น.</td>";
//            tr = tr + "<td><a style='color:blue;' href='tel:" + val["ep"] + "'>" + val["ep"] + "</a></td>";
//
//
//            if (val["result"] === 'W') {
//                tr = tr + "<td><button onclick='btn_profile(" + val["employee_id"] + ")' class='btn btn-info btn-sm'>ดูผลการประเมิน</button></td>";
//                tr = tr + "<td><span class='label label-warning'>" + result + "</span></td>";
//                tr = tr + "&nbsp;&nbsp;";
//                tr = tr + "<td>";
//                tr = tr + "<button onclick='btn_accept(" + val["appointment_id"] + ")' class='btn btn-success btn-sm'>ยืนยัน</button>";
//                tr = tr + "&nbsp;&nbsp;";
//                tr = tr + "<button onclick='btn_change_time(" + val["appointment_id"] + ")' class='btn btn-warning btn-sm'>เปลี่ยน time/date</button></td>";
//            } else if (val["result"] === 'S') {
//                tr = tr + "<td><button onclick='btn_profile(" + val["employee_id"] + ")' class='btn btn-info btn-sm'>ดูผลการประเมิน</button></td>";
//                tr = tr + "<td><span class='label label-success'>" + result + "</span></td>";
//                tr = tr + "&nbsp;&nbsp;";
//                tr = tr + "<td>";
//                tr = tr + "<button onclick='btn_result_meeting(" + val["employee_id"] + "," + val["appointment_id"] + ")' class='btn btn-success btn-sm'>ลงบันทึกข้อมูล</button>";
//                tr = tr + "&nbsp;&nbsp;";
//                tr = tr + "<button onclick='btn_nocontact(" + val["appointment_id"] + ")' class='btn btn-warning btn-sm'>ติดต่อไม่ได้</button>";
//                tr = tr + "&nbsp;&nbsp;";
//                tr = tr + "<button onclick='btn_change_time(" + val["appointment_id"] + ")' class='btn btn-warning btn-sm'>เปลี่ยน time/date</button></td>";
//            } else if (val["result"] === 'P') {
//                tr = tr + "<td><button disabled onclick='btn_profile(" + val["employee_id"] + ")' class='btn btn-info btn-sm'>ดูผลการประเมิน</button></td>";
//                tr = tr + "<td><span class='label label-default'>" + result + "</span></td>";
//                tr = tr + "&nbsp;&nbsp;";
//                tr = tr + "<td align='center'>-</td>";
//            }
//            tr = tr + "</tr>";
//            $('#appointmentList > tbody:last').append(tr);
//        });
//    } else {
//        $("#appointmentBody").empty();
//        var tr = "<tr>";
//        tr = tr + "<td align='center' colspan='7'> ไม่มีข้อมูลการจอง  </td>";
//        tr = tr + "</tr>";
//        $('#appointmentList > tbody:last').append(tr);
//    }
//}

function listAppointment() {
    var obj = getClientAppointment();
    if (obj.length > 0) {
        //$("#myTable tbody tr:not(:first-child)").remove();
        $("#appointmentBody").empty();
        $.each(obj, function (key, val) {
            var result = "";
            if (val["result"] === 'W') {
                result = "รอการยืนยัน";
            } else if (val["result"] === 'S') {
                result = "ยืนยันแล้ว";
            } else if (val["result"] === 'P') {
                result = "ปรึกษาแล้ว";
            } else if (val["result"] === 'D') {
                result = "ติดต่อไม่ได้";
            }

            var status = "D"; // default ติดต่อไม่ได้

            var s_t = val["start_time"].split(":");
            var start_time = s_t[0] + ":" + s_t[1];
            var e_t = val["end_time"].split(":");
            var end_time = e_t[0] + ":" + e_t[1];
            var ad = val["appointment_date"].split("-");
            var appointment_date = ad[2] + "-" + setCTMonthString(ad[1]) + "-" + ad[0];

            var tr = "<tr>";
            tr = tr + "<td>" + val["username"] + "</td>";
            tr = tr + "<td>" + appointment_date + "</td>";
            tr = tr + "<td>" + start_time + " - " + end_time + " น.</td>";
            tr = tr + "<td><a style='color:blue;' href='tel:" + val["ep"] + "'>" + val["ep"] + "</a></td>";

            if (val["result"] === 'W') {
                tr = tr + "<td><button onclick='btn_profile(" + val["employee_id"] + ")' class='btn btn-info btn-sm btn-round'>ดูผลการประเมิน</button></td>";
                tr = tr + "<td><span class='label label-warning'>" + result + "</span></td>";
                tr = tr + "&nbsp;&nbsp;";
                tr = tr + "<td>";
                tr = tr + '<button onclick="btn_accept(\'' + val["appointment_date"] + '\',\'' + val["appointment_id"] + '\',\'' + val["employee_id"] + '\',\'' + start_time + '\',\'' + end_time + '\')" class="btn btn-success btn-sm btn-round">ยืนยัน</button>';
                tr = tr + "&nbsp;&nbsp;";
                tr = tr + '<button onclick="btn_change_time(\'' + val["appointment_date"] + '\',\'' + val["appointment_id"] + '\',\'' + start_time + '\',\'' + end_time + '\',\'' + val["employee_id"] + '\')" class="btn btn-warning btn-sm btn-round">เปลี่ยน time/date</button></td>';

            } else if (val["result"] === 'S') {
                tr = tr + "<td><button onclick='btn_profile(" + val["employee_id"] + ")' class='btn btn-info btn-sm btn-round'>ดูผลการประเมิน</button></td>";
                tr = tr + "<td><span class='label label-success'>" + result + "</span></td>";
                tr = tr + "&nbsp;&nbsp;";
                tr = tr + "<td>";
                tr = tr + '<button onclick="btn_result_meeting(\'' + val["employee_id"] + '\',\'' + val["appointment_id"] + '\')" class="btn btn-success btn-sm btn-round">ลงบันทึกการปรึกษา</button>';
                tr = tr + "&nbsp;&nbsp;";
                tr = tr + '<button onclick="btn_cancel(\'' + val["appointment_date"] + '\',\'' + val["appointment_id"] + '\',\'' + val["employee_id"] + '\',\'' + start_time + '\',\'' + end_time + '\')" class="btn btn-warning btn-sm btn-round">ติดต่อไม่ได้</button>';
                tr = tr + "&nbsp;&nbsp;";
                tr = tr + '<button onclick="btn_change_time(\'' + val["appointment_date"] + '\',\'' + val["appointment_id"] + '\',\'' + start_time + '\',\'' + end_time + '\',\'' + val["employee_id"] + '\')" class="btn btn-warning btn-sm btn-round">เปลี่ยน time/date</button></td>';
            } else if (val["result"] === 'P') {
                tr = tr + "<td><button disabled onclick='btn_profile(" + val["employee_id"] + ")' class='btn btn-info btn-sm btn-round'>ดูผลการประเมิน</button></td>";
                tr = tr + "<td><span class='label label-default'>" + result + "</span></td>";
                tr = tr + "&nbsp;&nbsp;";
                tr = tr + "<td>";
                tr = tr + '<button onclick="btn_view_result(\'' + val["employee_id"] + '\',\'' + val["appointment_id"] + '\')" class="btn btn-success btn-sm btn-round">ดูบันทึกการปรึกษา</button></td>';
            } else if (val["result"] === 'N') {
                tr = tr + "<td><button disabled onclick='btn_profile(" + val["employee_id"] + ")' class='btn btn-info btn-sm btn-round'>ดูผลการประเมิน</button></td>";
                tr = tr + "<td><span class='label label-default'>" + result + "</span></td>";
                tr = tr + "&nbsp;&nbsp;";
                tr = tr + "<td>";
                tr = tr + '<button onclick="btn_view_result(\'' + val["employee_id"] + '\',\'' + val["appointment_id"] + '\')" class="btn btn-success btn-sm btn-round">ดูบันทึกการปรึกษา</button></td>';
            } else if (val["result"] === 'D') {
                tr = tr + "<td><button disabled onclick='btn_profile(" + val["employee_id"] + ")' class='btn btn-info btn-sm btn-round'>ดูผลการประเมิน</button></td>";
                tr = tr + "<td><span class='label label-default'>" + result + "</span></td>";
                tr = tr + "&nbsp;&nbsp;";
                tr = tr + "<td> - </td>";
            }
            tr = tr + "</tr>";
            $('#appointmentList > tbody:last').append(tr);
        });
    } else {
        $("#appointmentBody").empty();
        var tr = "<tr>";
        tr = tr + "<td align='center' colspan='7'> ไม่มีข้อมูลการจอง  </td>";
        tr = tr + "</tr>";
        $('#appointmentList > tbody:last').append(tr);
    }
}

function setValidateField() {
    $('#time_only .time').timepicker({
        'showDuration': true,
        'timeFormat': 'H:i',
        'step': 60
    });
    var timeOnlyExampleEl = document.getElementById('time_only');
    var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);
    $("#next_appointment_date").datepicker({"dateFormat": "dd-mm-yy"});
}

function btn_change_time(appointment_date, appointment_id, starTime, endTime, employee_ids) {
    var a_d = appointment_date.split('-');
    var app_date = a_d[2] + "-" + a_d[1] + "-" + a_d[0];

    $("#next_appointment_date").datepicker({"dateFormat": "dd-mm-yy"}).val(app_date);
    $("#next_appointment_start").val(starTime);
    $("#next_appointment_end").val("");
    $("#appointment_ids").val(appointment_id);
    $("#employee_ids").val(employee_ids);
    $("#myModal").modal();
}

function btn_cancel(appointment_date, appointment_id, employee_id, start_time, end_time) {
    $("#cancelModal").modal();
    $("#btn_cancel_ok").click(function () {
        updateStatusAppointment(appointment_id, 'D', 'Y'); // submit
        sendEmailCancel(appointment_date, employee_id, start_time, end_time);
    });
}

function btn_accept(appointment_date, appointment_id, employee_id, start_time, end_time) {
    updateStatusAppointment(appointment_id, 'S', 'Y'); // submit
    saveEmailQueue(employee_id);
    //sendEmail(appointment_date, employee_id, start_time, end_time);
}

function btn_view_result(employee_id, appointment_id) {
    window.location.href = "/meetingRecord?id=" + employee_id + "&app_id=" + appointment_id + "&status=recorded";
}

function btn_result_meeting(employee_id, appointment_id) {
    window.location.href = "/meetingRecord?id=" + employee_id + "&app_id=" + appointment_id + "&status=new";
}

function btn_profile(employee_id) {
    window.location.href = "/assessmentResultForCounselor?id=" + employee_id;
}

function saveAppoint()
{
    var n_date = $("#next_appointment_date").datepicker({"dateFormat": "yy-mm-dd"}).val();
    var n_date_arr = n_date.split("-");
    var next_appointment_date = n_date_arr[2] + "-" + n_date_arr[1] + "-" + n_date_arr[0];
    var next_appointment_start = $("#next_appointment_start").val();
    var next_appointment_end = $("#next_appointment_end").val();
    if (next_appointment_end == "") {
        var ns = next_appointment_start.split(":");
        var ne = parseInt(ns[0]);
        if (ne < 9) {
            ne = ne + 1;
            ne = "0" + ne;
        } else if (ne == "23") {
            ne = "00";
        } else {
            ne = ne + 1;
        }

        next_appointment_end = ne + ":" + ns[1];
    }
    var employee_ids = $("#employee_ids").val();
    var appointment_ids = $("#appointment_ids").val();
    var token = $('#token').val();
    var counselor_id = $('#counselor_id').val();

    $.ajax({
        type: 'post',
        url: 'updateAppointment',
        async: false,
        data: {
            '_token': token,
            'next_appointment_date': next_appointment_date,
            'next_appointment_start': next_appointment_start,
            'next_appointment_end': next_appointment_end,
            'employee_ids': employee_ids,
            'appointment_ids': appointment_ids,
            'counselor_id': counselor_id
        },
        success: function (data) {

            if (data == 'success') {
                alert('บันทึกเรียบร้อย')
                listAppointment();
            } else if (data == 'fail') {
                alert('เวลานี้ไม่ว่างค่ะ');
//                $("#next_appointment_start").val("00:00");
//                $("#next_appointment_end").val("00:01");
            } else {
                alert('บันทึกไม่ได้');
//                $("#next_appointment_start").val("");
//                $("#next_appointment_end").val("");
            }
        },
        error: function (data) {
            alert('error');
        }
    });

}

function updateStatusAppointment(appointment_id, status, mail_status) {
    var counselor_id = $('#counselor_id').val();
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'updateStatusAppointment',
        async: false,
        data: {
            '_token': token,
            'counselor_id': counselor_id,
            'status': status,
            'mail_status': mail_status,
            'appointment_id': appointment_id
        },
        success: function (data) {
            if (data != '') {
                listAppointment();
                alert('บันทึกเรียบร้อย')
            } else {
                alert('บันทึกไม่ได้');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function saveEmailQueue(employee_id)
{
    var type = "A"; // after 2 day
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'saveEmailQueue',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id,
            'type': type
        },
        success: function (data) {
            if (data == 'success') {
                //
            } else {
                alert('บันทึก Queue ไม่ได้');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

sendEmailCancel = function (appointment_date, employee_id, start_time, end_time) {
    var counselor_id = $('#counselor_id').val();
    var token = $('#token').val();
    var ad = appointment_date.split('-');
    var a_date = ad[2] + "-" + ad[1] + "-" + ad[0];

    $.ajax({
        type: 'post',
        url: 'mailMeetingCancel',
        async: true,
        data: {
            '_token': token,
            'counselor_id': counselor_id,
            'employee_id': employee_id,
            'appointment_date': a_date,
            'start_time': start_time,
            'end_time': end_time
        },
        success: function (data) {
            var test = data;
        },
        error: function (data) {
            alert('error');
        }
    });
}