<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Jobs\Users\CreateUser;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        // return response()->json(['data' => $user], 200);

        $data = $user;

        return response()->json([
            'errors'  => ($user) ? false : true,
            'success' => ($user) ? true : false,
            'data'    => $data
        ]);
    }


    public function store(Request $request)
    {
        $response = $this->ajaxDispatch(new CreateUser($request));

        if ($response['success']) {
            //$response['redirect'] = route('roles.index');

            $message = trans('messages.success.added', ['type' => trans_choice('general.roles', 1)]);

            //flash($message)->success();
        } else {
            //$response['redirect'] = route('roles.create');

            $message = $response['message'];

            //flash($message)->error();
        }

        return response()->json($response);
    }
}
