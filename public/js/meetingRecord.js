$(function () {
    initMagicSuggest();
    setValidateField();
    var status = getUrlParameter("status");
    if (status === "recorded") {
        setMeetingRecord();
    } else {
        setCounselingDetail();
    }

    $("#btn_submit").click(function () {
        check_date_submit($('#saveModal'));
        //$('#saveModal').modal();
    });
    $("#btn_end").click(function () {
        check_date_submit($('#endModal'));
        //$('#endModal').modal();
    });
});

function initMagicSuggest() {
    // <editor-fold defaultstate="collapsed" desc=" ${Magic Suggest} ">
    environment_work = $("#environment_work").magicSuggest({
        data: udc_environment_work,
        placeholder: '-- กรุณาเลือก --',
        useCommaKey: false
    });

    organ_manage = $("#organ_manage").magicSuggest({
        data: udc_organ_manage,
        placeholder: '-- กรุณาเลือก --',
        useCommaKey: false
    });

    work_relation = $("#work_relation").magicSuggest({
        data: udc_work_relation,
        placeholder: '-- กรุณาเลือก --',
        useCommaKey: false
    });

    work_stable = $("#work_stable").magicSuggest({
        data: udc_work_stable,
        placeholder: '-- กรุณาเลือก --',
        useCommaKey: false
    });

    self_esteem = $("#self_esteem").magicSuggest({
        data: udc_self_esteem,
        placeholder: '-- กรุณาเลือก --',
        useCommaKey: false
    });

    benefit = $("#benefit").magicSuggest({
        data: udc_benefit,
        placeholder: '-- กรุณาเลือก --',
        useCommaKey: false
    });

    physical_health = $("#physical_health").magicSuggest({
        data: udc_physical_health,
        placeholder: '-- กรุณาเลือก --',
        useCommaKey: false
    });

    mental_health = $("#mental_health").magicSuggest({
        data: udc_mental_health,
        placeholder: '-- กรุณาเลือก --',
        useCommaKey: false
    });

    family = $("#family").magicSuggest({
        data: udc_family,
        placeholder: '-- กรุณาเลือก --',
        useCommaKey: false
    });

    friend = $("#friend").magicSuggest({
        data: udc_friend,
        placeholder: '-- กรุณาเลือก --',
        useCommaKey: false
    });

    money_stable = $("#money_stable").magicSuggest({
        data: udc_money_stable,
        placeholder: '-- กรุณาเลือก --',
        useCommaKey: false
    });
    // </editor-fold>
}

// <editor-fold defaultstate="collapsed" desc=" ${Model} ">
var udc_environment_work = [{id: 1, name: 'ห้องพยาบาล'}, {id: 2, name: 'ห้องสุขา'}, {id: 3, name: 'โรงอาหาร'}
    , {id: 4, name: 'อุณหภูมิในที่ทำงาน'}, {id: 5, name: 'แสงสว่างในที่ทำงาน'}, {id: 6, name: 'กลิ่นในที่ทำงาน'}, {id: 7, name: 'เสียงในที่ทำงาน'}
    , {id: 8, name: 'การดูแลความสะอาด'}, {id: 9, name: 'ระบบอินเตอร์เน็ต'}, {id: 10, name: 'อุปกรณ์สำนักงาน'}, {id: 11, name: 'คอมพิวเตอร์'}
    , {id: 12, name: 'ความปลอดภัย'}, {id: 13, name: 'ความรุนแรงในที่ทำงาน'}, {id: 14, name: 'มาตรการป้องกันอุบัติเหตุและการบาดเจ็บ'}, {id: 15, name: 'การเสพยาเสพติด'}];

var udc_organ_manage = [{id: 1, name: 'การบริหารจัดการ'}, {id: 2, name: 'การปฏิบัติต่อพนักงาน'}, {id: 3, name: 'การเข้าถึงข้อมูลข่าวสาร'}
    , {id: 4, name: 'โครงสร้างองค์กร'}, {id: 5, name: 'การประเมินผลและการพัฒนาองค์กร'}, {id: 6, name: 'การบริหารทรัพยากรบุคคล'}, {id: 7, name: 'การตัดสินใจและแก้ปัญหา'}
    , {id: 8, name: 'นโยบาย ขั้นตอนการปฏิบัติงาน'}, {id: 9, name: 'ทิศทางชัดเจนโปร่งใส'}, {id: 10, name: 'การสื่อสาร'}, {id: 11, name: 'การบริหารความเปลี่ยนแปลง'}
    , {id: 12, name: 'ความมั่นใจต่อผู้บริหาร/ภาวะผู้นำ'}, {id: 13, name: 'ผู้บริหารสามารถเข้าถึงได้'}, {id: 14, name: 'กฏระเบียบ/คู่มือพนักงาน'}];

var udc_work_relation = [{id: 1, name: 'ความสัมพันธ์กับหัวหน้า'}, {id: 2, name: 'ความสัมพันธ์กับลูกน้อง'}, {id: 3, name: 'ความสัมพันธ์กับเพื่อนร่วมงาน'}
    , {id: 4, name: 'ไม่มีเพือนในที่ทำงาน'}, {id: 5, name: 'การทำงานเป็นทีม'}, {id: 6, name: 'การเล่นพรรคเล่นพวก'}, {id: 7, name: 'ความรู้สึกแปลกแยก'}];

var udc_work_stable = [{id: 1, name: 'โอกาสในการเติบโต'}, {id: 2, name: 'พัฒนาประสิทธิภาพการทำงาน'}, {id: 3, name: 'ความท้าทายในการทำงาน'}
    , {id: 4, name: 'งานไม่ตรงสายงาน/งานไม่ชัดเจน'}, {id: 5, name: 'โอกาสในการพัฒนาตนเอง'}, {id: 6, name: 'โอกาสในการลาออก'}, {id: 7, name: 'การย้ายสายงาน'}
    , {id: 8, name: 'เบื่องาน'}, {id: 9, name: 'รู้สึกไม่มั่นคงในที่ทำงาน'}, {id: 10, name: 'การดูแลรักษาพนักงาน'}, {id: 11, name: 'ความผูกพันต่อองค์กร'}
    , {id: 12, name: 'การสนับสนุนจากหัวหน้าและองค์กร'}];

var udc_self_esteem = [{id: 1, name: 'การยอมรับในที่ทำงาน'}, {id: 2, name: 'การเมืองในที่ทำงาน'}, {id: 3, name: 'ความไม่ยุติธรรม'}
    , {id: 4, name: 'ความไม่สามัคคีกัน'}, {id: 5, name: 'บทบาทในที่ทำงาน'}, {id: 6, name: 'โอกาสในการตัดสินใจ'}, {id: 7, name: 'กำลังใจในการทำงาน'}
    , {id: 8, name: 'แรงจูงใจในการทำงาน'}, {id: 9, name: 'ความนับถือตนเอง'}, {id: 10, name: 'ความภูมิใจในงานที่ทำ'}, {id: 11, name: 'ทัศนคติในการทำงาน'}
    , {id: 12, name: 'รับฟังและเปิดให้พนักงานมีส่วนร่วม'}];

var udc_benefit = [{id: 1, name: 'เงินเดือนหรือค่าตอบแทน'}, {id: 2, name: 'สวัสดิการ'}, {id: 3, name: 'วันหยุดวันลาที่เหมาะสม'}
    , {id: 4, name: 'ค่ารักษาพยาบาล'}, {id: 5, name: 'โอที'}, {id: 6, name: 'โบนัส'}, {id: 7, name: 'ชั่วโมงการทำงาน-เวลาพักที่เหมาะสม'}
    , {id: 8, name: 'ความยืดหยุ่นในการทำงาน'}, {id: 9, name: 'ระบบการให้รางวัล'}, {id: 10, name: 'เงินช่วยเหลืออื่นๆ เช่น ค่าเดินทาง ค่าเล่าเรียนบุตร'}];

var udc_physical_health = [{id: 1, name: 'ออฟฟิศซินโดรม'}, {id: 2, name: 'นอนไม่หลับ'}, {id: 3, name: 'ไมเกรน'}
    , {id: 4, name: 'โรคร้ายแรง'}, {id: 5, name: 'โรคเรื้อรัง/NCD'}, {id: 6, name: 'พักผ่อนไม่เพียงพอ'}, {id: 7, name: 'ออกกำลังกายไม่สม่ำเสนอ'}
    , {id: 8, name: 'โรคอ้วน'}];

var udc_mental_health = [{id: 1, name: 'เครียด'}, {id: 2, name: 'กังวล'}, {id: 3, name: 'ภาวะซึมเศร้า'}
    , {id: 4, name: 'ไม่มีความสุข'}, {id: 5, name: 'พฤติกรรมทางอารมณ์'}, {id: 6, name: 'ทำร้ายตนเอง'}, {id: 7, name: 'ทำร้ายผู้อื่น'}
    , {id: 8, name: 'ทำลายสิ่งของ'}, {id: 9, name: 'ภาวะสูญเสียคนรัก'}, {id: 10, name: 'ย้ำคิดย้ำทำ'}, {id: 11, name: 'หลงลืมง่าย'}
    , {id: 12, name: 'โลกส่วนตัวสูง'}, {id: 13, name: 'อาการกลัว'}, {id: 14, name: 'ความเชื่อ'}, {id: 15, name: 'ภาพลักษณ์ในสังคม'}
    , {id: 16, name: 'เกิดวิกฤตในชีวิต'}, {id: 17, name: 'ติดยาเสพติด'}, {id: 18, name: 'ติดพนัน'}, {id: 19, name: 'ภาวะสูญเสียสัตว์เลี้ยง'}
    , {id: 20, name: 'ล้มละลาย'}, {id: 21, name: 'หลงตัวเอง'}, {id: 22, name: 'พฤติกรรมทางบุคลิกภาพ'}, {id: 23, name: 'ความสมดุลของชีวิต'}];

var udc_family = [{id: 1, name: 'ความสัมพันธ์กับพ่อแม่'}, {id: 2, name: 'ความสัมพันธ์กับลูก'}, {id: 3, name: 'ความสัมพันธ์กับคู่สามีภรรยา'}
    , {id: 4, name: 'ความสัมพันธ์กับญาติพี่น้อง'}, {id: 5, name: 'การอยู่กับครอบครัว'}, {id: 6, name: 'การได้รับการสนันสนุนจากครอบครัว'}, {id: 7, name: 'การได้รับการยอมรับจากครอบครัว'}
    , {id: 8, name: 'การได้รับกำลังใจจากครอบครัว'}, {id: 9, name: 'ไม่มีเวลาอยู่ด้วยกัน'}, {id: 10, name: 'เด็กมีปัญหาทางพฤติกรรม'}, {id: 11, name: 'ลูกเป็นเด็กพิเศษ'}
    , {id: 12, name: 'สมาชิกในครอบครัวมีอาการทางจิตเวช'}, {id: 13, name: 'สมาชิกในครอบครัวเป็นโรคร้ายแรง'}, {id: 14, name: 'สมาชิกในครอบครัวเป็นโรคเรื้อรัง/NCD'}, {id: 15, name: 'สมาชิกในครอบครัวเป็นเพศทางเลือก'}
    , {id: 16, name: 'หย่าร้าง'}, {id: 17, name: 'การนอกใจ'}, {id: 18, name: 'สมาชิกในครอบครับติดเกมส์ อินเตอเน็ต โซเชียล เพื่อน แฟน'}, {id: 19, name: 'คู่สามีภรรยามีปัญหาเรื่องเพศสัมพันธ์'}
    , {id: 20, name: 'สมาชิกในครอบครัวมีเพศสัมพันธ์ในวันเรียน'}];

var udc_friend = [{id: 1, name: 'ไม่มีเพื่อนสนิท'}, {id: 2, name: 'ไม่มีเพื่อนรับฟังปัญหา'}, {id: 3, name: 'ไม้ได้รับการสนันสนุนจากเพื่อน'}
    , {id: 4, name: 'ไม่ได้รับการยอมรับจากเพื่อน'}
    , {id: 5, name: 'ทะเลาะกับเพื่อน'}
    , {id: 6, name: 'การได้รับกำลังใจจากเพื่อน'}
    , {id: 7, name: 'เพื่อนชักชวนไปในทางที่เสียหาย'
    }
    , {id: 8, name: 'ถูกเหยียดสีผิว'}
    , {id: 9, name: 'ถูกเหยียดเชื้อชาติ'}
    , {id: 10, name: 'ถูกเหยียดศาสนา'}
    , {id: 11, name: 'ถูกเปรียบเทียบแข่งขัน'}
];

var udc_money_stable = [{id: 1, name: 'หนี้บัตรเครดิต'}, {id: 2, name: 'หนี้ในระบบ'}, {id: 3, name: 'หนี้นอกระบบ'}
    , {id: 4, name: 'ไม่มีเงินเก็บ'}, {id: 5, name: 'เงินไม่พอใช้'}, {id: 6, name: 'ฟุ่มเฟือย'}, {id: 7, name: 'ขาดความรู้ในการบริหารจัดการเงิน'}
    , {id: 8, name: 'หนี้ที่ตัวเองไม่ได้ก่อ เช่น ค้ำประกัน'}];

// </editor-fold>


function check_date_submit(btn) {
// set hide button
    var data = getCounselingDetail();
    var dateNow = getDateToday();
    var timeNow = getTimeNow();
    if (dateNow === data.appointment.appointment_date) {
        if (timeNow < data.appointment.start_time) {
            alert('ยังไม่ถึงวันที่หรือเวลาที่นัดปรึกษา');
        } else {
            btn.modal();
        }
    }
    if (dateNow < data.appointment.appointment_date) {
        alert('ยังไม่ถึงวันที่หรือเวลาที่นัดปรึกษา');
    } else {
        btn.modal();
    }
}


function setValidateField() {
    $('#time_app_only .time').timepicker({
        'showDuration': true,
        'timeFormat': 'H:i',
        'step': 60
    });
    var timeAppOnlyExampleEl = document.getElementById('time_app_only');
    var timeAppOnlyDatepair = new Datepair(timeAppOnlyExampleEl);

    $('#time_only .time').timepicker({
        'showDuration': true,
        'timeFormat': 'H:i',
        'step': 60
    });
    var timeOnlyExampleEl = document.getElementById('time_only');
    var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);

    $('#counseling_date').datepicker({"dateFormat": "dd-mm-yy"});
    var date = new Date();
    date.setDate(date.getDate() + 1);
    $("#next_appointment_date").datepicker({"dateFormat": "dd-mm-yy", minDate: date});
}

function setCounselingDetail() {
    var data = getCounselingDetail();
    $('#counseling_number').val(data.counseling_number + 1);

    var a_d = data.appointment.appointment_date.split('-');
    var appointment_date = a_d[2] + "-" + a_d[1] + "-" + a_d[0];

    $('#counseling_date').val(appointment_date);

    var s_t = data.appointment.start_time.split(':');
    var start_time = s_t[0] + ":" + s_t[1];
    var e_t = data.appointment.end_time.split(':');
    var end_time = e_t[0] + ":" + e_t[1];

    $('#start_time').val(start_time);
    $('#end_time').val(end_time);

    $('#employee_code').html(data.employee.rf_client_code);
}

function getDateToday() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!

    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    var today = yyyy + '-' + mm + '-' + dd;
    return today;
}

function getTimeNow() {
    var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    return time;
}

function RadionButtonSelectedValueSet(name, SelectdValue) {
    $('input[name="' + name + '"][value="' + SelectdValue + '"]').prop('checked', true);
}

function setMeetingRecord() { // edit mode
    var data = getMeetingRecord();
    var meeting_record = data.meetingRecord;
    var employee = data.employee;

    var counseling_number = $('#counseling_number').val(meeting_record.round);
    var counseling_date = $('#counseling_date').val(meeting_record.counseling_date);
    var start_time = $('#start_time').val(meeting_record.start_time);
    var end_time = $('#end_time').val(meeting_record.end_time);
    //var rf_index = $("[name='rf_index']:checked").val() || "";
    RadionButtonSelectedValueSet('rf_index', meeting_record.match);
    var other = $("#other").val(meeting_record.reason);
    var counseling_confirm = $("#counseling_confirm").val(meeting_record.argee);

    if (meeting_record.environment != "")
        environment_work.setValue([meeting_record.environment]);
    environment_work.disable();
    if (meeting_record.physical_health != "")
        physical_health.setValue([meeting_record.physical_health]);
    physical_health.disable();
    if (meeting_record.corporate_governance != "")
        organ_manage.setValue([meeting_record.corporate_governance]);
    organ_manage.disable();
    if (meeting_record.mental_health != "")
        mental_health.setValue([meeting_record.mental_health]);
    mental_health.disable();
    if (meeting_record.relationship != "")
        work_relation.setValue([meeting_record.relationship]);
    work_relation.disable();
    if (meeting_record.family != "")
        family.setValue([meeting_record.family]);
    family.disable();
    if (meeting_record.stability_growth != "")
        work_stable.setValue([meeting_record.stability_growth]);
    work_stable.disable();
    if (meeting_record.friend != "")
        friend.setValue([meeting_record.friend]);
    friend.disable();
    if (meeting_record.acceptance != "")
        self_esteem.setValue([meeting_record.acceptance]);
    self_esteem.disable();
    if (meeting_record.financial_security != "")
        money_stable.setValue([meeting_record.financial_security]);
    money_stable.disable();
    if (meeting_record.benefits != "")
        benefit.setValue([meeting_record.benefits]);
    benefit.disable();

//    $("#environment_work").filter(function () {
//        return $(this).text() == meeting_record.environment;
//    }).prop('selected', true);
//
//    $("#physical_health option").filter(function () {
//        return $(this).text() == meeting_record.physical_health;
//    }).prop('selected', true);
//
//    $("#organ_manage option").filter(function () {
//        return $(this).text() == meeting_record.corporate_governance;
//    }).prop('selected', true);
//
//    $("#mental_health option").filter(function () {
//        return $(this).text() == meeting_record.mental_health;
//    }).prop('selected', true);
//
//    $("#work_relation option").filter(function () {
//        return $(this).text() == meeting_record.relationship;
//    }).prop('selected', true);
//
//    $("#family option").filter(function () {
//        return $(this).text() == meeting_record.family;
//    }).prop('selected', true);
//
//    $("#work_stable option").filter(function () {
//        return $(this).text() == meeting_record.stability_growth;
//    }).prop('selected', true);
//
//    $("#friend option").filter(function () {
//        return $(this).text() == meeting_record.friend;
//    }).prop('selected', true);
//
//    $("#self_esteem option").filter(function () {
//        return $(this).text() == meeting_record.acceptance;
//    }).prop('selected', true);
//
//    $("#money_stable option").filter(function () {
//        return $(this).text() == meeting_record.financial_security;
//    }).prop('selected', true);
//
//    $("#benefit option").filter(function () {
//        return $(this).text() == meeting_record.benefits;
//    }).prop('selected', true);

    var general_prob = $("#general_prob").val(meeting_record.general_problem);
    var discover_prob = $("#discover_prob").val(meeting_record.problem_survey);
    var fix_prob = $("#fix_prob").val(meeting_record.troubleshooting);
    var result = $("#result").val(meeting_record.summary);
    var assessment = $("#assessment").val(meeting_record.evaluation);
    var follow = $("#follow").val(meeting_record.following_up);
    var next_appointment_date = $("#next_appointment_date").val();
    var next_appointment_start = $("#next_appointment_start").val();
    var next_appointment_end = $("#next_appointment_end").val();
    var suggest = $("#suggest").val(meeting_record.suggest_other);
    var refer = $("#refer").val(meeting_record.forwarding);
    var company_result = $("#company_result").val(meeting_record.summary_company);
    var client_result = $("#client_result").val(meeting_record.summary_client);

    $('#employee_code').html(employee.rf_client_code);

    $(".counseling_disable :input").prop("disabled", true);

    $(".status_recorded").hide();
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

function setSelectionToString(data) {
    var data_result = "";
    $.each(data, function (i, val) {
        if (i !== data.length - 1) {
            data_result = data_result + val.name + ",";
        } else {
            data_result = data_result + val.name;
        }
    });
    return data_result;
}

function getValueFromDisplay(status) {
    var counseling_number = $('#counseling_number').val();

    var a_d = $('#counseling_date').val().split('-');
    var counseling_date = a_d[2] + "-" + a_d[1] + "-" + a_d[0];
    var start_time = $('#start_time').val();
    var end_time = $('#end_time').val();
    var rf_index = $("[name='rf_index']:checked").val() || "";
    var other = $("#other").val();
    var counseling_confirm = $("#counseling_confirm").val();

    var environment_work_result = setSelectionToString(environment_work.getSelection());
    var organ_manage_result = setSelectionToString(organ_manage.getSelection());
    var work_relation_result = setSelectionToString(work_relation.getSelection());
    var work_stable_result = setSelectionToString(work_stable.getSelection());
    var self_esteem_result = setSelectionToString(self_esteem.getSelection());
    var benefit_result = setSelectionToString(benefit.getSelection());

    var physical_health_result = setSelectionToString(physical_health.getSelection());
    var mental_health_result = setSelectionToString(mental_health.getSelection());
    var family_result = setSelectionToString(family.getSelection());
    var friend_result = setSelectionToString(friend.getSelection());
    var money_stable_result = setSelectionToString(money_stable.getSelection());

//    var environment_work = getText(udc_environment_work, $("#environment_work").val());
//    var physical_health = getText(udc_physical_health, $("#physical_health").val());
//    var organ_manage = getText(udc_organ_manage, $("#organ_manage").val());
//    var mental_health = getText(udc_mental_health, $("#mental_health").val());
//    var work_relation = getText(udc_work_relation, $("#work_relation").val());
//    var family = getText(udc_family, $("#family").val());
//    var work_stable = getText(udc_work_stable, $("#work_stable").val());
//    var friend = getText(udc_friend, $("#friend").val());
//    var self_esteem = getText(udc_self_esteem, $("#self_esteem").val());
//    var money_stable = getText(udc_money_stable, $("#money_stable").val());
//    var benefit = getText(udc_benefit, $("#benefit").val());

    var general_prob = $("#general_prob").val();
    var discover_prob = $("#discover_prob").val();
    var fix_prob = $("#fix_prob").val();
    var result = $("#result").val();
    var assessment = $("#assessment").val();
    var follow = $("#follow").val();

    var n_d = $('#next_appointment_date').val().split('-');
    var next_appointment_date = n_d[2] + "-" + n_d[1] + "-" + n_d[0];
    var next_appointment_start = $("#next_appointment_start").val();
    var next_appointment_end = $("#next_appointment_end").val();
    var suggest = $("#suggest").val();
    var refer = $("#refer").val();
    var company_result = $("#company_result").val();
    var client_result = $("#client_result").val();

    var isValid = true;
    var meet_result = "";
    if (status === "save") {
        if (rf_index === "" || counseling_confirm === "" || next_appointment_date === "" || next_appointment_start === "" || next_appointment_end === ""
                || general_prob === "" || discover_prob === "" || fix_prob === "" || result === "" || assessment === "" || follow === ""
                || suggest === "" || refer === "" || company_result === "" || client_result === "") {
            isValid = false;
        }
        meet_result = "A";
    } else if (status === "end") {
        if (rf_index === "" || counseling_confirm === ""
                || general_prob === "" || discover_prob === "" || fix_prob === "" || result === "" || assessment === "" || follow === ""
                || suggest === "" || refer === "" || company_result === "" || client_result === "") {
            isValid = false;
        }
        meet_result = "E";
    }

    if (isValid) {
        var counseling_detail = {
            'counseling_number': counseling_number,
            'counseling_date': counseling_date,
            'start_time': start_time,
            'end_time': end_time,
            'rf_index': rf_index,
            'other': other,
            'counseling_confirm': counseling_confirm
        };

        var counseling_rf_index = {
            'environment_work': environment_work_result,
            'physical_health': physical_health_result,
            'organ_manage': organ_manage_result,
            'mental_health': mental_health_result,
            'work_relation': work_relation_result,
            'family': family_result,
            'work_stable': work_stable_result,
            'friend': friend_result,
            'self_esteem': self_esteem_result,
            'money_stable': money_stable_result,
            'benefit': benefit_result
        };

        var counseling_result = {
            'general_prob': general_prob,
            'discover_prob': discover_prob,
            'fix_prob': fix_prob,
            'result': result,
            'assessment': assessment,
            'follow': follow,
            'next_appointment_date': next_appointment_date,
            'next_appointment_start': next_appointment_start,
            'next_appointment_end': next_appointment_end,
            'suggest': suggest,
            'refer': refer,
            'company_result': company_result,
            'client_result': client_result
        };
        var obj = {
            'counseling_detail': counseling_detail,
            'counseling_rf_index': counseling_rf_index,
            'counseling_result': counseling_result
        };
        saveCounseling(obj, meet_result);
    } else {
        alert('กรุณากรอกช่อง * ให้ครบ')
    }
}

function getText(obj, value) {
    var text = "";
    $.each(obj, function (key, val) {
        if (value === val["id"]) {
            text = val["name"];
        }
    });
    return text;
}

function getCounselingDetail() {
    var counseling = [];
    var employee_id = getUrlParameter("id");
    var appointment_id = getUrlParameter("app_id");
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'getCounselingDetail',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id,
            'appointment_id': appointment_id
        },
        success: function (data) {
            if (data != null) {
                counseling = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return counseling;
}

function getMeetingRecord() {
    var meeting_record = [];
    var employee_id = getUrlParameter("id");
    var appointment_id = getUrlParameter("app_id");
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'getMeetingRecord',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id,
            'appointment_id': appointment_id
        },
        success: function (data) {
            if (data != null) {
                meeting_record = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return meeting_record;
}

function saveCounseling(source, meet_result) {
    var employee_id = getUrlParameter("id");
    var counselor_id = $('#counselor_id').val();
    var appointment_id = getUrlParameter("app_id");
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'saveCounseling',
        data: {
            '_token': token,
            'employee_id': employee_id,
            'counselor_id': counselor_id,
            'appointment_id': appointment_id,
            'meet_result': meet_result,
            'counseling_detail': JSON.stringify(source.counseling_detail),
            'counseling_rf_index': JSON.stringify(source.counseling_rf_index),
            'counseling_result': JSON.stringify(source.counseling_result)
        },
        success: function (data) {
            if (data == 'success') {
                if (meet_result == "A") {
                    sendEmail();
                } else if (meet_result == "E") {
                    sendLastEmail();
                }
                alert('บันทึกเรียบร้อย')
                window.location.href = "counselorDetail";
            }
            else if (data == 'fail'){
                alert('เวลานี้ไม่ว่างค่ะ');
            }
            else {
                alert('บันทึกไม่ได้');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

sendEmail = function () {
    var employee_id = getUrlParameter("id");
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'mailMeetingReport',
        async: true,
        data: {
            '_token': token,
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

sendLastEmail = function () {
    var employee_id = getUrlParameter("id");
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'mailRFIndex',
        async: true,
        data: {
            '_token': token,
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

function btn_profile() {
    var employee_id = getUrlParameter("id");
    window.location.href = "/assessmentResultForCounselor?id=" + employee_id;
}