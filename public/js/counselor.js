$(function () {
    matchingCounselor();
    $('#viewAll').click(function () {
        $('#viewAll').hide();
        $('#btn_back').show();
        var counselor = getCounselor('');
        renderCounselor(counselor);
    });
    $('#btn_back').click(function () {
        $('#viewAll').show();
        $('#btn_back').hide();
        var counselor = getCounselor(isPerson);
        renderCounselor(counselor);
    });

//    $('#btn_counselor_detail').click(function () {
//        var id = $('#btn_counselor_detail').val();
//        window.location.href = 'counselorDetail?id=' + id;
//    });
});

function btn_counselor_detail(id) {
    window.location.href = 'counselorDetail?id=' + id;
}

function btn_select_counselor(id){
    window.location.href = 'selectDateTable?id=' + id;
}

function getCounselor(filter) {
    var counselor = '';
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'getCounselor',
        async: false,
        data: {
            '_token': token,
            'filter': JSON.stringify(filter)
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

function getSelectedTopic() {
    var topic = '';
    var employee_id = $('#employee_id').val();
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'getSelectedTopic',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id
        },
        success: function (data) {
            if (data != null) {
                topic = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return topic;
}

function getPointTopicPerPerson() {
    var pointTopic = '';
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'getPointTopicPerPerson',
        async: false,
        data: {
            '_token': token
        },
        success: function (data) {
            if (data != null) {
                pointTopic = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return pointTopic;
}
var isPerson = [];
function matchingCounselor() {
    var selectedTopic = getSelectedTopic();
    var pointTopicPerPerson = getPointTopicPerPerson();

    var divisor = 10000;
    var sumPointPerTopic = [];

    for (var i = 0; i < selectedTopic.length; i++) {
        sumPointPerTopic.push(new Array());
        for (var j = 0; j < pointTopicPerPerson.length; j++) {
            if (selectedTopic[i].topic_id == j + 1) {
                var person = [];
                for (var k = 0; k < pointTopicPerPerson[j].length; k++) {
                    //alert(pointTopicPerPerson[j][k].point * divisor);
                    var point = pointTopicPerPerson[j][k].point * divisor;
                    person[k] = point;
                    sumPointPerTopic[i].push(person[k]);
                }
            }
        }
        divisor = divisor / 10;
    }

    var result = [];
    result = sumPointPerTopic.reduce(function (r, a) {
        a.forEach(function (b, i) {
            r[i] = (r[i] || 0) + b;
        });
        return r;
    }, []);


    for (var i = 0; i < 4; i++) { // หา 4 คน
        var max = indexOfMax(result);
        isPerson[i] = max + 1;
        result[max] = 0;
    }

    var filter = " where counselor_id IN(";

    for (var i = 0; i < isPerson.length; i++) {
        if (i != isPerson.length - 1) {
            filter = filter + isPerson[i] + ",";
        } else {
            filter = filter + isPerson[i] + ")";
        }
    }
    var counselor = getCounselor(isPerson);
    renderCounselor(counselor);
}

// function renderCounselor(counselor) {
//
//     var obj = counselor;
//     if (obj != '') {
//         var divs = "";
//         $("#team_render").empty();
//         $.each(obj, function (key, val) {
//             // var div = "<div class='item'>";
//             var div = "<div class='testimonial-post'>";
//             div = div + "<div class='thumb'><img src='images/photos/doctors/" + val['images_name'] + "' alt=''></div>";
//             div = div + "<h5 class='testimonial-name'>" + val['first_name_th'] + " " + val['last_name_th'] + "</h5>";
//             div = div + "<h5 class='sub-title'>" + val['rf_id'] + "</h5>";
//             div = div + "<p>" + val['about_me'] + "</p>";
//             div = div + "<div class='row'><div class='col-md-12'>";
//             div = div + "<button class='btn btn-success'>ดูประวัติ RFCounselor</button>";
//             div = div + "</div></div>";
//             div = div + "<div class='row ao_pt'><div class='col-md-12'>";
//             div = div + "<button class='btn btn-warning'>เลือกท่านนี้</button>";
//             div = div + "</div></div>";
//             div = div + "</div>";
//             divs = divs + div;
//         });
//         //$('#team_render').html(divs);
//
//
//     }
// }

function renderCounselor(counselor) {
    var obj = counselor;
    if (obj != '') {
        var divs = "";
        $("#team_render").empty();
        $.each(obj, function (key, val) {
            var div = "<div class='col-lg-3 col-md-4 col-sm-6'><div class='testimonial-post'>";
            div = div + "<div class='thumb'>";
            div = div + "<img width='140' height='140' src='images/profile/" + val['images_name'] + "' alt=''>";
            div = div + "</div>";
            div = div + "<div class='content'>";
            div = div + "<h5 class='testimonial-name'>" + val['first_name_th'] + " " + val['last_name_th'] + "</h5>";
            div = div + "<h5 class='sub-title'>RF Counselor : " + val['rf_id'] + " </h5>";
            div = div + "<p style='max-height: 80px; overflow-y: hidden'>" + val['about_me'] + "</p>";
            div = div + "<div class='row'><div class='col-md-12'>";
            div = div + "<button onclick='btn_counselor_detail(" + val['counselor_id'] + ")' value='" + val['counselor_id'] + "' class='btn btn-success btn-round'>ดูประวัติ RF Counselor</button>";
            div = div + "</div></div>";
            div = div + "<div class='row ao_pt'><div class='col-md-12'>";
            div = div + "<button onclick='btn_select_counselor(" + val['counselor_id'] + ")' value='" + val['counselor_id'] + "' class='btn btn-warning btn-round'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลือกท่านนี้&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>";
            div = div + "</div></div>";
            div = div + "</div></div></div>";
            divs = divs + div;
        });
        $('#team_render').html(divs);
    }
}

function removeA(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax = arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}

function indexOfMax(arr) {
    if (arr.length === 0) {
        return -1;
    }

    var max = arr[0];
    var maxIndex = 0;

    for (var i = 1; i < arr.length; i++) {
        if (arr[i] > max) {
            maxIndex = i;
            max = arr[i];
        }
    }

    return maxIndex;
}