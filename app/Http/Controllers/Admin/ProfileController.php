<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Validasyon hatası', 'errors' => $validator->errors()], 422);
        }


        try {
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->hasFile('profile_photo_path')) {
                // Eski profil resmini sil (varsa)
                if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                    Storage::disk('public')->delete($user->profile_photo_path);
                }
                // Yeni resmi yükle
                $imagePath = $request->file('profile_photo_path')->store('profile-photos', 'public');
                $user->profile_photo_path = $imagePath;
            }

            $user->save();
            return response()->json(['status' => 'success', 'message' => 'Profiliniz başarıyla güncellendi.']);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Profil güncellenirken bir hata oluştu: ' . $e->getMessage()], 500);
        }
    }



    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
             return response()->json(['status' => 'error', 'message' => 'Validasyon hatası', 'errors' => $validator->errors()], 422);
        }


        if (!Hash::check($request->current_password, $user->password)) {
           return response()->json(['status' => 'error', 'message' => 'Mevcut şifreniz doğru değil.'], 422);
        }

        try {
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['status' => 'success', 'message' => 'Şifreniz başarıyla güncellendi.']);

        } catch (\Exception $e) {
             return response()->json(['status' => 'error', 'message' => 'Şifre güncellenirken bir hata oluştu: ' . $e->getMessage()], 500);
        }
    }
}