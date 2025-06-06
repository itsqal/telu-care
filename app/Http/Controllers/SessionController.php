<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function createAdmin()
    {
        return view('auth.admin-login');
    }

    public function createUser()
    {
        return view('auth.user-login');
    }

    public function storeAdmin()
    {
        $attributes = request()->validate([
            'email' => [
                'required',
                'email',
                'regex:/^[^@\s]+@employee\.telkomuniversity\.ac\.id$/i'
            ],
            'password' => ['required']
        ], [
            'email.email' => 'Format email tidak valid. Pastikan format email sudah benar.',
            'email.regex' => 'Email harus menggunakan domain @employee.telkom.ac.id.',
            'email.required' => 'Mohon isi email dan password.',
            'password.required' => 'Mohon isi email dan password.'
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'credentials' => "Terdapat kesalahan pada email/password"
            ]);
        }

        request()->session()->regenerate();
        return redirect()->route('facilities.index');
    }

     public function storeUser()
    {
        $attributes = request()->validate([
            'email' => [ 'required', 'email' ],
            'password' => ['required']
        ], [
            'email.email' => 'Format email tidak valid. Pastikan format email sudah benar.',
            'email.required' => 'Mohon isi email dan password.',
            'password.required' => 'Mohon isi email dan password.'
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'credentials' => "Terdapat kesalahan pada email/password"
            ]);
        }

        request()->session()->regenerate();
        return redirect()->route('reports.index');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
