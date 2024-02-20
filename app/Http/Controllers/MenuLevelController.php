<?php

namespace App\Http\Controllers;

use App\Models\MenuLevel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class MenuLevelController extends Controller
{

    public function index()
    {
        $menuLevels = MenuLevel::all();
        
        return view('menuLevel.index', compact('menuLevels'));
    }

    public function create()
    {
        return view('menuLevel.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'LEVEL'   => 'required|string|max:60',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('menuLevel') // Ganti dengan nama route yang sesuai
                ->withErrors($validator)
                ->withInput();
        }


        // Generate a unique ID_USER value
        $uniqueID_LEVEL = $this->generateUniqueID_LEVEL();


        // Buat objek menu baru
        $menuLevel = MenuLevel::create([
            'ID_LEVEL' => $uniqueID_LEVEL,
            'LEVEL'   => $request->input('LEVEL'),
        ]);

        Alert::success('Menu Level successful!', '');
        return redirect()->route('MenuLevel');
        
    }
        
    
    private function generateUniqueID_Level()
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

    public function update(Request $request, MenuLevel $menuLevel)
    {
        $menuLevel->update($request->all());

        Alert::success('Menu Level Updated !', '');
        return redirect()->route('MenuLevel');
    }

    public function destroy(MenuLevel $menuLevel)
    {
        // dd($menu); 
        $menuLevel->delete();
        
        Alert::success('Menu Level deleted successfull', '');
        return redirect()->route('MenuLevel');
    }

    

}