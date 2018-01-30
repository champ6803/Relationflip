$(function () {
    $("form").on("submit", function (event) {

        toastr.info("Start with upload.");

        $.ajax({
            url: 'importExcel',
            type: 'POST',
            data: new FormData($("#import_file")[0]),
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {

                toastr.success("Upload successfull.");
                console.info(response.result);
                $('form').trigger("reset");
            },
            error: function (response) {

                toastr.error("Upload failed :(");
                console.error(response.result, response.message);
            },
            complete: function () {

            }
        });

        event.preventDefault();
    });

//    $("#submit").click(function () {
//        var token = $('#token').val();
//        $.ajax({
//            type: 'post',
//            url: 'importExcel',
//            async: false,
//            data: {
//                '_token': token
//                        //'import_file': $('#import_file').prop('files')
//            },
//            success: function (data) {
//                if (data != null) {
//                    report = data;
//                } else {
//                    alert('select fail');
//                }
//            },
//            error: function (data) {
//                alert('error');
//            }
//        });
//
//    });
});
getAdminReport = function () {
    var report = [];
    var token = $('#token').val();
    var employee_id = $('#employee_id').val();
    $.ajax({
        type: 'post',
        url: 'getAdminReport',
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

