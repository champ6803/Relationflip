jQuery(document).ready(function () {
    getDate();
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

function getDate() {
    var token = $('#token').val();
    var counselor_id = getUrlParameter('id');
    $.ajax({
        type: 'post',
        url: 'findDate',
        async: false,
        data: {
            '_counselor_id': counselor_id,
            '_token': token
        },
        success: function (data) {
            if (data.length > 0) {
                var div = '';
                var count = 1;
                for (var i = 0; i < (data).length; i++) {
                    var res = data[i].date.split("-");
                    var fullDAte = data[i].date;
                    // alert(fullDAte)
                    var m, y;
                    y = parseInt(res[0]) + 543
                    if (res[1] == '01') {
                        m = 'มกราคม.';
                    } else if (res[1] == '02') {
                        m = 'กุมภาพันธ์';
                    } else if (res[1] == '03') {
                        m = 'มีนาคม';
                    } else if (res[1] == '04') {
                        m = 'เมษายน';
                    } else if (res[1] == '05') {
                        m = 'พฤษภาคม';
                    } else if (res[1] == '06') {
                        m = 'มิถุนายน';
                    } else if (res[1] == '07') {
                        m = 'กรกฎาคม';
                    } else if (res[1] == '08') {
                        m = 'สิงหาคม';
                    } else if (res[1] == '09') {
                        m = 'กันยายน';
                    } else if (res[1] == '10') {
                        m = 'ตุลาคม';
                    } else if (res[1] == '11') {
                        m = 'พฤษจิกายน';
                    } else {
                        m = 'ธันวาคม';
                    }
                    var monthyear = (m) + ' : ' + y
                    div = div + '<label onClick="ChooseTime(\'' + fullDAte + '\',' + counselor_id + ')"  style="margin: 0; padding:0;width:140px; height:60px; "  for="timebox" class="btn btn-default btn-lg"><input type="radio" class="timebox" name="timebox" id="7_01_02" value="0" /><span style="font-weight: bold; font-size: 1.4em;"> ' + res[2] + '</span><hr style="margin: 0;weight: bold; padding:0;" ><span style="font-weight: bold; font-size: 1.0em;"> ' + monthyear + '</span></label> &nbsp;&nbsp;&nbsp;'
                    if ((count % 6 == 0)) {
                        div = div + '<br><br>';
                    }
                    count++;
                }
                $('.topic_select').append(div);

            } else {
                alert('ไม่พบเวลาของผู้ให้การปรึกษา');
                window.history.back();
            }
        },
        error: function (data) {
            alert('error');
        }
    });

}

function ChooseTime(dates, counsel) {
    var employee_id = $('#employee_id').val();
    window.location.href = "selectTimeTableDate?_date=" + dates + "&_counselor_id=" + counsel + "&_employee_id=" + employee_id;
    
    /*$.ajax({
        type: 'post',
        url: "{{ url('findTimeByDateAndCounsel') }}",
        async: false,
        data: {
            '_counselor_id': counsel,
            '_date': dates,
            '_token': token
        },
        success: function (data) {
            if (data != null) {
                //console.log(data)
                window.location.href = "{{ url('selectTimeTableDate') }}?j="+data
            }
            else {
                alert('ไม่มีข้อมูลการจอง');
            }
        },
        error: function (data) {
            alert('error');
        }
    });*/
}



