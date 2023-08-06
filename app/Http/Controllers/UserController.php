<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('backend.pages.login');
    }

    public function doLogin(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:6'

        ]);


        $credentials = $request->except(['_token']);
        if (auth()->attempt($credentials)) {
            //true block

            return redirect()->route('home')->with('msg', 'login success');
        } else {
            //false block

            return redirect()->back()->withErrors(['Invalid login information']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.logout')->with('msg', 'Logout success');
    }
}
