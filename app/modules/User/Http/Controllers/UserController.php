<?php

namespace App\modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modules\User\Http\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'userName' => 'required|string',
            'password' => 'required|string'
        ]);

        $result['status'] = 'ERR';
        $result['msg'] = '';
        if (!$validate->fails()) {
            $userName = $request->input('userName');
            $password = $request->input('password');
            $user = Users::where('name', $userName)->first();

            if (!is_null($user)) {
                if (Auth::attempt(['name' => $userName, 'password' => $password])) {
                    $result = [
                        'status' => 'OK',
                        'msg' => 'Login Success'
                    ];
                } else {
                    $result['msg'] = 'Password Error';
                }
            } else {
                $createUser = new Users;
                $createUser->name = $userName;
                $createUser->email = "";
                $createUser->password = Hash::make($password);
                $createUser->save();

                Auth::attempt(['name' => $userName, 'password' => $password]);
            }
        } else {
            $result['msg'] = 'Parameter Invalid';
        }

        return view('login')->with(['result' => $result]);
    }

    public function register(Request $request)
    {
        return view('login')->with(['type' => 'register']);
    }

    public function doRegister(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:users|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $result['status'] = 'ERR';
        $result['msg'] = '';
        if (!$validate->fails()) {
            $createUser = new Users;
            $createUser->name = $request->input('name');
            $createUser->email = "";
            $createUser->password = Hash::make($request->input('password'));
            $createUser->save();

            Auth::attempt(['name' => $request->input('name'), 'password' => $request->input('password')]);
        } else {
            $result['msg'] = 'user name is duplicated';
            return view('login')->with(['type' => 'register', 'result' => $result]);
        }

        return view('login')->with(['result' => $result]);
    }

    public function logout()
    {
        $result = [];
        if (Auth::check()) {
            Auth::logout();
            $result = [
                'status' => 'OK',
                'msg' => 'Logout Success'
            ];
        }

        return view('login')->with(['result' => $result]);
    }

    public function check()
    {
    }
}
