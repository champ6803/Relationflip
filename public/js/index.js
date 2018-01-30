$(function () {
//    var m_user = $('#m_user').val();
//    if (m_user != "") {
//        $('#testimonials').show();
//    } else {
//        $('#testimonials').hide();
//    }

    $('#link_1').hide();
    $('#link_2').hide();
    $('#link_3').hide();
    var role = $('#role').val();
    if (role == "E" || role == "") {
        $('#link_1').show();
        $('#link_2').show();
        $('#link_3').show();
    }

});
checkScoreToPage = function () {
    var scored = $('#scored').val();
    if (scored == 'noscore') {
        window.location.href = "relationflipIndexAssessment";
    } else if (scored == 'scored') {
        var status = getUrlParameter("status");
        if (status == "post") {
            window.location.href = "relationflipIndexAssessment?status=" + status;
        } else
            window.location.href = "assessmentResult";
    } else if (scored == '') {
        //window.location.href = "login";
    } else if (scored == 'noround') {
        alert('ยังไม่มีรอบการประเมินผลเปิดอยู่');
        window.location.href = "/";
    } else if (scored == 'noroundRF') {
        alert('หมดเวลาทำแบบทดสอบแล้วค่ะ');
        window.location.href = "/";
    }
}

function setMonthText() {

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

sendEmailTest = function () {
    var m_user = $('#m_user').val();
    var employee_id = $('#employee_id').val();
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'mailBeforeCounseling',
        async: false,
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

//sendEmail = function () {
//    var m_user = $('#m_user').val();
//    var employee_id = $('#employee_id').val();
//    var counselor_id = 1;
//    var token = $('#token').val();
//    $.ajax({
//        type: 'post',
//        url: 'mailCounselorConfirm',
//        async: true,
//        data: {
//            '_token': token,
//            'm_user': m_user,
//            'employee_id': employee_id,
//            'counselor_id': counselor_id
//        },
//        success: function (data) {
//            var test = data;
//        },
//        error: function (data) {
//            alert('error');
//        }
//    });
//}

function setMonthString(month) {
    var monthString = "";
    if (month === "01") {
        monthString = "มกราคม";
    }
    if (month === "02") {
        monthString = "กุมภาพันธ์";
    }
    if (month === "03") {
        monthString = "มีนาคม";
    }
    if (month === "04") {
        monthString = "เมษายน";
    }
    if (month === "05") {
        monthString = "พฤษภาคม";
    }
    if (month === "06") {
        monthString = "มิถุนายน";
    }
    if (month === "07") {
        monthString = "กรกฎาคม";
    }
    if (month === "08") {
        monthString = "สิงหาคม";
    }
    if (month === "09") {
        monthString = "กันยายน";
    }
    if (month === "10") {
        monthString = "ตุลาคม";
    }
    if (month === "11") {
        monthString = "พฤศจิกายน";
    }
    if (month === "12") {
        monthString = "ธันวาคม";
    }
    return monthString;
}

function setYearToBE(year) {
    var yearBE = year + 543;
    return yearBE;
}

function setCTMonthString(month) {
    var monthString = "";
    if (month === "01") {
        monthString = "ม.ค.";
    }
    if (month === "02") {
        monthString = "ก.พ.";
    }
    if (month === "03") {
        monthString = "มี.ค.";
    }
    if (month === "04") {
        monthString = "เม.ย.";
    }
    if (month === "05") {
        monthString = "พ.ค.";
    }
    if (month === "06") {
        monthString = "มิ.ย.";
    }
    if (month === "07") {
        monthString = "ก.ค.";
    }
    if (month === "08") {
        monthString = "ส.ค.";
    }
    if (month === "09") {
        monthString = "ก.ย.";
    }
    if (month === "10") {
        monthString = "ต.ค.";
    }
    if (month === "11") {
        monthString = "พ.ย.";
    }
    if (month === "12") {
        monthString = "ธ.ค.";
    }
    return monthString;
}