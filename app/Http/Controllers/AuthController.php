<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    { 
        $datainput = $request->all();

        $credentials = $request->only('email', 'password');
        $credentials['email'] = $request->input('email');
        $credentials['password'] = $request->input('password');


        $recaptcha_secret =  "6Lfr6nUpAAAAAAlLK6P3zTuyRkKJ28vCtt4nPmiu";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" .  $datainput['g-recaptcha-response']);
        $response = json_decode($response, true);

        if (!isset($datainput['g-recaptcha-response'])) {
            return back()->withInput()->withErrors([
                'g-recaptcha-response' => 'Failed to verify reCAPTCHA. Please try again.'
            ]);
        }

        $validationErrors = [];
        if ($response["success"] === true) {
            if (Auth::attempt($credentials)) {
               
                // Authentication successful
                $user = Auth::user();
                // // Check user status and delete mark
                if ($user->STATUS_USER == '1' && $user->DELETE_MARK == '1') {

                    // Login berhasil
                    Alert::success('Login Successful', '');

              // Periksa peran pengguna
                if ($user->ID_JENIS_USER == 0) {
                    return redirect()->route('admin.dashboard'); // admin
                } else {
                    return redirect()->route('user.dashboard'); // user
                }


                } else {
                    // Pengguna tidak aktif atau telah dihapus
                    Auth::logout();
                    $validationErrors['email'] = 'Akun tidak aktif atau telah dihapus.';
                }
             
            } else {
                // Login gagal
                $validationErrors['email'] = 'Login Gagal. Kredensial tidak valid.';
            }
            
        } else {
            // Login gagal (captcha tidak valid)
            $validationErrors['email'] = 'reCAPTCHA validation failed.';
        }

        // dd($request->all());
        return back()->withErrors($validationErrors)->withInput($request->except('password'))->with('closeButton', true);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}