<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('pages.auth.login');
    }
    public function createRegistration()
    {
        return view('pages.auth.register');
    }
    public function storeRegistration(Request $request)
    {
        // return $request;

        $insertUserData = [
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => 0,
            'status' => 1,
            'remember_token' => $request->_token,
            'password' => Hash::make($request->pswd)
        ];
        $registration = User::create($insertUserData);
        return view('pages.auth.login');
    }

    public function loginCheck(Request $request)
    {

        // return $request;
        $user_log = User::where('email', $request->username)->first();
        // dd($user_log);
        $email = $request->username;

        if ($user_log) {
            // if ($user_log->status == 0) {
                if (Auth::attempt(['email' => $request->username, 'password' => $request->userpassword])) {
                    $request->session()->put('username', $user_log->id);
                    return redirect('/');
            } else {
                $request->session()->put('username','username and password is not correct');
                return redirect('/login');
            }
        }
    }

    public function logoutCheck(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
