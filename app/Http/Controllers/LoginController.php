<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Api\BaseApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseApiController
{
    public function login(Request $request)
    {
        $dataUser = $request->request->all();
        $dataUser['password'] = Hash::make($request->facebook_id);
        $user = User::firstOrCreate(
            ['facebook_id' => $request->facebook_id],
            $dataUser
        );;
        $success['url'] =  route('dashboard');
        Auth::login($user);
        return $this->sendResponse($success);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    }
}
