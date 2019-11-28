<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class SecurityController extends Controller
{
    public function loginView()
    {
        //check if authenticated
        if (Auth::check()) {

            //if admin
            if (!Auth::user()->title == 'admin') {
                return redirect('/dashboard');
            }
            //if customer
            return redirect('/');
        }

        return view('login');
    }
    public function loginUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if (Auth::check()) {
            //if admin
            if (Auth::user()->title == 'admin') {
                return redirect('/dashboard');
            }
            //if customer
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }
    public function registerView()
    {
        //check if authenticated
        if (Auth::check()) {

            //if admin
            if (Auth::user()->title == 'admin') {
                return redirect('/dashboard');
            }
            //if customer
            return redirect('/');
        }

        return view('register');
    }

    public function register( Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'title' => 'customer'
        ]);

        //login user
        auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if (Auth::check()) {

            //if admin
            if (!Auth::user()->title == 'admin') {
                return redirect('/dashboard');
            }
            //if customer
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public function registerAdmin($email, $password)
    {
        $user = User::create([
            'email' => $email,
            'password' => bcrypt($password),
                'title'=> 'admin'
        ]);

        $data = array('message' => 'user created', 'data' => $user);
        return Response($data, 202);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/login');
    }

}
