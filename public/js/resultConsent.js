$(function(){
    checkAccept();
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

function checkAccept() {
    var employee_id = getUrlParameter('id');
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'checkAccept',
        async: false,
        data: {
            '_token': token,
            'employee_id': employee_id
        },
        success: function (data) {
            if(data[0].first_accept === 'Y'){
                $('#consent_text').html('ข้าพเจ้ายอมรับเงื่อนไขในการรับบริการ');
                $('#consent_name').append(data[0].first_name_th + " " + data[0].last_name_th);
            }
            else{
                $('#consent_text').html('ข้าพเจ้าไม่ยอมรับเงื่อนไขในการรับบริการ');
                $('#consent_name').append(data[0].first_name_th + " " + data[0].last_name_th);
            }
        },
        error: function (data) {
            alert('update error');
        }
    });
}