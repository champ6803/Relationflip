$(function () {
    renderTopic();
    checkbox5();

    $('#btn_next').click(function () {
        var numberOfChecked = $('input:checkbox:checked').length;
        if (numberOfChecked > 0) {
            saveTopic();
        } else
            alert('คุณยังไม่ได้เลือกหัวข้อ');
    });
});

getMasterTopic = function () {
    var topic = '';
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'getMasterTopic',
        async: false,
        data: {
            '_token': token
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
};

function renderTopic() {
    var obj = getMasterTopic();
    if (obj != '') {
        $(".topic_select").empty();
        var div = "";
        $.each(obj, function (key, val) {
            if (val["topic_id"] % 2 != 0) {
                div = div + "<div class='row'>";
                div = div + "<div class='col-md-6'>";
                div = div + "<div class='checkbox'><label id='topic" + val["topic_id"] + "'><input type='checkbox' value='" + val["topic_id"] + "'>"
                div = div + "<span class='cr'><span class='cr-icon glyphicon glyphicon-ok'></span></span>";
                if (key === obj.length - 1) {
                    div = div + val["topic_id"] + " " + val['name'] + " <form class='form-inline pull-right'><label for='rg-from'>โปรดระบุ : </label> <div class='form-group'><input type='text' id='rg-from' name='rg-from' class='form-control'></div></form>";
                } else {
                    div = div + val["topic_id"] + " " + val['name'];
                }
                div = div + " <i style='color: red;'></i></label></div>";
                div = div + "</div>";
            } else {
                div = div + "<div class='col-md-6'>";
                div = div + "<div class='checkbox'><label id='topic" + val["topic_id"] + "'><input id='" + val["topic_id"] + "' type='checkbox' value='" + val["topic_id"] + "'>"
                div = div + "<span class='cr'><span class='cr-icon glyphicon glyphicon-ok'></span></span>";

                if (key === obj.length - 1) {
                    div = div + val["topic_id"] + " " + val['name'] + " <form class='form-inline pull-right'><label for='rg-from'>โปรดระบุ : </label> <div class='form-group'><input type='text' id='rg-from' name='rg-from' class='form-control'></div></form>";
                } else {
                    div = div + val["topic_id"] + " " + val['name'];
                }
                div = div + " <i style='color: red'></i></label></div>";
                div = div + "</div></div>";
            }
        });
        $('.topic_select').append(div);
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

var ary = [];
function checkbox5() {
    var check = false;
    var check5 = false;
    $('.topic_select').click(function () {
        check = false;
        check5 = false;
        $('input:checkbox').on('change', function (evt) {
            var numberOfChecked = $('input:checkbox:checked').length;
            if (numberOfChecked > 5) {
                check5 = true;
                this.checked = false;
            }
            if (!check) {
                if (!check5) {
                    check = true;
                    if (ary.indexOf($(this).val()) > -1) {
                        if (ary.length > 0) {
                            for (var i = 0; i < ary.length; i++) {
                                if (ary[i] == $(this).val()) {
                                    $('#topic' + ary[i] + ' i').html('');
                                }
                            }
                        }
                        removeA(ary, $(this).val());
                        if (ary.length > 0) {
                            for (var i = 0; i < ary.length; i++) {
                                $('#topic' + ary[i] + ' i').html(" (อันดับที่ " + (i + 1) + ")");
                            }
                        }
                    } else {
                        ary.push($(this).val());
                        if (ary.length > 0) {
                            for (var i = 0; i < ary.length; i++) {
                                $('#topic' + ary[i] + ' i').html(" (อันดับที่ " + (i + 1) + ")");
                            }
                        }
                    }
                }
            }
        });
    });
}

function saveTopic() {
    var employee_id = $('#employee_id').val();
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'saveTopic',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id,
            'source': JSON.stringify(ary)
        },
        success: function (data) {
            if (data !== 'no_round') {
                window.location.href = "counselor";
            } else {
                alert('คุณไม่มีรอบในการรับการปรึกษา');
            }
        },
        error: function (data) {
            alert('update error');
        }
    });
}