@extends('layout.main')
@section('page_title','ยืนยันข้อมูลส่วนตัว')
@section('main-content')
    <!--Page Title Start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-title-content">
                    <h2 class="title page-text">ยืนยันข้อมูลส่วนตัว</h2>
                </div>
            </div>
        </div>
    </section>
    <!--Page Title End-->

    <!--Verify Form Start-->
    <section class="co_pt boo_pb">
        <div class="container">
            <div class="row bo_pt validate">
                <div class="col-md-12">
                    <h1 class="line-bottom fw-600 eo_mb bo_mt">ยืนยันข้อมูลส่วนตัว</h1>
                    <div class="row bo_pb client_details">
                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">ชื่อ</label>
                                    <div class="col-md-6">
                                        <input id="first_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">นามสกุล</label>
                                    <div class="col-md-6">
                                        <input id="last_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">อายุ</label>
                                    <div class="col-md-6">
                                        <input disabled="" id="age" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">สถานภาพ</label>
                                    <div class="col-md-6">
                                        <select id="status" class="form-control">
                                            <option value="S">โสด</option>
                                            <option value="M">แต่งงาน</option>
                                            <option value="D">หย่าร้าง</option>
                                            <option value="W">หม้าย</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">รหัสผู้รับคำปรึกษา</label>
                                    <div class="col-md-6">
                                        <input disabled id="username" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">ตำแหน่ง</label>
                                    <div class="col-md-6">
                                        <input disabled="" id="position" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">บริษัท</label>
                                    <div class="col-md-6">
                                        <input disabled="" id="company_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">E-Mail</label>
                                    <div class="col-md-6">
                                        <input id="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">Tel</label>
                                    <div class="col-md-6">
                                        <input id="phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-4">รหัสผ่าน</label>
                                    <div class="col-md-6">
                                        <input disabled type="password" id="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-6">
                                        <a style="color: #00a8ff; text-decoration: underline" href="{{url('changePassword')}}">แก้ไขรหัสผ่าน</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bo_pt">
                        <div class="col-md-12" align="center">
                            <button id="btn_submit" class="btn btn-success btn-lg btn-round"><i class="fa fa-check"></i> ยืนยัน
                            </button>
                            <button id="btn_cancel" class="btn btn-warning btn-lg btn-round"><i class="fa fa-times"></i> ยกเลิก
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Verify Form End-->

    <script src="js/verifyProfile.js"></script>
@stop