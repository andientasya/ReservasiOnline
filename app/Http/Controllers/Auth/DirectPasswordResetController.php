<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class DirectPasswordResetController extends Controller
{
    public function showResetForm()
    {
        return view('auth.direct-reset-password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => ['required', 'confirmed', Password::defaults()],
        ], [
            'email.exists' => 'Email tidak ditemukan.',
        ]);

        $user = User::where('email', $request->email)->first();
        
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('status', 'Password berhasil diubah! Silakan login dengan password baru.');
    }
}