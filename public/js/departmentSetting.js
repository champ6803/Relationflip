jQuery(document).ready(function () {
    $('#addBtn').click(function () {
        $("#usr1").val('')
        $("#addModal").modal()
    });
    $('#textSearchBtn').click(function () {
        searchByName()
    });
});

function openconfirm(depId, depName) {
    document.getElementById("demo").innerHTML = "คุณต้องการ ลบ แผนก " + depName + " ใช่หรือไม่ ?";
    $("#depiddel").val(depId);
    $("#myModal").modal()
}
function openedit(depId, depName) {
    $("#editModal").modal()
    $("#usr").val(depName);
    $("#depid").val(depId);
}
function searchByName() {
    var comid = $('#comid').val();
    var name = $("#textSearch").val()
    window.location.href = "/searchDepartmentByName?name=" + name + "&company_id=" + comid;
}

function savedepartment() {
    var depname = $("#usr1").val();
    var token = $('#token').val();
    var comid = $('#comid').val();
    if ($.trim($('#usr1').val()) == '') {
        alert('กรุณากรอกชื่อ แผนก ให้ถูกต้อง');
        return false;
    }
    $.ajax({
        type: 'post',
        url: 'saveDepartment',
        async: false,
        data: {
            'depname': depname,
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

function saveedit() {
    var depname = $("#usr").val();
    var depid = $("#depid").val();
    var token = $('#token').val();
    if ($.trim($('#usr').val()) == '') {
        alert('กรุณากรอกชื่อ แผนก ให้ถูกต้อง');
        return false;
    }
    $.ajax({
        type: 'post',
        url: 'updateDepartment',
        async: false,
        data: {
            'depid': depid,
            'depname': depname,
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
function deleteDepartment() {
    var token = $('#token').val();
    var depid = $('#depiddel').val();
    $.ajax({
        type: 'post',
        url: 'deleteDepartment',
        async: false,
        data: {
            'depid': depid,
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


function searchEmployee(id, name) {
    window.location.href = "/employee?department_id=" + id + "&department_name=" + name;
}

function sendEmailToUser(employee_id) {
    var m_user = $('#m_user').val();
    var token = $('#token').val();
    $.ajax({
        type: 'post',
        url: 'mailUserEmployee',
        async: false,
        data: {
            '_token': token,
            'm_user': m_user,
            'employee_id': employee_id
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

