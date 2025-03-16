<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CacheSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PerformanceSettingsController extends Controller
{
    public function index()
    {
        $cacheSchedules = CacheSchedule::all();
        return view('admin.settings.performance-setting', compact('cacheSchedules'));
    }

    public function clearCache()
    {
        Artisan::call('cache:clear');
        return response()->json(['success' => true, 'message' => 'Önbellek temizlendi.']);
    }

    public function configCache()
    {
        Artisan::call('config:cache');
        return response()->json(['success' => true, 'message' => 'Konfigürasyon önbelleklendi.']);
    }

    public function routeCache()
    {
        Artisan::call('route:cache');
        return response()->json(['success' => true, 'message' => 'Rotalar önbelleklendi.']);
    }

    public function viewCache()
    {
        Artisan::call('view:cache');
        return response()->json(['success' => true, 'message' => 'Görünümler önbelleklendi.']);
    }

    public function updateSchedule(Request $request)
    {
        $request->validate([
            'schedules.*.type' => 'required|in:cache,config,route,view',
            'schedules.*.interval' => 'required|integer|min:1',
        ]);

        foreach ($request->schedules as $schedule) {
            CacheSchedule::updateOrCreate(
                ['type' => $schedule['type']],
                ['interval' => $schedule['interval']]
            );
        }

        return response()->json(['success' => true, 'message' => 'Zamanlama ayarları güncellendi.']);
    }
}