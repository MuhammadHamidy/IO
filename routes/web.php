<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PageNewsController;
use App\Http\Controllers\Api\ProgramsController;
use App\Http\Controllers\Api\ProgramsTypeController;
use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\Api\PagePartnersController;
use App\Http\Controllers\Api\PageTestimonialsController;
use App\Http\Controllers\Api\ImageUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\ApplicationController as UserApplicationController;
use App\Http\Controllers\Admin\ApplicationAdminController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role_id === 1) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    }
    return redirect()->route('home');
});

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');


Route::get('/program', function () {
    $query = \App\Models\Programs::where('status', 'published')
        ->where('is_active', true)
        ->where('is_featured', true);
    
    // Filter by user_type if user is logged in
    if (Auth::check() && Auth::user()->user_type) {
        $query->where('program_type', Auth::user()->user_type);
    }
    
    $featuredPrograms = $query->latest()->get();
    return view('program', compact('featuredPrograms'));
})->name('program');

Route::get('/program/degree', function () {
    return view('degree');
})->name('degree');

Route::get('/program/non-degree', [function () {
    return view('non-degree');
}])->name('non-degree');

Route::get('/program/non-degree/inbound', [ProgramsController::class, 'inbound'])->name('inbound-page');
Route::get('/program/non-degree/inbound/student-exchange-program', function () {
    return view('student-exchange-program-inbound');
})->name('student-exchange-program-inbound');
Route::get('/program/non-degree/inbound/internship-research-attachment', function () {
    return view('internship-research-attachment-inbound');
})->name('internship-research-attachment-inbound');

Route::get('/program/non-degree/outbound', [ProgramsController::class, 'outbound'])->name('outbound-page');
Route::get('/program/non-degree/outbound/uper-sa', function () {
    return view('uper-sa');
})->name('uper-sa-outbound');
Route::get('/program/non-degree/outbound/uper-sa/register', function () {
  return view('uper-sa-register');
})->name('uper-sa-register');
Route::get('/program/non-degree/outbound/iisma', [ProgramsController::class, 'iisma'])->name('iisma-outbound');
Route::get('/program/non-degree/outbound/internship-research-attachment', function () {
    return view('internship-research-attachment-outbound');
})->name('internship-research-attachment-outbound');

Route::get('/global-network', [PagePartnersController::class, 'showPartners'])->name('global-network');
Route::get('/global-network/partners-by-region', [PagePartnersController::class, 'partnersByRegion'])->name('partners-by-region');
Route::get('/partners/{id}', [PagePartnersController::class, 'detail'])->name('partners.detail');


Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');


Route::get('/regist-inbound', function () {
    return view('regist-inbound');
})->name('regist-inbound');

Route::get('/login-outbound', function() {
    return view('login-outbound');
})->name('login-outbound');

Route::get('/login-inbound', function () {
    return view('login-inbound');
})->name('login-inbound');

Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware(['auth']);

Route::get('/news', [PageNewsController::class, 'index'])->name('news')->middleware('preview.mode');

Route::middleware([isAdmin::class])->group(function () {
    Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');
    Route::get('/news/create', [PageNewsController::class, 'create'])->name('regist-news');
    Route::post('/news', [PageNewsController::class, 'store'])->name('page-news.store');
    Route::get('/news/{id}/edit', [PageNewsController::class, 'edit'])->name('news-update');
    Route::put('/news/{id}', [PageNewsController::class, 'update'])->name('page-news.update');
    Route::delete('/news/{id}', [PageNewsController::class, 'destroy'])->name('page-news.destroy');
});

Route::get('/news/{id}', [PageNewsController::class, 'show'])->name('news-detail');

Route::get('/programs', [ProgramsController::class, 'index'])->name('programs');
Route::get('/program/degree/list', [ProgramsController::class, 'degreeList'])->name('programs.degree');
Route::get('/program/non-degree/list', [ProgramsController::class, 'nonDegreeList'])->name('programs.non-degree');
// Route::get('/program/iisma/list', [ProgramsController::class, 'iismaList'])->name('programs.iisma'); // REMOVED: IISMA is now a category under Non-Degree (UPER-SA)

Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/events/{id}', [EventsController::class, 'show'])->name('events.show');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(isAdmin::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/publish-changes', [AdminController::class, 'publishChanges'])->name('publish-changes');
    Route::get('/toggle-preview', [AdminController::class, 'togglePreview'])->name('toggle-preview');
    
    Route::get('/news', [AdminController::class, 'newsIndex'])->name('news.index');
    Route::get('/news/create', [AdminController::class, 'newsCreate'])->name('news.create');
    Route::post('/news', [AdminController::class, 'newsStore'])->name('news.store');
    Route::get('/news/{id}/edit', [AdminController::class, 'newsEdit'])->name('news.edit');
    Route::put('/news/{id}', [AdminController::class, 'newsUpdate'])->name('news.update');
    Route::delete('/news/{id}', [AdminController::class, 'newsDestroy'])->name('news.destroy');
    Route::post('/news/{id}/archive', [AdminController::class, 'newsArchive'])->name('news.archive');
    Route::post('/news/{id}/unarchive', [AdminController::class, 'newsUnarchive'])->name('news.unarchive');
    
    Route::get('/events', [AdminController::class, 'eventsIndex'])->name('events.index');
    Route::get('/events/create', [AdminController::class, 'eventsCreate'])->name('events.create');
    Route::post('/events', [AdminController::class, 'eventsStore'])->name('events.store');
    Route::get('/events/{id}/edit', [AdminController::class, 'eventsEdit'])->name('events.edit');
    Route::put('/events/{id}', [AdminController::class, 'eventsUpdate'])->name('events.update');
    Route::delete('/events/{id}', [AdminController::class, 'eventsDestroy'])->name('events.destroy');
    
    Route::get('/partners', [AdminController::class, 'partnersIndex'])->name('partners.index');
    Route::get('/partners/create', [AdminController::class, 'partnersCreate'])->name('partners.create');
    Route::post('/partners', [AdminController::class, 'partnersStore'])->name('partners.store');
    Route::get('/partners/{id}/edit', [AdminController::class, 'partnersEdit'])->name('partners.edit');
    Route::put('/partners/{id}', [AdminController::class, 'partnersUpdate'])->name('partners.update');
    Route::delete('/partners/{id}', [AdminController::class, 'partnersDestroy'])->name('partners.destroy');
    
    Route::get('/testimonials', [AdminController::class, 'testimonialsIndex'])->name('testimonials.index');
    Route::get('/testimonials/create', [AdminController::class, 'testimonialsCreate'])->name('testimonials.create');
    Route::post('/testimonials', [AdminController::class, 'testimonialsStore'])->name('testimonials.store');
    Route::get('/testimonials/{id}/edit', [AdminController::class, 'testimonialsEdit'])->name('testimonials.edit');
    Route::put('/testimonials/{id}', [AdminController::class, 'testimonialsUpdate'])->name('testimonials.update');
    Route::delete('/testimonials/{id}', [AdminController::class, 'testimonialsDestroy'])->name('testimonials.destroy');
    
    Route::get('/programs', [AdminController::class, 'programsIndex'])->name('programs.index');
    Route::get('/programs/create', [AdminController::class, 'programsCreate'])->name('programs.create');
    Route::post('/programs', [AdminController::class, 'programsStore'])->name('programs.store');
    Route::get('/programs/{id}/edit', [AdminController::class, 'programsEdit'])->name('programs.edit');
    Route::put('/programs/{id}', [AdminController::class, 'programsUpdate'])->name('programs.update');
    Route::delete('/programs/{id}', [AdminController::class, 'programsDestroy'])->name('programs.destroy');

    Route::get('/applications', [ApplicationAdminController::class, 'index'])->name('applications.index');
    Route::get('/applications/program/{programId}', [ApplicationAdminController::class, 'programApplicants'])->name('applications.program');
    Route::get('/applications/{id}', [ApplicationAdminController::class, 'showApplicant'])->name('applications.show');
    Route::put('/applications/{id}/status', [ApplicationAdminController::class, 'updateStatus'])->name('applications.update-status');
});

Route::middleware(isAdmin::class)->group(function () {
    Route::get('/programs/create', [ProgramsController::class, 'create'])->name('regist-program');
    Route::post('/programs', [ProgramsController::class, 'store'])->name('programs.store');
    Route::get('/programs/{id}/edit', [ProgramsController::class, 'edit'])->name('programs-update');
    Route::put('/programs/{id}', [ProgramsController::class, 'update'])->name('programs.update');
    Route::delete('/programs/{id}', [ProgramsController::class, 'destroy'])->name('programs.destroy');
    Route::post('/programs-type', [ProgramsTypeController::class, 'store'])->name('program-types.store');
    Route::delete('/programs-type/{id}', [ProgramsTypeController::class, 'destroy'])->name('program-types.destroy');

    Route::get('/partners', [PagePartnersController::class, 'index'])->name('page-partners');
    Route::get('/partners/create', [PagePartnersController::class, 'create'])->name('regist-partners');
    Route::post('/partners', [PagePartnersController::class, 'store'])->name('partners.store');
    Route::get('/partners/{id}/edit', [PagePartnersController::class, 'edit'])->name('partners-edit');
    Route::put('/partners/{id}', [PagePartnersController::class, 'update'])->name('partners.update');
    Route::delete('/partners/{id}', [PagePartnersController::class, 'destroy'])->name('partners.destroy');

    Route::get('/events/create', [EventsController::class, 'create'])->name('regist-events');
    Route::post('/events', [EventsController::class, 'store'])->name('events.store');
    Route::get('/events/{id}/edit', [EventsController::class, 'edit'])->name('events-update');
    Route::put('/events/{id}', [EventsController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventsController::class, 'destroy'])->name('events.destroy');

    Route::get('/testimonials', [PageTestimonialsController::class, 'index'])->name('page-testimonials');
    Route::get('/testimonials/create', [PageTestimonialsController::class, 'create'])->name('regist-testimonials');
    Route::post('/testimonials', [PageTestimonialsController::class, 'store'])->name('testimonials.store');
    Route::get('/testimonials/{id}/edit', [PageTestimonialsController::class, 'edit'])->name('testimonials.edit');
    Route::put('/testimonials/{id}', [PageTestimonialsController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/{id}', [PageTestimonialsController::class, 'destroy'])->name('testimonials.destroy');
});

Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/applications', [UserApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/create/{programId}', [UserApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications/{programId}', [UserApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications/{id}', [UserApplicationController::class, 'show'])->name('applications.show');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/account', [ProfileController::class, 'account'])->name('profile.account');
    Route::get('/profile/education', [ProfileController::class, 'education'])->name('profile.education');
    Route::get('/profile/documents', [ProfileController::class, 'documents'])->name('profile.documents');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/check-documents', [UserController::class, 'checkDocumentsWeb'])->name('check-documents');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all', [NotificationController::class, 'markAllRead'])->name('notifications.mark-all');
    Route::post('/notifications/{id}/mark', [NotificationController::class, 'markRead'])->name('notifications.mark');
    Route::get('/notifications/{id}/mark', [NotificationController::class, 'markRead'])->name('notifications.mark-read');
});


