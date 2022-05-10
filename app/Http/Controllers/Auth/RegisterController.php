<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register.index');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        auth()->login($user);
        return redirect('/');
    }
}