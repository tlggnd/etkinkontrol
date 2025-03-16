<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => ['nullable', 'confirmed', Password::min(8)],
                'is_admin' => 'nullable|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->toArray()], 422);
            }

            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->is_admin = $request->is_admin ?? false;
            $user->save();

            return response()->json(['message' => 'Kullanıcı başarıyla güncellendi.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Bir hata oluştu: ' . $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'is_admin' => 'nullable|boolean',
        ], [
            'name.required' => 'Ad alanı zorunludur.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi girin.',
            'email.unique' => 'Bu e-posta adresi zaten kullanılıyor.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.confirmed' => 'Şifreler eşleşmiyor.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray(),
            ]);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin ?? false,
        ]);

        return response()->json([
            'status' => 1,
            'msg' => 'Kullanıcı başarıyla oluşturuldu.',
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Kullanıcı silindi.');
    }
}