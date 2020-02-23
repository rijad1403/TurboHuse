@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-12">
            <h2>Registracija</h2>
            <hr>
        </div>
    </div>
    <div class="row items justify-content-center">
        <div class="col-lg-4">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
            @endif
            <form action="/admin/korisnici/save" method="GET">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"><i class="fas fa-heading"></i> Ime i prezime</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ime i prezime">
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="far fa-envelope"></i> Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="">
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fas fa-key"></i> Lozinka</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Lozinka"
                            value="">
                    </div>
                    <div class="form-group">
                        <label for="type"><i class="fas fa-user"></i> Tip korisnika</label>
                        <select class="form-control" id="type" name="type">
                            <option value="user">Korisnik</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city"><i class="fas fa-city"></i> Grad</label>
                        <input type="text" name="city" id="city" class="form-control" placeholder="Grad">
                    </div>
                    <div class="form-group">
                        <label for="state"><i class="fas fa-globe"></i> Država</label>
                        <input type="text" name="state" id="state" class="form-control" placeholder="Država">
                    </div>
                    <div class="form-group">
                        <label for="address"><i class="fas fa-map-marker-alt"></i> Adresa</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Adresa">
                    </div>
                    <div class="form-group">
                        <label for="phone"><i class="fas fa-phone-square-alt"></i> Telefon</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefon">
                    </div>
                </div>
                <button type="button" class="btn btn-primary"><i class="fas fa-user-plus"></i> Registracija</button>
            </form>
        </div>
    </div>
</div>

@endsection