@extends('layout.main')
@section('page_title','Change Password')
@section('main-content')
    <!--Page Title Start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-title-content">
                    <h2 class="title page-text">เปลี่ยนรหัสผ่าน</h2>
                </div>
            </div>
        </div>
    </section>
    <!--Page Title End-->

    <!--Change Password Form Start-->
    <section class="co_pt boo_pb">
        <div class="container">
            <div class="row bo_pt pass_validate">
                <div class="col-md-12">
                    <h1 class="line-bottom fw-600 eo_mb bo_mt">Change Password</h1>
                    <div class="row bo_pb client_details">
                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">รหัสผ่านเดิม</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">รหัสผ่านใหม่</label>
                                    <div class="col-md-6">
                                        <input id="new_password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">รหัสผ่านอีกครั้ง</label>
                                    <div class="col-md-6">
                                        <input id="renew_password" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bo_pt">
                        <div class="col-md-12" align="center">
                            <button id="btn_confirm_password" class="btn btn-success btn-lg btn-round"><i class="fa fa-check"></i>
                                ยืนยัน
                            </button>
                            <button id="btn_cancel_password" class="btn btn-warning btn-lg btn-round"><i class="fa fa-times"></i>
                                ยกเลิก
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Change Password Form End-->

    <script src="js/changePassword.js"></script>
@stop