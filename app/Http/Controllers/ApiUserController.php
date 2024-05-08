<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ApiUserController extends Controller
{

  public function online() : JsonResponse
  {
      return response()->json([
        'status' => 'success',
        'data' => [
            'User1',
            'User2',
        ]
      ]);
  }
}