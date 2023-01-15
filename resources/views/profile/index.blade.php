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
        <div class="col-lg-4">
            <h2>Moji podaci</h2>
            <hr>
            <div class="form-group">
                <p><i class="fas fa-user"></i> Fornavn og efternavn:
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
                <p><i class="fas fa-map-marker-alt"></i> Adresse:
                    <span style="font-weight: bold">{{ $user->street }}</span>
                </p>
            </div>
            @if (Auth::user()->type == 'admin')
            <div class="form-group">
                <p><i class="fas fa-user-cog"></i> Brugertype:
                    <span style="font-weight: bold">{{ $user->type == 'admin' ? 'Administrator' : '' }}</span>
                </p>
            </div>
            @endif

            <div class="form-group">
                <p><i class="fas fa-city"></i> By:
                    <span style="font-weight: bold">{{ $user->city }}</span>
                </p>
            </div>
            <div class="form-group">
                <p><i class="fas fa-globe"></i> Land:
                    <span style="font-weight: bold;">{{ $user->state }}</span>
                </p>
            </div>
            <div class="form-group">
                <p><i class="fas fa-file-invoice"></i> Postnummer:
                    <span style="font-weight: bold;">{{ $user->zip_code }}</span>
                </p>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="far fa-edit"></i> Rediger profil</button>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rediger profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/profil/{{ $user->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user"></i> Fornavn og efternavn</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}"
                                    placeholder="Fornavn og efternavn">
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

                            {{-- <div class="form-group">
                                <label for="type"><i class="fas fa-user"></i> Tip korisnika</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="user" {{ $user->type == 'user' ? 'selected' : '' }}>
                            Korisnik</option>
                            <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>
                                Administrator</option>
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="city"><i class="fas fa-city"></i> By</label>
                            <input type="text" name="city" id="city" class="form-control" value="{{ $user->city }}"
                                placeholder="By">
                        </div>
                        <div class="form-group">
                            <label for="state"><i class="fas fa-globe"></i> Land</label>
                            <input type="text" name="state" id="state" class="form-control" value="{{ $user->state }}"
                                placeholder="Land">
                        </div>
                        <div class="form-group">
                            <label for="street"><i class="fas fa-map-marker-alt"></i> Adresse</label>
                            <input type="text" name="street" id="street" class="form-control"
                                value="{{ $user->street }}" placeholder="Adresse">
                        </div>
                        <div class="form-group">
                            <label for="zipCode"><i class="fas fa-file-invoice"></i>
                                Postnummer
                            </label>
                            <input type="text" name="zip_code" id="zipCode" class="form-control"
                                value="{{ $user->zip_code }}" placeholder="Postnummer">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>
                        Gem</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
