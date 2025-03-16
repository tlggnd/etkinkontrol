<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $remember = $request->has('remember');

    if (Auth::attempt($credentials, $remember)) {
        $user = Auth::user();
        if ($user->is_admin) {
            return response()->json([
                'success' => true,
                'redirect' => '/admin/dashboard'
            ]);
        }
    }

    return response()->json([
        'success' => false,
        'message' => 'Geçersiz kimlik bilgileri.'
    ]);
}

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/admin/login')->with('success', 'Başarıyla çıkış yaptınız.');
        } catch (\Exception $e) {
            // Hata durumunda loglama veya kullanıcıya hata mesajı gösterme
            Log::error('Çıkış hatası: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Çıkış sırasında bir hata oluştu. Lütfen tekrar deneyin.');
        }
    }
}