<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiMessageController extends Controller
{

  public function create(Request $request)
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