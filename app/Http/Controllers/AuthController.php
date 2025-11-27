<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
public function registerUser(Request $request){
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ], [
        'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',
    ]);

    $userCount = User::count();

    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->role = $userCount === 0 ? 'admin' : 'user';
    $user->save();

    return redirect('/')->with('success', 'Registrasi Berhasil');
}
public function showLoginForm(){
   return view('auth.login');
}
public function loginUser(Request $request){
     $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
         if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'login berhasil');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
}
        public function logoutUser(Request$request){
             Auth::logout();
 
                $request->session()->invalidate();
            
                $request->session()->regenerateToken();

                return redirect('/')->with('success', 'logout berhasil');
        }
        public function getprofile(){
            $userAuth = Auth::user()->profile;
            $userId = Auth::id();

            $profileData = Profile::where('user_id', $userId)->first();

            if($userAuth){
               return view ("profile.edit", ["profile"=>$profileData]);
            }
               else{
                return view("profile.create");      
               }
            }
            public function createProfile(Request$request){

                //validation
                 $request->validate([
                    'age' => 'required|numeric',
                    'address' => 'required|string|max:255',
                    ]);

                    $userId = Auth ::id();
                $profile = new Profile();
                $profile->age = $request->input('age');
                $profile->address = $request->input('address');
                $profile->user_id = $userId;
                $profile->save();

                return redirect('/profile')->with('success', 'Profile created successfully');
            }
                public function updateProfile(Request$request, $id){

                //validation
                 $request->validate([
                    'age' => 'required|numeric',
                    'address' => 'required|string|max:255',
                    ]);

                $profile = profile::find($id);
                $profile->age = $request->input('age');
                $profile->address = $request->input('address');
                $profile->save();

                return redirect('/profile')->with('success', 'Berhasil update profile');
            }
        }
