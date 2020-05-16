<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Registration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected function store(Request $request)
    {
        $user = User::where('email', $request->email)->get();
        if ($user->isNotEmpty()) {
            return redirect('/registracija')->with('warning', 'Postoji korisnik sa emailom ' . $request->email . '.');
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = 'user';
            $user->city = $request->city;
            $user->state = $request->state;
            $user->street = $request->street;
            $user->phone = $request->phone;
            $user->zip_code = $request->zip_code;
            $user->save();

            $address = new Address();
            $address->user_id = $user->id;
            $address->name = $request->name;
            $address->email = $request->email;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->street = $request->street;
            $address->phone = $request->phone;
            $address->zip_code = $request->zip_code;
            $address->save();
            return redirect('/registracija')->with('success', 'Korisnik ' . "$request->name" . ' uspješno registriran.');
        }
    }
}
