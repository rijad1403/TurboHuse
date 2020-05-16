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
            <div class="row">
                <div class="col-12">
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
            <div class="row">
                <div class="col-12">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user"></i> Ime i prezime</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Ime i prezime">
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-key"></i> Lozinka</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Lozinka">
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
                                <label for="street"><i class="fas fa-map-marker-alt"></i> Ulica</label>
                                <input type="text" name="street" id="street" class="form-control"
                                    placeholder="Ulica, broj kuće">
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="fas fa-phone-square-alt"></i> Telefon</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefon">
                            </div>
                            <div class="form-group">
                                <label for="zip_code"><i class="fas fa-file-invoice"></i> Poštanski broj</label>
                                <input type="text" name="zip_code" id="zip_code" class="form-control"
                                    placeholder="Poštanski broj">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i>
                            Registracija</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection