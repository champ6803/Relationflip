jQuery(document).ready(function () {
    $('#addBtn').click(function () {
        $("#usr1").val('')
        $("#addModal").modal()
    });
    $('#textSearchBtn').click(function () {
        searchByName()
    });
});
function searchByName() {
    var name = $("#textSearch").val()
    window.location.href = "/searchCompanyByName?name=" + name;
}


function openconfirm(companyId, companyName) {
    document.getElementById("demo").innerHTML = "คุณต้องการ ลบ บริษัท " + companyName + " ใช่หรือไม่ ?";
    $("#comid").val(companyId);
    $("#myModal").modal()
}
function openedit(companyId, companyName, package, num_package) {
    $("#editModal").modal();
    $("#usr").val(companyName);
    $("#package_edit").val(package);
    $("#num_package_edit").val(num_package);
    $("#comppid").val(companyId);
}

function saveadd() {
    var comname = $("#usr1").val();
    var package = $("#package_add").val();
    var num_package = $("#num_package_add").val();
    var token = $('#token').val();
    if ($.trim($('#usr1').val()) == '') {
        alert('กรุณากรอกชื่อ บริษัท ให้ถูกต้อง');
        return false;
    }
    $.ajax({
        type: 'post',
        url: 'addCompany',
        async: false,
        data: {
            'comname': comname,
            'package': package,
            'num_package': num_package,
            '_token': token
        },
        success: function (data) {

            if (data == "success") {
                // alert('Success')
                alert('บันทึกข้อมูลสมบูรณ์');
                location.reload();
            } else {
                alert('บันทึกข้อมูลไม่สำเร็จ');
            }
        },
        error: function (data) {
            alert('error');
        }
    });

}

function saveedit() {
    var comname = $("#usr").val();
    var comid = $("#comppid").val();
    var package = $("#package_edit").val();
    var num_package = $("#num_package_edit").val();
    var token = $('#token').val();
    if ($.trim($('#usr').val()) == '') {
        alert('กรุณากรอกชื่อ บริษัท ให้ถูกต้อง');
        return false;
    }
    $.ajax({
        type: 'post',
        url: 'updateCompany',
        async: false,
        data: {
            'comid': comid,
            'comname': comname,
            'package': package,
            'num_package': num_package,
            '_token': token
        },
        success: function (data) {
            if (data == "success") {
                // alert('Success')
                alert('บันทึกข้อมูลสมบูรณ์');
                location.reload();
            } else {
                alert('บันทึกข้อมูลไม่สำเร็จ');
            }
        },
        error: function (data) {
            alert('error');
        }
    });

}
function deleteCompany() {
    var token = $('#token').val();
    var comid = $('#comid').val();
    $.ajax({
        type: 'post',
        url: 'deleteCompany',
        async: false,
        data: {
            'comid': comid,
            '_token': token
        },
        success: function (data) {
            if (data == "success") {
                // alert('Success')
                alert('บันทึกข้อมูลสมบูรณ์');
                location.reload();
            } else {
                alert('บันทึกข้อมูลไม่สำเร็จ');
            }
        },
        error: function (data) {
            alert('error');
        }
    });

}


function getcompany() {
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'searchCompany',
        async: false,
        data: {
            '_token': token
        },
        success: function (data) {
            if (data != null) {
                alert(data)
            } else {
                alert('ไม่มีข้อมูลการจอง');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
}

function searchDepartment(id) {
    window.location.href = "/department?company_id=" + id;
}

function sendEmailToUser(company_id) {
    var user = checkHasUser(company_id);
    if (user.length > 0) {
        sendEmail(company_id);
    } else {
        alert('บริษัทนี้ยังไม่มี Username และ Password');
    }
}

function checkHasUser(company_id) {
    var user = [];
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'checkHasUser',
        async: false,
        data: {
            '_token': token,
            'company_id': company_id
        },
        success: function (data) {
            if (data != null) {
                user = data;
            } else {
                alert('select fail');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
    return user;
}

sendEmail = function (company_id) {
    var m_user = $('#m_user').val();
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'mailUser',
        async: false,
        data: {
            '_token': token,
            'm_user': m_user,
            'company_id': company_id
        },
        success: function (data) {
            var test = data;
            alert('ส่ง Email เรียบร้อยแล้ว');
        },
        error: function (data) {
            alert('error');
        }
    });
}