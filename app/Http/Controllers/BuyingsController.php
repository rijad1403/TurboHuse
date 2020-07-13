<?php

namespace App\Http\Controllers;

use App\Buying;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $buyings = collect();
            if (Auth::user()->type == 'admin') {
                $buyings = Buying::all();
            } else if (Auth::user()->type == 'user') {
                $buyings = Auth::user()->buyings;
            }
            return view('admin.buyings.index', ['user' => Auth::user(), 'buyings' => $buyings]);
        } else {
            return redirect('/prijava');
        }
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buying  $buying
     * @return \Illuminate\Http\Response
     */
    public function show(Buying $buying)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buying  $buying
     * @return \Illuminate\Http\Response
     */
    public function edit(Buying $buying)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buying  $buying
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buying $buying)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buying  $buying
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buying $buying)
    {
        //
    }
}
