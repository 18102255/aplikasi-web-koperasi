<?php

namespace App\Http\Controllers;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {

     return view("sesi/index");
    }
    function login(Request $request)
    {
        session::flash('name', $request->name);
        Session::flash('username', $request->username);
        $request->validate([
                    'nama'=>'require',
                    'username'=>'required',
                    'password'=>'required'],
                    
                    [
                        'nama.required' => 'nama wajjib di isi',
                        'username.required' => 'username wajib di isi',
                        'username.username'=>'silakan masikan username yang valid',
                      'password.required' => 'password waj ib di isi',]);

        $data =[
            'nama' => $request->name,
            'username' => $request->username,
            'password' => ($request->password)
        ];

        User::create();
        
        $infologin = [
            'username' => $request->username,
            'password' => $request->password];

        if (Auth::attempt($infologin)) {
            //jika verif sukses
                return redirect('')->with('sucess', 'Berhasil login');
        } else{
            //jika verif gagal  
            //return 'gagal';
            return redirect('sesi')->withErrors('username dan password yang dimasukan tidak valid');
        }          

    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success','Berhasil logout');

    }

    function register(){
        return view('sesi/register');
    }
    function create()
    {

    }
}
