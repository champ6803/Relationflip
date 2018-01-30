@extends('layout.main')
@section('page_title','Counselor Detail')
@section('main-content')
<style>
    .table-style .today {background: #2A3F54; color: #ffffff;}
    /*    .table-style th:nth-of-type(7),td:nth-of-type(7) {color: blue;}
        .table-style th:nth-of-type(1),td:nth-of-type(1) {color: red;}*/
    .table-style tr:first-child th{background-color:#F6F6F6; text-align:center; text-transform: uppercase;}
</style>
<?php
// Set your timezone!!
date_default_timezone_set('Asia/Bangkok');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym, "-01");
if ($timestamp === false) {
    $timestamp = time();
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$year = date('Y', $timestamp);

$year = $year + 543;

$month = date('M', $timestamp);
if ($month === "Jan")
    $month = "มกราคม";
else if ($month === "Feb")
    $month = "กุมภาพันธ์";
else if ($month === "Mar")
    $month = "มีนาคม";
else if ($month === "Apr")
    $month = "เมษายน";
else if ($month === "May")
    $month = "พฤษภาคม";
else if ($month === "Jun")
    $month = "มิถุนายน";
else if ($month === "Jul")
    $month = "กรกฎาคม";
else if ($month === "Aug")
    $month = "สิงหาคม";
else if ($month === "Sep")
    $month = "กันยายน";
else if ($month === "Oct")
    $month = "ตุลาคม";
else if ($month === "Nov")
    $month = "พฤษจิกายน";
else if ($month === "Dec")
    $month = "ธันวาคม";

$html_title = $month . " - " . $year;

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));

// Number of days in the month
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));


// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ($day = 1; $day <= $day_count; $day++, $str++) {

    $date = $ym . '-' . $day;

    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';

    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        // Prepare for new week
        $week = '';
    }
}
?>


<section class="bo_pt overlay-white bg-img img-none fo_pb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="padding:10px 0 0 10px;" class="thumb">
                                                    <img style="border-radius: 8px; width: 180px;" id="rf_img" src="" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h1 id="counselor_name" class="name"></h1>
                                            <h3 id="rf_id" class="occupation color-gray">COUNSELOR ID : </h3>
                                            <hr>
                                            <h3 class="occupation color-gray">ABOUT ME : </h3>
                                            <p id="about_me"></p>
                                            <hr>
                                            <h3 class="occupation color-gray">สามารถให้คำปรึกษาเรื่อง : </h3>
                                            <p id="topic"></p>
                                        </div>
                                    </div>                                                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bo_pt">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <i class="fa fa-user"></i> ข้อมูลผู้ให้การปรึกษา
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#counselorDetail">ประวัติ</a></li>
                                            <li><a data-toggle="tab" href="#chill_questions">RELATIONFLIP QUESTIONS</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="counselorDetail" class="tab-pane fade in active">
                                                <div style="padding: 20px;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p style="color:#1ABC9C; font-weight: bold;">ประวัติการศึกษา</p>
                                                            <p id="education"></p>
                                                            <p style="color:#1ABC9C; font-weight: bold;">ประวัติการอบรม</p>
                                                            <p id="training"></p>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div id="chill_questions" class="tab-pane fade">
                                                <div style="padding: 20px;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="rf_about"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bo_pt">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading"><i class="fa fa-info-circle"></i> คำแนะนำในการเลือก RF Analytical Counselor</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            1. ทางระบบ Relationlip ได้ทำการคัดกรอง RF Analytical Counselor กับประเด็นปัญหาที่คุณต้องการพูดคุยปรึกษาที่คุณได้เลือกไว้ โดยจะเเสดงผลเป็น 4 อันดับเเรก ซึ่งหากคุณยังไม่รู้สึกพึงพอใจกับ RF Analytical Counselor ที่เราคัดกรองให้ คุณสามารถเลือกท่านอื่นๆได้จากรายชื่อ RF Analytical Counselorทั้งหมด
                                        </p>
                                        <p>
                                            2. คุณสามารถเลือก RF Analytical Counselor แต่ละท่านได้จากประสบการณ์ในการให้การปรึกษา ความถนัดในหัวข้อที่คุณคิดว่าเหมาะสมกับประเด็นที่ต้องการปรึกษา
                                        </p>
                                        <p>
                                            3. ในกรณีที่คุณได้ทำการปรึกษากับ RF Analytical Counselor ท่านใดแล้วรู้สึกว่าไม่พึงพอใจ คุณสามารถเปลี่ยน RF Analytical Counselor ในครั้งต่อไปได้ทันที ผ่านระบบการนัดหมายดังเดิม
                                        </p>
                                        <p>
                                            4. หากคุณต้องการปรึกษากับ RF Analytical Counselor กรุณาจองเวลานัดหมายล่วงหน้าอย่างน้อย 6 ชม เพื่อประสิทธิภาพในการให้การปรึกษา
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bo_pt">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading"><i class="fa fa-info-circle"></i> ทาง Relationflip มีข้อเเนะนำในการเตรียมตัวเพื่อรับบริการดังนี้</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            1. ขอให้ท่านผู้รับบริการ เตรียมตัวล่วงหน้า 10 นาทีก่อนการรับริการ ตรวจสอบเครื่องมือสื่อสารของท่าน ให้อยู่ในสภาพที่พร้อมรับบริการได้อย่างต่อเนื่อง 45-60 นาที
                                        </p>
                                        <p>
                                            2. ขอให้ท่านอยู่ในสภาพเเวดล้อมที่มีความเป็นส่วนตัว ไม่มีเสียงรบกวน ไม่อยู่ในจุดอับสัญญาน ซึ่งอาจส่งผลถึงประสิทธิภาพในการให้การปรึกษาของท่าน
                                        </p>
                                        <p>
                                            3. ท่านสามารถติดตามบทสรุปเเนวทางการให้การปรึกษาเเละเเนวทางการติดตามผลในครั้งต่อไป หลังจากสิ้นสุดการรับบริการครั้งนี้ ภายใน 48 ชม.ใน Account ของท่าน เราขอให้ท่านปฏิบัติตามเเนวทางที่ได้ตกลงร่วมกันกับทาง RF Analytical Counselor เพื่อให้ท่านสามารถพัฒนาศักยภาพและนำไปสู่ตัวตนที่ดียิ่งขึ้น
                                        </p>
                                        <p>
                                            4. RF Analytical Counselor จะให้การปรึกษาในกรณีไม่ฉุกเฉินเท่านั้น ในกรณีฉุกเฉิน โทร 1323 ตลอด 24 ชม. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading"><i class="fa fa-calendar"></i> ตารางเวลา</div>
                            <div class="panel-body">
                                <div>
                                    <div class="col-md-12" style="padding:0px;">
                                        <table class="table table-bordered table-style table-responsive">
                                            <tr>
                                                <th colspan="2"><a href="?ym=<?php echo $prev; ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></th>
                                                <th colspan="3"> <?php echo $html_title; ?></th>
                                                <th colspan="2"><a href="?ym=<?php echo $next; ?>"><span class="glyphicon glyphicon-chevron-right"></span></a></th>
                                            </tr>
                                            <tr>
                                                <th>อา</th>
                                                <th>จ</th>
                                                <th>อ</th>
                                                <th>พ</th>
                                                <th>พฤ</th>
                                                <th>ศ</th>
                                                <th>ส</th>
                                            </tr>
                                            <?php
                                            foreach ($weeks as $week) {
                                                echo $week;
                                            };
                                            ?>
                                        </table>
                                    </div>
                                </div>
                                <!--<div id="calendar"></div>-->

                                <div class="row ao_pt">
                                    <div class="col-md-12 text-center">
                                        <button style="display: none" id="btn_booking" class="btn btn-warning">นัดหมาย</button>
                                        <button style="display: none" id="btn_timetable" class="btn btn-warning">กำหนดตารางเวลา</button>
                                        <button style="display: none" id="btn_check_app" class="btn btn-warning">ตรวจสอบการจอง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <i class="fa fa-check-square-o"></i> การยืนยันตัวตน  
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <i class="fa fa-list-alt fa-2x"></i>
                                                <p class="fz-17" style="font-weight: 600">ประวัติการทำงาน</p>
                                                <i class="fa fa-check-circle-o"></i>
                                            </div>
                                            <div class="col-md-4">
                                                <i class="fa fa-graduation-cap fa-2x"></i>
                                                <p class="fz-17" style="font-weight: 600">ประวัติการศึกษา</p>
                                                <i class="fa fa-check-circle-o"></i>
                                            </div>
                                            <div class="col-md-4">
                                                <i class="fa fa-trophy fa-2x"></i>
                                                <p class="fz-17" style="font-weight: 600">การอบรมพิเศษ</p>
                                                <i class="fa fa-check-circle-o"></i>
                                            </div>
                                        </div>
                                        <div class="row bo_pt">
                                            <div class="col-md-4">
                                                <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                                                <p class="fz-17" style="font-weight: 600">Workshop</p>
                                                <i class="fa fa-check-circle-o"></i>
                                            </div>
                                            <div class="col-md-4">
                                                <i class="fa fa-credit-card fa-2x"></i>
                                                <p class="fz-17" style="font-weight: 600">บัตรประชาชน</p>
                                                <i class="fa fa-check-circle-o"></i>
                                            </div>
                                            <div class="col-md-4">
                                                <i class="fa fa-camera fa-2x"></i>
                                                <p class="fz-17" style="font-weight: 600">รูปถ่าย</p>
                                                <i class="fa fa-check-circle-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="checkAppModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#1ABC9C">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" style="text-transform:uppercase; color: white">รายการการจอง</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="appointmentList">
                            <!-- head table -->
                            <thead>
                                <tr>
                                    <th>รหัสผู้จอง</th>
                                    <th>วันที่</th>
                                    <th>เวลา</th>
                                    <th>เบอร์โทร</th>
                                    <th>ผลการประเมิน</th>
                                    <th>สถานะ</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- body dynamic rows -->
                            <tbody id="appointmentBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm" style="width: 40%">
        <div class="modal-content">
            <div class="modal-header" style= "background-color: #1ABC9C;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" style="text-transform:uppercase; color: white">เปลี่ยน time/date</h2>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div  class="row">
                        <label class="col-md-offset-4 col-md-1">วัน</label>
                        <div class="col-md-4">
                            <input class="form-control" id="next_appointment_date">
                        </div>
                    </div>
                    <div id="time_only" class="row">
                        <label class="col-md-offset-4 col-md-1">เวลา</label>
                        <label class="col-md-2 text-right">เริ่ม :</label>
                        <div class="col-md-3">
                            <input class="form-control time start" id="next_appointment_start">
                        </div>
                        <label class="col-md-offset-5 col-md-2 text-right">สิ้นสุด :</label>
                        <div class="col-md-3">
                            <input disabled="" class="form-control time end" id="next_appointment_end">
                        </div>
                        <input type="hidden" id="employee_ids">
                        <input type="hidden" id="appointment_ids">
                    </div>  

                    <button style="text-align: center;" onclick="saveAppoint()"  id="saveBtn" type="button" class="btn btn-success" data-dismiss="modal">ตกลง</button>
                    <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style= "background-color: #1ABC9C;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" style="text-transform:uppercase; color: white">Confirm</h2>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p class="bo_pb">คุณต้องการยกเลิกการจอง ใช่หรือไม่ ?</p>
                    <button style="text-align: center;" id="btn_cancel_ok" type="button" class="btn btn-success btn-round" data-dismiss="modal">ตกลง</button>
                    <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/counselorDetail.js"></script>
@stop