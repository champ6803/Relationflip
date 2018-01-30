@extends('adminlayout.main')
@section('page_title','Counselor Setting')
@section('main-content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>
                <span class="glyphicon glyphicon-list-alt"></span>
                Counselor Setting
            </h1>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-6">
            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" class="form-horizontal" action="{{ URL::to('importCounselorExcel') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <div class="row">
                    <label class="control-label col-md-3" for="import_counselor_file"><i class="fa fa-table"></i> Excel File</label>
                    <div class="col-md-4">
                        <input style="font-size: 14px;" id="import_counselor_file" type="file" name="import_counselor_file" />
                    </div>
                    <button class="btn btn-primary col-md-3"><i class="fa fa-cloud-upload"></i> Import File</button>
                </div>
            </form>
        </div>
    </div>
<!--    <div class="row">
        <div class="col-md-6">
            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" class="form-horizontal" action="{{ URL::to('importCounselorExcel2') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <div class="form-group">
                    <label class="control-label col-md-3" for="import_counselor_file"><i class="fa fa-picture-o"></i> Images File</label>
                    <div class="col-md-6">
                        <input style="font-size: 14px;" id="import_counselor_image" type="file" name="import_counselor_image" />
                    </div>
                    <button class="btn btn-primary col-md-3"><i class="fa fa-cloud-upload"></i> Import File</button>
                </div>
            </form>
        </div>
    </div>-->
</div>

<script src="js/companySetting.js"></script>
@stop
