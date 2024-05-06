<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function loginForm()
  {
    return view('login-form');
  }

  public function eduId() {
    return redirect()->away(config('eduid.url'));
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
      ->with('error', 'Wrong credentials')
      ->onlyInput('name');
  }

  public function loginEduId(Request $request) {
    $data = $request->input('data', 'nodata');
    $h = $request->input('h', 'nohash');
    $key = config('eduid.key');
    if (!hash_equals(hash_hmac('sha256', $data, $key), $h)) {
      return redirect()->route('login-form')->with('error', 'EDU-ID sign in failed');
    }
    $userData = json_decode(base64_decode($data), true);
    $email = $userData['email'];
    $name = $userData['lastname'] . ' ' . $userData['firstname'];

    $user = User::firstOrCreate(['email' => $email], ['name' => $name]);
    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('chat');
  }


}