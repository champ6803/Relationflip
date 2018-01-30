@extends('layout.main')
@section('page_title','Contact Us')
@section('main-content')
<!--Page Title Start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-title-content">
                <h2 class="title page-text">Contact Us</h2>
            </div>
        </div>
    </div>
</section>
<!--Page Title End-->

<!--Divider Style Start-->
<section class="go_pt oo_pb">
    <div class="container">
        <div class="row services-style3">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="service-post">
                    <div class="thumb">
                        <img src="images/service/1.jpg" alt="">
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-phone icon"></i>
                    </div>
                    <div style="height: 250px;" class="content">
                        <h3 class="title">Phone Number</h3>
                        <p><span style="font-weight: bold">จองเวลานัดหมาย : </span>ผ่านระบบ Booking ตลอด 24 ชม.</p>
                        <p><span style="font-weight: bold">Call center : </span>081-8330148<br> ทุกวัน 8.00น. – 18.00 น.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="service-post">
                    <div class="thumb">
                        <img src="images/service/2.jpg" alt="">
                    </div>
                    <div class="icon-box">
                        <i class="flaticon-interface icon"></i>
                    </div>
                    <div style="height: 250px;" class="content">
                        <h3 class="title">Email Address</h3>
                        <p class="oo_mb">Support@Relationflip.com</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="service-post">
                    <div class="thumb">
                        <img src="images/service/3.jpg" alt="">
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-map-marker icon"></i>
                    </div>
                    <div style="height: 250px;" class="content">
                        <h3 class="title">Our Location</h3>
                        <p>บริษัท จิตตะ วิมังสา จำกัด</p>
                        <p>88/66 ม.2 ต.บ้านใหม่ อ.ปากเกร็ด จ.นนทบุรี 11120</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Divider Style End-->

<!--Sidebar Page Start-->
<section class="ao_pt eo_pb">
    <div class="container">
        <hr>
        <div class="row ao_pt">
            <div class="col-md-6 contact-section">
                <h4 class="line-bottom fz-24 fw-600 eo_mb bo_mt">Contact Form</h4>

                <div class="form">
                    <form id="contactForm" name="sentMessage" novalidate>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="form-group-inner">
                                            <div class="icon-box"><label for="your-name"><span
                                                        class="icon fa fa-user"></span></label></div>
                                            <div class="field-outer">
                                                <input type="text" name="username" id="name" required
                                                       data-validation-required-message="Please enter your name."
                                                       placeholder="Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group-inner">
                                            <div class="icon-box"><label for="your-email"><span
                                                        class="icon fa fa-envelope"></span></label></div>
                                            <div class="field-outer">
                                                <input type="email" name="email" id="email" required
                                                       data-validation-required-message="Please enter your email address."
                                                       placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group-inner">
                                            <div class="icon-box"><label for="your-phone"><span
                                                        class="icon flaticon-phone-call"></span></label></div>
                                            <div class="field-outer">
                                                <input type="text" name="phone" id="phone" required
                                                       data-validation-required-message="Please enter your phone number."
                                                       placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="form-group-inner">
                                            <textarea name="message" placeholder="Your Message" id="message"
                                                      required
                                                      data-validation-required-message="Please enter a message."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div id="success"></div>
                                        <button class="btn btn-warning btn-block btn-round btn-lg" type="submit" name="submit-form">Send Message</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-6">
                <h4 class="line-bottom fz-24 fw-600 eo_mb bo_mt">Find Our Location</h4>
                <!--Map Area-->
                <div class="map-section">
                    <div class="map-container" id="map-control"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="js/contact_me.js"></script>
<!--Services Section End-->
@stop