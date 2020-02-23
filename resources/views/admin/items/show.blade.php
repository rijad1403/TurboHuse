@extends('layouts.master')
@section('content')

<!-- Item -->
<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-12">
            <h2>{{ $item->title }}</h2>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row" style="background: white; box-shadow: 1px 1px 20px 1px lightgray; margin-bottom: 20px;">
                <div class="col-md-6" style="padding: 0;">
                    <div class="row">
                        <img src=" {{asset('images/turbine.jpg')}} " style="width: 100%; border: 2px solid white;">
                    </div>
                    <div class="row">
                        <img src=" {{asset('images/turbine.jpg')}} " style="width: 25%; border: 2px solid white;">
                        <img src=" {{asset('images/turbine.jpg')}} " style="width: 25%; border: 2px solid white;">
                        <img src=" {{asset('images/turbine.jpg')}} " style="width: 25%; border: 2px solid white;">
                        <img src=" {{asset('images/turbine.jpg')}} " style="width: 25%; border: 2px solid white;">
                    </div>
                </div>
                <div class="col-md-6" style="padding: 20px 10px;">
                    <p>
                        Cijena: {{$item->price}} KM
                    </p>
                    <p>
                        Proizvođač: {{$item->manufacturer->title}}
                    </p>
                    <p style="text-align: justify;">Opis: {{ $item->body }}
                    </p>
                    <button class="btn btn-primary" onclick="addToCart({{ $item }})"><i class=" fas fa-cart-plus"></i>
                        Dodaj u košaru</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection