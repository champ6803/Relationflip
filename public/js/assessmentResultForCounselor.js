$(function () {
    $('#counseling_result').hide();
    $("#btn_next").hide();
    $("#btn_info").hide();
    var allpointPost = "";
    var averagePointPost = "";
    var funcPointPost = "";
    allpointPost = getAllPointPost();
    if (allpointPost.length > 0) {
        averagePointPost = overviewPoint(allpointPost);
        averagePointPost = parseFloat(averagePointPost.toFixed(2))
        funcPointPost = 5 - averagePointPost;
        funcPointPost = parseFloat(funcPointPost.toFixed(2));
    }

    var allPoint = getAllPoint();
    var clientDetails = getClientDetail();
    mapClientDetails(clientDetails[0]);

    var averagePoint = overviewPoint(allPoint);
    averagePoint = parseFloat(averagePoint.toFixed(2));

    var funcPoint = 5 - averagePoint;
    funcPoint = parseFloat(funcPoint.toFixed(2));

    if (averagePointPost != "") {
        donutChart(averagePointPost, funcPointPost);
        $("#after_progress").css("width", (averagePointPost * 100) / 5 + "%").html(averagePointPost);
        translationOverview(averagePointPost);
        setDate(allpointPost[0].create_date);
        calculateOrganPerson(allpointPost);
        translationPoint(allpointPost);
        generate_report();
        $('#button_action').hide();
    } else {
        donutChart(averagePoint, funcPoint);
        $("#title_bar").html('จะแสดงผลหลังรับการปรึกษา');
        translationOverview(averagePoint);
        setDate(allPoint[0].create_date);
        calculateOrganPerson(allPoint);
        translationPoint(allPoint);


    }

    $("#before_progress").css("width", (averagePoint * 100) / 5 + "%").html(averagePoint);

    renderTopic();

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

setDate = function (date) {
    var date_str = date.split(" ");
    var just_date = date_str[0];
    var just_date_str = just_date.split('-');

    var year = just_date_str[0];
    var mm = just_date_str[1];
    var day = just_date_str[2];

    if (mm == 1) {
        mm = "January"
    } else if (mm == 2) {
        mm = "February"
    } else if (mm == 3) {
        mm = "March";
    } else if (mm == 4) {
        mm = "April";
    } else if (mm == 5) {
        mm = "July";
    } else if (mm == 6) {
        mm = "June";
    } else if (mm == 7) {
        mm = "July";
    } else if (mm == 8) {
        mm = "Augest";
    } else if (mm == 9) {
        mm = "September";
    } else if (mm == 10) {
        mm = "October";
    } else if (mm == 11) {
        mm = "November";
    } else if (mm == 12) {
        mm = "December";
    }

    var today = day + '/' + mm + '/' + year;

    $("#today").html(today);
}

donutChart = function (averagePoint, funcPoint) {
    var colors = ['#8d62a0', '#ceb3d8', '#d5dddd'];
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'donutChart',
            type: 'pie',
            height: 250,
            width: 250,
            borderRadius: 0
        },
        credits: {
            enabled: false
        },
        legend: {
            align: 'right',
            layout: 'horizontal',
            verticalAlign: 'top',
            x: 40,
            y: 0
        },
        title: false,
        tooltip: false,
        plotOptions: {
            pie: {
                borderWidth: 6,
                startAngle: 90,
                innerSize: '60%',
                size: '100%',
                shadow: true,
                // {
                //     color: '#000000',
                //     offsetX: 0,
                //     offsetY: 2,
                //     opacity: 0.7,
                //     width: 3
                // },
                dataLabels: false,
                stickyTracking: false,
                states: {
                    hover: {
                        enabled: false
                    }
                },
                point: {
                    events: {
                        mouseOver: function () {
                            this.series.chart.innerText.attr({text: this.y});
                        },
                        mouseOut: function () {
                            this.series.chart.innerText.attr({text: averagePoint});
                        }
                    }
                }
            }
        },

        series: [{
                data: [
                    {y: averagePoint, color: colors[10]},
                    {y: funcPoint, color: colors[2]},
                    {y: 0, color: colors[0]},
                ]
                        // data: [
                        //     ['Firefox',   44.2],
                        //     ['IE7',       26.6],
                        //     ['IE6',       20],
                        //     ['Chrome',    3.1],
                        //     ['Other',    5.4]
                        // ]
            }]
    },
            function (chart) { // on complete

                var xpos = '50%';
                var ypos = '53%';
                var circleradius = 112;

                // Render the text
                chart.innerText = chart.renderer.text(averagePoint, 90, 125).css({
                    width: circleradius * 2,
                    color: '#4572A7',
                    fontSize: '30px',
                    textAlign: 'center'
                }).attr({
                    // why doesn't zIndex get the text in front of the chart?
                    zIndex: 999
                }).add();
            });
};

translationOverview = function (averagePoint) {
    if (averagePoint <= 1.5) {
        $('#happiness_level').html('มีความสุขระดับต่ำ');
    } else if (averagePoint > 1.5 && averagePoint <= 2.5) {
        $('#happiness_level').html('มีความสุขระดับค่อนข้างต่ำ');
    } else if (averagePoint > 2.5 && averagePoint <= 3.5) {
        $('#happiness_level').html('มีความสุขระดับปานกลาง');
    } else if (averagePoint > 3.5 && averagePoint <= 4.5) {
        $('#happiness_level').html('มีความสุขระดับค่อนข้างสูง');
    } else if (averagePoint > 4.5 && averagePoint <= 5) {
        $('#happiness_level').html('มีความสุขระดับสูง');
    }
}

getAllPoint = function () {
    var point_data = [];
    var token = $('#token').val();
    var employee_id = getUrlParameter('id');
    $.ajax({
        type: 'post',
        url: 'getScoreAssessment',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id
        },
        success: function (data) {
            if (data != null) {
                point_data = data;
            } else {
                alert('select fail');
            }

        },
        error: function (data) {
            alert('error');
        }
    });
    return point_data;
}

getAllPointPost = function () {
    var point_data = [];
    var token = $('#token').val();
    var employee_id = getUrlParameter('id');
    $.ajax({
        type: 'post',
        url: 'getScorePostAssessment',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id
        },
        success: function (data) {
            if (data != null) {
                point_data = data;
            } else {
                alert('select fail');
            }

        },
        error: function (data) {
            alert('error');
        }
    });
    return point_data;
}

getClientDetail = function () {
    var client_data = [];
    var token = $('#token').val();
    var employee_id = getUrlParameter('id');
    $.ajax({
        type: 'post',
        url: 'getClientDetailsForCounselor',
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

getMasterTranslation = function () {
    var translation = [];
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'getMasterTranslation',
        async: false,
        data: {
            '_token': token
        },
        success: function (data) {
            if (data != "") {
                translation = data;
            } else {
                alert('select fail');
            }

        },
        error: function (data) {
            alert('error');
        }
    });
    return translation;
}

translationPoint = function (allPoint) {
    var data = getMasterTranslation();
    var workData = data[0].workData;
    var lifeData = data[0].lifeData;
    var sum_point = 0;
    for (var i = 0; i < 13; i++) {
        sum_point = sum_point + allPoint[i].point;
    }
    var averageWorkPoint = sum_point / 13;
    for (var i = 0; i < workData.length; i++) {
        if (averageWorkPoint >= workData[i].start_point && averageWorkPoint <= workData[i].end_point) {
            $("#workTranslation").html(workData[i].name);
        }
    }
    var sum_point2 = 0;
    for (var i = 13; i < 24; i++) {
        sum_point2 = sum_point2 + allPoint[i].point;
    }
    var averageLifePoint = sum_point2 / 11;
    for (var i = 0; i < workData.length; i++) {
        if (averageLifePoint >= lifeData[i].start_point && averageLifePoint <= lifeData[i].end_point) {
            $("#lifeTranslation").html(lifeData[i].name);
        }
    }
}

mapClientDetails = function (data) {
    $("#client_user").append(data.username);
    $("#client_age").append(data.age + " ปี");

    var status = "";
    if (data.status == 'S')
        status = 'โสด'
    else
        status = 'แต่งงาน'

    var sex = "";
    if (data.gender == 'M')
        sex = 'ชาย'
    else
        sex = 'หญิง'

    $("#client_sex").append(sex);


    $("#client_status").append(status);
    $("#client_target").append(data.target);
    var child = "";
    if (data.child == '0') {
        child = 'ไม่มี'
    } else
        child = data.child;

    $("#client_child").append(child);
    $("#client_department").append(data.department);
    $("#client_phone").append(data.phone);
    $("#client_emer_phone").append(data.emergency_contact);
}

overviewPoint = function (data) {
    var average = 0;
    if (data.length > 0) {
        var sumPoint = 0;
        for (var i = 0; i < data.length; i++) {
            sumPoint = sumPoint + data[i].point;
        }
        average = sumPoint / data.length;
    }
    return average;
};

calculateOrganPerson = function (data) {
    if (data.length > 0) {
        $("#progress_1").css("width", (((data[0].point + data[1].point) / 2) * 100) / 5 + "%").html((data[0].point + data[1].point) / 2);
        $("#progress_2").css("width", (((data[2].point + data[3].point) / 2) * 100) / 5 + "%").html((data[2].point + data[3].point) / 2);
        $("#progress_3").css("width", (((data[4].point + data[5].point) / 2) * 100) / 5 + "%").html((data[4].point + data[5].point) / 2);
        $("#progress_4").css("width", (((data[6].point + data[7].point) / 2) * 100) / 5 + "%").html((data[6].point + data[7].point) / 2);
        $("#progress_5").css("width", (((data[8].point + data[9].point) / 2) * 100) / 5 + "%").html((data[8].point + data[9].point) / 2);
        $("#progress_6").css("width", (((data[10].point + data[11].point) / 2) * 100) / 5 + "%").html((data[10].point + data[11].point) / 2);

        var sum_point = 0;
        for (var i = 0; i < 13; i++) {
            sum_point = sum_point + data[i].point;
        }
        $("#progress_sumwork").css("width", ((sum_point / 13) * 100) / 5 + "%").html((sum_point / 13).toFixed(2));

        $("#progress_7").css("width", (((data[13].point + data[14].point) / 2) * 100) / 5 + "%").html((data[13].point + data[14].point) / 2);
        $("#progress_8").css("width", (((data[15].point + data[16].point) / 2) * 100) / 5 + "%").html((data[15].point + data[16].point) / 2);
        $("#progress_9").css("width", (((data[17].point + data[18].point) / 2) * 100) / 5 + "%").html((data[17].point + data[18].point) / 2);
        $("#progress_10").css("width", (((data[19].point + data[20].point) / 2) * 100) / 5 + "%").html((data[19].point + data[20].point) / 2);
        $("#progress_11").css("width", (((data[21].point + data[22].point) / 2) * 100) / 5 + "%").html((data[21].point + data[22].point) / 2);

        var sum_point2 = 0;
        for (var i = 13; i < 24; i++) {
            sum_point2 = sum_point2 + data[i].point;
        }
        $("#progress_sumlife").css("width", ((sum_point2 / 11) * 100) / 5 + "%").html((sum_point2 / 11).toFixed(2));
    }
}

getTopic = function () {
    var topic = [];
    var token = $('#token').val();
    var employee_id = getUrlParameter('id');
    $.ajax({
        type: 'post',
        url: 'getTopicForCounselor',
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

function renderTopic() {
    var data = getTopic();
    if (data.length > 0) {
        $.each(data, function (key, val) {
            var dv = '<p>';
            dv = dv + "(" + (parseInt(key) + 1) + ") " + val['name'] + '</p>';
            $('#topic').append(dv);
        });
    }
}

getMeetingReport = function () {
    var report = [];
    var token = $('#token').val();
    var employee_id = getUrlParameter('id');
    $.ajax({
        type: 'post',
        url: 'getMeetingReport',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id
        },
        success: function (data) {
            if (data != null) {
                report = data;
            } else {
                alert('select fail');
            }

        },
        error: function (data) {
            alert('error');
        }
    });
    return report;
}

function generate_report() {
    var obj = getMeetingReport();

    if (obj.length > 0) {
        var divs = "";
        $.each(obj, function (key, val) {
            var p = "<label>ครั้งที่ " + val["round"] + "</label>";
            p = p + "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            p = p + val["summary_client"] + "</p>";
            divs = divs + p;
        });
        $('#counseling_report').html(divs);
        $('#counseling_result').show();
    }
}