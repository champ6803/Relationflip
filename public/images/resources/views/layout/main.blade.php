<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Meta Tags -->
        <meta charset="UTF-8">

        <!-- Theme Page Title -->
        <title>@yield('page_title')</title>

        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">

        <!-- responsive meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--css link-->
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/menuzord/menuzord.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/revolution-slider.css" rel="stylesheet">
        <link href="css/reset-style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/color/themecolor.css" rel="stylesheet" id="colorswitcher">
        <link href="css/jquery.timepicker.css" rel="stylesheet">
        <link href="jquery.event.calendar/src/css/jquery.event.calendar.css" rel="stylesheet" />
        <link href="jquery.event.calendar/src/css/themes/green.event.calendar.css" rel="stylesheet" id="theme" />
        <link href="css/magicsuggest-min.css" rel="stylesheet">

        <!--Jquery Script-->
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/menuzord.js"></script>
        <script src="js/jPushMenu.js"></script>
        <script src="js/revolution.min.js"></script>
        <script src="js/owl.js"></script>
        <script src="js/bootstrap.progress-bar.js"></script>
        <script src="highcharts/highcharts.js"></script>
        <script src="jquery.event.calendar/src/js/jquery.event.calendar.js"></script>
        <script src="jquery.event.calendar/src/js/languages/jquery.event.calendar.en.js"></script>
        <script src="js/jquery.timepicker.min.js"></script>
        <script src="js/datepair.js"></script>
        <script src="js/jquery.datepair.js"></script>
        <script src="js/magicsuggest-min.js"></script>
    </head>

    <body>

        <!--wrapper start-->
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader"></div>
            <!-- Start Main Header -->
            <header class="mega-header">
                <div class="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div id="top" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <!--<a class="logo" href={{url('/')}}><img src="images/logo.png" alt="Logo" title="Medical"></a>-->
                            </div>

                            <!--                            <div class="col-lg-8 col-md-8 col-sm-12 header-top-widget headerwidget-style2">
                                                            <div class="header-widget">
                                                                <div class="iconbox-widget">
                                                                    <div class="icon">
                                                                        <i class="flaticon-square"></i>
                                                                    </div>
                                                                    <div class="box-contenet">
                                                                        <h5 class="title"><a href="#">เวลาทำการ</a></h5>
                                                                        <p class="sub-title"><a href="#">จันทร์ - ศุกร์ 9.00 - 19.00</a></p>
                                                                    </div>
                                                                </div>
                                                                <div class="iconbox-widget">
                                                                    <div class="icon">
                                                                        <i class="flaticon-telephone-symbol-button"></i>
                                                                    </div>
                                                                    <div class="box-contenet">
                                                                        <h5 class="title"><a href="#">เบอร์โทรศัพท์</a></h5>
                                                                        <p class="sub-title"><a href="#">081-833-0148</a></p>
                                                                    </div>
                                                                </div>
                                                                @if(!isset($_SESSION['m_user']))
                                                                <div class="iconbox-widget">
                                                                    <div class="icon">
                                                                        <i class="flaticon-medical-1"></i>
                                                                    </div>
                                                                    <div class="box-contenet">
                                                                        <h5 class="title"><a href="{{url('login')}}">เข้าสู่ระบบ</a></h5>
                                                                        <p class="sub-title"><a href="{{url('login')}}" id="header_name">Relationflip
                                                                                Member</a></p>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <input type="hidden" id="m_user" class="form-control"
                                                                       value="<?php echo $_SESSION['m_user'] ?>">
                                                                <div class="iconbox-widget">
                                                                    <div class="icon">
                                                                        <i class="fa fa-user-times"></i>
                                                                    </div>
                                                                    <div class="box-contenet">
                                                                        <h5 class="title"><a href="{{url('logout')}}">ออกจากระบบ</a></h5>
                                                                        <p class="sub-title"><a
                                                                                href="{{url('logout')}}"><?php echo $_SESSION['name'] ?></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>-->
                        </div>
                    </div>
                </div>

                <!--Header Main-->
                <div class="header-main">
                    <div class="container">
                        @if(!isset($_SESSION['m_user']))
                        <input type="hidden" name="_token" id="m_user" value="">
                        @else
                        <input type="hidden" name="_token" id="m_user"
                               value="<?php echo $_SESSION['m_user'] ?>">
                        @endif
                        @if(!isset($_SESSION['role']))
                        <input type="hidden" name="_token" id="role" value="">
                        @else
                        <input type="hidden" name="_token" id="role"
                               value="<?php echo $_SESSION['role'] ?>">
                        @endif
                        @if(!isset($_SESSION['employee_id']))
                        <input type="hidden" name="_token" id="employee_id" value="">
                        @else
                        <input type="hidden" name="_token" id="employee_id"
                               value="<?php echo $_SESSION['employee_id'] ?>">
                        @endif
                        @if(!isset($_SESSION['department_id']))
                        <input type="hidden" name="_token" id="department_id" value="">
                        @else
                        <input type="hidden" name="_token" id="department_id"
                               value="<?php echo $_SESSION['department_id'] ?>">
                        @endif
                        @if(!isset($_SESSION['counselor_id']))
                        <input type="hidden" name="_token" id="counselor_id" value="">
                        @else
                        <input type="hidden" name="_token" id="counselor_id"
                               value="<?php echo $_SESSION['counselor_id'] ?>">
                        @endif
                        @if(!isset($_SESSION['scored']))
                        <input type="hidden" name="_token" id="scored" value="">
                        @else
                        <input type="hidden" name="_token" id="scored" value="<?php echo $_SESSION['scored'] ?>">
                        @endif
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="row clearfix">
                            <!--Main Menu-->
                            <div class="mega-menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <nav id="menuzord" class="menuzord menuzord-responsive">
                                    <div style="float: left">
                                        <a href={{url('/')}}><img style="height: 76px !important" src="images/logo.png" alt="Logo" title="Medical"></a>
                                    </div>
                                    <ul class="menuzord-menu">
                                        @if(!isset($_SESSION['m_user']))
                                        <li class="res">
                                            <a href="{{url('login')}}">เข้าสู่ระบบ</a>
                                        </li>
                                        @else
                                        <li class="res">
                                            <a href="{{url('logout')}}">ออกจากระบบ</a>
                                        </li>
                                        @endif
                                        <li><a href="{{url('/')}}">หน้าแรก</a></li>
                                        <li><a href="{{url('about')}}">เกี่ยวกับ Relationflip</a></li>
                                        <li>
                                            <a href="javascript:void(0)">ข่าว Relationflip</a>
                                            <ul class="dropdown">
                                                <li style="margin: 0px"><a href="{{url('questions')}}">คำถามที่พบบ่อย</a></li>
                                                <li style="margin: 0px"><a href="javascript:void(0)">บทความน่ารู้</a></li>
                                            </ul>
                                        </li>
                                        @if(isset($_SESSION['m_user']))
                                        @if($_SESSION['role'] == 'C')
                                        <li>
                                            <a href="javascript:void(0)">ผู้ให้การปรึกษา</a>
                                            <ul class="dropdown">
                                                <li style="margin: 0px"><a href="{{url('counselorDetail')}}">จัดการข้อมูลและตารางเวลา</a></li>
                                                <li style="margin: 0px"><a href="javascript:void(0)">เว็บบอร์ด</a></li>
                                                <li style="margin: 0px"><a href="{{url('changePassword')}}">แก้ไขรหัสผ่าน</a></li>
                                            </ul>
                                        </li>
                                        @endif
                                        @endif
                                        <li><a href="javascript:void(0)">เงื่อนไขบริการ</a></li>
                                        <li><a href="{{url('contactUs')}}">ติดต่อเรา</a></li>
                                    </ul>
                                    <div class="appoint-inner">
                                        @if(!isset($_SESSION['m_user']))
                                        <div class="appoint-btn text-right">
                                            <a href="{{url('login')}}">เข้าสู่ระบบ</a>
                                        </div>
                                        @else
                                        <div class="appoint-btn text-right">
                                            <a href="{{url('logout')}}">ออกจากระบบ</a>
                                        </div>
                                        @endif
                                    </div>
                                </nav>
                            </div>
                            <!--Main Menu End-->
                        </div>
                    </div>

                </div>
            </header>
            <!--End Main Header -->

            <!--MainContent start-->
            <div class="main-content">
                @yield('main-content')
                <!--//-->
            </div>
            <!--Main Content end-->

            <!-- Footer Start-->
            <footer class="footer-section">
                <div class="container">
                    <div class="row go_pt">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="footer-widget">
                                <a href="#" class="footer-logo"><img src="images/logo.png" alt=""></a>
                                <div class="widget-contact">
                                    <p><i class="fa fa-building"></i>ติดต่อ : บริษัท จิตตะ วิมังสา จำกัด</p>
                                    <p><i class="fa fa-map"></i>88/66 ม.2 ต.บ้านใหม่ อ.ปากเกร็ด จ.นนทบุรี</p>
                                    <p><i class="fa fa-envelope"></i>support@relationflip.com</p>
                                    <p><i class="fa fa-bookmark"></i>จองเวลานัดหมาย : ผ่านระบบ Booking ตลอด 24 ชม.</p>
                                    <p><i class="flaticon-telephone-symbol-button"></i>ติดต่อ Call center : ทุกวัน 8.00น. – 18.00 น.</p>
                                </div>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook icon"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube-play icon"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">
                                            <h4 class="widget-title">เส้นทางลัด</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="widget-links">
                                                    <li><a href="{{url('/')}}">หน้าหลัก</a></li>
                                                    <li><a href="{{url('contactUs')}}">เกี่ยวกับ Relationflip</a></li>
                                                    <li><a href="{{url('questions')}}">คำถามที่พบบ่อย</a></li>
                                                    <li><a href="javascript:void(0)">นโยบายความเป็นส่วนตัว</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="widget-links">
                                                    <li><a href="javascript:void(0)">บทความน่ารู้</a></li>
                                                    <li><a href="{{url('contactUs')}}">ติดต่อเรา</a></li>
                                                    <li><a href="javascript:void(0)">เงื่อนไขบริการ</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12" align="center">
                            <div>
                                <p class="fz-18 color-fff">เราให้บริการปรึกษาเฉพาะกรณีไม่ฉุกเฉินเท่านั้น ในกรณีฉุกเฉินหรือมีความคิดทำร้ายตนเอง โปรดติดต่อ 1323 หรือ 1669 ตลอด 24 ชม.</p>
                                <p class="fz-15 color-fff">Copyright © 2017 Relationflip.com All rights reserved.</p>
                            </div>
                        </div>
                    </div> 
                </div>
            </footer>
            <!-- Footer end-->

            <!-- Scroll to top-->
            <div class="scroll-to-top"><span class="fa fa-arrow-up"></span></div>

        </div>
        <!--wrapper end-->

        <!--Jquery Script-->


        <!-- validate -->
        <script src="js/validate.js"></script>
        <!-- jQuery ui js -->
        <script src="js/jquery-ui-1.11.4/jquery-ui.js"></script>
        <!-- appear js -->
        <script src="js/jquery.appear.js"></script>
        <!-- isotope -->
        <script src="js/isotope.pkgd.min.js"></script>
        <!-- count to -->
        <script src="js/jquery.countTo.js"></script>
        <!-- fancybox -->
        <script src="js/jquery.fancybox.pack.js"></script>
        <!-- easing -->
        <script src="js/jquery.easing.min.js"></script>
        <!-- wow -->
        <script src="js/wow.js"></script>

        <script src="js/rev-custom.js"></script>

        <script src="js/index.js"></script>

        <!-- contactform -->
        <script src="js/jqBootstrapValidation.js"></script>
        <!-- map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRvBPo3-t31YFk588DpMYS6EqKf-oGBSI"></script>
        <script src="js/gmaps.js"></script>
        <script src="js/custom-map.js"></script>

        <script src="js/customcollection.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>