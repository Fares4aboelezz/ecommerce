<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $UserRepository;


    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function show(){
        return view('auth.updateprofile');
    }

    public function updateProfile(Request $request){

        $user=auth()->user();

        $request->validate([
'email'=>'required|email|unique:users,email',
'password'=>'required|min:8'
        ]);
       $data= $request->only(['email','password']);
       $this->UserRepository->updateProfile($data,$user);
return redirect()->route('login')->with('success,Profile Updated Successfully');
    }
}
