jQuery(document).ready(function () {
 $( "#startDate" ).datepicker({ dateFormat: 'yy-mm-dd',        
                                    onSelect: function() {
                                        validatestartDateEdit()
                                    } });
  $( "#endDate" ).datepicker({ dateFormat: 'yy-mm-dd' ,        
                                    onSelect: function() {
                                     validateendDateEdit()
                                    }});
   $( "#endMeetDate" ).datepicker({ dateFormat: 'yy-mm-dd',        
                                    onSelect: function() {
                                     validateendMeetDateEdit()
                                    } });
    $( "#startDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' ,        
                                    onSelect: function() {
                                    validatestartDate()
                                    }});
    $( "#endDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd',        
                                    onSelect: function() {
                                     validateendDate()
                                    } });
    $( "#endMeetDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd',        
                                    onSelect: function() {
                                     validateendMeetDate()
                                    } });
   
   $( "#endDateAdd" ).datepicker( "option", "disabled", true );
   $( "#endMeetDateAdd" ).datepicker( "option", "disabled", true );
   
  $('#addBtn').click(function () {
     $("#usr").val('');
     $( "#startDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val('');
     $( "#endDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val('');
     $( "#endMeetDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val('');
     $("#roundId").val('');
     $("#descriptionAdd").val('');
     $("#addModal").modal()   
    });
});
function validatestartDateEdit(){  
    var startDate= $( "#startDate" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endDate = $( "#endDate" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endMeetDate= $( "#endMeetDate" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    if((startDate>endDate)&& ($.trim($('#startDate').val()) != '') && ($.trim($('#endDate').val()) != '')){
        alert('กรุณา ระบุ  วันที่เริ่มต้นการทดสอบ  ให้ น้อยกว่า วันที่สิ้นสุดการทดสอบ')
        $( "#startDate" ).datepicker().val('')
    }else if((startDate>endMeetDate)&&($.trim($('#startDate').val())!= '') && ($.trim($('#endMeetDate').val())!= '') ){
        alert('กรุณา ระบุ  วันที่เริ่มต้นการทดสอบ ให้ น้อยกว่า วันที่สิ้นสุดรอบ')
        $( "#startDate" ).datepicker().val('')
    }
}
function validateendDateEdit(){  
    var startDate= $( "#startDate" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endDate = $( "#endDate" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endMeetDate= $( "#endMeetDate" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();

    if((endDate<startDate) && ($.trim($('#endDate').val())!= '')  && ($.trim($('#startDate').val())!= '') ){
        alert('กรุณา ระบุ วันที่สิ้นสุดการทดสอบ ให้ มากกว่า วันที่เริ่มต้นการทดสอบ')
        $( "#endDate" ).datepicker().val('')
    }else if((endDate>endMeetDate)  && ($.trim($('#endMeetDate').val())!= '') && ($.trim($('#endDate').val())!= '')){
        alert('กรุณา ระบุ วันที่สิ้นสุดการทดสอบ ให้ น้อยกว่า วันที่สิ้นสุดรอบ ')
        $( "#endDate" ).datepicker().val('')
    }
}
function validateendMeetDateEdit(){  
    var startDate= $( "#startDate" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endDate = $( "#endDate" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endMeetDate= $( "#endMeetDate" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    if((endMeetDate<startDate)  && ($.trim($('#endMeetDate').val())!= '') && ($.trim($('#startDate').val())!= '')){
        alert('กรุณา ระบุ วันที่สิ้นสุดรอบ ให้ มากกว่าวันที่เริ่มต้นการทดสอบ')
        $( "#endMeetDate" ).datepicker().val('')
    }else if((endMeetDate<endDate) && ($.trim($('#endMeetDate').val())!= '') && ($.trim($('#endDate').val())!= '')){
        alert('กรุณา ระบุ วันที่สิ้นสุดรอบ ให้ มากกว่าวันที่สิ้นสุดการทดสอบ')
        $( "#endMeetDate" ).datepicker().val('')
    }
}
function validateendDate(){   
    var startDate= $( "#startDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endDate = $( "#endDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endMeetDate= $( "#endMeetDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();

    if((endDate<startDate) && ($.trim($('#endDateAdd').val())!= '')  && ($.trim($('#startDateAdd').val())!= '') ){
        alert('กรุณา ระบุ วันที่สิ้นสุดการทดสอบ ให้ มากกว่า วันที่เริ่มต้นการทดสอบ')
        $( "#endDateAdd" ).datepicker().val('')
         $( "#endMeetDateAdd" ).datepicker( "option", "disabled", true );
    }else if((endDate>endMeetDate)  && ($.trim($('#endMeetDateAdd').val())!= '') && ($.trim($('#endDateAdd').val())!= '')){
        alert('กรุณา ระบุ วันที่สิ้นสุดการทดสอบ ให้ น้อยกว่า วันที่สิ้นสุดรอบ ')
        $( "#endDateAdd" ).datepicker().val('')
        $( "#endMeetDateAdd" ).datepicker( "option", "disabled", true );
    }  else{
        $( "#endMeetDateAdd" ).datepicker( "option", "disabled", false );
    }
        
}
function validateendMeetDate(){   
     var startDate= $( "#startDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endDate = $( "#endDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endMeetDate= $( "#endMeetDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    if((endMeetDate<startDate)  && ($.trim($('#endMeetDateAdd').val())!= '') && ($.trim($('#startDateAdd').val())!= '')){
        alert('กรุณา ระบุ วันที่สิ้นสุดรอบ ให้ มากกว่าวันที่เริ่มต้นการทดสอบ')
        $( "#endMeetDateAdd" ).datepicker().val('')
    }else if((endMeetDate<endDate) && ($.trim($('#endMeetDateAdd').val())!= '') && ($.trim($('#endDateAdd').val())!= '')){
        alert('กรุณา ระบุ วันที่สิ้นสุดรอบ ให้ มากกว่าวันที่สิ้นสุดการทดสอบ')
        $( "#endMeetDateAdd" ).datepicker().val('')
    }
}
function validatestartDate(){   
      var startDate= $( "#startDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endDate = $( "#endDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    var endMeetDate= $( "#endMeetDateAdd" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    if((startDate>endDate)&& ($.trim($('#startDateAdd').val()) != '') && ($.trim($('#endDateAdd').val()) != '')){
        alert('กรุณา ระบุ  วันที่เริ่มต้นการทดสอบ  ให้ น้อยกว่า วันที่สิ้นสุดการทดสอบ')
        $( "#startDateAdd" ).datepicker().val('')
         $( "#endDateAdd" ).datepicker( "option", "disabled", true );
    }else if((startDate>endMeetDate)&&($.trim($('#startDateAdd').val())!= '') && ($.trim($('#endMeetDateAdd').val())!= '') ){
        alert('กรุณา ระบุ  วันที่เริ่มต้นการทดสอบ ให้ น้อยกว่า วันที่สิ้นสุดรอบ')
        $( "#startDateAdd" ).datepicker().val('')
         $( "#endDateAdd" ).datepicker( "option", "disabled", true );
    } else{
        $( "#endDateAdd" ).datepicker( "option", "disabled", false );
    }
}


function openedit(roundId,name,startDate,endDate,endMeetDate,companyId,description){
     $("#editModal").modal()   
     $("#usr").val(name);
     $( "#startDate" ).datepicker('setDate',new Date(startDate));
     $( "#endDate" ).datepicker('setDate',new Date(endDate));
     $( "#endMeetDate" ).datepicker('setDate',new Date(endMeetDate));
     $("#roundId").val(roundId);
     $("#edtcompany").val(companyId);
      $("#description").val(description);
}


function saveRound(){
    var roundName= $("#usrAdd").val();
    var startDate=     $('#startDateAdd').datepicker().val();
     var description=  $("#descriptionAdd").val();
    var endDate = $( "#endDateAdd" ).datepicker().val();
    var endMeetDate= $( "#endMeetDateAdd" ).datepicker().val();
    var token = $('#token').val();
     var comid = $('#comid').val();
   if($.trim($('#usrAdd').val()) == ''){
      alert('กรุณากรอกชื่อ รอบ ให้ถูกต้อง');
      return false;
   }
      $.ajax({
        type: 'post',
        url: 'saveRound',
        async: false,
        data: {
            'roundName': roundName,
            'startDate': startDate,
            'endDate': endDate,
            'endMeetDate': endMeetDate,
               'comid': comid,
              'description': description,
             '_token': token
        },
        success: function (data) {
            if (data == "success") {
                // alert('Success')
                alert('บันทึกข้อมูลสมบูรณ์');
                location.reload();
                   }
            else {
               alert('บันทึกข้อมูลไม่สำเร็จ');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
   
}

function saveeditRound(){
    var roundName= $("#usr").val();
    var startDate= $( "#startDate" ).datepicker().val();
    var endDate = $( "#endDate" ).datepicker().val();
    var endMeetDate= $( "#endMeetDate" ).datepicker().val();
    var roundId= $("#roundId").val();
    var token = $('#token').val();
   var comid = $('#edtcompany').val();
     var description=  $("#description").val();
   if($.trim($('#usr').val()) == ''){
      alert('กรุณากรอกชื่อ แผนก ให้ถูกต้อง');
      return false;
   }
      $.ajax({
        type: 'post',
        url: 'updateRound',
        async: false,
        data: {
            'roundId': roundId,
            'roundName': roundName,
            'startDate': startDate,
            'endDate': endDate,
            'comid': comid,
            'endMeetDate': endMeetDate,
            'description': description,
             '_token': token
        },
        success: function (data) {
            if (data == "success") {
               // alert('Success')
                alert('บันทึกข้อมูลสมบูรณ์');
                   location.reload();
                    }
            else {
                alert('บันทึกข้อมูลไม่สำเร็จ');
            }
        },
        error: function (data) {
            alert('error');
        }
    });
   
}


