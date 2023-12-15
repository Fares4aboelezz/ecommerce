<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
  public function redirecttogoogle(){
    return Socialite::driver('google')->redirect();
  }

  public function handlegooglecallback(){
 try{

    $user=Socialite::driver('google')->user();
    $finduser= User::where('social_id', $user->id)->first();
    if($finduser){
      Auth::login($finduser);
      return redirect('/home');
    }
    else{
     $newuser= User::create([
'name'=>$user->name,
'email'=>$user->email,
'password'=>Hash::make('google'),

      ]);
      Auth::login($newuser);
      return redirect('/home');
    }
  }

  catch(Exception $e){
dd($e->getMessage());
  }
  }


}
