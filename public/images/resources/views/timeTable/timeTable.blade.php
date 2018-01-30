@extends('layout.main')
@section('page_title','Time Table')
@section('main-content')
<section class="go_pt go_pb img-none">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section-title text-center">
                <h1 class="title"><span>Time</span> Table</h1>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <button id="btn_previous" class="btn btn-warning"><i class="fa fa-arrow-left"></i></button>
                    </div>
                    <div class="col-md-4 text-center">
                        <h2 class="color-gray" id="month"></h2>
                        <input type="hidden" id="monthi" value="0">
                        <input type="hidden" id="yeari" value="0">
                    </div>
                    <div class="col-md-4">
                        <button id="btn_next" class="btn btn-warning pull-right"><i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="check-select" data-toggle="buttons">
                            <table class="table table-striped text-center table-fixed">
                                <thead class="time-head">
                                    <tr>
                                        <th>
                                            วัน / เวลา
                                        </th>
                                        <th>
                                            วันจันทร์ <br>
                                            <label style="font-weight:bold" id="d1"></label>
                                            <input type="hidden" id="di1" value="0">
                                        </th>
                                        <th>
                                            วันอังคาร <br>
                                            <label style="font-weight:bold" id="d2"></label>
                                            <input type="hidden" id="di2" value="0">
                                        </th>
                                        <th>
                                            วันพุธ <br>
                                            <label style="font-weight:bold" id="d3"></label>
                                            <input type="hidden" id="di3" value="0">
                                        </th>
                                        <th>
                                            วันพฤหัส <br>
                                            <label style="font-weight:bold" id="d4"></label>
                                            <input type="hidden" id="di4" value="0">
                                        </th>
                                        <th>
                                            วันศุกร์ <br>
                                            <label style="font-weight:bold" id="d5"></label>
                                            <input type="hidden" id="di5" value="0">
                                        </th>
                                        <th>
                                            วันเสาร์ <br>
                                            <label style="font-weight:bold" id="d6"></label>
                                            <input type="hidden" id="di6" value="0">
                                        </th>
                                        <th>
                                            วันอาทิตย์ <br>
                                            <label style="font-weight:bold" id="d7"></label>
                                            <input type="hidden" id="di7" value="0">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="time-table" style="height: 400px;">
                                    <tr>
                                        <td>
                                            00:00 - 01:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_00_01" value="0" /><span> เลือก</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_00_01" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_00_01" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_00_01" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_00_01" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_00_01" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_00_01" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            01:00 - 02:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_01_02" value="0" /><span> เลือก</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_01_02" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_01_02" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_01_02" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_01_02" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_01_02" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_01_02" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            02:00 - 03:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_02_03" value="0" /><span> เลือก</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_02_03" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_02_03" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_02_03" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_02_03" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_02_03" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_02_03" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            03:00 - 04:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_03_04" value="0" /><span> เลือก</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_03_04" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_03_04" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_03_04" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_03_04" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_03_04" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_03_04" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            04:00 - 05:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_04_05" value="0" /><span> เลือก</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_04_05" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_04_05" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_04_05" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_04_05" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_04_05" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_04_05" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            05:00 - 06:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_05_06" value="0" /><span> เลือก</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_05_06" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_05_06" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_05_06" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_05_06" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_05_06" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_05_06" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            06:00 - 07:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_06_07" value="0" /><span> เลือก</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_06_07" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_06_07" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_06_07" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_06_07" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_06_07" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_06_07" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            07:00 - 08:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_07_08" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_07_08" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_07_08" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_07_08" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_07_08" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_07_08" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_07_08" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            08:00 - 09:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_08_09" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_08_09" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_08_09" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_08_09" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_08_09" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_08_09" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_08_09" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            09:00 - 10:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_09_10" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_09_10" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_09_10" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_09_10" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_09_10" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_09_10" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_09_10" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            10:00 - 11:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_10_11" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_10_11" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_10_11" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_10_11" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_10_11" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_10_11" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_10_11" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            11:00 - 12:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_11_12" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_11_12" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_11_12" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_11_12" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_11_12" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_11_12" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_11_12" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            12:00 - 13:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_12_13" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_12_13" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_12_13" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_12_13" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_12_13" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_12_13" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_12_13" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            13:00 - 14:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_13_14" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_13_14" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_13_14" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_13_14" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_13_14" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_13_14" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_13_14" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            14:00 - 15:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_14_15" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_14_15" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_14_15" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_14_15" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_14_15" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_14_15" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_14_15" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            15:00 - 16:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_15_16" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_15_16" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_15_16" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_15_16" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_15_16" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_15_16" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_15_16" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            16:00 - 17:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_16_17" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_16_17" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_16_17" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_16_17" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_16_17" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_16_17" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_16_17" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            17:00 - 18:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_17_18" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_17_18" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_17_18" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_17_18" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_17_18" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_17_18" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_17_18" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            18:00 - 19:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_18_19" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_18_19" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_18_19" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_18_19" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_18_19" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_18_19" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_18_19" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            19:00 - 20:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_19_20" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_19_20" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_19_20" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_19_20" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_19_20" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_19_20" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_19_20" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            20:00 - 21:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_20_21" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_20_21" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_20_21" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_20_21" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_20_21" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_20_21" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_20_21" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            21:00 - 22:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_21_22" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_21_22" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_21_22" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_21_22" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_21_22" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_21_22" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_21_22" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            22:00 - 23:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_22_23" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_22_23" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_22_23" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_22_23" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_22_23" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_22_23" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_22_23" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            23:00 - 00:00 น.
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="1_23_00" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="2_23_00" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="3_23_00" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="4_23_00" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="5_23_00" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="6_23_00" value="0" /><span> เลือก</span></label>
                                        </td>
                                        <td>
                                            <label for="timebox" class="btn btn-success-time btn-lg">
                                                <input type="checkbox" class="timebox" name="timebox" id="7_23_00" value="0" /><span> เลือก</span></label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/timeTable.js"></script>
@stop