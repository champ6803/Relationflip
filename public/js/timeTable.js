jQuery(document).ready(function () {
    var xhttp;
    if (window.XMLHttpRequest)
    {
        xhttp = new XMLHttpRequest();
    } else
    { // code for IE6, IE5 
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    createCalendar();
    checkTimeTable();
    $('#btn_next').click(function () {
        var month = $('#monthi').val();
        var date = $('#di7').val();
        var day = 1;
        var year = $('#yeari').val();
        var daysInMonth = getDaysInMonth(parseInt(month), parseInt(year));
        if (parseInt(date) == daysInMonth.length) {
            month = parseInt(month) + 1;
            if (month > 11) {
                month = 0;
                year = parseInt(year) + 1;
                date = 0;
            }
        }

        setDate(parseInt(date) + 1, parseInt(day), parseInt(month), parseInt(year));
        checkTimeTable();
    });
    $('#btn_previous').click(function () {
        var month = $('#monthi').val();
        var date = $('#di1').val();
        var day = 7;
        var year = $('#yeari').val();
        if (parseInt(date) >= 25 || parseInt(date) == 1) {
            if (month == 0) {
                month = 12;
                year = parseInt(year) - 1;
            }

            var this_month = parseInt(month);
            var date7 = $('#di7').val();
            if (date7 == '1') {
                this_month = this_month - 1;
            }

            var daysInMonth = getDaysInMonth(parseInt(this_month), parseInt(year));
            if (parseInt(date) == 25 && daysInMonth.length == 31) {

            } else {
                month = parseInt(month) - 1;
                var daysInPreMonth = getDaysInMonth(parseInt(month), parseInt(year));
                if (parseInt(date) == 1)
                    date = daysInPreMonth.length + 1;
            }
        }
        setDate(parseInt(date) - 1, parseInt(day), parseInt(month), parseInt(year));
        checkTimeTable();
    });
    getButton();
    $('body').css({"min-width": "800px", "overflow-x": "scroll"});
});
function getTimeTable() {
    var timeTable = '';
    var counselor_id = $('#counselor_id').val();
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'getTimeTable',
        async: false,
        data: {
            '_token': token,
            'counselor_id': counselor_id
        },
        success: function (data) {
            if (data != null) {
                timeTable = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return timeTable;
}

function getDaysInMonth(month, year) {
    var date = new Date(year, month, 1);
    var days = [];
    while (date.getMonth() === month) {
        days.push(new Date(date));
        date.setDate(date.getDate() + 1);
    }
    return days;
}

function createCalendar() {
    var currentTime = new Date();
    var month = currentTime.getMonth();
    var date = currentTime.getDate();
    var day = currentTime.getDay();
    if (day === 0)
        day = 7;
    var year = currentTime.getFullYear();
    setDate(date, day, month, year);
}

function setDate(date, day, month, year) {
    var daysInPreMonth = getDaysInMonth(month - 1, year);
    var daysInMonth = getDaysInMonth(month, year);
    var daysInNextMonth = getDaysInMonth(month + 1, year);
    var p_date = date;
    for (var i = day; i >= 1; i--) {
        if (p_date < 1) {
            p_date = daysInPreMonth.length;
        }
        $('#d' + i).html(p_date);
        $('#di' + i).val(p_date);
        p_date--;
    }
    var n_date = date + 1;
    for (var i = day + 1; i <= 7; i++) {
        if (n_date > daysInMonth.length) {
            n_date = 1;
            month = month + 1;
        }
        $('#d' + i).html(n_date);
        $('#di' + i).val(n_date);
        n_date++;
    }

    var month_name = "";
    if (month + 1 === 1) {
        month_name = 'เดือน มกราคม';
    }
    if (month + 1 === 2) {
        month_name = 'เดือน กุมภาพันธ์';
    }
    if (month + 1 === 3) {
        month_name = 'เดือน มีนาคม';
    }
    if (month + 1 === 4) {
        month_name = 'เดือน เมษายน';
    }
    if (month + 1 === 5) {
        month_name = 'เดือน พฤษภาคม';
    }
    if (month + 1 === 6) {
        month_name = 'เดือน มิถุนายน';
    }
    if (month + 1 === 7) {
        month_name = 'เดือน กรกฎาคม';
    }
    if (month + 1 === 8) {
        month_name = 'เดือน สิงหาคม';
    }
    if (month + 1 === 9) {
        month_name = 'เดือน กันยายน';
    }
    if (month + 1 === 10) {
        month_name = 'เดือน ตุลาคม';
    }
    if (month + 1 === 11) {
        month_name = 'เดือน พฤศจิกายน';
    }
    if (month + 1 === 12) {
        month_name = 'เดือน ธันวาคม';
    }

    $('#month').html(month_name + " ปี " + year);
    $('#monthi').val(month);
    $('#yeari').val(year);
}

function checkTimeTable() {
    var year = $('#yeari').val();
    var month = $('#monthi').val();
    var day = [];
    for (var i = 1; i <= 7; i++) {
        if ($('#di' + i).val().length > 1) {
            day[i] = $('#di' + i).val();
        } else {
            day[i] = "0" + $('#di' + i).val();
        }
    }

    var obj = getTimeTable();
    var arrMonth = [];
    var arrYear = [];
    var arrDay = [];
    if (obj != '') {
        $.each(obj, function (key, val) {
            var date = val['date'].split("-");
            var yeare = date[0];
            var monthe = parseInt(date[1]);
            var daye = date[2];
            var lastDay = $('#di7').val();
            if (lastDay == "1" || lastDay == "2" || lastDay == "3" || lastDay == "4" || lastDay == "5" || lastDay == "6")
            {
                if (daye == "01" || daye == "02" || daye == "03" || daye == "04" || daye == "05" || daye == "06")
                {
                    month = parseInt($('#monthi').val()) + 1;
                } else {
                    month = parseInt($('#monthi').val());
                }

            } else {
                month = parseInt($('#monthi').val()) + 1;
            }
            var start_time = val['start_time'].split(":");
            var end_time = val['end_time'].split(":");
            var st = start_time[0];
            var et = end_time[0];
            if (year === yeare) {
                if (month === monthe) {
                    for (var i = 1; i <= 7; i++) {
                        if (day[i] === daye) {
                            $('#' + i + "_" + st + "_" + et).val("1");
                            arrYear.push(yeare);
                            arrMonth.push(monthe);
                            arrDay.push(daye);
                        }
                    }
                }
            }
        });
    }
    setButton(arrYear, arrMonth, arrDay);
}

function setButton(arrYear, arrMonth, arrDay) {
    var year = $('#yeari').val();
    var month = $('#monthi').val();

    var day = [];
    for (var i = 1; i <= 7; i++) {
        if ($('#di' + i).val().length > 1) {
            day[i] = $('#di' + i).val();
        } else {
            day[i] = "0" + $('#di' + i).val();
        }
    }
    //month = parseInt(month) + 1;

    $("input:checkbox").each(function () {
        if ($(this).val() === "1") {
            var check = true;
            for (var i = 0; i < arrYear.length; i++) {
                if (arrYear[i] === year) {
                    for (var i = 0; i < arrDay.length; i++) {
                        for (var j = 1; j <= 7; j++) {
                            if (arrDay[i] === day[j]) {
                                var lastDay = $('#di7').val();
                                if (lastDay == "1" || lastDay == "2" || lastDay == "3" || lastDay == "4" || lastDay == "5" || lastDay == "6")
                                {
                                    if (arrDay[i] == "01" || arrDay[i] == "02" || arrDay[i] == "03" || arrDay[i] == "04" || arrDay[i] == "05" || arrDay[i] == "06")
                                    {
                                        month = parseInt($('#monthi').val()) + 1;
                                    } else {
                                        month = parseInt($('#monthi').val());
                                    }

                                } else {
                                    month = parseInt($('#monthi').val()) + 1;
                                }

                                for (var i = 0; i < arrMonth.length; i++) {
                                    if (arrMonth[i] === month) {
                                        $(this).prop('checked', true);
                                        $(this).parents('label').addClass("active");
                                    } else {
                                        check = false
                                    }
                                }

                            } else {
                                check = false
                            }
                        }
                    }

                } else {
                    check = false
                }
            }
            if (!check) {
                $(this).val("0");
            }
        } else {
            $(this).prop('checked', false);
            $(this).parents('label').removeClass("active");
        }
    });

//    $("input:checkbox").each(function () {
//        if ($(this).val() === "1") {
//            $(this).prop('checked', true);
//            $(this).parents('label').addClass("active");
//        } else {
//            $(this).prop('checked', false);
//            $(this).parents('label').removeClass("active");
//        }
//    });
}

function getButton() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth();
    mm = parseInt(mm) + 1;
    var yy = today.getYear();
    $('input:checkbox').on('change', function (evt) {
        var found = false;
        var dates = $(this).attr('id');
        var date = dates.split('_');
        var day = $('#di' + date[0]).val();
        var year = $('#yeari').val();
        var month = $('#monthi').val();
        var lastDay = $('#di7').val();
        if (lastDay == "1" || lastDay == "2" || lastDay == "3" || lastDay == "4" || lastDay == "5" || lastDay == "6")
        {
            if (day == "1" || day == "2" || day == "3" || day == "4" || day == "5" || day == "6")
            {
                month = parseInt(month) + 1;
            } else {
                month = parseInt(month);
            }

        } else {
            month = parseInt(month) + 1;
        }

        if (yy <= parseInt(year)) {
            if (mm < month || yy < parseInt(year)) {
                var sql_date = year + "-" + month + "-" + day;
                var sql_start_time = date[1] + ":00:00";
                var sql_end_time = date[2] + ":00:00";
                var saved = saveTimeTable(sql_date, sql_start_time, sql_end_time);
                if (saved) {
//                if (this.checked)
//                    //$('#' + dates).val("1");
//                else
//                    //$('#' + dates).val("0");
                } else {
                    if (this.checked) {
                        $(this).prop('checked', true);
                        $(this).parents('label').addClass("active");
                    } else {
                        $(this).prop('checked', false);
                        $(this).parents('label').removeClass("active");
                    }
                }
            } else if (mm == month || yy < parseInt(year)) {
                if (dd <= parseInt(day)) {
                    var sql_date = year + "-" + month + "-" + day;
                    var sql_start_time = date[1] + ":00:00";
                    var sql_end_time = date[2] + ":00:00";
                    var saved = saveTimeTable(sql_date, sql_start_time, sql_end_time);
                    if (saved) {
//                if (this.checked)
//                    //$('#' + dates).val("1");
//                else
//                    //$('#' + dates).val("0");
                    } else {
                        if (this.checked) {
                            $(this).prop('checked', true);
                            $(this).parents('label').addClass("active");
                        } else {
                            $(this).prop('checked', false);
                            $(this).parents('label').removeClass("active");
                        }
                    }
                } else {
                    found = true;
                }
            } else {
                found = true;
            }
        } else {
            found = true;
        }
        if (found)
        {
            alert('ไม่สามารถกำหนดเวลาได้');
            if (this.checked) {
                $(this).prop('checked', true);
                $(this).parents('label').addClass("active");
            } else {
                $(this).prop('checked', false);
                $(this).parents('label').removeClass("active");
            }
        }

    });
}

function saveTimeTable(sql_date, sql_start_time, sql_end_time) {
    var sts = false;
    var counselor_id = $('#counselor_id').val();
    var token = $('#token').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: 'saveTimeTable',
        async: false,
        data: {
            '_token': token,
            'counselor_id': counselor_id,
            'date': sql_date,
            'start_time': sql_start_time,
            'end_time': sql_end_time
        },
        success: function (data) {
            //window.location.href = "counselor";
            if (data === 'moretime') {
                alert('กำหนดเวลาต้องเกิน 2 ชั่วโมงค่ะ');
            } else if (data === "0") {
                //alert('ลงบันทึกตารางเวลาสำเร็จเเล้วค่ะ');
                sts = true;
            } else if (data === "1") {
                sts = true;
            } else {
                alert('บันทึกไม่สำเร็จ กรุณาลองใหม่');
            }
        },
        error: function (data) {
            alert('บันทึกไม่สำเร็จ กรุณาลองใหม่');
        }
    });
    return sts;
}