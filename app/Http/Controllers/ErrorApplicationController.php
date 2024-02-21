<?php

namespace App\Http\Controllers;

use App\Models\ErrorApplication;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MenuLevel;


class ErrorApplicationController extends Controller
{

    public function index()
    {
        $errorApplications = ErrorApplication::all();
        $users = User::pluck('NAMA_USER', 'ID_USER');
        
        return view('error-application.index', compact('errorApplications', 'users'));
    }


    public function store(Request $request)
    {
        // Ambil informasi user yang sedang login
        $loggedInUser = Auth::user();

        // Generate a unique ID_USER value
        $uniqueID_ERROR = $this->generateUniqueID_ERROR();


        // Buat objek menu baru
        $errorApplication = ErrorApplication::create([
            'ERROR_ID' => $uniqueID_ERROR,
            'ID_USER'    => $request->input('ID_USER'),
            'MODULES'   => $request->input('MODULES'),
            'CONTROLLER'   => $request->input('CONTROLLER'),
            'FUNCTION'   => $request->input('FUNCTION'),
            'ERROR_LINE'   => $request->input('ERROR_LINE'),
            'ERROR_MESSAGE'   => $request->input('ERROR_MESSAGE'),
            'STATUS'   => $request->input('STATUS'),
            'PARAM'   => $request->input('PARAM'),

            'CREATE_DATE' => now(),
            'CREATE_TIME' => now(),
            'DELETE_MARK' => '1', // Tidak terhapus
            'UPDATE_BY' => null,
            'UPDATE_DATE' => null,
        ]);

        Alert::success('Error Application successful!', '');
        return redirect()->route('ErrorApplication');
        
    }
        
    
    private function generateUniqueID_ERROR()
    {
       // Generate a random integer within the range of int(11)
       $randomNo_Setting = rand(1, 10000);

       return $randomNo_Setting;
    }

 

    public function update(Request $request, ErrorApplication $errorApplication)
    {
        $errorApplication->update($request->all());

        Alert::success('Error Aplication Updated !', '');
        return redirect()->route('ErrorApplication');
    }


    public function destroy(ErrorApplication $errorApplication)
    {
        // dd($menu); 
        $errorApplication->delete();
        
        Alert::success('Error Aplication deleted successfull', '');
        return redirect()->route('ErrorApplication');
    }

    

}