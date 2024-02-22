<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


use App\Models\User;

class AdminDashboardController extends Controller
{

    public function index()
    {
        $users = Auth::user();

        return view('adminDashboard.index', ['users' => $users]);
    }

}