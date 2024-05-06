<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function loginForm()
  {
    return view('login-form');
  }

  public function eduId() {
    return redirect()->away('https://chabloz.eu/aai/?dev');
  }

  public function login(Request $request)
  {
    $isEmail = strpos($request->input('name'), '@');
    $credentials = $request->validate([
      'name' => ['required', $isEmail ? 'email' : 'alpha'],
      'password' => ['required'],
    ]);

    if ($isEmail) {
      $credentials['email'] = $credentials['name'];
      unset($credentials['name']);
    }

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('chat');
    }

    return back()
      ->with('error', 'Login failed')
      ->onlyInput('name');
  }

  public function loginEduId(Request $request) {
    dd($request->input('token'));
  }


}