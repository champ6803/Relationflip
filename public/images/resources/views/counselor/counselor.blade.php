@extends('layout.main')
@section('page_title','Counselors')
@section('main-content')
    <!--Page Title Start-->
    <section class="page-title page-title-topic">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-title-content">
                    <h2 class="title page-text">Relationflip Analytical Counselors</h2>
                </div>
            </div>
        </div>
    </section>
    <!--Page Title End-->
    
    <!--Testimonials Section Start-->
    <section class="img-none go_pt fo_pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class='fw-600 text-center'>เลือกผู้ให้การปรึกษาที่เหมาะกับคุณ</h2>
                </div>
            </div>
            <div class="row go_pt">
                <div class="col-md-12">
                    <div id="team_render" class="row team-style2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" align="center">
                    <button class="btn btn-success btn-lg btn-round" id="viewAll">ผู้ให้การปรึกษาทั้งหมด</button>
                    <button style="display: none" class="btn btn-success btn-lg btn-round" id="btn_back">ย้อนกลับ</button>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonials Section End-->

    {{--<!--Testimonials Section Start-->--}}
    {{--<section class="theme-overlay overlay-white bg-img img-2 io_pt fo_pb">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12 section-title text-center">--}}
    {{--<h1 class="title"><span>Relationflip</span> Counselors</h1>--}}
    {{--<h5 class="sub-title sub-title-center">--}}
    {{--เลือกผู้ให้คำปรึกษาที่เหมาะสมกับท่าน--}}
    {{--</h5>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<div id="team_render" class="testimonial-slider-con">--}}
    {{--<div id="item1" class="item">--}}
    {{--<div class="testimonial-post">--}}
    {{--<div class="thumb">--}}
    {{--<img src="images/photos/doctors/rf001.jpg" alt="">--}}
    {{--</div>--}}
    {{--<h5 id="name1" class="testimonial-name"></h5>--}}
    {{--<h5 id="id1" class="sub-title"></h5>--}}
    {{--<p id="text1"></p>--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<button class="btn btn-success">ดูประวัติ RFCounselor</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row ao_pt">--}}
    {{--<div class="col-md-12">--}}
    {{--<button class="btn btn-warning">เลือกท่านนี้</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div id="item2" class="item">--}}
    {{--<div class="testimonial-post">--}}
    {{--<div class="thumb">--}}
    {{--<img src="images/photos/doctors/rf003.jpg" alt="">--}}
    {{--</div>--}}
    {{--<h5 id="name2" class="testimonial-name"></h5>--}}
    {{--<h5 id="id2" class="sub-title"></h5>--}}
    {{--<p id="text2"></p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div id="item3" class="item">--}}
    {{--<div class="testimonial-post">--}}
    {{--<div class="thumb">--}}
    {{--<img src="images/photos/doctors/rf004.jpg" alt="">--}}
    {{--</div>--}}
    {{--<h5 id="name3" class="testimonial-name"></h5>--}}
    {{--<h5 id="id3" class="sub-title"></h5>--}}
    {{--<p id="text3"></p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div id="item4" class="item">--}}
    {{--<div class="testimonial-post">--}}
    {{--<div class="thumb">--}}
    {{--<img src="images/photos/doctors/rf005.jpg" alt="">--}}
    {{--</div>--}}
    {{--<h5 id="name4" class="testimonial-name">xcvcxv</h5>--}}
    {{--<h5 id="id4" class="sub-title">cxv</h5>--}}
    {{--<p id="text4"></p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<!--Testimonials Section End-->--}}

    <script src="js/counselor.js"></script>
@stop