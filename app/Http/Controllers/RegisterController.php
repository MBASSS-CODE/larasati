<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create ()
    {
        return view('register.create', [
            'title'=> 'Register',
            'active' => 'login'
        ]);
    }

    public function store (Request $request)
    {
        $validatedData = $request->validate([
            'name'      => 'required|max:255', //menggunakan pipe
            'username'  => ['required', 'min:4', 'max:255', 'unique:users'], //menggunakan array
            'email'     => 'required|email:dns|unique:users', // harus uniq dari data yang ada pada table user, email:dns digunakan untuk validasi email agar sesuai dns yang ada (.com dll)
            'password'  => 'required|min:5|max:255'
        ]);

        // hash password menggunakan bcrypt sebelum di simpan 
        // $validatedData['password'] = bcrypt($validatedData['password']); //manual
        $validatedData['password'] = Hash::make($validatedData['password']); // Menggunakan class laravel. Sama saja dengan manual
        
        // simpan
        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please Login'); //dipisah
        return redirect('/login')->with($request->session()->flash('success', 'Registration successfull! Please Login')); //digabung
    }
}
