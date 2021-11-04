<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['api']);
    }


    public function index(){
        $user = User::find(1);
        $user['token'] = $user->createToken('MyApp')->accessToken;
        return view('dashboard', ['user' => $user->toArray()]);
    }
}
