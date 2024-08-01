<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Redirect based on role
        $role = Auth::user()->role;

        switch ($role) {
            case 'Admin':
                $redirectTo = '/admin-ju/senarai-profil-bod';
                break;
            case 'Agensi':
                $redirectTo = '/agensi/senarai-permohonan-maklumat-rawatan';
                break;
            case 'Klinik':
                $redirectTo = '/klinik-hq/dashboard';
                break;
            case 'Penyemak':
                $redirectTo = '/penyemak/dashboard';
                break;
            case 'Penyokong':
                $redirectTo = '/penyokong/dashboard';
                break;
            case 'Doctor':
                $redirectTo = '/doctor/dashboard';
                break;
            default:
                $redirectTo = '/laman-utama'; // Fallback URL
                break;
        }

        return redirect()->intended($redirectTo);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}