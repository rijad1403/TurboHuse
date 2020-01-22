@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row">
        <div class="col-12 p-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">početna</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2>top artikli</h2>
            <hr>
        </div>
    </div>
    <div class="row items">
    <div class="col-sm-12 col-md-12 col-lg-3">
            <div class="form-group">
                <label for="car-select"><i class="fas fa-car"></i> Proizvođač</label>
                <select class="form-control" id="car-select">
                    <option selected>Izaberite proizvođača</option>
                    <option value="">Audi</option>
                    <option value="">BMW</option>
                    <option value="">Golf</option>
                </select>
            </div>
            <div class="form-group">
                <label for="model-select"><i class="fas fa-car"></i> Model</label>
                <select name="" id="model-select" class="form-control">
                <option selected>Izaberite model</option>
                    <option value="">Audi</option>
                    <option value="">BMW</option>
                    <option value="">Golf</option>
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
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card item" style="width: 80%;">
                        <img class="card-img-top" src=" {{asset('images/items/test.jpg')}} " alt="Card image cap">
                        <div class="card-body">
                            <small class="text-muted">Audi A3</small>
                            <h5 class="card-title">400 KM</h5>
                            <p class="card-text">lorem ipsum</p>
                            <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Dodaj u košaru</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card item" style="width: 80%;">
                        <img class="card-img-top" src=" {{asset('images/items/test.jpg')}} " alt="Card image cap">
                        <div class="card-body">
                            <small class="text-muted">Audi A3</small>
                            <h5 class="card-title">400 KM</h5>
                            <p class="card-text">lorem ipsum</p>
                            <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Dodaj u košaru</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card item" style="width: 80%;">
                        <img class="card-img-top" src=" {{asset('images/items/test.jpg')}} " alt="Card image cap">
                        <div class="card-body">
                            <small class="text-muted">Audi A3</small>
                            <h5 class="card-title">400 KM</h5>
                            <p class="card-text">lorem ipsum</p>
                            <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Dodaj u košaru</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card item" style="width: 80%;">
                        <img class="card-img-top" src=" {{asset('images/items/test.jpg')}} " alt="Card image cap">
                        <div class="card-body">
                            <small class="text-muted">Audi A3</small>
                            <h5 class="card-title">400 KM</h5>
                            <p class="card-text">lorem ipsum</p>
                            <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Dodaj u košaru</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card item" style="width: 80%;">
                        <img class="card-img-top" src=" {{asset('images/items/test.jpg')}} " alt="Card image cap">
                        <div class="card-body">
                            <small class="text-muted">Audi A3</small>
                            <h5 class="card-title">400 KM</h5>
                            <p class="card-text">lorem ipsum</p>
                            <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Dodaj u košaru</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card item" style="width: 80%;">
                        <img class="card-img-top" src=" {{asset('images/items/test.jpg')}} " alt="Card image cap">
                        <div class="card-body">
                            <small class="text-muted">Audi A3</small>
                            <h5 class="card-title">400 KM</h5>
                            <p class="card-text">lorem ipsum</p>
                            <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Dodaj u košaru</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card item" style="width: 80%;">
                        <img class="card-img-top" src=" {{asset('images/items/test.jpg')}} " alt="Card image cap">
                        <div class="card-body">
                            <small class="text-muted">Audi A3</small>
                            <h5 class="card-title">400 KM</h5>
                            <p class="card-text">lorem ipsum</p>
                            <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Dodaj u košaru</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
