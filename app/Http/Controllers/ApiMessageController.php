<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiMessageController extends Controller
{

    public function create(Request $request) : JsonResponse
    {
        $msg = $request->input('msg', '');

        if (!is_string($msg) || mb_strlen($msg) > 255) {
            return response()->json([
                'status' => 'error',
                'data' => 'Message should be a string with max length of 255 characters',
            ], 400);
        }

        $user = $request->user();
        $user->messages()->create(['msg' => $msg]);

        return response()->json([
            'status' => 'success',
            'data' => 'Message added successfully',
        ]);
    }

    public function get(Request $request, Message $message) : JsonResponse
    {
        $time = $request->session()->get('last_get_at', now());
        $messages = $message->getAllAfterTimestamp($time);
        if (count($messages) > 0) {
            $request->session()->put('last_get_at', $messages->last()->created_at);
        }
        $user = $request->user();
        $user->touch();
        return response()->json([
            'status' => 'success',
            'data' => $messages,
        ]);
    }



}