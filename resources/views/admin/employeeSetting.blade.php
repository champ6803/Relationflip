@extends('adminlayout.main')
@section('page_title','Department Setting')
@section('main-content')

<div class="container">

    <div class="row">
        <div>
            <h1>
                <span class="glyphicon glyphicon-list-alt"></span>
                พนักงาน ของ แผนก {{ $depname }}
            </h1>
        </div>
        <br><br>
        <table id ="testtable" class="table table-hover" style=" height: 100px; overflow: auto;" >
            <thead class="thead-inverse">
                <tr style="background-color: #F0F8FF;">
                    <th style="width: 10%; text-align: center;">รหัส</th>
                    <th style="width: 10%; text-align: center;">ชื่อ</th>
                    <th style="width: 10%;text-align: center;">นามสกุล</th>
                    <th style="width: 5%; text-align: center;">ตำแหน่ง</th>
                    <th style="width: 5%; text-align: center;">เบอร์โทร</th>
                    <th style="width: 5%; text-align: center;">ส่ง Email</th>
                </tr>
            </thead>
            @foreach ($employees as $employee)
            <tr>  
                <td style=" text-align: center;">
                    {{ $employee->rf_client_code }}
                </td>
                <td style=" text-align: center;" >
                    {{ $employee->first_name_th }}
                </td>
                <td style=" text-align: center;">
                    {{ $employee->last_name_th }}
                </td>
                <td style=" text-align: center;">
                    {{ $employee->unit }}
                </td>
                <td style=" text-align: center;">
                    {{ $employee->phone }}
                </td>
                <td style=" text-align: center;">
                    <a onclick="sendEmailToUser( {{ $employee->employee_id }})" href="javascript:void(0)">
                        <span class="glyphicon glyphicon-send" style="color:green"></span>
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        {{ $employees->links() }}         

    </div>
</div>



<script src="js/departmentSetting.js"></script>
@stop
