<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\User\StoreRequest;

class SignupController extends Controller  
{
    public function index()
    {
        return view('signup'); 
    } 
    public function store(StoreRequest $request)
    {
        $data = $request->old('name');
        $data = $request->old('email');
        // dd($username); 

        $data = $request->except('_token', 'password_confirmation');
        $data['created_at'] = new \DateTime();
        $data['password'] = Hash::make($data['password']);
        DB::table('users')->insert($data);
        return redirect()->route('signin')->with('success', 'Sign up success');
    }
}
