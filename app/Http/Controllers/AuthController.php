<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Kreait\Firebase\Auth;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function index()
    {
        return view('login');
        // return view ('login');
    }

    public function login(Request $request) 
    {
        // dd($request);
      
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // dd($request);
        
        try {
            //authenticate with firebase
            $firebaseAuth = Firebase::auth();
            $signInResult = $firebaseAuth->signInWithEmailAndPassword($request->email,$request->password);

            $user = $signInResult->data();
            // dd($user);

            // return view('home', ['user'=> $user]);
            Session::flash('SUCCSSS', 'GOOD.');
            // dd('Redirigiendo a users.index');
            // return redirect()->route('users.index');
            // return view('home');
            return redirect()->route('home'); // Asumiendo que tienes una ruta llamada 'home'


        } catch (\Exception $e) {
            //throw $th;
            dd($e->getMessage());
            return redirect()->route('login');
            Session::flash('error', 'Login failed. Please try again.');
        }

    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

}
