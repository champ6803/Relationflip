<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\Mail;
use App\Order;
use App\Mail\SendMail;
use Illuminate\Console\Command;
use \Carbon\Carbon;

class MailController extends Controller {

    function contactUs() {
        try {
            $name = request()->get('name');
            $email = request()->get('email');
            $phone = request()->get('phone');
            $msg = request()->get('msg');

            Mail::send('template/email/mailContactUs', ['name' => $name, 'email' => $email, 'phone' => $phone, 'msg' => $msg], function ($m) {
                $m->to('support@relationflip.com', 'Relationflip')->subject('ContactUs');
                $m->from('support@relationflip.com', 'Systems');
            });
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json(array('msg' => 'successfully'));
    }

    function mailResultAssessment() {
        try {
            Mail::send('template/email/mailResultAssessment', ['link' => 'http://www.relationflip.com/login'], function ($m) {
                $employee_id = request()->get('employee_id');
                $employee = DB::table('employee')
                        ->where(['employee_id' => $employee_id])
                        ->select('email', 'first_name_th')
                        ->get();
                $m->to($employee[0]->email, 'คุณ ' . $employee[0]->first_name_th)->subject('ผลแบบประเมิน RF Index Assessment');
                $m->from('support@relationflip.com', 'Relationflip');
            });
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json('successfully');
    }

    function mailConsent() {
        try {
            $employee_id = request()->get('employee_id');
            $employee = DB::table('employee')
                    ->where(['employee_id' => $employee_id])
                    ->select('email', 'first_name_th')
                    ->get();
            Mail::send('template/email/mailConsent', ['link' => 'http://www.relationflip.com/resultConsent?id=' . $employee_id], function ($m) use ($employee) {
                $m->to($employee[0]->email, 'คุณ ' . $employee[0]->first_name_th)->subject('เอกสารรับทราบเงื่อนไขการรับบริการการปรึกษากับ RF Analytical Counselor');
                $m->from('support@relationflip.com', 'Relationflip');
            });
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json('successfully');
    }

    function mailCounselorConfirm() {
        try {
            $employee_id = request()->get('employee_id');
            $counselor_id = request()->get('counselor_id');
            $employee = DB::table('employee')
                    ->where(['employee_id' => $employee_id])
                    ->select('email', 'first_name_th', 'rf_client_code')
                    ->get();
            $counselor = DB::table('counselor')
                    ->where(['counselor_id' => $counselor_id])
                    ->select('email', 'first_name_th', 'rf_id')
                    ->get();
            Mail::send('template/email/mailCounselorConfirm', ['link' => 'http://www.relationflip.com/login', 'c_user' => $counselor[0]->rf_id, 'e_user' => $employee[0]->rf_client_code], function ($m) use ($employee, $counselor) {
                $m->to($counselor[0]->email, 'คุณ ' . $counselor[0]->first_name_th)->subject('ยืนยันการรับบริการการปรึกษาจากคุณ รหัส' . $employee[0]->rf_client_code);
                $m->from('support@relationflip.com', 'Relationflip');
            });
            Mail::send('template/email/mailCounselorConfirm', ['link' => 'http://www.relationflip.com/login', 'c_user' => $counselor[0]->rf_id, 'e_user' => $employee[0]->rf_client_code], function ($m) use ($counselor, $employee) {
                $m->to('support@relationflip.com', 'Relationflip')->subject('ยืนยันการรับบริการการปรึกษาจากคุณ รหัส' . $employee[0]->rf_client_code);
                $m->from($counselor[0]->email, 'คุณ ' . $counselor[0]->first_name_th);
            });
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json('successfully');
    }

    function mailMeetingConfirm() {
        try {
            $employee_id = request()->get('employee_id');
            $start_time = request()->get('start_time');
            $end_time = request()->get('end_time');

            $employee = DB::table('employee')
                    ->where(['employee_id' => $employee_id])
                    ->select('email', 'first_name_th', 'rf_client_code')
                    ->get();
            Mail::send('template/email/mailMeetingConfirm', ['e_user' => $employee[0]->rf_client_code], function ($m) use ($employee) {
                $m->to($employee[0]->email, 'คุณ ' . $employee[0]->first_name_th)->subject('เเจ้งยืนยันวัน-เวลาในการรับบริการการปรึกษากับ RF Analytical Counselor');
                $m->from('support@relationflip.com', 'Relationflip');
            });
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json('successfully');
    }

    function mailMeetingReport() {
        try {
            $employee_id = request()->get('employee_id');

            $employee = DB::table('employee')
                    ->where(['employee_id' => $employee_id])
                    ->select('email', 'first_name_th', 'rf_client_code')
                    ->get();
            Mail::send('template/email/mailMeetingReport', ['link' => 'http://www.relationflip.com/login', 'e_user' => $employee[0]->rf_client_code], function ($m) use ($employee) {
                $m->to($employee[0]->email, 'คุณ ' . $employee[0]->first_name_th)->subject('ส่งผล Relationflip Report');
                $m->from('support@relationflip.com', 'Relationflip');
            });
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json('successfully');
    }

    function mailRFIndex() {
        try {
            $employee_id = request()->get('employee_id');

            $employee = DB::table('employee')
                    ->where(['employee_id' => $employee_id])
                    ->select('email', 'first_name_th', 'rf_client_code')
                    ->get();
            Mail::send('template/email/mailRFIndex', ['link' => 'http://www.relationflip.com/login?status=post', 'e_user' => $employee[0]->rf_client_code], function ($m) use ($employee) {
                $m->to($employee[0]->email, 'คุณ ' . $employee[0]->first_name_th)->subject('แบบประเมินหลังการรับบริการ RF Analytical Counselling');
                $m->from('support@relationflip.com', 'Relationflip');
            });
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json('successfully');
    }

    function mailUser() {
        try {
            $company_id = request()->get('company_id');
            $employee = DB::table('user')
                    ->join('employee', 'employee.user_id', '=', 'user.user_id')
                    ->join('department', 'employee.department_id', '=', 'department.department_id')
                    ->join('company', 'department.company_id', '=', 'company.company_id')
                    ->where(['company.company_id' => $company_id])
                    ->select('employee.email', 'employee.first_name_th', 'employee.rf_client_code', 'user.username', 'user.password')
                    ->get();
            for ($i = 0; $i < count($employee); $i++) {
                $mailemployee = $employee[$i];
                Mail::send('template/email/mailUser', ['link' => 'http://www.relationflip.com/login', 'e_user' => $mailemployee->rf_client_code, 'username' => $mailemployee->username, 'password' => $mailemployee->password], function ($m) use ($mailemployee) {
                    $m->to($mailemployee->email, 'คุณ ' . $mailemployee->first_name_th)->subject('Username & Password สำหรับการรับบริการ Relationflip');
                    $m->from('support@relationflip.com', 'Relationflip');
                });
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json('successfully');
    }

    function mailUserEmployee() {
        try {
            $employee_id = request()->get('employee_id');
            $employee = DB::table('user')
                    ->join('employee', 'employee.user_id', '=', 'user.user_id')
                    ->where(['employee.employee_id' => $employee_id])
                    ->select('employee.email', 'employee.first_name_th', 'employee.rf_client_code', 'user.username', 'user.password')
                    ->get();

            Mail::send('template/email/mailUser', ['link' => 'http://www.relationflip.com/login', 'e_user' => $employee[0]->rf_client_code, 'username' => $employee[0]->username, 'password' => $employee[0]->password], function ($m) use ($employee) {
                $m->to($employee[0]->email, 'คุณ ' . $employee[0]->first_name_th)->subject('Username & Password สำหรับการรับบริการ Relationflip');
                $m->from('support@relationflip.com', 'Relationflip');
            });
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json('successfully');
    }

    function mailBeforeCounseling(DatabaseManager $db) {
        try {
            $email_queue = DB::table('email_queue')
                    ->where('type', '=', 'B')
                    ->where('status', '=', 'N')
                    ->get();
            $alldate = array();
            for ($i = 0; $i < count($email_queue); $i++) {
                $ea = $email_queue[$i]->appointment_date;
                $eaarr = explode(" ", $ea);
                $timearr = explode(":", $eaarr[1]);
                $time = $timearr[0] . ":" . $timearr[1];
                $datetime = $eaarr[0] . " " . $time;

                if (Carbon::now()->addHour(2)->format('Y-m-d H:i') == $datetime) {
                    array_push($alldate, $datetime);
                    $employee = DB::table('employee')
                            ->where(['employee_id' => $email_queue[$i]->employee_id])
                            ->select('email', 'first_name_th', 'rf_client_code')
                            ->get();

                    $counselor = DB::table('counselor')
                            ->where('counselor_id', '=', $email_queue[$i]->counselor_id)
                            ->select('email', 'first_name_th', 'rf_id')
                            ->get();

                    Mail::send('template/email/mailBeforeCounseling', ['link' => 'http://www.relationflip.com/login', 'e_user' => $employee[0]->rf_client_code, 'c_user' => $counselor[0]->rf_id], function ($m) use ($counselor, $employee) {
                        $m->to($counselor[0]->email, 'คุณ' . $counselor[0]->first_name_th)->subject('แจ้งเตือนคุณ รหัส ' . $counselor[0]->rf_id . ' ให้ยืนยันการให้บริการคุณ รหัส ' . $employee[0]->rf_client_code);
                        $m->from('support@relationflip.com', 'Relationflip');
                    });

                    Mail::send('template/email/mailBeforeCounseling', ['link' => 'http://www.relationflip.com/login', 'e_user' => $employee[0]->rf_client_code, 'c_user' => $counselor[0]->rf_id], function ($m) use ($counselor, $employee) {
                        $m->to('support@relationflip.com', 'Relationflip')->subject('แจ้งเตือนคุณ รหัส ' . $counselor[0]->rf_id . ' ให้ยืนยันการให้บริการคุณ รหัส ' . $employee[0]->rf_client_code);
                        $m->from('support@relationflip.com', 'Systems');
                    });

                    // delete after mail sended
                    DB::table('email_queue')
                            ->where('email_queue_id', '=', $email_queue[$i]->email_queue_id)
                            ->delete();
                }
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return dd($alldate);
    }

    function mailAfterConfirm(DatabaseManager $db) {
        try {
            $email_queue = DB::table('email_queue')
                    ->where('type', '=', 'A')
                    ->where('status', '=', 'N')
                    ->get();
            $alldate = array();
            for ($i = 0; $i < count($email_queue); $i++) {
                $ea = $email_queue[$i]->appointment_date;
                $eaarr = explode(" ", $ea);
                $timearr = explode(":", $eaarr[1]);
                $time = $timearr[0] . ":" . $timearr[1];
                $datetime = $eaarr[0] . " " . $time;

                if (Carbon::now()->addDay(-2)->format('Y-m-d H:i') == $datetime) {
                    array_push($alldate, $datetime);
                    $employee = DB::table('employee')
                            ->where(['employee_id' => $email_queue[$i]->employee_id])
                            ->select('email', 'first_name_th', 'rf_client_code')
                            ->get();

                    $counselor = DB::table('counselor')
                            ->where('counselor_id', '=', $email_queue[$i]->counselor_id)
                            ->select('email', 'first_name_th', 'rf_id')
                            ->get();

                    Mail::send('template/email/mailAfterConfirm', ['link' => 'http://www.relationflip.com/login', 'e_user' => $employee[0]->rf_client_code, 'c_user' => $counselor[0]->rf_id], function ($m) use ($counselor, $employee) {
                        $m->to($counselor[0]->email, 'คุณ' . $counselor[0]->first_name_th)->subject('แจ้งเตือนคุณ รหัส ' . $counselor[0]->rf_id . ' ให้บันทึกข้อมูลหลังการปรึกษาของคุณ รหัส ' . $employee[0]->rf_client_code);
                        $m->from('support@relationflip.com', 'Relationflip');
                    });

                    Mail::send('template/email/mailAfterConfirm', ['link' => 'http://www.relationflip.com/login', 'e_user' => $employee[0]->rf_client_code, 'c_user' => $counselor[0]->rf_id], function ($m) use ($counselor, $employee) {
                        $m->to('support@relationflip.com', 'Relationflip')->subject('แจ้งเตือนคุณ รหัส ' . $counselor[0]->rf_id . ' ให้บันทึกข้อมูลหลังการปรึกษาของคุณ รหัส ' . $employee[0]->rf_client_code);
                        $m->from('support@relationflip.com', 'Systems');
                    });

                    // delete after mail sended
                    DB::table('email_queue')
                            ->where('email_queue_id', '=', $email_queue[$i]->email_queue_id)
                            ->delete();
                }
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return dd($alldate);
    }

    function mailMeetingCancel() {
        try {
            $employee_id = request()->get('employee_id');
            $start_time = request()->get('start_time');
            $end_time = request()->get('end_time');
            $counselor_id = request()->get('counselor_id');

            $employee = DB::table('employee')
                    ->where(['employee_id' => $employee_id])
                    ->select('email', 'first_name_th', 'rf_client_code', 'phone')
                    ->get();

            $counselor = DB::table('counselor')
                    ->where(['counselor_id' => $counselor_id])
                    ->select('email', 'first_name_th', 'rf_id')
                    ->get();

            Mail::send('template/email/mailMeetingCancel', ['e_user' => $employee[0]->rf_client_code, 'c_user' => $counselor[0]->rf_id, 'e_phone' => $employee[0]->phone], function ($m) use ($employee) {
                $m->to($employee[0]->email, 'คุณ ' . $employee[0]->first_name_th)->subject('เเจ้งเหตุไม่สามารถติดต่อผู้รับบริการได้');
                $m->from('support@relationflip.com', 'Relationflip');
            });

            Mail::send('template/email/mailMeetingCancelForAdmin', ['e_user' => $employee[0]->rf_client_code, 'c_user' => $counselor[0]->rf_id, 'e_phone' => $employee[0]->phone], function ($m) use ($employee) {
                $m->to('support@relationflip.com', 'Relationflip')->subject('เเจ้งเหตุไม่สามารถติดต่อผู้รับบริการได้');
                $m->from('support@relationflip.com', 'Systems');
            });
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json('successfully');
    }
}
