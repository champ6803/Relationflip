@extends('layout.main')
@section('page_title','Relationflip Index Assessment Result')
@section('main-content')
<!--Page Title Start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-title-content">
                <h2 class="title page-text">Relationflip Index Assessment Result</h2>
            </div>
        </div>
    </div>
</section>
<!--Page Title End-->

<!-- Report Start -->
<section class="co_pt oo_pb img-none">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inner-title line-bottom">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h1 style="text-transform: uppercase; font-weight: 700">Relationflip</h1>
                                        </div>
                                        <div class="col-md-8">
                                            <h1 style="">สำหรับ RF Counselor เท่านั้น</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row bo_pt">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="inner-title">
                                            <h2 class="sub-title">Client Details</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="pull-right" style="font-weight: 600; color: red">*Confidential
                                            Document</label>
                                    </div>
                                </div>
                                <div class="row client_details">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">รหัสผู้รับการปรึกษา</label>
                                                <p class="col-md-8" id="client_user">:&nbsp;&nbsp;</p>
                                            </div>
                                        </div>
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">อายุ</label>
                                                <p class="col-md-8" id="client_age">:&nbsp;&nbsp;</p>
                                            </div>
                                        </div>
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">สถานภาพ</label>
                                                <p class="col-md-8" id="client_status">:&nbsp;&nbsp;</p>
                                            </div>
                                        </div>
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">เพศ</label>
                                                <p class="col-md-8" id="client_sex">:&nbsp;&nbsp;</p>
                                            </div>
                                        </div>
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">เป้าหมายองค์กร</label>
                                                <p class="col-md-8" id="client_target">:&nbsp;&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">จำนวนบุตร</label>
                                                <p class="col-md-8" id="client_child">:&nbsp;&nbsp;</p>
                                            </div>
                                        </div>
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">แผนก</label>
                                                <p class="col-md-8" id="client_department">:&nbsp;&nbsp;</p>
                                            </div>
                                        </div>
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">Tel</label>
                                                <p class="col-md-8" id="client_phone">:&nbsp;&nbsp;</p>
                                            </div>
                                        </div>
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">Tel ฉุกเฉิน</label>
                                                <p class="col-md-8" id="client_emer_phone">:&nbsp;&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row title_result">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="line-top""></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="inner-title ">
                                            <h2 class="sub-title">Relationflip Personal Index</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p id="today" class="sub-title pull-right"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3" align="center">
                                        <div id="donutChart"></div>
                                        <label id="happiness_level"></label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="short-div">
                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <label style="margin-top: 50px; font-size: 20px; width: 80px;"
                                                           class="btn btn-success btn-round">Before</label>
                                                </div>
                                                <div class="col-xs-8">
                                                    <div style="margin-top:60px;" class="progress">
                                                        <div id="before_progress" class="progress-bar progress-bar-warning"
                                                             role="progressbar" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="short-div">
                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <label style="margin-bottom: 50px; font-size: 20px; width: 80px;"
                                                           class="btn btn-success btn-round">After</label>
                                                </div>
                                                <div class="col-xs-8">
                                                    <div style="margin-bottom:50px;" class="progress">
                                                        <div id="after_progress" class="progress-bar progress-bar-warning"
                                                             role="progressbar" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                        <div id="title_bar" class="progress-bar-title"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row aoo_pb">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inner-title line-top">
                                            <h2 class="sub-title">11 Keys Metrics of Personal Index</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row sub-progress bo_pt">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-6">
                                                <label style="font-size: 25px; width: 100%"
                                                       class="btn btn-success btn-round">Organization</label>
                                            </div>
                                        </div>
                                        <div class="row co_pt">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-2"><img src="images/fwd11iconrfindex/Untitled-1.jpg"></div>
                                                        <div class="col-md-10">
                                                            <p>สภาพแวดล้อมการทำงาน</p>
                                                            <div class="progress">
                                                                <div id="progress_1" class="progress-bar test progress-bar-warning"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-2"><img src="images/fwd11iconrfindex/Untitled-2.jpg"></div>
                                                        <div class="col-md-10">
                                                            <p>การบริหารองค์การ</p>
                                                            <div class="progress">
                                                                <div id="progress_2" class="progress-bar test progress-bar-warning"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-2"><img src="images/fwd11iconrfindex/Untitled-3.jpg"></div>
                                                        <div class="col-md-10">
                                                            <p>สัมพันธภาพในที่ทำงาน</p>
                                                            <div class="progress">
                                                                <div id="progress_3" class="progress-bar test progress-bar-warning"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-2"><img src="images/fwd11iconrfindex/Untitled-4.jpg"></div>
                                                        <div class="col-md-10">
                                                            <p>ความมั่นคงและความก้าวหน้าในงาน</p>
                                                            <div class="progress">
                                                                <div id="progress_4" class="progress-bar test progress-bar-warning"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-2"><img src="images/fwd11iconrfindex/Untitled-5.jpg"></div>
                                                        <div class="col-md-10">
                                                            <p>การเป็นที่ยอมรับ และรู้สึกมีคุณค่าในตนเอง</p>
                                                            <div class="progress">
                                                                <div id="progress_5" class="progress-bar test progress-bar-warning"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-2"><img src="images/fwd11iconrfindex/Untitled-6.jpg"></div>
                                                        <div class="col-md-10">
                                                            <p>ผลประโยชน์และค่าตอบแทน</p>
                                                            <div class="progress">
                                                                <div id="progress_6" class="progress-bar test progress-bar-warning"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-6">
                                                <label style="font-size: 25px; width: 100%"
                                                       class="btn btn-success btn-round">Personal Life</label>
                                            </div>
                                        </div>
                                        <div class="row co_pt">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-2"><img src="images/fwd11iconrfindex/Untitled-7.jpg"></div>
                                                        <div class="col-md-10">
                                                            <p>สุขภาพกาย</p>
                                                            <div class="progress">
                                                                <div id="progress_7" class="progress-bar test progress-bar-warning"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-2"><img src="images/fwd11iconrfindex/Untitled-8.jpg"></div>
                                                        <div class="col-md-10">
                                                            <p>สุขภาพจิต</p>
                                                            <div class="progress">
                                                                <div id="progress_8" class="progress-bar test progress-bar-warning"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-2"><img src="images/fwd11iconrfindex/Untitled-9.jpg"></div>
                                                        <div class="col-md-10">
                                                            <p>ครอบครัว</p>
                                                            <div class="progress">
                                                                <div id="progress_9" class="progress-bar test progress-bar-warning"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-2"><img src="images/fwd11iconrfindex/Untitled-10.jpg"></div>
                                                        <div class="col-md-10">
                                                            <p>เพื่อน</p>
                                                            <div class="progress">
                                                                <div id="progress_10" class="progress-bar test progress-bar-warning"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-2"><img src="images/fwd11iconrfindex/Untitled-11.jpg"></div>
                                                        <div class="col-md-10">
                                                            <p>ความมั่นคงทางการเงิน</p>
                                                            <div class="progress">
                                                                <div id="progress_11" class="progress-bar test progress-bar-warning"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p>ภาพรวมความสุขในการทำงาน</p>
                                                            <div class="progress">
                                                                <div id="progress_sumwork"
                                                                     class="progress-bar test progress-bar-danger"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="title text-center">
                                                    การแปลผลแบบสำรวจความสุขในการทำงาน
                                                </h3>
                                                <p id="workTranslation">
                                                    {{--ท่านมีความสุขในการทำงานดี ท่านควรภูมิใจในความสามารถและความสำเร็จจากงานที่ท่านทำ--}}
                                                    {{--และนำมาเป็นพลังในการสร้างสรรค์งาน--}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p>ภาพรวมความสุขในชีวิตส่วนตัว</p>
                                                            <div class="progress">
                                                                <div id="progress_sumlife"
                                                                     class="progress-bar test progress-bar-danger"
                                                                     role="progressbar" aria-valuemin="0"
                                                                     aria-valuemax="100">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="title text-center">
                                                    การแปลผลแบบสำรวจความสุขในชีวิตส่วนตัว
                                                </h3>
                                                <p id="lifeTranslation">
                                                    {{--ท่านมีความสุขในชีวิตส่วนตัวดี ท่านควรหากิจกรรมที่ท่านสนใจทำ--}}
                                                    {{--หรือออกไปเรียนรู้ประสบการณ์ใหม่ๆ และพัฒนาความสัมพันธ์ที่ดีกับคนรอบข้าง--}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row eo_pt">
                                    <div class="col-md-12">
                                        <div class="line-top"></div>
                                    </div>
                                </div>

                                <div class="row eo_pt">
                                    <div id="topic" class="col-md-12" align="center">
                                        <h3 class="title text-center">หัวข้อที่อยากปรึกษา</h3>
                                    </div>
                                </div>

                                <div id="counseling_result" class="row eo_pt">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="line-bottom bo_mb"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="inner-title">
                                                    <h2 class="sub-title">สรุปการให้การปรึกษา</h2>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="pull-right" style="font-weight: 600; color: red">*Confidential
                                                    Document</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div id="counseling_report" class="col-md-12">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></div></div></div>
    </div>
</section>
<!-- Report End -->
<section class="img-none">
    <div class="container">
        <div class="row">
            <div class="col-md-12" align="center">
                <label style="font-size: 16px">Copyright &#9400; 2017 Jitta Vimangsa Company. All Rights
                    reserved.</label>
            </div>
        </div>
    </div>
</section>

<script src="js/assessmentResultForCounselor.js"></script>
@stop