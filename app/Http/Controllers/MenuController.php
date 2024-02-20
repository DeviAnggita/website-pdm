<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MenuLevel;


class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::with('level')->get();
        $menuLevels = MenuLevel::all();
        
        return view('menu.index', compact('menus', 'menuLevels'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
    
        // Validasi input
        $validator = Validator::make($request->all(), [
            'ID_LEVEL'    => 'required',
            'MENU_NAME'   => 'required|string|max:255',
            'MENU_LINK'   => 'required|string|max:255',
            'MENU_ICON'   => 'required|string|max:255',
            'PARENT_ID'   => 'nullable|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('menus') // Ganti dengan nama route yang sesuai
                ->withErrors($validator)
                ->withInput();
        }

         // Ambil informasi user yang sedang login
         $loggedInUser = Auth::user();

        // Generate a unique ID_USER value
        $uniqueID_MENU = $this->generateUniqueID_MENU();


        // Buat objek menu baru
        $menu = Menu::create([
            'MENU_ID' => $uniqueID_MENU,
            'ID_LEVEL'    => $request->input('ID_LEVEL'),
            'MENU_NAME'   => $request->input('MENU_NAME'),
            'MENU_LINK'   => $request->input('MENU_LINK'),
            'MENU_ICON'   => $request->input('MENU_ICON'),
            'PARENT_ID'   => $request->input('PARENT_ID'),

          
            'CREATE_BY'   => $loggedInUser->USERNAME, // Ganti dengan atribut yang sesuai
            'CREATE_DATE' => now(),
            'DELETE_MARK' => '1', // Tidak terhapus
            'UPDATE_BY' => null,
            'UPDATE_DATE' => null,
        ]);

        Alert::success('Menu successful!', '');
        return redirect()->route('menus');
        
    }
        
    
    private function generateUniqueID_MENU()
    {
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
    
        // Generate a random letter
        $randomLetter = $letters[rand(0, strlen($letters) - 1)];
    
        // Generate a random string with a maximum length of 2 numbers
        $randomNumbers = '';
        for ($i = 0; $i < 2; $i++) {
            $randomNumbers .= $numbers[rand(0, strlen($numbers) - 1)];
        }
    
        // Combine the random letter and numbers
        $randomString = $randomLetter . $randomNumbers;
    
        return $randomString;
    }

    public function show(Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->all());

        Alert::success('Menu Level Updated !', '');
        return redirect()->route('menus');
    }


    public function destroy(Menu $menu)
    {
        // dd($menu); 
        $menu->delete();
        
        Alert::success('Menu deleted successfull', '');
        return redirect()->route('menus');
    }

    

}