<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use App\Models\User;
use App\Models\Menu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MenuLevel;
use Spatie\Activitylog\Facades\Activity;
use Spatie\Activitylog\Traits\LogsActivity;


class UserActivityController extends Controller
{

    public function index()
    {
        $userActivitys = UserActivity::all();
        $menus = Menu::all();
        $users = User::all();
        
        return view('user-Activity.index', compact('userActivitys', 'menus','users'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'ID_USER' => 'required',
            'MENU_ID' => 'required',
            'DISCRIPSI' => 'required',
            'STATUS' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('UserActivity') // Ganti dengan nama route yang sesuai
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil informasi user yang sedang login
        $loggedInUser = Auth::user();

        // Generate a unique ID_USER value
        $uniqueNo_Activity = $this->generateUniqueNo_Activity();

        // Buat objek menu baru
        $userActivity = UserActivity::create([
            'NO_ACTIVITY' => $uniqueNo_Activity,
            'ID_USER' => $request->input('ID_USER'),
            'DISCRIPSI' => $request->input('DISCRIPSI'),
            'STATUS' => $request->input('STATUS'),
            'MENU_ID' => $request->input('MENU_ID'),
            'DELETE_MARK' => '1', // Tidak terhapus
            'CREATE_BY' => $loggedInUser->USERNAME, // Ganti dengan atribut yang sesuai
            'CREATE_DATE' => now(),
        ]);

        Alert::success('User Activity successful!', '');
        return redirect()->route('UserActivity');
    }


    private function generateUniqueNo_Activity()
    {
        // Generate a random integer within the range of int(11)
        $randomNo_Setting = rand(1, 10000);

        return $randomNo_Setting;
    }

    
    public function update(Request $request, UserActivity $userActivity)
    {
       
        $userActivity->update($request->all());

        Alert::success('User Activity Updated !', '');
        return redirect()->route('UserActivity');
    }


    public function destroy(UserActivity $userActivity)
    {
        $userActivity->delete();
        
        Alert::success('User Activity deleted successfull', '');
        return redirect()->route('UserActivity');
    }

}