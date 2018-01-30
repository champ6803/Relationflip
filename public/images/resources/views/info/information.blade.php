@extends('layout.main')
@section('page_title','Appointment Detail')
@section('main-content')


<!--Divider Style Start-->
<section class="ho_pt ho_pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 class="color-theme fz-56 xs-fz-30 tt ao_mt bo_mb">รายละเอียดการจอง</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="padding:10px;" class="thumb text-right">
                                    <img style="border-radius: 8px;  height: 180px" id="rf_img" src="" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 ao_pt ao_pb0">
                                <div  id="appointment_detail" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a class="btn-theme btn-round" href="{{'/'}}">Back Home <i class="fa fa-arrow-circle-right ml-5"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Divider Style End-->

<script src="js/information.js"></script>
@stop