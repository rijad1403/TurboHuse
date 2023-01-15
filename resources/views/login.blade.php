@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-12">
            <h2>Log ind</h2>
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
            <form action="/authenticate" method="GET">
                @csrf
                <div class="form-group">
                    <label for="username"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-key"></i> Adgangskode</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Log ind</button>
            </form>
        </div>

    </div>
</div>

@endsection
