@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-12">
            <h2>kurv</h2>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8" id="cart">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" colspan="2" style="text-align: center;">Produkt</th>
                        <th scope="col">Pris</th>
                        <th scope="col">Količina</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h2>Adresa isporuke</h2>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="/cart/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Fornavn og efternavn</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Fornavn og efternavn"
                        value="{{ Auth::user() ? Auth::user()->name : '' }}">
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                        value="{{ Auth::user() ? Auth::user()->email : '' }}">
                </div>
                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone-square-alt"></i> Telefon</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefon"
                        value="{{ Auth::user() ? Auth::user()->phone : '' }}">
                </div>
                <div class="form-group">
                    <label for="street"><i class="fas fa-map-marker-alt"></i> Addresse</label>
                    <input type="text" name="street" id="street" class="form-control" placeholder="Addresse"
                        value="{{ Auth::user() ? Auth::user()->street : '' }}">
                </div>
                <div class="form-group">
                    <label for="city"><i class="fas fa-city"></i> By</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="By"
                        value="{{ Auth::user() ? Auth::user()->city : '' }}">
                </div>
                <div class="form-group">
                    <label for="state"><i class="fas fa-globe"></i> Land</label>
                    <input type="text" name="state" id="state" class="form-control" placeholder="Land"
                        value="{{ Auth::user() ? Auth::user()->state : '' }}">
                </div>
                <div class="form-group">
                    <label for="zip_code"><i class="fas fa-file-invoice"></i> Postnummer</label>
                    <input type="text" name="zip_code" id="zip_code" class="form-control" placeholder="Postnummer"
                        value="{{ Auth::user() ? Auth::user()->zip_code : '' }}">
                </div>
                <input type="hidden" name="cart_items" id="cartItems">
                <input type="hidden" name="total_price" id="totalPrice">
                <input type="hidden" name="address" value="2">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" onclick="localStorage.removeItem('cartItems')"><i
                            class="far fa-check-circle"></i> Potvrdi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
