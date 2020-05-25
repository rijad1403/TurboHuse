<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use App\Http\Requests\StoreOrUpdateManufacturer;

class ManufacturersController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::orderBy('title', 'asc')->get();
        return view('admin.manufacturers.index', ['manufacturers' => $manufacturers]);
    }

    public function create()
    {
    }

    public function store(StoreOrUpdateManufacturer $request)
    {
        $manufacturer = Manufacturer::where('title', $request->title)->get();
        if ($manufacturer->isNotEmpty()) {
            return back()->with('warning', 'Postoji proizvođač sa nazivom ' . $request->title . '.');
        } else {
            $newManufacturer = new Manufacturer();
            $newManufacturer->title = $request->title;
            $newManufacturer->save();
            return back()->with('success', 'Proizvođač ' . $request->title . ' dodan.');
        }
    }

    public function update(StoreOrUpdateManufacturer $request, $id)
    {
        $manufacturer = Manufacturer::where('title', $request->title)->get();
        if ($manufacturer->isNotEmpty()) {
            return redirect('/proizvodjaci')->with('warning', 'Postoji proizvođač sa nazivom ' . $request->title . '.');
        } else {
            $manufacturer = Manufacturer::find($id);
            $manufacturer->title = $request->title;
            $manufacturer->save();
            return redirect('/proizvodjaci')->with('success', 'Proizvođač ' . $request->title . ' ažuriran.');
        }
    }

    public function destroy($id)
    {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect('/proizvodjaci')->with('success', 'Proizvođač ' . $manufacturer->title . ' uklonjen.');
    }
}
