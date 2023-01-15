@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-12">
            <h2>Registrer bruger</h2>
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
                                <label for="name"><i class="fas fa-user"></i> Fornavn og efternavn</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Fornavn og efternavn">
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-key"></i> Adgangskode</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Adgangskode">
                            </div>
                            <div class="form-group">
                                <label for="city"><i class="fas fa-city"></i> By</label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="By">
                            </div>
                            <div class="form-group">
                                <label for="state"><i class="fas fa-globe"></i> Land</label>
                                <input type="text" name="state" id="state" class="form-control" placeholder="Land">
                            </div>
                            <div class="form-group">
                                <label for="street"><i class="fas fa-map-marker-alt"></i> Addresse</label>
                                <input type="text" name="street" id="street" class="form-control"
                                    placeholder="Addresse">
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="fas fa-phone-square-alt"></i> Telefon</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefon">
                            </div>
                            <div class="form-group">
                                <label for="zip_code"><i class="fas fa-file-invoice"></i> Postnummer</label>
                                <input type="text" name="zip_code" id="zip_code" class="form-control"
                                    placeholder="Postnummer">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i>
                            Registrer bruger</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
