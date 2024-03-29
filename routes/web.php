<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LogsController;
use App\Http\Controllers\Admin\ChatsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FormcodeController;
use App\Http\Controllers\Auth\AuthIndexController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Normal_View\IndexController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\Admin_ProfileController;
use App\Http\Controllers\Normal_View\ProfileController;
use App\Http\Controllers\Admin\AdminAnnouncementController;
use App\Http\Controllers\Admin\AdminDownloadablesController;
use App\Http\Controllers\Normal_View\QuestionnaireController;
use App\Http\Controllers\Admin\Admin_ChangePasswordController;
use App\Http\Controllers\Normal_View\ChangePasswordController;
use App\Http\Controllers\Normal_View\NormalActivityController;
use App\Http\Controllers\Normal_View\NormalFeedbackController;
use App\Http\Controllers\Normal_View\SetAppointmentController;
use App\Http\Controllers\Normal_View\NormalContactUsController;
use App\Http\Controllers\Admin\Questionnaires\TransferController;
use App\Http\Controllers\Normal_View\NormalAnnouncementController;
use App\Http\Controllers\Admin\Questionnaires\CounselingController;
use App\Http\Controllers\Admin\Questionnaires\ReadmissionController;
use App\Http\Controllers\Admin\Questionnaires\StudentInventoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/phpinfo', function() {
    return phpinfo();
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/success', [QuestionnaireController::class, 'success']);



Route::get('/about-us', [IndexController::class, 'about']);
Route::get('/dashboard', [IndexController::class, 'dashboardNormal']);
Route::get('/contact-us', [NormalContactUsController::class, 'contact']);
Route::post('/contact-us', [NormalContactUsController::class, 'contactUsStore'])->name('contact-us.submit');
Route::get('/guidance-announcement', [NormalAnnouncementController::class, 'announcement']);
Route::get('/view-activities', [NormalActivityController::class, 'activities']);
Route::get('/services', [IndexController::class, 'services']);
Route::get('/check-appointment', [SetAppointmentController::class, 'index']);
Route::post('/check-appointment', [SetAppointmentController::class, 'checkAppointment'])->name('appointment.checkStudent');




Route::get('/check-feedback', [NormalFeedbackController::class, 'index']);
Route::post('/check-feedback', [NormalFeedbackController::class, 'checkFeedback'])->name('feedback.checkFeedback');
Route::get('/give-feedback/{studentId}', [NormalFeedbackController::class, 'giveFeedback'])->name('normal-view.pages.feedback');
Route::post('/give-feedback', [NormalFeedbackController::class, 'store'])->name('feedback.set');

Route::get('/set-appointment/{studentId}', [SetAppointmentController::class, 'setAppointment'])->name('normal-view.pages.appointment');
Route::post('/set-appointment', [SetAppointmentController::class, 'store'])->name('appointment.set');

Route::get('/login', [AuthIndexController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthIndexController::class, 'login']);
Route::post('/logout', [AuthIndexController::class, 'logout'])->name('logout');
// Route::get('/register', [AuthIndexController::class, 'registerForm'])->name('register');


Route::group(['middleware' => ['auth', 'role:admin|super-admin']], function () {
    Route::get('/admin/generate-code', [FormcodeController::class, 'indexCode']);
    Route::post('/admin/generate-code', [FormcodeController::class, 'generateCode'])->name('generate.code');

    Route::get('/admin/downloadables', [AdminDownloadablesController::class, 'index'])->name('files.index');
    Route::post('/admin/downloadables', [AdminDownloadablesController::class, 'store'])->name('files.store');
    Route::get('/admin/downloadables/{id}/download', [AdminDownloadablesController::class, 'download'])->name('files.download');
    Route::delete('/admin/downloadables/{id}', [AdminDownloadablesController::class, 'destroy'])->name('files.destroy');


    Route::get('/admin/dashboard', [AdminIndexController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/chats', [ChatsController::class, 'chats']);


    Route::get('/admin/feedbacks', [FeedbackController::class, 'feedbacks'])->name('feedbacks.feedbacks');



    Route::get('/admin/users', [UsersController::class, 'users'])->name('users.users');
    Route::post('/admin/users', [UsersController::class, 'store'])->name('users.store');
    Route::put('/admin/users/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');


    Route::get('/admin/activities', [ActivityController::class, 'activities'])->name('activities.activities');
    Route::post('/admin/activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::put('/admin/activities/{id}', [ActivityController::class, 'update'])->name('activities.update');
    Route::delete('/admin/activities/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');

    Route::get('/admin/appointments', [AppointmentController::class, 'appointments'])->name('appointments.appointments');
    Route::get('/admin/appointment-calendar', [AppointmentController::class, 'appointmentCalendar'])->name('appointments.appointment-calendar');
    Route::post('/admin/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::put('/admin/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/admin/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::put('/appointments/{id}/update-status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

    Route::get('/admin/messages', [ContactUsController::class, 'message']);

    Route::get('/admin/counseling', [CounselingController::class, 'counseling']);
    Route::get('/admin/counselings/create', [CounselingController::class, 'counselingCreate'])->name('counselings.create');
    Route::post('/admin/counselings/create', [CounselingController::class, 'counselingstore']);
    Route::get('/admin/counselings/{id}/update', [CounselingController::class, 'counselingEdit']);
    Route::put('/admin/counselings/{id}/update', [CounselingController::class, 'counselingUpdate'])->name('admin.counselings.update');
    Route::delete('/admin/counselings/{id}', [CounselingController::class, 'destroy'])->name('counselings.destroy');
    Route::get('admin/counselings/pdf/{id}', [CounselingController::class, 'downloadPDF'])
    ->name('admin.counselings.pdf');
    Route::get('admin/counselings/print/{id}', [CounselingController::class, 'printCounseling'])
    ->name('admin.counselings.print');


    Route::get('/admin/inventory', [StudentInventoryController::class, 'inventory'])->name('admin.inventory');;
    // Route::get('/admin/inventory', [StudentInventoryController::class, 'inventory'])->name('admin.inventory');
    Route::get('/admin/inventory/create', [StudentInventoryController::class, 'inventoryCreate'])->name('inventory.create');
    Route::post('/admin/inventory/create', [StudentInventoryController::class, 'inventoryStore']);
    Route::get('/admin/inventory/{id}/update', [StudentInventoryController::class, 'inventoryEdit']);
    Route::put('/admin/inventory/{id}/update', [StudentInventoryController::class, 'inventoryUpdate'])->name('admin.inventory.update');
    Route::delete('/admin/inventory/{id}', [StudentInventoryController::class, 'destroy'])->name('inventory.destroy');
    Route::get('admin/inventory/pdf/{id}', [StudentInventoryController::class, 'downloadPDF'])
    ->name('admin.inventory.pdf');
    // Route::get('admin/inventory/print/{id}', [StudentInventoryController::class, 'printCounseling'])
    // ->name('admin.inventory.print');



    Route::get('/admin/readmission', [ReadmissionController::class, 'readmission']);
    Route::get('/admin/readmissions/create', [ReadmissionController::class, 'readmissionCreate'])->name('readmissions.create');
    Route::post('/admin/readmissions/create', [ReadmissionController::class, 'readmissionstore']);
    Route::get('/admin/readmissions/{id}/update', [ReadmissionController::class, 'readmissionEdit']);
    Route::put('/admin/readmissions/{id}/update', [ReadmissionController::class, 'readmissionUpdate'])->name('admin.readmissions.update');
    Route::delete('/admin/readmissions/{id}', [ReadmissionController::class, 'destroy'])->name('readmissions.destroy');
    Route::get('admin/readmissions/pdf/{id}', [ReadmissionController::class, 'downloadPDF'])
    ->name('admin.readmissions.pdf');
    Route::get('admin/readmissions/print/{id}', [ReadmissionController::class, 'printreadmission'])
    ->name('admin.readmissions.print');


    Route::get('/admin/transfer', [TransferController::class, 'transfer']);
    Route::get('/admin/transfers/create', [TransferController::class, 'transferCreate'])->name('transfers.create');
    Route::post('/admin/transfers/create', [TransferController::class, 'transferstore']);
    Route::get('/admin/transfer/{id}/update', [TransferController::class, 'transferEdit']);
    Route::put('/admin/transfer/{id}/update', [TransferController::class, 'transferUpdate'])->name('admin.transfers.update');
    Route::delete('/admin/transfer/{id}', [TransferController::class, 'destroy'])->name('transfers.destroy');
    Route::get('admin/transfer/pdf/{id}', [TransferController::class, 'downloadPDF'])
    ->name('admin.transfers.pdf');
    Route::get('admin/transfer/print/{id}', [TransferController::class, 'printtransfer'])
    ->name('admin.transfers.print');

    // Route::get('/admin/announcements', [AnnouncementController::class, 'announcement']);
    // Route::get('/admin/announcements', [AdminAnnouncementController::class, 'announcement']);

    Route::get('/admin/announcements', [AdminAnnouncementController::class, 'announcements'])->name('announcements.announcements');
    Route::post('/admin/announcements', [AdminAnnouncementController::class, 'store'])->name('announcements.store');
    Route::put('/admin/announcements/{id}', [AdminAnnouncementController::class, 'update'])->name('announcements.update');
    Route::delete('/admin/announcements/{id}', [AdminAnnouncementController::class, 'destroy'])->name('announcements.destroy');
    // Route::get('/admin/announcements/create', [AnnouncementController::class, 'announcementCreate'])->name('announcements.create');
    // Route::post('/admin/announcements/create', [AnnouncementController::class, 'announcementStore']);
    // Route::get('/admin/announcements/{id}/update', [AnnouncementController::class, 'announcementUpdate'])->name('admin.announcements.update');
    // Route::put('/admin/announcements/{id}/update', 'AnnouncementController@update')->name('admin.announcements.update');


    Route::get('admin/profile', [Admin_ProfileController::class, 'index'])->name('admin.profile');
    Route::put('admin/update-profile/{id}', [Admin_ProfileController::class, 'update_profile'])->name('admin.change_profile');
    Route::get('admin/change-password/{id}', [Admin_ChangePasswordController::class, 'index'])->name('admin.change_password.index');
    Route::post('admin/change-password', [Admin_ChangePasswordController::class, 'change_password'])->name('admin.change_password');

    Route::get('admin/logs', [LogsController::class, 'index']);

});
Route::group(['middleware' => ['auth', 'role:user']], function () {

    Route::get('/check-questionnaire', [QuestionnaireController::class, 'index']);
Route::post('/check-questionnaire', [QuestionnaireController::class, 'checkQuestionnaire'])->name('questionnaire.checkQuestionnaire');
Route::get('/fill-form/{studentId}', [QuestionnaireController::class, 'fillQuestionnaire'])->name('normal-view.pages.questionnaire');
Route::post('/fill-form/{studentId}', [QuestionnaireController::class, 'readmissionstore']);
Route::post('/fill-form/{studentId}', [QuestionnaireController::class, 'transferstore']);
Route::post('/fill-form/{studentId}', [QuestionnaireController::class, 'inventoryStore']);
    Route::get('/dashboard', [IndexController::class, 'dashboardNormal']);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/update-profile/{id}', [ProfileController::class, 'update_profile'])->name('change_profile');
    Route::get('/change-password/{id}', [ChangePasswordController::class, 'index'])->name('change_password.index');
    Route::post('/change-password', [ChangePasswordController::class, 'change_password'])->name('change_password');
});
