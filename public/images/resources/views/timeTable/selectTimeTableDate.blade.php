@extends('layout.main')
@section('page_title','Time Table')
@section('main-content')

<section class="go_pt go_pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section-title text-center">
                <div class="panel panel-default">
                    <div class="panel-heading" style="   background-color: #1ABC9C;">               
                        <h1 class="sub-title sub-title-center" style="text-align: center;    color:#FFFFFF; ">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            กรุณาเลือกเวลา
                        </h1></div>
                    <div class="panel-body">
                        <div class="bo_pt bo_pb check-select" data-toggle="buttons">
                            <div class="topic_select"></div>
                            <input type="hidden" id="start" value="@foreach($timetables as $timetable) {{$timetable["start_time"]}}  @endforeach">
                            <input type="hidden" id="end" value="@foreach($timetables as $timetable)  {{$timetable["end_time"]}}  @endforeach">
                            <input type="hidden" id="date" value=" {{ $date }}">
                            <input type="hidden" id="counselorid" value=" {{ $counselor_id }}">
                            <input type="hidden" id="stime" >
                            <input type="hidden" id="etime" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style= "background-color: #1ABC9C;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" style="text-transform:uppercase; color: white">Confirm</h2>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p class="bo_pb">คุณต้องการเลือกเวลานี้ ใช่หรือไม่ ?</p>
                    <button style="text-align: center;" onclick="saveappointment()"  id="saveBtn" type="button" class="btn btn-success" data-dismiss="modal">ตกลง</button>
                    <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="js/selectTimeTableDate.js"></script>
@stop