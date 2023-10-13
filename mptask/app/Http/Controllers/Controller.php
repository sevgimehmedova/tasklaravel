<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmation;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Your registration logic...

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        Mail::to($user->email)->send(new RegistrationConfirmation($user));

        return redirect()->route('console')->with('success', 'Registration successful! Please check your email for confirmation.');
    }
}
