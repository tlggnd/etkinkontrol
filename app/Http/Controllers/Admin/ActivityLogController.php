<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        
        $query = ActivityLog::with('user')->latest(); // En son kayıtlar başta

        // Filtreleme (isteğe bağlı)
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        if ($request->filled('model_type')) {
            $query->where('model_type', 'App\\Models\\' . $request->model_type);
        }
        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        $activityLogs = $query->paginate(10); // Sayfalama

        // User Modellerini Al (Filtreleme için)
        $users = \App\Models\User::all(); // User modelini doğru şekilde kullan.
        // Model tiplerini dinamik olarak al
        $modelTypes = ActivityLog::distinct('model_type')->pluck('model_type')->map(function ($type) {
            return class_basename($type); // Sadece model adını al (App\Models\User -> User)
        })->filter(); // Boş olanları çıkar

        return view('admin.activity_logs.index', compact('activityLogs', 'users', 'modelTypes'));
    }
    public function show(ActivityLog $activityLog)
    {
        // Yetkilendirme (örneğin, sadece admin görebilir)
      
        return view('admin.activity_logs.show', compact('activityLog'));
    }
}