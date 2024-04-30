<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiUserController extends Controller
{

  public function online()
  {
    // return json response
    return response()->json([
      'status' => 'success',
      'data' => [
        'User1',
        'User2',
      ]
    ]);
  }
}