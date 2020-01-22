@extends('layouts.master')
@section('content')

<!-- Item -->
<div class="container-fluid content">
    <div class="row">
        <div class="col-12 p-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">početna</a></li>
                    <li class="breadcrumb-item"><a href="/artikli">artikli</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{$item->title}}</li>
                </ol>
            </nav>
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
                    <h3>
                        {{$item->title}}
                    </h3>
                    <p>
                        Cijena: {{$item->price}} KM
                    </p>
                    <p>
                        Proizvođač: {{$item->manufacturer->title}}
                    </p>
                    <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Dodaj u košaru</button>
                </div>
            </div>
            <div class="row" style="background: white; box-shadow: 1px 1px 20px 1px lightgray; padding: 20px 10px;">
                <h3>Opis</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque reiciendis earum magnam repe llat
                    aperiam qui corrupti quasi exc ept uri saepe do lo re mque vitae eligendi, nesciunt voluptates!
                    Repellat nesciunt quibusdam deleniti expedita sed.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection