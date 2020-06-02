<?php

namespace App\Http\Controllers;

use App\Image;
use App\Item;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    //

    public function destroy(Request $request, $id)
    {
        $selected_images = collect(json_decode($request->selected_images));
        $images = Image::where('item_id', $id)->get();
        if ($selected_images->count() >= $images->count()) {
            return back()->with('warning', 'Uklanjanje neuspješno. Artikli mora sadržavati minimalno jednu sliku.');
        }
        foreach ($selected_images as $image) {
            $image = Image::find($image->id);
            $image->delete();
        }

        return back()->with('success', 'Slika/slike uspješno uklonjene.');
    }
}
