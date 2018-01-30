@extends('layout.main')
@section('page_title','Date Table')
@section('main-content')

<section class="go_pt go_pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section-title text-center">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #1ABC9C;">               
                        <h1 class="sub-title sub-title-center" style="text-align: center; color:#FFFFFF;">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            กรุณาเลือกวัน
                        </h1></div>
                    <div class="panel-body">
                        <div class="bo_pt bo_pb check-select" data-toggle="buttons">
                            <div class="topic_select"></div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

</div>
</section>

<script src="js/selectDateTable.js"></script>
@stop
