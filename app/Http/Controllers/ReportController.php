<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of ReportController
 *
 * @author Champ
 */
use Faker\DefaultGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use Monolog\Logger as Monolog;
use Illuminate\Log\Writer;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Meeting;
use App\Evaluation;
use App\Employee;
use App\Counselor;
use Input;

class ReportController extends Controller {

    public function report() {
        return view('report.report');
    }

    public function importCounselor() {
        return view('admin.importCounselor');
    }

    public function downloadExcel($type, $company_id) {
        $data = Meeting::join('appointment', 'appointment.appointment_id', '=', 'meeting.appointment_id')
                ->join('evaluation', 'evaluation.eva_id', '=', 'appointment.eva_id')
                ->join('employee', 'employee.employee_id', '=', 'evaluation.employee_id')
                ->join('department', 'department.department_id', '=', 'employee.department_id')
                ->join('company', 'company.company_id', '=', 'department.company_id')
                ->select('company.name as company_name', 'company.package_type', 'company.num_package', 'evaluation.*', 'evaluation.accept_counseling as pre_post_assessment', 'employee.*', 'meeting.*')
                ->where('company.company_id', $company_id)
                ->get()
                ->toArray();

        return Excel::create('Report', function($excel) use ($data) {
                    $excel->sheet('mySheet', function($sheet) use ($data) {
                        $sheet->fromArray($data);
                    });
                })->download($type);
    }

    public function downloadRFIndexExcel($type, $company_id) {
        $data = Evaluation::join('employee', 'employee.employee_id', '=', 'evaluation.employee_id')
                ->join('department', 'department.department_id', '=', 'employee.department_id')
                ->join('company', 'company.company_id', '=', 'department.company_id')
                ->where('company.company_id', $company_id)
                ->get()
                ->toArray();

        return Excel::create('ReportRFIndex', function($excel) use ($data) {
                    $excel->sheet('mySheet', function($sheet) use ($data) {
                        $sheet->fromArray($data);
                    });
                })->download($type);
    }

    public function downloadUserExcel($type) {
        $data = User::join('employee', 'employee.user_id', '=', 'user.user_id')
                ->select('user.username', 'user.password', 'employee.first_name_th', 'employee.last_name_th', 'employee.phone', 'employee.email')
                ->get()
                ->toArray();

        //$data = Counselor::get()->toArray();

        return Excel::create('rf_user', function($excel) use ($data) {
                    $excel->sheet('mySheet', function($sheet) use ($data) {
                        $sheet->fromArray($data);
                    });
                })->download($type);
    }

    public function downloadCounselorExcel($type) {
        $data = User::join('counselor', 'counselor.user_id', '=', 'user.user_id')
                ->select('user.username', 'user.password', 'counselor.*')
                ->get()
                ->toArray();

        return Excel::create('rf_counselor', function($excel) use ($data) {
                    $excel->sheet('mySheet', function($sheet) use ($data) {
                        $sheet->fromArray($data);
                    });
                })->download($type);
    }

    public function importExcel() {
        if (Input::hasFile('import_file')) {
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
                        
                    })->get();
            if (!empty($data) && $data->count()) {
                for ($i = 0; $i < count($data); $i++) {
                    for ($j = 0; $j < count($data[$i]); $j++) {
                        if ($data[$i][$j]->rf_client_code != null && $data[$i][$j]->department != null && $data[$i][$j]->company != null) {
                            $department = DB::table('department')
                                    ->join('company', 'company.company_id', '=', 'department.company_id')
                                    ->where('department.name', $data[$i][$j]->department)
                                    ->where('company.name', $data[$i][$j]->company)
                                    ->get();

                            if (count($department) > 0) {
                                $same_id = DB::table('user')
                                        ->where('username', $data[$i][$j]->rf_client_code)
                                        ->get();
                                if (count($same_id) > 0) {
                                    DB::table('user')
                                            ->where('user_id', $same_id[0]->user_id)
                                            ->update(['department_id' => $department[0]->department_id, 'user_id' => $same_id[0]->user_id, 'rf_client_code' => $data[$i][$j]->rf_client_code, 'employee_code' => $data[$i][$j]->employee_code, 'company_code' => $data[$i][$j]->company_code,
                                                'first_name_th' => $data[$i][$j]->first_name_th, 'last_name_th' => $data[$i][$j]->last_name_th, 'first_name_en' => $data[$i][$j]->first_name_en,
                                                'last_name_en' => $data[$i][$j]->last_name_en, 'gender' => $data[$i][$j]->gender, 'birth_date' => $data[$i][$j]->birth_date,
                                                'age' => 0, 'status' => $data[$i][$j]->status, 'child' => $data[$i][$j]->child,
                                                'email' => $data[$i][$j]->email, 'phone' => $data[$i][$j]->phone, 'unit' => $data[$i][$j]->unit,
                                                'department' => $data[$i][$j]->department, 'company' => $data[$i][$j]->company, 'division' => $data[$i][$j]->division, 'branch' => $data[$i][$j]->branch,
                                                'start_date' => $data[$i][$j]->start_date, 'performance_grade' => $data[$i][$j]->performance_grade, 'manager_name' => $data[$i][$j]->manager_name,
                                                'manager_position' => $data[$i][$j]->manager_position, 'sick_leave' => $data[$i][$j]->sick_leave, 'personal_leave' => $data[$i][$j]->personal_leave,
                                                'emergency_contact' => $data[$i][$j]->emergency_contact, 'target' => $data[$i][$j]->target, 'first_accept' => "",
                                                'create_by' => $data[$i][$j]->create_by, 'last_update_by' => $data[$i][$j]->last_update_by]);
                                } else {
                                    $random_password = str_random(8);
                                    $id = DB::table('user')->insertGetId(['username' => $data[$i][$j]->rf_client_code, 'password' => $random_password,
                                        'role' => 'E', 'level' => 1, 'create_by' => 'admin', 'last_update_by' => 'admin']);
                                    $insert[] = ['department_id' => $department[0]->department_id, 'user_id' => $id, 'rf_client_code' => $data[$i][$j]->rf_client_code, 'employee_code' => $data[$i][$j]->employee_code, 'company_code' => $data[$i][$j]->company_code,
                                        'first_name_th' => $data[$i][$j]->first_name_th, 'last_name_th' => $data[$i][$j]->last_name_th, 'first_name_en' => $data[$i][$j]->first_name_en,
                                        'last_name_en' => $data[$i][$j]->last_name_en, 'gender' => $data[$i][$j]->gender, 'birth_date' => $data[$i][$j]->birth_date,
                                        'age' => 0, 'status' => $data[$i][$j]->status, 'child' => $data[$i][$j]->child,
                                        'email' => $data[$i][$j]->email, 'phone' => $data[$i][$j]->phone, 'unit' => $data[$i][$j]->unit,
                                        'department' => $data[$i][$j]->department, 'company' => $data[$i][$j]->company, 'division' => $data[$i][$j]->division, 'branch' => $data[$i][$j]->branch,
                                        'start_date' => $data[$i][$j]->start_date, 'performance_grade' => $data[$i][$j]->performance_grade, 'manager_name' => $data[$i][$j]->manager_name,
                                        'manager_position' => $data[$i][$j]->manager_position, 'sick_leave' => $data[$i][$j]->sick_leave, 'personal_leave' => $data[$i][$j]->personal_leave,
                                        'emergency_contact' => $data[$i][$j]->emergency_contact, 'target' => $data[$i][$j]->target, 'first_accept' => "",
                                        'create_by' => $data[$i][$j]->create_by, 'last_update_by' => $data[$i][$j]->last_update_by];
                                }
                            } else {
                                return dd('company or department not match');
                            }
                        } else {
                            //return dd('please put company and department');
                        }
                    }
                }
                if (!empty($insert)) {
                    DB::table('employee')->insert($insert);
                }
                return dd('บันทึกข้อมูลเรียบร้อย');
            }
            return response($data[0][0]);
        }
    }

    public function importCounselorExcel() {
        if (Input::hasFile('import_counselor_file')) {
            $path = Input::file('import_counselor_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
                        
                    })->get();
            $arrayTest = array();
            if (!empty($data) && $data->count()) {
                for ($i = 0; $i < count($data); $i++) {
                    for ($j = 0; $j < count($data[$i]); $j++) {
                        if ($data[$i][$j]->rf_id != null) {
                            if ($data[$i][$j]->rf_id != null && $data[$i][$j]->first_name_th != "" && $data[$i][$j]->last_name_th != "" && $data[$i][$j]->first_name_en != "" &&
                                    $data[$i][$j]->last_name_en != "" && $data[$i][$j]->images_name != "" && $data[$i][$j]->gender != "" && $data[$i][$j]->birth_date != "" &&
                                    $data[$i][$j]->status != "" && $data[$i][$j]->email != "" && $data[$i][$j]->phone != "" && $data[$i][$j]->job_position != "" && $data[$i][$j]->education != "" &&
                                    $data[$i][$j]->training != "" && $data[$i][$j]->about_me != "" && $data[$i][$j]->topic != "" && $data[$i][$j]->rf_about != "" &&
                                    $data[$i][$j]->create_by != "" && $data[$i][$j]->last_update_by != "") {
                                $same_id = DB::table('user')
                                        ->where('username', $data[$i][$j]->rf_id)
                                        ->get();
                                if (count($same_id) > 0) {
                                    DB::table('counselor')
                                            ->where('user_id', $same_id[0]->user_id)
                                            ->update(['rf_id' => $data[$i][$j]->rf_id, 'user_id' => $same_id[0]->user_id,
                                                'first_name_th' => $data[$i][$j]->first_name_th, 'last_name_th' => $data[$i][$j]->last_name_th, 'first_name_en' => $data[$i][$j]->first_name_en,
                                                'last_name_en' => $data[$i][$j]->last_name_en, 'images_name' => $data[$i][$j]->images_name, 'gender' => $data[$i][$j]->gender,
                                                'age' => 0, 'birth_date' => $data[$i][$j]->birth_date, 'status' => $data[$i][$j]->status,
                                                'email' => $data[$i][$j]->email, 'phone' => $data[$i][$j]->phone, 'job_position' => $data[$i][$j]->job_position,
                                                'education' => $data[$i][$j]->education, 'experience' => $data[$i][$j]->experience, 'training' => $data[$i][$j]->training, 'about_me' => $data[$i][$j]->about_me,
                                                'topic' => $data[$i][$j]->topic, 'rf_about' => $data[$i][$j]->rf_about,
                                                'create_by' => $data[$i][$j]->create_by, 'last_update_by' => $data[$i][$j]->last_update_by]);
                                } else {
                                    $random_password = str_random(8);
                                    $id = DB::table('user')->insertGetId(['username' => $data[$i][$j]->rf_id, 'password' => $random_password,
                                        'role' => 'C', 'level' => 1, 'create_by' => 'admin', 'last_update_by' => 'admin']);

                                    $insert[] = ['rf_id' => $data[$i][$j]->rf_id, 'user_id' => $id,
                                        'first_name_th' => $data[$i][$j]->first_name_th, 'last_name_th' => $data[$i][$j]->last_name_th, 'first_name_en' => $data[$i][$j]->first_name_en,
                                        'last_name_en' => $data[$i][$j]->last_name_en, 'images_name' => $data[$i][$j]->images_name, 'gender' => $data[$i][$j]->gender,
                                        'age' => 0, 'birth_date' => $data[$i][$j]->birth_date, 'status' => $data[$i][$j]->status,
                                        'email' => $data[$i][$j]->email, 'phone' => $data[$i][$j]->phone, 'job_position' => $data[$i][$j]->job_position,
                                        'education' => $data[$i][$j]->education, 'experience' => $data[$i][$j]->experience, 'training' => $data[$i][$j]->training, 'about_me' => $data[$i][$j]->about_me,
                                        'topic' => $data[$i][$j]->topic, 'rf_about' => $data[$i][$j]->rf_about,
                                        'create_by' => $data[$i][$j]->create_by, 'last_update_by' => $data[$i][$j]->last_update_by];
                                }
                            } else {
                                DB::table('user')
                                        ->where('role', 'C')
                                        ->delete();
                                //return dd($insert);
                                return dd('คุณกรอกข้อมูลไม่ครบ !');
                            }
                        } // check ไม่เอา array ที่มันว่าง
                    }
                }
                if (!empty($insert)) {
                    DB::table('counselor')->insert($insert);
                    return dd('บันทึกเรียบร้อย');
                }

                return dd('อัพเดตเรียบร้อย');
            }
            return response($data);
        } else {
            dd('No file chosen');
        }
    }

    public function importCounselorImages(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $path = $request->image->getClientOriginalName();
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('images/profile', $path);
        return back()
                        ->with('success', 'Image Uploaded successfully.')
                        ->with('path', $path);
    }

}

//            if (!empty($data) && $data->count()) {
//                for ($i = 0; $i < count($data); $i++) {
//                    for ($j = 0; $j < count($data[$i]); $j++) {
//
//                        $random_password = str_random(8');
////                        $genUser[] = ['username' => $data[$i][$j]->employee_code, 'password => $hashed_random_password,
////                            'role' => 'E', 'level' => 1, 'create_by' => 'admin', 'last_update_by' => 'admin'];
//                        $id = DB::table('user')->insertGetId(['username' => $data[$i][$j]->employee_code, 'password' => $random_password,
//                            'role' => 'E', 'level' => 1, 'create_by' => 'admin', 'last_update_by' => 'admin']);
//                        $insert[] = ['department_id' => $data[$i][$j]->department_id, 'user_id' => $id, 'employee_code' => $data[$i][$j]->employee_code,
//                            'first_name_th' => $data[$i][$j]->first_name_th, 'last_name_th' => $data[$i][$j]->last_name_th, 'first_name_en' => $data[$i][$j]->first_name_en,
//                            'last_name_en' => $data[$i][$j]->last_name_en, 'gender' => $data[$i][$j]->gender, 'birth_date' => $data[$i][$j]->birth_date,
//                            'age' => $data[$i][$j]->age, 'status' => $data[$i][$j]->status, 'child' => $data[$i][$j]->child,
//                            'email' => $data[$i][$j]->email, 'phone' => $data[$i][$j]->phone, 'unit' => $data[$i][$j]->unit,
//                            'department' => $data[$i][$j]->department, 'division' => $data[$i][$j]->division, 'branch' => $data[$i][$j]->branch,
//                            'start_date' => $data[$i][$j]->start_date, 'performance_grade' => $data[$i][$j]->performance_grade, 'manager_name' => $data[$i][$j]->manager_name,
//                            'manager_position' => $data[$i][$j]->manager_position, 'sick_leave' => $data[$i][$j]->sick_leave, 'personal_leave' => $data[$i][$j]->personal_leave,
//                            'emergency_contact' => $data[$i][$j]->emergency_contact, 'target' => $data[$i][$j]->target, 'first_accept' => $data[$i][$j]->first_accept,
//                            'create_by' => $data[$i][$j]->create_by, 'last_update_by' => $data[$i][$j]->last_update_by];
//                    }
//                }
//                if (!empty($insert)) {
//                    DB::table('items')->insert($insert);
//                    dd('Insert Record successfully.');
//                }
//            }


//if ($data[$i]->rf_client_code != null && $data[$i]->department != null && $data[$i]->company != null) {
//                            $department = DB::table('department')
//                                    ->where('name', $data[$i][$j]->department)
//                                    ->get();
//                            $company = DB::table('company')
//                                    ->whrer('name', $data[$i]->company)
//                                    ->get();
//
//                            if (count($department) > 0 && count($company) > 0) {
//                                $random_password = str_random(8);
//                                $id = DB::table('user')->insertGetId(['username' => $data[$i]->rf_client_code, 'password' => $random_password,
//                                    'role' => 'E', 'level' => 1, 'create_by' => 'admin', 'last_update_by' => 'admin']);
//                                $insert[] = ['department_id' => $department[0]->department_id, 'user_id' => $id, 'rf_client_code' => $data[$i]->rf_client_code, 'employee_code' => $data[$i]->employee_code, 'company_code' => $data[$i]->company_code,
//                                    'first_name_th' => $data[$i]->first_name_th, 'last_name_th' => $data[$i]->last_name_th, 'first_name_en' => $data[$i]->first_name_en,
//                                    'last_name_en' => $data[$i]->last_name_en, 'gender' => $data[$i]->gender, 'birth_date' => $data[$i]->birth_date,
//                                    'age' => $data[$i]->age, 'status' => $data[$i]->status, 'child' => $data[$i]->child,
//                                    'email' => $data[$i]->email, 'phone' => $data[$i]->phone, 'unit' => $data[$i]->unit,
//                                    'department' => $data[$i]->department, 'company' => $data[$i]->company, 'division' => $data[$i]->division, 'branch' => $data[$i]->branch,
//                                    'start_date' => $data[$i]->start_date, 'performance_grade' => $data[$i]->performance_grade, 'manager_name' => $data[$i]->manager_name,
//                                    'manager_position' => $data[$i]->manager_position, 'sick_leave' => $data[$i]->sick_leave, 'personal_leave' => $data[$i]->personal_leave,
//                                    'emergency_contact' => $data[$i]->emergency_contact, 'target' => $data[$i]->target, 'first_accept' => "",
//                                    'create_by' => $data[$i]->create_by, 'last_update_by' => $data[$i]->last_update_by];
//                            } else {
//                                return dd('company or department not match');
//                            }
//                        } else {
//                            return dd('please put company and department');
//                        }
