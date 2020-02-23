@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-12">
            <h2>košara</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form action="/admin/korisnici/save" method="GET">
                <div class="form-group">
                    <label for="name"><i class="fas fa-heading"></i> Ime i prezime</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Ime i prezime"
                        value="{{ Auth::user() ? Auth::user()->name : '' }}">
                </div>
                <div class="form-group">
                    <label for="email"><i class="far fa-envelope"></i> Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                        value="{{ Auth::user() ? Auth::user()->email : '' }}">
                </div>
                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone-square-alt"></i> Telefon</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefon"
                        value="{{ Auth::user() ? Auth::user()->phone : '' }}">
                </div>
                <div class="form-group">
                    <label for="address"><i class="fas fa-map-marker-alt"></i> Adresa</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Adresa"
                        value="{{ Auth::user() ? Auth::user()->address : '' }}">
                </div>
                <div class="form-group">
                    <label for="city"><i class="fas fa-city"></i> Grad</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="Grad"
                        value="{{ Auth::user() ? Auth::user()->city : '' }}">
                </div>
                <div class="form-group">
                    <label for="state"><i class="fas fa-globe"></i> Država</label>
                    <input type="text" name="state" id="state" class="form-control" placeholder="Država"
                        value="{{ Auth::user() ? Auth::user()->state : '' }}">
                </div>
                <div class=" form-group">
                    <label for="zipCode"><i class="fas fa-file-invoice"></i> Poštanski broj</label>
                    <input type="text" name="zipCode" id="zipCode" class="form-control" placeholder="Poštanski broj"
                        value="{{ Auth::user() ? Auth::user()->zipCode : '' }}">
                </div>
            </form>
        </div>
        <div class="col-6" id="cart">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-primary"><i class="far fa-save"></i> Spremi</button>
        </div>
    </div>

</div>
@endsection