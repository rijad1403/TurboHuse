@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
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
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if (Auth::user()->type == 'admin')
            <h2>Narudžbe</h2>
            @else
            <h2>Moje narudžbe</h2>
            @endif
            <hr>
            @if ($buyings->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID kupovine</th>
                        <th scope="col">Cijena</th>
                        <th scope="col">Vrijeme kreiranja narudžbe</th>
                        <th scope="col">Vrijeme slanja narudžbe</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buyings as $buying)
                    <tr>
                        <td>#{{ $buying->id }}</td>
                        <td>{{ $buying->total_price }} KM</td>
                        <td>{{ $buying->created_at }}</td>
                        <td>{{ $buying->updated_at }}</td>
                        <td class="{{ $buying->status == 'U obradi' ? 'yellowText' : ''  }}"> {{ $buying->status  }}
                        </td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal{{$buying->id}}" title="Pogledaj narudžbu"><i
                                    class="fas fa-info-circle"></i>
                            </button>
                            @if (Auth::user()->type == 'admin')
                            <button class="btn btn-primary" title="Poništi narudžbu"><i class="fas fa-times"></i>
                            </button>
                            @endif
                            <div class="modal fade" id="exampleModal{{$buying->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"
                                                style="text-align: center; width: 100%;">
                                                Kupovina <span style="font-weight: bold;">#{{$buying->id}}</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span style="font-weight: bold;" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="row justify-content-center mt-3">
                                            <div class="col-lg-4">
                                                Ime i prezime:
                                                <span style="font-weight: bold;">{{ $user->name }}</span>
                                            </div>
                                            <div class="col-lg-4">
                                                Email:
                                                <span style="font-weight: bold;">{{ $user->email }}</span>
                                            </div>
                                            <div class="col-lg-4">
                                                Telefon:
                                                <span style="font-weight: bold;">{{ $user->phone }}</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center mt-3">
                                            <div class="col-lg-4">
                                                Grad:
                                                <span style="font-weight: bold;">{{ $user->city }}</span>
                                            </div>
                                            <div class="col-lg-4">
                                                Ulica:
                                                <span style="font-weight: bold;">{{ $user->street }}</span>
                                            </div>
                                            <div class="col-lg-4">
                                                Poštanski broj:
                                                <span style="font-weight: bold;">{{ $user->zip_code }}</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center mt-3">

                                            <div class="col-lg-4">
                                                Država:
                                                <span style="font-weight: bold;">{{ $user->state }}</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center mt-3">
                                            <div class="col-lg-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" colspan="2" style="text-align: center;">
                                                                Artikl</th>
                                                            <th scope="col">Količina</th>
                                                            <th scope="col">Cijena</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($buying->items as $item)
                                                        <tr>
                                                            <td><img style="width: 100px; height: auto;"
                                                                    src="{{asset('images/items/test.jpg')}}" alt="">
                                                            </td>
                                                            <td>
                                                                <a href="/artikli/{{ $item->id }}">
                                                                    {{ $item->title }}</a>
                                                            </td>
                                                            <td>{{ $item->pivot->quantity }}</td>
                                                            <td>{{ $item->price }} KM</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td colspan="4" style="text-align: right;">
                                                                Ukupna cijena: <span
                                                                    style="font-weight: bold;">{{$buying->total_price}}
                                                                    KM</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>Vaša lista kupovina je prazna.</p>
            @endif
        </div>
    </div>
</div>

@endsection
