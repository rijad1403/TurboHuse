<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItem;
use App\Http\Requests\UpdateItem;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Item;
use App\Manufacturer;
use JD\Cloudder\Facades\Cloudder;


use function PHPSTORM_META\type;

class ItemsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $items = Item::latest()->paginate(10);
        $manufacturers = Manufacturer::orderBy('title', 'asc')->get();
        return view('admin.items.index')->with(['items' => $items, 'manufacturers' => $manufacturers, 'filterMessage' => '']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItem $request)
    {
        // $title = iconv('UTF-8', 'ASCII//TRANSLIT', $request->title);
        $item = Item::where('title', $request->title)->get();
        if (!$item->isEmpty()) {
            return redirect('/artikli')->with('warning', 'Postoji artikl sa nazivom ' . $request->title . '.');
        }
        $newItem = new Item();
        $newItem->title = $request->title;
        $newItem->price = $request->price;
        $newItem->manufacturer_id = $request->car;
        $newItem->body = $request->body;
        $newItem->releaseYear = $request->releaseYear;
        $newItem->save();

        $imageUrls = collect();

        foreach ($request->file('image_upload') as $image) {
            $imagePath = $image->getRealPath();
            Cloudder::upload($imagePath, null);
            $imageUrls->push(Cloudder::getResult()['url']);
            $itemImage = new Image();
            $itemImage->item_id = $newItem->id;
            $itemImage->title = Cloudder::getResult()['url'];
            $itemImage->save();
        };

        // return response()->json(['message' => 'upload']);

        return redirect('/artikli')->with('success', 'Artikl ' . "$request->title" . ' dodan.');
    }

    public function upload(Request $request)
    {
        $images = $request->file('images');
        $imageUrls = collect();
        foreach ($images as $image) {
            $imagePath = $image->getRealPath();
            Cloudder::upload($imagePath, null);
            $imageUrls->push(Cloudder::getResult()['url']);
        }
        return response($imageUrls);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('admin.items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $manufacturers = Manufacturer::all();
        return view('admin.items.edit')->with(['item' => $item, 'manufacturers' => $manufacturers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(UpdateItem $request, $id)
    {
        $item = Item::where('title', $request->title)->get();
        $item = Item::find($id);
        $item->title = $request->title;
        $item->price = $request->price;
        $item->manufacturer_id = $request->car;
        $item->body = $request->body;
        $item->releaseYear = $request->releaseYear;
        $item->save();

        $imageUrls = collect();
        if ($request->hasFile('image_upload')) {
            foreach ($request->file('image_upload') as $image) {
                $imagePath = $image->getRealPath();
                Cloudder::upload($imagePath, null);
                $imageUrls->push(Cloudder::getResult()['url']);
                $itemImage = new Image();
                $itemImage->item_id = $item->id;
                $itemImage->title = Cloudder::getResult()['url'];
                $itemImage->save();
            };
        }

        // return response()->json(['message' => 'upload']);

        return back()->with('success', 'Artikl ' . "$request->title" . ' ažuriran.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/artikli')->with('success', 'Artikl ' . "$item->title" . ' uklonjen.');
    }

    public function search(Request $request)
    {
        $car = $request->car;
        $maxPrice = $request->maxPrice;
        $releaseYear = $request->releaseYear;
        $manufacturers = Manufacturer::all();

        $items = Item::when($car, function ($query, $car) {
            return $query->where('manufacturer_id', $car);
        })->when($maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })->when($releaseYear, function ($query, $releaseYear) {
            return $query->where('releaseYear', $releaseYear);
        })->paginate(10);

        $carFilter = $car ? 'proizvođač = ' . $manufacturers->find($car)->title . ';' : '';
        $maxPriceFilter = $maxPrice ? 'maximalna cijena = ' . $maxPrice . ' KM;' : '';
        $releaseYearFilter = $releaseYear ? 'godina izdavanja = ' . $releaseYear . ';' : '';
        $filterMessage = 'Pronađeno ' . $items->count() . ' rezultata: ' . $carFilter . ' ' . $maxPriceFilter . ' ' . $releaseYearFilter;
        return view('admin.items.index', ['items' => $items, 'manufacturers' => $manufacturers,])->with('filterMessage', $filterMessage);
    }
}
