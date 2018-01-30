jQuery(document).ready(function () {
    $('#companyBtn').click(function () {
        window.location.href = "/company";
    });

    $('#roundBtn').click(function () {
        window.location.href = "/round";
    });

    $("form").on("submit", function (event) {

        toastr.info("Start with upload.");

        $.ajax({
            url: 'importExcel',
            type: 'POST',
            data: new FormData($("#import_file")[0]),
            cache: false,
            contentType: false,
            //processData: false,
            success: function (response) {
                alert('อัพโหลดเรียบร้อย');

//                toastr.success("Upload successfull.");
//                console.info(response.result);
//                $('form').trigger("reset");
            },
            error: function (response) {

                toastr.error("Upload failed :(");
                console.error(response.result, response.message);
            }
        });

        event.preventDefault();
    });



    $('#btn_load_all').click(function () {
        var company_id = $('#sel_com_all').val();
        window.location.href = "downloadExcel/xlsx/" + company_id;

    });
    
    $('#btn_load_rf').click(function () {
        var company_id = $('#sel_com_rf').val();
        window.location.href = "downloadRFIndexExcel/xlsx/" + company_id;
    });

    initCompany();
});


function populate(result, selection) {
    $.each(result, function () {
        selection.append($("<option />").val(this.company_id).text(this.name));
    });
}

function getCompany() {
    var company = '';
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'getCompany',
        async: false,
        data: {
            '_token': token
        },
        success: function (data) {
            if (data != null) {
                company = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return company;
}

function initCompany() {
    var company = getCompany();
    populate(company, $('.sel_company'));
}