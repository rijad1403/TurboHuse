<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;

class ManufacturersController extends Controller
{
    public function index() {
        $manufacturers = Manufacturer::all();
    }

    public function create() {
        return view('manufacturers.create');
    }

    public function store(Request $request) {
        $manufacturer = new Manufacturer();
        $manufacturer->title = $request->input('title');
        $manufacturer->save();
        redirect('manufacturers/create');
    }
}
