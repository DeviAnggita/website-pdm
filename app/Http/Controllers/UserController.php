<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JenisUser;
use App\Models\UserFoto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MenuLevel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function index()
    {
        $users = User::all(); 
        $jenisUsers = JenisUser::all(); // Assuming you have a model for JenisUser
        return view('user.index', compact('users', 'jenisUsers'));
    }  

    public function store(Request $request)
    {
         //     // Validasi input
        $validator = Validator::make($request->all(), [
            'NAMA_USER' => 'required|string|max:255',
            'USERNAME' => 'required|string|unique:users,USERNAME',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'NO_HP' => 'required',
            'WA' => 'required',
            'PIN' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('users')
                ->withErrors($validator)
                ->withInput();
        }

        // Generate unique IDs
        $uniqueID_USER = $this->generateUniqueID_USER();
        $uniqueNO_FOTO = $this->generateUniqueNO_FOTO();

        // Get the logged-in user
        $loggedInUser = Auth::user();

        if ($request->hasFile('FOTO')) {
            $file = $request->file('FOTO');
            $fileName = '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/FotoProfile'), $fileName);
            // Create user
            $user = User::create([
                'ID_USER' => $uniqueID_USER,
                'NAMA_USER' => $request->input('NAMA_USER'),
                'USERNAME' => $request->input('USERNAME'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'NO_HP' =>  $request->input('NO_HP'),
                'WA' =>  $request->input('WA'),
                'PIN' =>  $request->input('PIN'),
                'ID_JENIS_USER' => '1',
                'STATUS_USER' => '1',
                'DELETE_MARK' => '1',
                'CREATE_BY'   => $loggedInUser->USERNAME,
                'CREATE_DATE' => now(),
                'UPDATE_BY' => null,
                'UPDATE_DATE' => null,
            ]);
            $userFoto = UserFoto::create([
                'NO_FOTO' => $uniqueNO_FOTO,
                'ID_USER' => $uniqueID_USER,
                'FOTO' => $fileName,
                'CREATE_BY' => $loggedInUser->USERNAME,
                'CREATE_DATE' => now(),
                'DELETE_MARK' => '1',
                'UPDATE_BY' => null,
                'UPDATE_DATE' => null,
            ]);
        }

        Alert::success('Created New User successful!', '');
        return redirect()->route('users');
    }
    
    public function update(Request $request, User $user, UserFoto $userFoto)
    {
        $loggedInUser = Auth::user();

        // Update user information
        $user->update($request->all());

        // Check if a new photo is provided in the request
        if ($request->hasFile('FOTO')) {
            // Check if the user has an associated photo
            if ($user->userFoto) {
                // Update existing userFoto record
                $user->userFoto->update([
                    'FOTO' => $this->uploadPhoto($request->file('FOTO'), $user, $loggedInUser),
                ]);
            } else {
                // Create a new userFoto record
                UserFoto::create([
                    'ID_USER' => $user->ID_USER,
                    'FOTO' => $this->uploadPhoto($request->file('FOTO'), $user, $loggedInUser),
                    'CREATE_BY' => $loggedInUser->USERNAME,
                    'CREATE_DATE' => now(),
                    'DELETE_MARK' => '1',
                    'UPDATE_BY' => null,
                    'UPDATE_DATE' => null,
                ]);
            }
        }

        Alert::success('User Updated!', '');
        return redirect()->route('users');
    }

    private function uploadPhoto($file, $user, $loggedInUser)
    {
        $uniqueNO_FOTO = $this->generateUniqueNO_FOTO();
        $fileName = $user->NAMA_USER . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(storage_path('app/public/FotoProfile'), $fileName);

        return $fileName;
    }


    private function generateUniqueNo_Foto()
    {
        // Generate a random integer within the range of int(11)
        $randomNo_Setting = rand(1, 10000);

        return $randomNo_Setting;
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

    public function destroy(User $user)
    {
        // dd($user); 
        $user->delete();
        
        Alert::success('User deleted successfull', '');
        return redirect()->route('users');
    }

}