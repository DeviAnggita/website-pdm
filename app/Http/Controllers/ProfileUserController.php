<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JenisUser;
use App\Models\UserFoto;
use App\Models\MenuUser;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class ProfileUserController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $jenisUsers = JenisUser::all(); // Assuming you have a model for JenisUser
        $menus = MenuUser::where('ID_USER', $user->ID_USER)->get();
    
        return view('profileUser.index', compact('user', 'jenisUsers', 'menus'));
    }
    



    
    private function generateUniqueNo_Foto()
    {
        // Generate a random integer within the range of int(11)
        $randomNo_Setting = rand(1, 10000);

        return $randomNo_Setting;
    }


     
    private function uploadPhoto($file, $user, $loggedInUser)
    {
        $uniqueNO_FOTO = $this->generateUniqueNO_FOTO();
        $fileName = $user->NAMA_USER . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(storage_path('app/public/FotoProfile'), $fileName);

        return $fileName;
    }



    

    public function updateFotoProfile(Request $request, User $user, UserFoto $userFoto, $id_user)
    {
        
        $loggedInUser = Auth::user();
        $user = User::findOrFail($id_user);
    
        // FOTO NYA MASUK KE USER FOTO
        // Check if the user has an associated photo
        if ($user->userFoto) {
            // Update existing userFoto record
            $user->userFoto->update([
                'FOTO' => $this->uploadPhoto($request->file('FOTO'), $user, $loggedInUser),
            ]);
        } else {
            // Create a new userFoto record
            UserFoto::create([
                'NO_FOTO' => $this->generateUniqueNO_FOTO(), // Add this line to provide a value for NO_FOTO
                'ID_USER' => $user->ID_USER,
                'FOTO' => $this->uploadPhoto($request->file('FOTO'), $user, $loggedInUser),
                'CREATE_BY' => $loggedInUser->USERNAME,
                'CREATE_DATE' => now(),
                'DELETE_MARK' => '1',
                'UPDATE_BY' => null,
                'UPDATE_DATE' => null,
            ]);
        }
    
        Alert::success('User Updated!', '');
        return redirect()->route('user.profile');
    }
    

    public function updateKelolaPengguna(Request $request, User $user,  $id_user)
    {
        $user = User::findOrFail($id_user);
        
        $user->ID_JENIS_USER = $request->ID_JENIS_USER;
        $user->NAMA_USER = $request->NAMA_USER;
        $user->NO_HP = $request->NO_HP;
        $user->WA = $request->WA;
        $user->PIN = $request->PIN;

        $user->save();
    

        Alert::success('User Updated!', '');
        return redirect()->route('user.profile');
    }


    public function updateKelolaAkun(Request $request, User $user, $id_user)
    {
        $user = User::findOrFail($id_user);
        $user->USERNAME = $request->USERNAME;
        $user->email = $request->email;
        
        // $user->update($request->all());

        // Periksa apakah password baru diberikan dan berbeda dengan password lama
        if ($request->has('password') && !empty($request->password) && $request->password != '********') {
            if ($user->password != $request->password) {
                $user->password = Hash::make($request->password);
            }
        }

        $user->save();
        
        if ($user) {
            return redirect()
                ->route('user.profile')
                ->with([
                    Alert::success('User Updated!', '')
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    Alert::error('Gagal', 'Data Gagal Diubah'),
                ]);
        }
    }

}