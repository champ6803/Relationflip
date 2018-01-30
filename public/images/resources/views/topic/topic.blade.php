@extends('layout.main')
@section('page_title','Topic')
@section('main-content')
    <!--Page Title Start-->
    <section class="page-title page-title-topic">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-title-content">
                    <h2 class="title page-text">Counselling Topic</h2>
                </div>
            </div>
        </div>
    </section>
    <!--Page Title End-->

    <!--Sidebar Page Start-->
    <section class="go_pt do_pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sidebar-maincontent">
                        <div class="row service-post-details">
                            <div class="col-md-12">
                                <div class="row services-style2">
                                    <div class="col-md-12">
                                        <div class="service-post post-details">
                                            <div class="content">
                                                <h2 class="fw-600">หัวข้อที่คุณต้องการปรึกษา</h2>
                                                <p class="bo_mt">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    หากคุณยินดีรับบริการ โปรดเลือกหัวข้อที่คุณต้องการปรึกษาด้วยการใส่เครื่องหมาย ✔️หน้าหัวข้อนั้น
                                                    โดยเรียงลำดับจากหัวข้อที่คุณต้องการปรึกษา 5 หัวข้อ ซึ่งลำดับที่ 1 คือหัวข้อที่ต้องการปรึกษามากที่สุด
                                                    คุณสามารถสังเกตเลขลำดับที่จะขึ้นที่ท้ายหัวข้อนั้นๆ คุณไม่จำเป็นต้องเลือกครบทั้ง 5 อันดับก็ได้</p>
                                                <div class="row">
                                                    <div class="col-md-12 topic_select">
                                                        {{--rendor from js--}}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div id="text" class="col-md-12">
                                                        <div></div>
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
            <div class="row eo_pt">
                <div class="col-md-12">
                    <div class="line-top"></div>
                </div>
            </div>
            <div class="row eo_pt">
                <div class="col-md-12" align="center">
                    <button id="btn_next" class="btn btn-success btn-lg btn-round">เลือกผู้ให้การปรึกษาที่เหมาะกับคุณ</button>
                </div>
            </div>
        </div>
    </section>
    <!--Services Section End-->

    <script src="js/topic.js"></script>
@stop