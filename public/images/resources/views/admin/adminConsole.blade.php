@extends('adminlayout.main')
@section('page_title','Admin Console')
@section('main-content')

<section class="go_pt go_pb">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-home fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 160%;">จัดการบริษัท</div>
                            </div>
                        </div>
                    </div>
                    <a id="companyBtn" href="javascript:void(0)">
                        <div class="panel-footer">
                            <span class="pull-left">จัดการ</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3"> 
                                <i class="fa fa-dot-circle-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 160%;">จัดการแพ็คเกจ</div>
                            </div>
                        </div>
                    </div>
                    <a id="roundBtn" href="javascript:void(0)">
                        <div class="panel-footer">
                            <span class="pull-left"  >จัดการ</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-upload fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 160%;">Import Client</div>
                            </div>
                        </div>
                    </div>
                    <form style="background-color: #f5f5f5; padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <div class="row">
                            <div class="col-xs-8">
                                <input style="font-size: 14px;" id="import_file" type="file" name="import_file" />
                            </div>

                            <div class="col-xs-3">
                                <button class="btn btn-primary">Import File</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-upload fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 160%;">Import Counselor</div>
                            </div>
                        </div>
                    </div>
                    <form style="background-color: #f5f5f5; padding: 10px;" action="{{ URL::to('importCounselorExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <div class="row">
                            <div class="col-xs-8">
                                <input style="font-size: 14px;" id="import_counselor_file" type="file" name="import_counselor_file" />
                            </div>
                            <div class="col-xs-3">
                                <button class="btn btn-primary">Import File</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-picture-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 160%;">Import Images</div>
                            </div>
                        </div>
                    </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                        <img src="/images/profile/{{ Session::get('path') }}">
                    </div>
                    @endif
                    
                    <form style="background-color: #f5f5f5; padding: 10px;" action="{{ URL::to('importCounselorImages') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <div class="row">
                            <div class="col-xs-8">
                                <input style="font-size: 14px;" id="image" type="file" name="image" />
                            </div>
                            <div class="col-xs-3">
                                <button class="btn btn-primary">Import File</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-newspaper-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 160%;">Download RF Index</div>
                            </div>
                        </div>
                    </div>
                    <span>
                        <div class="panel-footer">
                            <span class="pull-left">บริษัท</span>
                            &nbsp;
                            <select id="sel_com_rf" class="sel_company">
                            </select>
                            <a id="btn_load_rf" href="javascript:void(0)" class="pull-right"><i class="fa fa-arrow-circle-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-newspaper-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 160%;">Download เอกสาร</div>
                            </div>
                        </div>
                    </div>
                    <span>
                        <div class="panel-footer">
                            <span class="pull-left">บริษัท</span>
                            &nbsp;
                            <select id="sel_com_all" class="sel_company">
                            </select>
                            <a id="btn_load_all" href="javascript:void(0)" class="pull-right"><i class="fa fa-arrow-circle-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </span>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 160%;">Download User</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ URL::to('downloadUserExcel/xlsx') }}">
                        <div class="panel-footer">
                            <span class="pull-left">ดาวน์โหลด</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 160%;">Download Counselor</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ URL::to('downloadCounselorExcel/xlsx') }}">
                        <div class="panel-footer">
                            <span class="pull-left">ดาวน์โหลด</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="imageModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style= "background-color: #1ABC9C;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" style="text-transform:uppercase; color: white">Confirm</h2>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    
                    <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/adminConsole.js"></script>
@stop
