<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class ApiUserController extends Controller
{

  public function online(User $modelUser) : JsonResponse
  {
      $users = $modelUser->getActiveUsersAfterTimestamp(now()->subSeconds(5));
      return response()->json([
          'status' => 'success',
          'data' => $users,
      ]);
  }
}