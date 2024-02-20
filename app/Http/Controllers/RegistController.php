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
use NoCaptcha;
use Carbon\Carbon;



class RegistController extends Controller
{
    public function showRegistForm()
    {
        return view('auth.regist');
    }

    // Metode untuk memproses formulir registrasi
    public function regist(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'NAMA_USER' => 'required|string|max:255',
            'USERNAME' => 'required|string|unique:users,USERNAME',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'g-recaptcha-response' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('regist')
                ->withErrors($validator)
                ->withInput();
        }

        // Generate a unique ID_USER value
        $uniqueID_USER = $this->generateUniqueID_USER();
        
       // Membuat user baru
        $user = User::create([
            'ID_USER' => $uniqueID_USER,
            'NAMA_USER' => $request->input('NAMA_USER'),
            'USERNAME' => $request->input('USERNAME'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'NO_HP' => null,
            'WA' => null,
            'PIN' => null,
            'ID_JENIS_USER' => '1',
            'STATUS_USER' => '1', // Atur status user sesuai kebutuhan
            'DELETE_MARK' => '1', // Tidak terhapus
            'CREATE_BY' => 'system', // Atur nilai CREATE_BY sesuai kebutuhan
            'CREATE_DATE' => now(),
            'UPDATE_BY' => null,
            'UPDATE_DATE' => null,
        ]);

        
        Alert::success('Registration successful!', '');
        return redirect()->route('regist');
    }

    private function generateUniqueID_USER()
    {
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
    
        // Generate a random letter
        $randomLetter = $letters[rand(0, strlen($letters) - 1)];
    
        // Generate a random string with a maximum length of 4 numbers
        $randomNumbers = '';
        for ($i = 0; $i < 4; $i++) {
            $randomNumbers .= $numbers[rand(0, strlen($numbers) - 1)];
        }
    
        // Combine the random letter and numbers
        $randomString = $randomLetter . $randomNumbers;
    
        return $randomString;
    }
}