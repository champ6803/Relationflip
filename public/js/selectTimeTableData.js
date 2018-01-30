jQuery(document).ready(function () {
    getDateAndTime();
});

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

function getDateAndTime() {
    var starttotime = ($('#start').val()).split('   ');
    var endtotime = ($('#end').val()).split('    ');
    var div = '';
    var count = 1;
    for (var i = 0; i < starttotime.length; i++) {
        var first
        var endt
        var start
        var startTime
        var end
        var endTime
        var startToEnd
        if (i == 0) {
            first = starttotime[i].split(' ')
            endt = endtotime[i].split('  ')
            if (first[1].length > 0) {
                start = (first[1]).split(':');
            } else {
                start = (first[0]).split(':');
            }
            startTime = start[0] + ':' + start[1] + ' น'
            if (endt[1].length > 0) {
                end = (endt[1]).split(':');
            } else {
                end = (endt[0]).split(':');
            }
            endTime = end[0] + ':' + end[1] + ' น'
            startToEnd = (startTime) + ' - ' + endTime
        } else {
            start = starttotime[i].split(':');
            startTime = start[0] + ':' + start[1] + ' น'
            end = (endtotime[i]).split(':');
            endTime = end[0] + ':' + end[1] + ' น'
            startToEnd = (startTime) + ' - ' + endTime
        }
        div = div + '<label style="margin: 0; padding:0;width:140px; height:60px; "  for="timebox" class="btn btn-default btn-lg"  onclick="openModal(\'' + starttotime[i] + '\',\'' + endtotime[i] + '\')"><input type="radio" class="timebox" name="timebox" value="0" /><span style="font-weight: bold; font-size: 1.4em;"> ' + startTime + '</span><hr style="margin: 0;weight: bold; padding:0;" ><span style="font-weight: bold; font-size: 1.0em;"> ' + startToEnd + '</span></label> &nbsp;&nbsp;&nbsp;'
        if ((count % 6 == 0)) {
            div = div + '<br><br>';
        }
        count++;
    }
    $('.topic_select').append(div);
}
function openModal(start, end) {
    $("#etime").val(end);
    $("#stime").val(start);
    $("#myModal").modal()
}
function saveappointment() {
    var date = ($('#date').val())
    var employee_id = $('#employee_id').val();
    var counselor_id = ($('#counselorid').val())
    var token = $('#token').val();
    var start = $('#stime').val();
    var end = $('#etime').val();
    $.ajax({
        type: 'post',
        url: 'saveAppointment',
        async: false,
        data: {
            '_counselor_id': counselor_id,
            'employee_id': employee_id,
            '_date': date,
            '_start': start,
            '_end': end,
            '_token': token
        },
        success: function (data) {
            if (data === 'success') {
                //alert('บันทึกข้อมูลเรียบร้อยแล้ว');
                //sendEmail();
                window.location.href = "/information";
            }
            else if(data === 'exist'){
                alert('เวลานี้ถูกจองไปแล้ว');
            }
            else {
                alert('บันทึกข้อมูลไม่สำเร็จ');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

sendEmail = function () {
    var m_user = $('#m_user').val();
    var employee_id = $('#employee_id').val();
    var counselor_id = getUrlParameter('_counselor_id');
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'mailCounselorConfirm',
        async: true,
        data: {
            '_token': token,
            'm_user': m_user,
            'employee_id': employee_id,
            'counselor_id': counselor_id
        },
        success: function (data) {
            var test = data;
        },
        error: function (data) {
            alert('error');
        }
    });
}