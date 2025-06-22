<?php

namespace App\Http\Controllers\Students\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('students_dashboard.auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'user_name' => $request->user()->user_name,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('students_dashboard.auth.password'),
            ]);
        }

        $request->session()->put('students_dashboard.auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::STUDENT_HOME);
    }
}
