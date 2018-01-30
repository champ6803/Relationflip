@extends('adminlayout.main')
@section('page_title','Department Setting')
@section('main-content')

<div class="container">

    <div class="row">
        <div>
            <h1>
                <span class="glyphicon glyphicon-list-alt"></span>
                จัดการแผนก ของ บริษัท
            </h1>
            <div class="col-lg-6">
                <div class="input-group">
                    <input id="textSearch" type="text" class="form-control" placeholder="ค้นหาจากชื่อ.">
                    <span class="input-group-btn">
                        <button id="textSearchBtn" class="btn btn-secondary" type="button">Go!</button>
                    </span>
                </div>
            </div>
            <button type="button" class="btn btn-success" style="float: right;" id="addBtn">เพิ่มแผนก</button>
        </div>
        <br><br>
        <table id ="testtable" class="table table-hover" style=" height: 100px; overflow: auto;" >
            <thead class="thead-inverse" s>
                <tr style="background-color: #F0F8FF;">
                    <th>ชื่อแผนก</th>
                    <th style="width: 5%; text-align: center;">แก้ไข</th>
                    <th style="width: 5%; text-align: center;">ลบ</th>
                    <th style="width: 5%; text-align: center;">พนักงาน</th>
                </tr>
            </thead>
            <tbody  >

                @foreach ($departments as $department)
                <tr>
                    <td style=" text-align: center;">
                        {{ $department->name }}
                    </td>
                    <td style=" text-align: center;" >
                        <a onclick="openedit({{ $department->department_id }},'{{ $department->name }}')" href="javascript:void(0)">
                            <span class="glyphicon glyphicon-pencil" style="color:blue"></span>
                        </a>
                    </td>
                    <td style=" text-align: center;">
                        <a href="javascript:void(0)" onclick="openconfirm({{ $department->department_id }},'{{ $department->name }}')">
                            <span class="glyphicon glyphicon-minus" style="color:red"></span>
                        </a>
                    </td>
                    <td style=" text-align: center;">
                        <a href="javascript:void(0)" onclick="searchEmployee({{ $department->department_id }},'{{ $department->name }}')">
                            <span class="glyphicon glyphicon-user" style="color:green"></span>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{ $departments->links() }}         
        <input type="hidden" id="comid" value=" {{ $companys }}">

        <input type="hidden" id="depiddel">
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style= "background-color: #1ABC9C;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="    color:white; ">โปรดยืนยัน</h4>
            </div>
            <div class="modal-body">
                <p id="demo"></p>
            </div>
            <div class="modal-footer">
                <button style="text-align: center;" onclick="deleteDepartment()"  id="saveBtn" type="button" class="btn btn-success" data-dismiss="modal">ตกลง</button>
                <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style= "background-color: #1ABC9C;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="    color:white; ">แก้ไข ข้อมูลแผนก</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="usr">แผนก :</label>
                    <input type="text" class="form-control" id="usr">
                    <input type="hidden" class="form-control" id="depid">
                </div>  
            </div>
            <div class="modal-footer">
                <button style="text-align: center;" onclick="saveedit()"  id="saveBtn" type="button" class="btn btn-success" data-dismiss="modal">ตกลง</button>
                <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>

            </div>
        </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style= "background-color: #1ABC9C;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="    color:white; ">เพิ่ม  ข้อมูลแผนก</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="usr1">แผนก :</label>
                    <input type="text" class="form-control" id="usr1">
                    <input type="hidden" class="form-control" id="depid">
                </div>  
            </div>
            <div class="modal-footer">
                <button style="text-align: center;" onclick="savedepartment()"  id="saveBtn" type="button" class="btn btn-success" data-dismiss="modal">ตกลง</button>
                <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>

            </div>
        </div>

    </div>
</div>


<script src="js/departmentSetting.js"></script>
@stop
