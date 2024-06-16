<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view("frontend.login.login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::flash('berhasil', 'Login berhasil!');
            Session::put('username',$user->name);
            if ($user->role == 'admin') {
                return redirect()->route('dashboard_admin');
            } elseif ($user->role == 'user') {
                return redirect()->route('dashboard');
            }
        } else {
            Session::flash('gagal_login', 'Email atau password salah!');
            return redirect()->route('form');
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:225',
            'email' => 'required|email|string|max:225|unique:users',
            'password' => 'required|string|min:8',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar sebelumnya',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password harus lebih dari 8 karakter'
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // default role
        ]);

        Auth::login($user);
        return redirect()->route('home')->with('berhasil', 'Berhasil mendaftar');
    }
}
