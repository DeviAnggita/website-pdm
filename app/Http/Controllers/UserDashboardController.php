<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


use App\Models\User;
use App\Models\MenuUser;

class UserDashboardController extends Controller
{

    public function index()
    {
         // Assuming you have a relationship between USER and MENU_USER
        $user = Auth::user();
        $menus = MenuUser::where('ID_USER', $user->ID_USER)->get();

        return view('userDashboard.index', ['menus' => $menus]);
    }

}