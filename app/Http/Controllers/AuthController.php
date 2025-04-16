<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\RechaptaRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    public function login()
    {
        return view("auth.index");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function authenticate(Request $request): RedirectResponse
    {

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'g-recaptcha-response' => ['required'],
        ]);

        $recaptchaToken = $request->input('g-recaptcha-response');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('GOOGLE_RECAPTHA_SECRET'),
            'response' => $recaptchaToken,
        ]);

        $recaptchaData = $response->json();

        if (!$recaptchaData['success']) {
            return back()->with('error', 'reCAPTCHA verification failed, please try again.');
        }

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with("error", "Credential is not match");
    }

    public function create_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Simpan user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect atau response
        return redirect('/login')->with('success', 'Registration Successfully');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
