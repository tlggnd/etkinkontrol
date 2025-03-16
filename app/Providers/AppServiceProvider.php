<?php

namespace App\Providers;

use App\Models\CacheSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);

            $cacheSchedules = CacheSchedule::all();

            foreach ($cacheSchedules as $cacheSchedule) {
                $schedule->call(function () use ($cacheSchedule) {
                    switch ($cacheSchedule->type) {
                        case 'cache':
                            Artisan::call('cache:clear');
                            break;
                        case 'config':
                            Artisan::call('config:cache');
                            break;
                        case 'route':
                            Artisan::call('route:cache');
                            break;
                        case 'view':
                            Artisan::call('view:cache');
                            break;
                    }
                })->everyMinutes($cacheSchedule->interval);
            }
        });
    }
}