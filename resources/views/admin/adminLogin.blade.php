@extends('adminlayout.main')
@section('page_title','Admin Login')
@section('main-content')

<section class="go_pt go_pb">
    <div class="container">
        <div class="row">
                   <div class="col-lg-4 col-md-12">
                   </div>
             <div class="col-lg-4 col-md-12">
                    <div class="appointment-form" s  >
                        <h4 class="form-title"><i class="fa fa-users"></i>Login to Admin Console</h4>
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
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<script src="js/adminLogin.js"></script>
@stop
