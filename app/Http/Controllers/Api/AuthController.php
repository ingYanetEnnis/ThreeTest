<?php
namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Services\AphavantageServiceApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseApiController
{

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $dataUser = $request->request->all();
        $dataUser['password'] = Hash::make($request->facebook_id);
        $user = User::firstOrCreate(
            ['facebook_id' => $request->facebook_id],
            $dataUser
        );;
        $success['url'] =  route('dashboard');
        return $this->sendResponse($success);

    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
    }
}
