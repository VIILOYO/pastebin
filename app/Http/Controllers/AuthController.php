<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{

    public function __construct(
        public readonly AuthService $authService
    )
    {}

    /**
     * @return View
     */
    public function login(): View
    {
        return view('auth.login');
    }

    /**
     * @param AuthRequest $request
     * @return RedirectResponse
     */
    public function customLogin(AuthRequest $request): RedirectResponse
    {
        $data = $request->only('name', 'password');

        if (Auth::attempt($data)) {
            return redirect()->intended('dashboard');
        }

        return redirect()->route('login');
    }

    /**
     * @return View
     */
    public function registration(): View
    {
        return view('auth.registration');
    }

    /**
     * @param AuthRequest $request
     * @return RedirectResponse
     */
    public function customRegistration(AuthRequest $request): RedirectResponse
    {
        $data = $request-> validated();
        $this->authService->regUser($data);

        return redirect()->route('login');
    }

    /**
     * @return View|Redirector
     */
    public function dashboard(): View|Redirector
    {
        if(Auth::check()){
            return view('home');
        }

        return redirect("login");
    }

    /**
     * @return Redirector
     */
    public function signOut(): Redirector
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
