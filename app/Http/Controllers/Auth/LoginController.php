<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)) :
            return redirect()->to('auth.login')
                ->withErrors(trans('auth.failed'));
            dd(1);
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user)
    {
        return $this->redirectTo($user);
    }

    public function redirectTo($data)
    {
        $user = $data;
        if (Auth::user()->role == '1') //1 = Admin Login
        {
            return redirect()->route('show.home');
        } elseif (Auth::user()->role == '0') // Normal or Default User Login
        {
            return redirect()->route('show.home');
        }
    }
}