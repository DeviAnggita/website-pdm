<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Carbon\Carbon; 
use Hash;


class ForgotController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);
    
        $receiver = $request->input('email');
      
          // Extract user ID
          $user = User::where('email', $receiver)->first();
          if (!$user) {
            // Handle the case when the user with the given email is not found
            return redirect()->route('forgot')->with('error', 'User not found');
        }
        
        $subject="Forgot Password";
        $body_user = $user->id;
        $token = Str::random(64);

        $existingToken = DB::table('password_reset_tokens')
                        ->where('email', $request->email)
                        ->first();

        if ($existingToken) {
            // Email sudah ada di dalam tabel, lakukan update atau hapus entri yang sudah ada.
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]);
        
            // Atau hapus entri yang sudah ada:
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->delete();
        } else {
            // Email belum ada di dalam tabel, lakukan penyisipan data baru.
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        
            // $token = ['token' => $token];
        
            $subject = "Forgot Password";
            $body_user = $user->id;
            $this->sendEmail($receiver, $body_user, $subject, $token);
        }

        // Alert::success('Email berhasil dikirim!', '');
        // return redirect()->route('forgot');
        return redirect()->route('forgot')->with('success', 'Email sudah terkirim.');        
        }

    public function sendEmail($receiver, $body_user,$subject, $token)
    {
        if ($this->isOnline()) {
            $email = [
                'recepient' => $receiver,
                'fromEmail' => 'manajemen_SDM@gmail.com',
                'fromName' => 'PT ABCD',
                'subject' => $subject,
                'body' => $body_user,
                'token' => $token,
            ];
              Mail::send('auth.email', $email, function ($message) use ($email) {
                $message->from($email['fromEmail'], $email['fromName']);
                $message->to($email['recepient']);
                $message->subject($email['subject']);
            });
        }
        
    }

    public function isOnline($site = "https://www.youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }


    public function showResetForm($token)
    {
        return view('auth.reset',  ['token' => $token]);
        
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
    
  
}