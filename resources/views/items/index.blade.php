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
                <button class="btn btn-primary" data-toggle="modal" data-target="#newItem"><i
                        class="fas fa-plus-circle"></i> Dodaj artikl</button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#newManufacturer"><i class="fas
                    fa-plus-circle"></i> Dodaj
                    proizvođača</button>
            </div>
            <form action="/admin/artikli/search" method="GET">
                <div class="form-group">
                    <label for="car-select"><i class="fas fa-car"></i> Proizvođač</label>
                    <select class="form-control" id="car-select" name="car">
                        <option value="">Izaberite proizvođača</option>
                        @forelse ($manufacturers as $manufacturer)
                        <option value={{ $manufacturer->id }}>{{ $manufacturer->title }}</option>
                        @empty
                        <option value="">Nema unešenih proizvođača...</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="price"><i class="fas fa-coins"></i> Cijena (KM)</label>
                    <input type="text" name="maxPrice" id="price" class="form-control"
                        placeholder="Maksimalna cijena, npr. 1000">
                </div>
                <div class="form-group">
                    <label for="cijena"><i class="fas fa-calendar"></i> Godina proizvodnje</label>
                    <input type="text" name="releaseYear" id="releaseYear" class="form-control" placeholder="Npr. 2005">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Prikaži rezultate</button>
            </form>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-9">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @elseif (session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('warning') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @elseif ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endforeach
                    @endif
                    @if ($filterMessage != '')
                    <div class="alert alert-light" role="alert">
                        {{ $filterMessage }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                @forelse ($items as $item)
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card item" style="width: 80%;">
                        <a href=" /admin/artikli/{{$item->id}} " class="item-link">
                            <img class="card-img-top" src=" {{asset('images/items/test.jpg')}} " alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <small class="text-muted">{{$item->manufacturer->title}}</small>
                            <h5 class="card-title">{{$item->title}}</h5>
                            <h5 class="card-title">{{$item->price}} KM</h5>
                            <button class="btn btn-primary" onclick="addToCart({{ $item }})"><i
                                    class="fas fa-cart-plus"></i>
                                Dodaj u
                                košaru</button>
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

<div class="modal fade" id="newItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Artikl</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/artikli/save" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title"><i class="fas fa-heading"></i> Naziv</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Naziv artikla">
                    </div>
                    <div class="form-group">
                        <label for="body"><i class="fas fa-file-signature"></i> Opis</label>
                        <textarea name="body" id="body" class="form-control" cols="30" rows="10"
                            placeholder="Opis artikla"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="car-select"><i class="fas fa-car"></i> Proizvođač</label>
                        <select class="form-control" id="car-select" name="car">
                            @forelse ($manufacturers as $manufacturer)
                            <option value={{ $manufacturer->id }}>{{ $manufacturer->title }}</option>
                            @empty
                            <option value="">Nema unešenih proizvođača...</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price"><i class="fas fa-coins"></i> Cijena (KM)</label>
                        <input type="number" name="price" id="price" class="form-control"
                            placeholder="Cijena, npr. 100">
                    </div>
                    <div class="form-group">
                        <label for="releaseYear"><i class="fas fa-calendar"></i> Godina proizvodnje</label>
                        <input type="number" name="releaseYear" id="releaseYear" class="form-control"
                            placeholder="Npr. 2005">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>
                        Spremi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="newManufacturer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proizvođač</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/proizvodjaci/save" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title"><i class="fas fa-car"></i> Naziv</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Naziv proizvođača">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Spremi</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection