@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row">
        <div class="col-12 p-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">početna</a></li>
                    <li class="breadcrumb-item">artikli</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2>artikli</h2>
            <hr>
        </div>
    </div>
    <div class="row items">
        <div class="col-sm-12 col-md-12 col-lg-3">
            <div class="form-group">
                <label for="car-select"><i class="fas fa-car"></i>Proizvođač</label>
                <select class="form-control" id="car-select">
                    @forelse ($manufacturers as $manufacturer)
                    <option value={{ $manufacturer }}>{{ $manufacturer->title }}</option>
                    @empty
                    <option value="">Nema unešenih proizvođača...</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="cijena"><i class="fas fa-coins"></i> Cijena (KM)</label>
                <input type="text" name="" id="" class="form-control" placeholder="Minimalna cijena, npr. 100">
            </div>
            <div class="form-group">
                <input type="text" name="" id="" class="form-control" placeholder="Maksimalna cijena, npr. 1000">
            </div>
            <div class="form-group">
                <label for="cijena"><i class="fas fa-calendar"></i> Godina proizvodnje</label>
                <input type="text" name="" id="" class="form-control" placeholder="Npr. 2005">
            </div>
            <button class="btn btn-primary"><i class="fas fa-search"></i> Prikaži 1000 rezultata</button>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-9">
            <div class="row">
                @forelse ($items as $item)
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card item" style="width: 80%;">
                        <a href=" items/{{$item->id}} " class="item-link">
                            <img class="card-img-top" src=" {{asset('images/items/test.jpg')}} " alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <small class="text-muted">{{$item->manufacturer->title}}</small>
                            <h5 class="card-title">{{$item->title}}</h5>
                            <h5 class="card-title">{{$item->price}} KM</h5>
                            <p class="card-text">{{$item->name}}</p>
                            <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Dodaj u košaru</button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <p>
                        Nema unešenih artikala...
                    </p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>


@endsection