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
        <link href="jquery.event.calendar/src/css/jquery.event.calendar.css" rel="stylesheet" />
        <link href="jquery.event.calendar/src/css/themes/green.event.calendar.css" rel="stylesheet" id="theme" />

        <!--Jquery Script-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/menuzord.js"></script>
        <script src="js/jPushMenu.js"></script>
        <script src="js/revolution.min.js"></script>
        <script src="js/owl.js"></script>
        <script src="js/bootstrap.progress-bar.js"></script>
        <script src="highcharts/highcharts.js"></script>
        <script src="jquery.event.calendar/src/js/jquery.event.calendar.js"></script>
        <script src="jquery.event.calendar/src/js/languages/jquery.event.calendar.en.js"></script>

    </head>

    <body>

        <!--wrapper start-->
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader"></div>
            <!-- Start Main Header -->
            <header class="mega-header">

                <!--Header Main-->
                <div class="header-main">
                    <div class="container">
                        <div class="row clearfix">
                            @if(!isset($_SESSION['m_user']))
                            <input type="hidden" name="_token" id="m_user" value="">
                            @else
                            <input type="hidden" name="_token" id="m_user"
                                   value="<?php echo $_SESSION['m_user'] ?>">
                            @endif
                            @if(!isset($_SESSION['employee_id']))
                            <input type="hidden" name="_token" id="employee_id" value="">
                            @else
                            <input type="hidden" name="_token" id="employee_id"
                                   value="<?php echo $_SESSION['employee_id'] ?>">
                            @endif
                            @if(!isset($_SESSION['counselor_id']))
                            <input type="hidden" name="_token" id="counselor_id" value="">
                            @else
                            <input type="hidden" name="_token" id="counselor_id"
                                   value="<?php echo $_SESSION['counselor_id'] ?>">
                            @endif
                            @if(!isset($_SESSION['scored']))
                            <input type="hidden" name="_token" id="scored"
                                   value="">
                            @else
                            <input type="hidden" name="_token" id="scored"
                                   value="<?php echo $_SESSION['scored'] ?>">
                            @endif
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <!--Main Menu-->
                            <div class="mega-menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <nav id="menuzord" class="menuzord menuzord-responsive">
                                    <div style="float: left">
                                        <a href={{url('/')}}><img style="height: 76px !important" src="images/logo.png" alt="Logo" title="Medical"></a>
                                    </div>
                                    <ul class="menuzord-menu">
                                        <!--<div class="appoint-btn text-right">-->
                                        <li><a href="{{url('adminConsole')}}">หน้าแรก</a></li>
                                        @if(isset($_SESSION['a_user']))
                                        <li><a href="{{url('company')}}">จัดการบริษัท</a></li>
                                        <li><a href="{{url('round')}}">จัดการแพ็คเกจ</a></li>
                                        @endif
                                    </ul>
                                    @if(isset($_SESSION['a_user']))
                                    <div class="appoint-btn text-right">
                                        <a href="{{url('logoutAdmin')}}">ออกจากระบบ</a>
                                    </div>
                                    @else
                                    <div class="appoint-btn text-right">
                                        <a href="{{url('/')}}" target="_blank">เข้าสู่เว็ปไซต์</a>
                                    </div>
                                    @endif

                                    <div class="appoint-inner">
                                        @if(!isset($_SESSION['m_user']))
                                        <div class="appoint-btn text-right">
                                        </div>
                                        @else
                                        @if($_SESSION['role'] == 'E')
                                        <div class="appoint-btn text-right">
                                        </div>
                                        @elseif($_SESSION['role'] == 'C')
                                        <div class="appoint-btn text-right">
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                </nav>
                            </div>
                            <!--Main Menu End-->
                        </div>
                    </div>


            </header>
            <!--End Main Header -->

            <!--Main Content start-->
            <div class="main-content">
                @yield('main-content')
                <!--//-->
            </div>
            <!--Main Content end-->

            <!-- Footer Start-->
            <footer class="footer-section footer-admin">
                <div class="container">
                    <div class="row go_pt fo_pb">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="footer-widget">

                            </div>
                        </div>

                    </div>
                </div>
            </footer>
            <!--Footer end-->

            <!--Scroll to top-->
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
        <script src="js/contact_me.js"></script>
        <!-- map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRvBPo3-t31YFk588DpMYS6EqKf-oGBSI"></script>
        <script src="js/gmaps.js"></script>
        <script src="js/custom-map.js"></script>

        <script src="js/customcollection.js"></script>
        {{--<script src="js/custom.js"></script>--}}
        <script src="js/custom.js"></script>
    </body>
</html>