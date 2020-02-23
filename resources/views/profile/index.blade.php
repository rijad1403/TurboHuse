@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-4">
            <h2>Moji podaci</h2>
            <hr>
            <div class="form-group">
                <p><i class="fas fa-heading"></i> Ime i prezime:
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
                <p><i class="fas fa-map-marker-alt"></i> Adresa:
                    <span style="font-weight: bold">{{ $user->address }}</span>
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
                <button type="button" class="btn btn-primary"><i class="far fa-edit"></i> Uredi profil</button>
            </div>
        </div>
        <div class="col-1">

        </div>
        <div class="col-7">
            <h2>Moje kupovine</h2>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Šifra kupovine</th>
                        <th scope="col">Cijena</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>5555444</td>
                        <td>500 KM</td>
                        <td>U obradi</td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                title="Pogledaj kupovinu" onclick="selectUser({{ $user }})"><i
                                    class="fas fa-info-circle"></i>
                            </button>
                            <button class="btn btn-primary" title="Ponovi kupovinu"><i class="fas fa-redo-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection