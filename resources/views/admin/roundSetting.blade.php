@extends('adminlayout.main')
@section('page_title','Round Setting')
@section('main-content')

    <div class="container">
       
        <div class="row">
            <div>
                <h1>
                 <span class="glyphicon glyphicon-list-alt"></span>
                         จัดการแพ็คเกจ
                </h1>
                <button type="button" class="btn btn-success" style="float: right;" id="addBtn">เพิ่มแพ็คเกจ</button>
            </div>
            <br><br>
                <table id ="testtable" class="table table-hover" style=" height: 100px; overflow: auto;" >
                        <thead class="thead-inverse" s>
                            <tr style="background-color: #F0F8FF;">
                            <th>ชื่อแพ็คเกจ</th>
                            <th style="width: 15%; text-align: center;">วันที่เริ่มการทำแบบทดสอบ</th>
                            <th style="width: 18%; text-align: center;">วันที่สิ้นสุดการทำแบบทดสอบ</th>
                            <th style="width: 15%; text-align: center;">สิ้นสุดแพ็ตเกจ</th>
                            <th style="width: 5%; text-align: center;">แก้ไข</th>
                          </tr>
                        </thead>
                        <tbody  >

                                @foreach ($rounds as $round)
                            <tr> 
                            <td style=" text-align: center;">
                                    {{ $round->name }}
                              </td>
                              <td style=" text-align: center;" >
                                       {{date('Y/m/d', strtotime( $round->start_date)) }}
                              </td>
                             <td style=" text-align: center;" >
                                    {{date('Y/m/d', strtotime( $round->end_date)) }}
                             </td>
                             <td style=" text-align: center;" >
                                      {{date('Y/m/d', strtotime( $round->end_meet_date)) }}
                             </td>
                             <td style=" text-align: center;" >
                                 <a onclick="openedit({{ $round->round_id }},'{{ $round->name }}','{{date('Y/m/d', strtotime( $round->start_date)) }}','{{date('Y/m/d', strtotime( $round->end_date)) }}','{{date('Y/m/d', strtotime( $round->end_meet_date)) }}',{{ $round->company_id }},'{{ $round->description }}')" href="javascript:void(0)">
                                <span class="glyphicon glyphicon-pencil" style="color:blue"></span>
                              </a>
                             </td>
                              </tr>
                              @endforeach

                      </tbody>
                        </table>
       {{ $rounds->links() }}         
        </div>
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style= "background-color: #1ABC9C;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="    color:white; ">แก้ไข ข้อมูลรอบ</h4>
        </div>
        <div class="modal-body">
            
                <div class="form-group">
                    <label for="usr">ชื่อรอบ :</label>
                    <input type="text" class="form-control" id="usr">
                    <label  for="usr"> วันที่เริ่มต้นการทำแบบทดสอบ: </label>
                    <input class="form-control" type="text" id="startDate">
                    <label  for="usr"> วันที่สิ้นสุดการทำแบบทดสอบ: </label>
                    <input class="form-control" type="text" id="endDate">
                    <label  for="usr"> วันที่สิ้นสุดรอบ: </label>
                    <input class="form-control" type="text" id="endMeetDate">
                    <input type="hidden" id="roundId" >
                    <label  for="usr"> บริษัท: </label>
                   <select id="edtcompany" class="form-control" name="lastname" id="lastname" data-parsley-required="true">
                    @foreach ($companys as $company)
                    {
                    <option " value="{{ $company->company_id }}">{{ $company->name }}</option>
                   }
                      @endforeach
                   </select>
                   <label  for="usr"> คำอธิบาย: </label>
                    <input class="form-control" type="text" id="description">
                           
        </div>
        <div class="modal-footer">
            <button style="text-align: center;" onclick="saveeditRound()"  id="saveBtn" type="button" class="btn btn-success" data-dismiss="modal">ตกลง</button>
          <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
      
        </div>
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
          <h4 class="modal-title" style="    color:white; ">แก้ไข ข้อมูลรอบ</h4>
        </div>
        <div class="modal-body">
            
                <div class="form-group">
                    <label for="usr">ชื่อรอบ :</label>
                    <input type="text" class="form-control" id="usrAdd">
                    <label  for="usr1"> วันที่เริ่มต้นการทำแบบทดสอบ: </label>
                    <input class="form-control" type="text" id="startDateAdd" name="startDateAdd">
                    <label  for="usr2"> วันที่สิ้นสุดการทำแบบทดสอบ: </label>
                    <input class="form-control" type="text" id="endDateAdd" name="endDateAdd">
                    <label  for="usr3"> วันที่สิ้นสุดรอบ: </label>
                    <input class="form-control" type="text" id="endMeetDateAdd" name="endMeetDateAdd">
                    <input type="hidden" id="roundId" >
                     <label  for="usr4"> บริษัท: </label>
                     <select id="comid" class="form-control" name="lastname" id="lastname" data-parsley-required="true">
                    @foreach ($companys as $company)
                    {
                    <option value="{{ $company->company_id }}">{{ $company->name }}</option>
                   }
                      @endforeach
                   </select>
                   <label  for="usr"> คำอธิบาย: </label>
                    <input class="form-control" type="text" id="descriptionAdd">

        </div>
        <div class="modal-footer">
            <button style="text-align: center;" onclick="saveRound()"  id="saveBtn" type="button" class="btn btn-success" data-dismiss="modal">ตกลง</button>
          <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
      
        </div>
      </div>
      
    </div>
  </div>
</div>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<script src="js/roundSetting.js"></script>
@stop
