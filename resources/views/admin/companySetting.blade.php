@extends('adminlayout.main')
@section('page_title','Company Setting')
@section('main-content')

<div class="container">

    <div class="row">
        <div>
            <h1>
                <span class="glyphicon glyphicon-list-alt"></span>
                จัดการบริษัท
            </h1>
            <div class="col-lg-6">
                <div class="input-group">
                    <input id="textSearch" type="text" class="form-control" placeholder="ค้นหาจากชื่อ.">
                    <span class="input-group-btn">
                        <button id="textSearchBtn" class="btn btn-secondary" type="button">Go!</button>
                    </span>
                </div>
            </div>
            <button type="button" class="btn btn-success" style="float: right;" id="addBtn">เพิ่มบริษัท</button>
        </div>
        <br><br>
        <table id ="testtable" class="table table-hover" style=" height: 100px; overflow: auto;" >
            <thead class="thead-inverse" s>
                <tr style="background-color: #F0F8FF;">
                    <th>ชื่อบริษัท</th>
                    <th style="width: 10%; text-align: center;">ประเภทแพ็คเกจ</th>
                    <th style="width: 10%; text-align: center;">จำนวนครั้ง</th>
                    <th style="width: 5%; text-align: center;">แก้ไข</th>
                    <th style="width: 5%; text-align: center;">ลบ</th>
                    <th style="width: 10%; text-align: center;">จัดการแผนก</th>
                    <th style="width: 10%; text-align: center;">ส่งอีเมล User</th>
                </tr>
            </thead>
            <tbody  >

                @foreach ($companys as $company)
                <tr>  
                    <td style=" text-align: center;">
                        {{ $company->name }}
                    </td>
                    <td style=" text-align: center;">
                        {{ $company->package_type }}
                    </td>
                    <td style=" text-align: center;">
                        {{ $company->num_package }}
                    </td>
                    <td style=" text-align: center;" >
                        <a onclick="openedit({{ $company->company_id }},'{{ $company->name }}','{{ $company->package_type }}','{{ $company->num_package }}')" href="javascript:void(0)">
                            <span class="glyphicon glyphicon-pencil" style="color:blue"></span>
                        </a>
                    </td>
                    <td style=" text-align: center;">
                        <a href="javascript:void(0)" onclick="openconfirm({{ $company->company_id }},'{{ $company->name }}')">
                            <span class="glyphicon glyphicon-minus" style="color:red"></span>
                        </a>
                    </td>
                    <td style="width: 5%; text-align: center;">
                        <a onclick="searchDepartment( {{ $company->company_id }})" href="javascript:void(0)">
                            <span class="glyphicon glyphicon-edit" style="color:orange"></span>
                        </a>
                    </td>
                    <td style="width: 5%; text-align: center;">
                        <a onclick="sendEmailToUser( {{ $company->company_id }})" href="javascript:void(0)">
                            <span class="glyphicon glyphicon-send" style="color:green"></span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companys->links() }}         
        <input type="hidden" id="comid">
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
                <button style="text-align: center;" onclick="deleteCompany()"  id="saveBtn" type="button" class="btn btn-success" data-dismiss="modal">ตกลง</button>
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
                <h4 class="modal-title" style="color:white; ">แก้ไข ข้อมูลบริษัท</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="usr">บริษัท :</label>
                    <input type="text" class="form-control" id="usr">
                    <input type="hidden" class="form-control" id="comppid">
                </div>
                <div class="form-group">
                    <label for="package">ประเภทแพ็คเกจ :</label>
                    <select type="text" class="form-control counseling-select" id="package_edit">
                        <option value="">-- กรุณาเลือก --</option>
                        <option value="FULL">FULL</option>
                        <option value="RF">RF</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="num_package">จำนวนครั้ง :</label>
                    <input type="text" class="form-control" id="num_package_edit">
                </div>
            </div>
            <div class="modal-footer">
                <button style="text-align: center;" onclick="saveedit()"  id="saveBtn" type="button" class="btn btn-success" data-dismiss="modal">ตกลง</button>
                <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>

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
                <h4 class="modal-title" style="    color:white; ">เพิ่ม  ข้อมูลบริษัท</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="usr1">บริษัท :</label>
                    <input type="text" class="form-control" id="usr1">
                    <input type="hidden" class="form-control" id="comppid">
                </div>
                <div class="form-group">
                    <label for="package">ประเภทแพ็คเกจ :</label>
                    <select type="text" class="form-control counseling-select" id="package_add">
                        <option value="">-- กรุณาเลือก --</option>
                        <option value="FULL">FULL</option>
                        <option value="RF">RF</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="num_package">จำนวนครั้ง :</label>
                    <input type="text" class="form-control" id="num_package_add">
                </div>
            </div>
            <div class="modal-footer">
                <button style="text-align: center;" onclick="saveadd()"  id="saveBtn" type="button" class="btn btn-success" data-dismiss="modal">ตกลง</button>
                <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>

            </div>
        </div>

    </div>
</div>


<script src="js/companySetting.js"></script>
@stop
