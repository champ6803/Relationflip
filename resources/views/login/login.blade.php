@extends('layout.main')
@section('page_title','Login to Relationflip')
@section('main-content')

    <!--Feature Section Start-->
    <section class="io_pt fo_pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="inner-title line-bottom do_mb">
                        <h2 class="title text-center">Welcome to <span>Relationflip</span></h2>
                        {{--<h5 class="color-theme oo_mt ae_mb fw-500 lts-1">The Best Medical Service of Neywark City. Check Our All Feature</h5>--}}
                        <h2 class="sub-title text-center">Flip for The Better Version of Yourself</h2>
                        <h2 class="sub-title text-center">“เพื่อคุณคนใหม่ ที่รู้สึกดีขึ้นกว่าเมื่อวาน”</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <img src="images/photos/login.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="appointment-form">
                        <h4 class="form-title"><i class="fa fa-users"></i>Log in to Relationflip</h4>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <img src="images/logo.png">
                                </div>
                                <div class="form-group col-md-12 co_pt">

                                    <input class="form-control enterLogin" type="text" id="username" name="username"
                                           placeholder="Username">
                                </div>
                                <div class="form-group col-md-12">
                                    <input class="form-control enterLogin" type="password" id="password" name="password"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="row co_pt">
                                <div class="col-md-12">
                                    <button class="btn btn-block" id="login"><i
                                                class="fa fa-unlock-alt"></i>
                                        Log in
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Feature Section End-->
<script src="js/login/login.js"></script>
@stop