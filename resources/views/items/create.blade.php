@extends('layouts.master')
@section ('content')

<div class="container-fluid content">
    <div class="row">
        <div class="col-12 p-0">
            <h2>Novi artikl</h2>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    {{ $message }}
                </div>
            @endif
            <form action="/items/store" method="post">
                @csrf
                <div class="form-group">
                    <label for="title"><i class="fas fa-font"></i> Naziv</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="Naziv turbine">
                </div>
                <div class="form-group">
                    <label for="manufacturer"><i class="fas fa-car"></i> Proizvođač</label>
                    <select class="form-control" id="car-select" name="manufacturer">
                        <option selected>Izaberite proizvođača</option>
                        <option value="Audi">Audi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="model"><i class="fas fa-car"></i> Model</label>
                    <select name="model" id="model" class="form-control">
                        <option selected>Izaberite model</option>
                        <option value="A3">A3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price"><i class="fas fa-coins"></i> Cijena (KM)</label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="Cijena, npr. 100">
                </div>
                <div class="form-group">
                    <label for="quantity"><i class="fas fa-list-ol"></i> Kvantitet</label>
                    <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Broj artikala">
                </div>
                <div class="form-group">
                    <label for="releaseYear"><i class="fas fa-calendar"></i> Godina proizvodnje</label>
                    <input type="text" name="releaseYear" id="" class="form-control" placeholder="Npr. 2005">
                </div>
                <div class="form-group">
                    <label for="body"><i class="fas fa-info-circle"></i> Opis</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Opis artikla..."></textarea>
                </div>
                <button class="btn btn-primary" type="submit"><i class="far fa-plus-square"></i> Dodaj artikl</button>
            </form>
        </div>
    </div>
</div>

@endsection