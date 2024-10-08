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
                        @foreach ($item->images as $image)
                        @if ($loop->first)
                        <a href="{{ $image->title }}" data-lightbox="item-main">
                            <img src=" {{ $image->title }} "
                                style="width: 100%; border: 2px solid white; box-shadow: 4px 4px 4px 1px lightgrey;">
                        </a>
                        @break
                        @endif
                        @endforeach
                    </div>
                    <div class="row" style="margin-top: 10px">
                        @forelse ($item->images as $image)
                        <a href="{{ $image->title }}" data-lightbox="items" style="display: inline-block; width: 25%">
                            <img src=" {{ $image->title }} " style="width: 100%; border: 2px solid white; box-shadow: 4px 4px 4px 1px lightgrey;
                        ">
                        </a>

                        @empty

                        @endforelse
                    </div>
                </div>
                <div class="col-md-6" style="padding: 20px 10px;">
                    <p>
                        Pris: {{ number_format($item->price,2,",",".") }} DKK
                    </p>
                    <p>
                        Bilmærke: {{$item->manufacturer->title}}
                    </p>
                    <p style="text-align: justify;">Beskrivelse:
                    </p>
                    <p id="desc"></p>

                    <style>
                        #desc>* {
                            font-family: "Montserrat", sans-serif !important;
                        }
                    </style>
                    <script>
                        document.querySelector('#desc').innerHTML = @json($item->body);
                    </script>
                    @if (!Auth::user() || Auth::user()->type == 'user')
                    <button class="btn btn-primary" onclick="addToCart({{ $item }})"><i class=" fas fa-cart-plus"></i>
                        Tilføj til kurv</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
