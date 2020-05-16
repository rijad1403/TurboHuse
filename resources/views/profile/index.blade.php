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
    <div class="row {{Auth::user()->type == 'admin' ? 'justify-content-center': ''}}">
        <div class="col-lg-4">
            <h2>Moji podaci</h2>
            <hr>
            <div class="form-group">
                <p><i class="fas fa-user"></i> Ime i prezime:
                    <span style="font-weight: bold;">{{ $user->name }}</span>
                </p>
            </div>
            <div class="form-group">
                <p><i class="fas fa-envelope"></i> Email:
                    <span style="font-weight: bold;">{{ $user->email }}</span>
                </p>
            </div>
            <div class="form-group">
                <p><i class="fas fa-phone-square-alt"></i> Telefon:
                    <span style="font-weight: bold">{{ $user->phone }}</span>
                </p>
            </div>
            <div class="form-group">
                <p><i class="fas fa-map-marker-alt"></i> Ulica:
                    <span style="font-weight: bold">{{ $user->street }}</span>
                </p>
            </div>
            <div class="form-group">
                <p><i class="fas fa-city"></i> Grad:
                    <span style="font-weight: bold">{{ $user->city }}</span>
                </p>
            </div>
            <div class="form-group">
                <p><i class="fas fa-globe"></i> Država:
                    <span style="font-weight: bold;">{{ $user->state }}</span>
                </p>
            </div>
            <div class="form-group">
                <p><i class="fas fa-file-invoice"></i> Poštanski broj:
                    <span style="font-weight: bold;">{{ $user->zip_code }}</span>
                </p>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="far fa-edit"></i> Ažuriraj profil</button>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ažuriraj profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/profil/{{ $user->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user"></i> Ime i prezime</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}"
                                    placeholder="Ime i prezime">
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ $user->email }}" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="fas fa-phone-square-alt"></i> Telefon</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ $user->phone }}" placeholder="Telefon">
                            </div>

                            <div class="form-group">
                                <label for="type"><i class="fas fa-user"></i> Tip korisnika</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="user" {{ $user->type == 'user' ? 'selected' : '' }}>
                                        Korisnik</option>
                                    <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>
                                        Administrator</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="city"><i class="fas fa-city"></i> Grad</label>
                                <input type="text" name="city" id="city" class="form-control" value="{{ $user->city }}"
                                    placeholder="Grad">
                            </div>
                            <div class="form-group">
                                <label for="state"><i class="fas fa-globe"></i> Država</label>
                                <input type="text" name="state" id="state" class="form-control"
                                    value="{{ $user->state }}" placeholder="Država">
                            </div>
                            <div class="form-group">
                                <label for="street"><i class="fas fa-map-marker-alt"></i> Ulica, broj
                                    kuće</label>
                                <input type="text" name="street" id="street" class="form-control"
                                    value="{{ $user->street }}" placeholder="Ulica, broj kuće">
                            </div>
                            <div class="form-group">
                                <label for="zipCode"><i class="fas fa-file-invoice"></i> Poštanski
                                    broj</label>
                                <input type="text" name="zip_code" id="zipCode" class="form-control"
                                    value="{{ $user->zip_code }}" placeholder="Poštanski broj">
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
        @if (Auth::user()->type == 'user')

        <div class="col-lg-8">
            <h2>Moje kupovine</h2>
            <hr>
            @if ($user->buyings && $user->buyings->isNotEmpty())
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
                    @foreach ($user->buyings as $buying)
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
                            <button class="btn btn-primary" title="Poništi narudžbu"><i class="fas fa-times"></i>
                            </button>
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
        @endif
    </div>
</div>


@endsection