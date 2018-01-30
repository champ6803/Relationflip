<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;
use Carbon\Carbon;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index');
//Route::get('/', 'HomeController@checkAuth');

Route::get('about', 'AboutController@about');

Route::get('contactUs', 'ContactUsController@contactUs');

Route::get('login', 'LoginController@login');

Route::get('logout', 'LoginController@logout');

Route::get('logoutAdmin', 'AdminLoginController@logoutAdmin');

Route::post('checkLogin', 'LoginController@checkLogin');

Route::post('mailContactUs', 'MailController@contactUs');

Route::get('relationflipIndexAssessment', 'RelationflipIndexAssessmentController@index');

Route::post('postMasterRelationflipIndexAssessment', 'RelationflipIndexAssessmentController@postMasterRelationflipIndexAssessment');

Route::post('postOpenEnded', 'RelationflipIndexAssessmentController@postOpenEnded');

Route::post('saveAnswersIA', 'RelationflipIndexAssessmentController@saveAnswersIA');

Route::post('saveAnswersIAPost', 'RelationflipIndexAssessmentController@saveAnswersIAPost');

Route::get('assessmentResult', 'RelationflipIndexAssessmentController@assessmentResult');

Route::post('getClientDetails', 'RelationflipIndexAssessmentController@getClientDetails');

Route::post('getClientDetailsForCounselor', 'RelationflipIndexAssessmentController@getClientDetailsForCounselor');

Route::post('getScoreAssessment', 'RelationflipIndexAssessmentController@getScoreAssessment');

Route::post('getScorePostAssessment', 'RelationflipIndexAssessmentController@getScorePostAssessment');

Route::get('verifyProfile', 'LoginController@verifyProfile');

Route::post('updatePassword', 'LoginController@updatePassword');

Route::get('changePassword', 'LoginController@changePassword');

Route::post('getClientVerify', 'LoginController@getClientVerify');

Route::post('updateProfile', 'LoginController@updateProfile');

Route::get('confirmConsultation', 'RelationflipIndexAssessmentController@confirmConsultation');

Route::post('getMasterTranslation', 'RelationflipIndexAssessmentController@getMasterTranslation');

Route::get('topic', 'TopicController@topic');

Route::post('getMasterTopic', 'TopicController@getMasterTopic');

Route::post('saveTopic', 'TopicController@saveTopic');

Route::get('counselor', 'CounselorController@counselor');

Route::post('getSelectedTopic', 'CounselorController@getSelectedTopic');

Route::post('getPointTopicPerPerson', 'CounselorController@getPointTopicPerPerson');

Route::post('getCounselor', 'CounselorController@getCounselor');

Route::post('firstAccept', 'RelationflipIndexAssessmentController@firstAccept');

Route::get('timeTable', 'TimeTableController@timeTable');

Route::post('saveNewEvent', 'TimeTableController@saveNewEvent');

Route::post('saveTimeTable', 'TimeTableController@saveTimeTable');

Route::post('getTimeTable', 'TimeTableController@getTimeTable');

Route::post('getAppointmentTimeTable', 'TimeTableController@getAppointmentTimeTable');

Route::post('getGroup', 'TimeTableController@getGroup');

Route::get('counselorDetail', 'CounselorController@counselorDetail');

Route::post('getCounselorDetail', 'CounselorController@getCounselorDetail');

Route::post('saveScoreRFIndex', 'RelationflipIndexAssessmentController@saveScoreRFIndex');

Route::post('saveScorePostRFIndex', 'RelationflipIndexAssessmentController@saveScorePostRFIndex');

Route::get('admin', 'AdminController@admin');

// code by Charn

Route::get('selectTimeTableDate', 'TimeTableController@selectTimeTableDate');

Route::get('selectDateTable', 'TimeTableController@selectDateTable');

Route::post('findDate', 'TimeTableController@findDate');

Route::post('findTimeByDateAndCounsel', 'TimeTableController@findTimeByDateAndCounsel');

Route::post('saveAppointment', 'TimeTableController@saveAppointment');

Route::get('adminLogin', 'AdminLoginController@adminLogin');

Route::get('adminConsole', 'AdminLoginController@adminConsole');

Route::post('checkAdminLogin', 'AdminLoginController@checkAdminLogin');

Route::get('company', 'CompanyController@company');

Route::post('searchCompany', 'CompanyController@searchCompany');

Route::post('deleteCompany', 'CompanyController@deleteCompany');

Route::post('updateCompany', 'CompanyController@updateCompany');

Route::post('addCompany', 'CompanyController@addCompany');

Route::get('department', 'DepartmentController@department');

Route::post('saveDepartment', 'DepartmentController@addDepartment');

Route::post('updateDepartment', 'DepartmentController@updateDepartment');

Route::post('deleteDepartment', 'DepartmentController@deleteDepartment');

Route::get('round', 'RoundController@round');

Route::post('updateRound', 'RoundController@updateRound');

Route::post('saveRound', 'RoundController@addRound');

Route::get('employee', 'EmployeeController@employee');

Route::get('searchCompanyByName', 'CompanyController@searchCompanyByName');

Route::get('searchDepartmentByName', 'DepartmentController@searchDepartmentByName');

Route::post('updateAppointment', 'CounselorController@updateAppointment');

//

Route::get('information', 'RelationflipIndexAssessmentController@information');

Route::post('checkAppointment', 'RelationflipIndexAssessmentController@checkAppointment');

Route::post('checkPackage', 'RelationflipIndexAssessmentController@checkPackage');

Route::post('getAppointment', 'RelationflipIndexAssessmentController@getAppointment');

Route::post('mailResultAssessment', 'MailController@mailResultAssessment');

Route::post('mailConsent', 'MailController@mailConsent');

Route::post('mailCounselorConfirm', 'MailController@mailCounselorConfirm');

Route::post('mailMeetingConfirm', 'MailController@mailMeetingConfirm');

Route::post('mailMeetingCancel', 'MailController@mailMeetingCancel');

Route::post('mailRFIndex', 'MailController@mailRFIndex');

Route::post('mailMeetingReport', 'MailController@mailMeetingReport');

Route::post('mailBeforeCounseling', 'MailController@mailBeforeCounseling');

Route::get('resultConsent', 'RelationflipIndexAssessmentController@resultConsent');

Route::post('checkAccept', 'RelationflipIndexAssessmentController@checkAccept');

Route::post('getClientAppointment', 'AppointmentController@getClientAppointment');

Route::post('updateStatusAppointment', 'AppointmentController@updateStatusAppointment');

Route::get('assessmentResultForCounselor', 'RelationflipIndexAssessmentController@assessmentResultForCounselor');

Route::post('getTopicForCounselor', 'RelationflipIndexAssessmentController@getTopicForCounselor');

Route::get('meetingRecord', 'MeetingController@meetingRecord');

Route::post('saveCounseling', 'AppointmentController@saveCounseling');

Route::post('getCounselingDetail', 'AppointmentController@getCounselingDetail');

Route::post('getMeetingReport', 'RelationflipIndexAssessmentController@getMeetingReport');

Route::post('getMeetingRecord', 'AppointmentController@getMeetingRecord');


Route::get('report', 'ReportController@report');
Route::get('downloadExcel/{type}/{company_id}', 'ReportController@downloadExcel');
Route::post('importExcel', 'ReportController@importExcel');
Route::post('importCounselorExcel', 'ReportController@importCounselorExcel');
Route::post('importCounselorImages', 'ReportController@importCounselorImages');
Route::get('downloadRFIndexExcel/{type}/{company_id}', 'ReportController@downloadRFIndexExcel');
Route::get('downloadUserExcel/{type}', 'ReportController@downloadUserExcel');
Route::get('downloadCounselorExcel/{type}', 'ReportController@downloadCounselorExcel');

Route::post('getAdminReport', 'ReportController@test');

Route::post('getEmployeeName', 'RelationflipIndexAssessmentController@getEmployeeName');

Route::get('questions', 'NewsController@questions');

Route::post('getCompany', 'AdminController@getCompany');

Route::post('checkHasUser', 'CompanyController@checkHasUser');

Route::post('mailUser', 'MailController@mailUser');

Route::post('mailUserEmployee', 'MailController@mailUserEmployee');

Route::get('mailScheduleBefore2Hour', 'MailController@mailBeforeCounseling');

Route::get('mailScheduleAfter2Day', 'MailController@mailAfterConfirm');

Route::post('saveEmailQueue' , 'EmailQueueController@saveEmailQueue');

Route::get('importCounselor' , 'ReportController@importCounselor');