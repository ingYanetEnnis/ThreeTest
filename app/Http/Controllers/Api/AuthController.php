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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['cors']);
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request, AphavantageServiceApi $api)
    {
        $dataUser = $request->request->all();
        $dataUser['password'] = Hash::make($request->facebook_id);
        $user = User::firstOrCreate(
            ['facebook_id' => $request->facebook_id],
            $dataUser
        );;
        $token =  $user->createToken('MyApp')->accessToken;
        //$success['data'] =  $user->toArray();
        $success['url'] =  route('dashboard');
        return $this->sendResponse($success);

    }
}
