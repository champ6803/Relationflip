$(document).ready(function () {
    var current = 1;
    var arrAnswers = [];
    var employee_id = $('#employee_id').val(); // employee in session

    var rfData = getRelationflipIndexAssessmet();
    initRelationflipIndexAssessmet(rfData);

    var openEnded = getOpenEnded();
    var arrOpenEnded = initOpenEnded(openEnded);

    widget = $(".step");
    answer1 = $(".answer1");
    answer2 = $(".answer2");
    answer3 = $(".answer3");
    answer4 = $(".answer4");
    answer5 = $(".answer5");
    btnback = $(".back");
    btnsubmit = $(".submit");
    btnmodalaccept = $("#modal_accept");
    btnmodalnonaccept = $("#modal_nonaccept");


    // Init buttons and UI
    //widget.not(':eq(0)').hide();
    hideButtons(current);
    var current_progress = current - 1;
    setProgress(current_progress);

    // Answer button click action
    answer1.click(function () {
        arrAnswers[current] = 1;
        if (current <= widget.length) {
            widget.show();
            widget.not(':eq(' + (current++) + ')').hide();
            setProgress(current - 1);
        }
        hideButtons(current);
        checkQuestionIndex(current);
    });
    answer2.click(function () {
        arrAnswers[current] = 2;
        if (current <= widget.length) {
            widget.show();
            widget.not(':eq(' + (current++) + ')').hide();
            setProgress(current - 1);
        }
        hideButtons(current);
        checkQuestionIndex(current);
    });
    answer3.click(function () {
        arrAnswers[current] = 3;
        if (current <= widget.length) {
            widget.show();
            widget.not(':eq(' + (current++) + ')').hide();
            setProgress(current - 1);
        }
        hideButtons(current);
        checkQuestionIndex(current);
    });
    answer4.click(function () {
        arrAnswers[current] = 4;
        if (current <= widget.length) {
            widget.show();
            widget.not(':eq(' + (current++) + ')').hide();
            setProgress(current - 1);
        }
        hideButtons(current);
        checkQuestionIndex(current);
    });
    answer5.click(function () {
        arrAnswers[current] = 5;
        if (current <= widget.length) {
            widget.show();
            widget.not(':eq(' + (current++) + ')').hide();
            setProgress(current - 1);
        }
        hideButtons(current);
        checkQuestionIndex(current);
    });

    // Submit button click action
    btnsubmit.click(function () {
        var token = $('#token').val();
        var answersPoint = checkCalculationProcess(arrAnswers, rfData);
        var answerOpenEnded = [];
        if (arrOpenEnded.length > 0) {
            for (var i = 0; i < arrOpenEnded.length; i++) {
                answerOpenEnded.push($('#openEnded' + i).val());
            }
        }
        var pre_post = getUrlParameter("status");
        if (pre_post === "post") {
            var source = {
                '_token': token,
                'answers': JSON.stringify(answersPoint),
                'employee_id': employee_id,
                'answerOpenEnded': JSON.stringify(answerOpenEnded)
            }
            $.ajax({
                type: 'post',
                url: 'saveAnswersIAPost',
                data: source,
                success: function (data) {
                    if (data == 'scored')
                        alert('คุณเคยทำแบบทดสอบแล้ว');
                    else
                        alert('บันทึกคะแนนเรียบร้อย');

                    $('.last_page').show();
                    window.location.href = "/assessmentResult";
                    //$('#confirmModal').modal({backdrop: 'static', keyboard: false});


                    if (current <= widget.length) {
                        widget.show();
                        widget.not(':eq(' + (current++) + ')').hide();
                        setProgress(current - 1);
                    }
                    hideButtons(current);
                },
                error: function (data) {
                    alert('error');
                }
            });
            //sendPostEmail();
        } else {
            var source = {
                '_token': token,
                'answers': JSON.stringify(answersPoint),
                'employee_id': employee_id,
                'answerOpenEnded': JSON.stringify(answerOpenEnded)
            }
            $.ajax({
                type: 'post',
                url: 'saveAnswersIA',
                data: source,
                success: function (data) {
                    if (data == 'scored')
                        alert('คุณเคยทำแบบทดสอบแล้ว');
                    else
                        alert('บันทึกคะแนนเรียบร้อย');

                    $('.last_page').show();

                    window.location.href = "/assessmentResult";
                    //$('#confirmModal').modal({backdrop: 'static', keyboard: false});

                    if (current <= widget.length) {
                        widget.show();
                        widget.not(':eq(' + (current++) + ')').hide();
                        setProgress(current - 1);
                    }
                    hideButtons(current);
                },
                error: function (data) {
                    alert('error');
                }
            });
            sendEmail();
        }
    });

    btnmodalnonaccept.click(function () {
        window.location.href = "/";
    });


    // Back button click action
    // btnback.click(function () {
    //     if (current > 1) {
    //         current = current - 2;
    //         answer1.trigger('click');
    //     }
    //     hideButtons(current);
    // })
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

checkCalculationProcess = function (answersSource, rfData) {
    var arrayPoint = [];
    // N = Normal I = Invert
    for (var j = 1; j <= 24; j++) {
        for (var i = 0; i < rfData.length; i++) {
            if (rfData[i].relationflip_index_assessment_id == j) {
                if (rfData[i].calculation_process == 'N') {
                    arrayPoint[j] = answersSource[j];
                } else if (rfData[i].calculation_process == 'I') {
                    if (answersSource[j] == 5)
                        arrayPoint[j] = 1;
                    else if (answersSource[j] == 4)
                        arrayPoint[j] = 2;
                    else if (answersSource[j] == 3)
                        arrayPoint[j] = 3;
                    else if (answersSource[j] == 2)
                        arrayPoint[j] = 4;
                    else if (answersSource[j] == 1)
                        arrayPoint[j] = 5;
                }
            }
        }
    }

    return arrayPoint;
}

calculatePoint = function (answersPoint) {
    var sumPoint = 0;
    for (var i = 1; i < answersPoint.length; i++) {
        sumPoint = sumPoint + answersPoint[i];
    }
    return sumPoint;
};

// Change progress bar action
setProgress = function (currstep) {
    var percent = parseFloat(100 / widget.length) * currstep;
    percent = percent.toFixed();
    $(".progress-bar")
            .css("width", percent + "%");
    //     .html(percent + "%");
};

// Hide buttons according to the current step
hideButtons = function (current) {
    var limit = parseInt(widget.length);

    $(".action").hide();

    if (current < limit) {
        answer1.show();
        answer2.show();
        answer3.show();
        answer4.show();
        answer5.show();
    }
    if (current > 1)
        btnback.show();
    if (current == limit) {
        $('#description').hide();
        btnsubmit.show();
    }
};

getRelationflipIndexAssessmet = function () {
    var relationflip_data = [];
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'postMasterRelationflipIndexAssessment',
        async: false,
        data: {
            '_token': token
        },
        success: function (data) {
            if (data != null) {
                relationflip_data = data;
            } else {
                alert('select fail');
            }

        },
        error: function (data) {
            alert('error');
        }
    });
    return relationflip_data;
};

getOpenEnded = function () {
    var openEnded = [];
    var token = $('#token').val();
    var employee_id = $('#employee_id').val();
    $.ajax({
        type: 'post',
        url: 'postOpenEnded',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id
        },
        success: function (data) {
            if (data != null) {
                openEnded = data;
            } else {
                alert('select fail');
            }

        },
        error: function (data) {
            alert('error');
        }
    });
    return openEnded;
};

initRelationflipIndexAssessmet = function (data) {
    for (var j = 1; j <= 24; j++) {
        for (var i = 0; i < data.length; i++) {
            if (data[i].relationflip_index_assessment_id == j) {
                $('#q' + j).html(j + '. ' + data[i].name);
            }
        }
        if (j == 13) {
            $('#description').html("ขอให้ท่านอ่านข้อความ แล้วพิจารณาว่า สภาพความเป็นจริงของท่านอยู่ในระดับใด หลังจากนั้นเลือกคำตอบที่ตรงกับตัวท่าน โดย <b>1</b> คือ <b>จริงน้อยที่สุด</b> หรือ ไม่จริงเลย และ <b>5</b> คือ <b>จริงมากที่สุด</b>"
                    );
        } else {
            $('#description').html("ขอให้ท่านอ่านข้อความ แล้วพิจารณาว่าความพอใจของท่านอยู่ในระดับใด หลังจากนั้นเลือกคำตอบที่ตรงกับ<br>ความรู้สึกของท่าน<br>โดย <b>1</b> คือ <b>พอใจน้อยที่สุด</b> และ <b>5</b> คือ <b>พอใจมากที่สุด</b>"
                    );
        }
    }
};

initOpenEnded = function (data) {
    var arrOpenEnded = [];
    var openEnded = "";
    if (data.length > 0) {
        if (data.openEndedCompany.length > 0) {
            for (var i = 0; i < data.openEndedCompany.length; i++) {
                arrOpenEnded.push(data.openEndedCompany[i].name);
            }
        }
        if (data.openEndedDepartment.length > 0) {
            for (var i = 0; i < data.openEndedDepartment.length; i++) {
                arrOpenEnded.push(data.openEndedDepartment[i].name);
            }
        }
        for (var i = 0; i < arrOpenEnded.length; i++) {
            openEnded = openEnded + arrOpenEnded[i] + "<br><textarea id='openEnded" + i + "' style='height: 200px; font-size: 21px;' class='form-control'></textarea>";
            openEnded = openEnded + "<br>";
        }
    } else {
        openEnded = openEnded + "<br>ไม่พบคำถามเพิ่มเติม";
    }

    $('#openEnded').html(openEnded);
    return arrOpenEnded;
}

checkQuestionIndex = function (current) {
    if (current == 13) {
        $('#description').html("ขอให้ท่านอ่านข้อความ แล้วพิจารณาว่า สภาพความเป็นจริงของท่านอยู่ในระดับใดหลังจากนั้นเลือกคำตอบที่ตรงกับตัวท่าน โดย <b>1</b> คือ <b>จริงน้อยที่สุด</b> หรือ ไม่จริงเลย และ <b>5</b> คือ <b>จริงมากที่สุด</b>"
                );
    }
};

sendEmail = function () {
    var m_user = $('#m_user').val();
    var employee_id = $('#employee_id').val();
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'mailResultAssessment',
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