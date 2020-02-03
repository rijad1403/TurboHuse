<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManufacturer;
use Illuminate\Http\Request;
use App\Manufacturer;

class ManufacturersController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(StoreManufacturer $request)
    {
        $manufacturer = Manufacturer::where('title', $request->title)->get();
        if (!$manufacturer->isEmpty()) {
            return redirect('/admin/artikli')->with('warning', 'Postoji proizvođač sa nazivom ' . $request->title . '.');
        } else {
            $newManufacturer = new Manufacturer();
            $newManufacturer->title = $request->title;
            $newManufacturer->save();
            return redirect('/admin/artikli');
        }
    }
}
