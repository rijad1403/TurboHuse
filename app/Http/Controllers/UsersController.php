<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\User;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->paginate(5);
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $user = User::where('email', $request->email)->get();
        if ($user->isNotEmpty()) {
            return redirect('/korisnici')->with('warning', 'Postoji korisnik sa emailom ' . $request->email . '.');
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = $request->type;
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
            return redirect('/korisnici')->with('success', 'Korisnik ' . "$request->name" . ' uspješno registriran.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        $users = User::where('id', '!=', $id)->get();
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($users->where('email', $request->email)->isNotEmpty()) {
            return false;
        }
        // $user->type = $request->type;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->street = $request->street;
        $user->phone = $request->phone;
        $user->zip_code = $request->zip_code;
        $user->save();
        return true;
    }

    public function updateUser(UpdateUser $request, $id)
    {
        return $this->update($request, $id) ? back()->with('success', 'Korisnik ' . $request->email . ' ažuriran.') : back()->with('warning', 'Postoji korisnik sa mailom ' . $request->email);
    }

    public function updateProfile(UpdateUser $request, $id)
    {
        return $this->update($request, $id) ? back()->with('success', 'Profil ažuriran.') : back()->with('warning', 'Postoji korisnik sa mailom ' . $request->email);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function myProfile()
    {
        if (Auth::check()) {
            return view('profile.index', ['user' => Auth::user()]);
        }
        return redirect('/prijava');
    }
}
