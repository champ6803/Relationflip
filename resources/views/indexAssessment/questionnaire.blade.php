@extends('layout.main')
@section('page_title','Relationflip Index Assessment')
@section('main-content')

<!--Page Title Start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-title-content">
                <h2 class="title page-text">Relationflip Index Assessment</h2>
            </div>
        </div>
    </div>
</section>
<!--Page Title End-->

<!--Questionnaire Start-->
<div class="quiz-container">
    <section class="co_pt oo_pb">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <h2 class="title text-center">แบบประเมินความสุขในการทำงานเเละชีวิตส่วนตัว</h2>
                    <div class="progress" style="height: 5px !important;">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0"
                             aria-valuemax="100" style="height: 5px !important;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div id="description" class="alert alert-warning text-center" role="alert" style="background-color: #fff; color:#3C413F">
                        ขอให้ท่านอ่านข้อความ แล้วพิจารณาว่า
                        ความพอใจของท่านอยู่ในระดับใด หลังจากนั้น
                        เลือกคำตอบที่ตรงกับ <br> ความรู้สึกของท่าน <br> โดย <b>1</b> คือ <b>พอใจน้อยที่สุด</b>
                        และ <b>5</b> คือ <b>พอใจมากที่สุด</b></div>
                </div>
            </div>
            <div id="relationflipIndexAssessment" class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="step">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q1">1. ฉันพอใจสิ่งอำนวยความสะดวกและสิ่งจำเป็นพื้นฐานในที่ทำงาน เช่น
                                    บริการน้ำดื่ม
                                    ห้องพยาบาล <br> ระบบรักษาความปลอดภัย ฯลฯ</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q2">2. ฉันพอใจกับสภาพแวดล้อมในที่ทำงาน เช่น อุณหภูมิ , แสงสว่าง , กลิ่น ,
                                    เสียง ฯลฯ</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q3">
                                    3.
                                    ฉันพอใจที่องค์การปฏิบัติต่อพนักงานอย่างให้เกียรติและเคารพในศักดิ์ศรีความเป็นมนุษย์</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q4">4. ฉันพอใจที่สามารถเข้าถึงข้อมูลข่าวสารขององค์การได้</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q5">5. ฉันพอใจที่หัวหน้าปฏิบัติต่อฉันอย่างให้เกียรติ</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q6">6. ฉันพอใจกับมิตรภาพที่ได้รับจากเพื่อนร่วมงาน</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q7">7. ฉันพอใจที่ได้รับโอกาสพัฒนาตนเองจากที่ทำงาน</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q8">8. ฉันพอใจกับความมั่นคงในตำแหน่งงานของฉัน
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q9">9. ฉันพอใจที่งานของฉันมีความสำคัญต่อบริษัท</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q10">10. ฉันพอใจที่หัวหน้า หรือเพื่อนร่วมงาน เห็นคุณค่าของฉัน</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q11">11. ฉันพอใจเงินเดือนที่ได้รับ</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q12">12. ฉันพอใจกับสวัสดิการที่บริษัทจัดให้</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q13">13. ฉันมีความสุขกับการทำงาน</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q14">14. ฉันมีสุขภาพร่างกายแข็งแรง</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q15">15. ฉันนอนหลับพักผ่อนอย่างเพียงพอ</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q16">16. ฉันรู้สึกว่าชีวิตได้รับผลกระทบจากความเครียดอย่างมาก</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q17">17. ในหนึ่งเดือนที่ผ่านมา ฉันเคยคิดทำร้ายผู้อื่นหรือทำลายสิ่งของ</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q18">18. ฉันได้รับกำลังใจจากครอบครัว</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q19">19. ฉันมีเวลาให้กับครอบครัวของฉัน</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q20">20. ฉันมีเพื่อนที่คอยรับฟังปัญหาของฉัน</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q21">21. เมื่อมีปัญหา ฉันได้รับกำลังใจจากเพื่อน</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q22">22. รายได้ของฉันไม่เพียงพอต่อรายจ่าย</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q23">23. ฉันไม่มีเงินเหลือเก็บ</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fz-28" id="q24">24. ฉันมีความสุขในชีวิตส่วนตัว</p>
                            </div>
                        </div>
                    </div>
                    <div class="step" style="display: none">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8 text-center">
                                <p id="openEnded">ข้อเสนอแนะเพิ่มเติม</p>
                            </div>
                        </div>
                    </div>
                    <div class="row last_page" style="display: none">
                        <div class="col-md-offset-2 col-md-8 text-center">
                            <span id="last_page">
                                <br><img src='../images/photos/processing.gif' height='80px'><br>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row aoo_pb bo_pt">
                <div class="col-md-offset-2 col-md-8" align="center">
                    <label class="action answer1 btn btn-default btn-lg btn-circle">1</label>
                    <label class="action answer2 btn btn-default btn-lg btn-circle">2</label>
                    <label class="action answer3 btn btn-default btn-lg btn-circle">3</label>
                    <label class="action answer4 btn btn-default btn-lg btn-circle">4</label>
                    <label class="action answer5 btn btn-default btn-lg btn-circle">5</label>
                    <label class="action submit btn btn-success btn-lg btn-round" style="display:none;">ส่งคำตอบ</label>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Start Confirm Modal --}}
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Confirm</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" align="center" style="padding: 20px;">
                        คุณยินดีที่จะรับการเข้าปรึกษาหรือไม่ <i class="fa fa-question-circle"></i>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12" align="center">
                        <button id="modal_accept" data-dismiss="modal" class="btn btn-warning">ยอมรับ</button> <button id="modal_nonaccept" data-dismiss="modal" class="btn btn-warning">ไม่ยอมรับ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="js/questionnaire.js"></script>
@stop