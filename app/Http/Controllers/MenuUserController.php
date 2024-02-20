<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Menu;
use App\Models\MenuUser;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;


class MenuUserController extends Controller
{

    public function index()
    {
        $menuUsers = MenuUser::all();
        $menus = Menu::all();
        $users = User::pluck('NAMA_USER', 'ID_USER');

        return view('menuUser.index', compact('menuUsers','users','menus'));
    }

    public function create()
    {
        return view('menuUser.create');
    }

    public function store(Request $request)
    {  
        
        // Validasi input
        $validator = Validator::make($request->all(), [
            'ID_USER'    => 'required',
            'MENU_ID'    => 'required',
        ]);
        
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('menuUser') // Ganti dengan nama route yang sesuai
                ->withErrors($validator)
                ->withInput();
        }

        // Check if the entry already exists for the specified user and menu
        $existingEntry = MenuUser::where('ID_USER', $request->input('ID_USER'))
                ->where('MENU_ID', $request->input('MENU_ID'))
                ->first();

            if ($existingEntry) {
            // Entry already exists, handle accordingly (e.g., show error message)
            Alert::error('Error Message', 'Menu entry already exists for the user.');
            return redirect()->route('MenuUser');
            }

        // Generate a unique ID_USER value
        $uniqueNo_Setting = $this->generateUniqueNo_Setting();
        // Ambil informasi user yang sedang login
        $loggedInUser = Auth::user();

        // Buat objek menu baru
        $menuUser = MenuUser::create([

            'NO_SETTING' => $uniqueNo_Setting ,
            
            'ID_USER' =>  $request->input('ID_USER'),
            'MENU_ID'   => $request->input('MENU_ID'),

            'CREATE_BY'   => $loggedInUser->USERNAME, // Ganti dengan atribut yang sesuai
            'CREATE_DATE' => now(),
            'DELETE_MARK' => '1', // Tidak terhapus
            'UPDATE_BY' => null,
            'UPDATE_DATE' => null,
        ]);

        Alert::success('Menu User successful!', '');
        return redirect()->route('MenuUser');
     
    }
        
    
    private function generateUniqueNo_Setting()
    {
        // Generate a random integer within the range of int(11)
        $randomNo_Setting = rand(1, 10000);

        return $randomNo_Setting;
    }


    public function show(MenuUser $menuUser)
    {
        return view('menuUser.show', compact('menuUser'));
    }

    public function edit(MenuUser $menuUser)
    {
        return view('menuUser.edit', compact('menuUser'));
    }

    public function update(Request $request, MenuUser $menuUser)
    {
       
        
        // Check if the entry already exists for the specified user and menu
        $existingEntry = MenuUser::where('ID_USER', $request->input('ID_USER'))
                ->where('MENU_ID', $request->input('MENU_ID'))
                ->first();

            if ($existingEntry) {
            // Entry already exists, handle accordingly (e.g., show error message)
            Alert::error('Error Message', 'Menu entry already exists for the user.');
            return redirect()->route('MenuUser');
            }

        $menuUser->update($request->all());

        Alert::success('Menu User Updated !', '');
        return redirect()->route('MenuUser');
    }

    public function destroy(MenuUser $menuUser)
    {
        // dd($menu); 
        $menuUser->delete();
        
        Alert::success('Menu User deleted successfull', '');
        return redirect()->route('MenuUser');
    }

    

}