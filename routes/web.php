<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PerformanceSettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\MenuController;

Route::view('/', 'catalog.index')->name('home');
Route::view('/about-us', 'catalog.about-us');




Route::prefix('admin')->name('admin.')->group(function () { // name('admin.') eklendi!
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('admin')->group(function () { // Zaten auth middleware'ı admin middleware içinde kontrol ediliyor.
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Ayarlar
        Route::prefix('settings')->name('settings.')->group(function() {
            Route::get('/general-settings', [SettingController::class, 'index'])->name('index');
            Route::post('/general-settings', [SettingController::class, 'update'])->name('update');
        });

        // Performans Ayarları
        Route::prefix('performance-settings')->name('performance-settings.')->group(function () {
            Route::get('/', [PerformanceSettingsController::class, 'index'])->name('index');
            Route::post('/cache-clear', [PerformanceSettingsController::class, 'clearCache'])->name('cache-clear');
            Route::post('/config-cache', [PerformanceSettingsController::class, 'configCache'])->name('config-cache');
            Route::post('/route-cache', [PerformanceSettingsController::class, 'routeCache'])->name('route-cache');
            Route::post('/view-cache', [PerformanceSettingsController::class, 'viewCache'])->name('view-cache');
            Route::post('/update-schedule', [PerformanceSettingsController::class, 'updateSchedule'])->name('update-schedule');
        });

        // Kullanıcılar
        Route::resource('users', UserController::class); // Resource controller kullanmak daha iyi.

        // Profil
        Route::prefix('profile')->name('profile.')->group(function() {
            Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
            Route::put('/update', [ProfileController::class, 'update'])->name('update');
            Route::put('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');
        });


        // Activity Logs
        Route::prefix('activity-logs')->name('activity-logs.')->group(function() { // name('activity-logs.') eklendi
            Route::get('/', [ActivityLogController::class, 'index'])->name('index');
            Route::get('/{activityLog}', [ActivityLogController::class, 'show'])->name('show');
        });

        // Sliders (names metodu OLMADAN)
        Route::resource('sliders', SliderController::class);

        // Sıralama güncellemesi için ayrı bir route (resource DIŞINDA ama aynı group İÇİNDE)
        Route::post('/sliders/update-order', [SliderController::class, 'updateOrder'])->name('sliders.updateOrder');


        Route::resource('menus', MenuController::class); // CRUD işlemleri için
        Route::post('/menus/update-order', [MenuController::class, 'updateOrder'])->name('menus.updateOrder'); //Sıralama için.
        
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});