@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-12">
            <h2>{{ $item->title }} </h2>
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
            <form action="/artikli/{{ $item->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title"><i class="fas fa-heading"></i> Naziv</label>
                    <input type="text" name="title" class="form-control" placeholder="Naziv artikla"
                        value="{{ $item->title }}">
                </div>
                <div class="form-group">
                    <label for="body"><i class="fas fa-file-signature"></i> Opis</label>
                    <textarea name="body" id="body" class="form-control" cols="30" rows="10"
                        placeholder="Opis artikla">{{ $item->body }}</textarea>
                </div>

                <div class="form-group">
                    <label for="car-select"><i class="fas fa-car"></i> Proizvođač</label>
                    <select class="form-control" id="car-select" name="car">
                        @forelse ($manufacturers as $manufacturer)
                        <option value={{ $manufacturer->id }} @if ($manufacturer->id ==
                            $item->manufacturer_id){{ 'selected' }}@endif>
                            {{ $manufacturer->title }}

                        </option>
                        @empty
                        <option value="">Nema unešenih proizvođača...</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="price"><i class="fas fa-coins"></i> Cijena (KM)</label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="Cijena, npr. 100"
                        value="{{$item->price}}">
                </div>
                <div class="form-group">
                    <label for="releaseYear"><i class="fas fa-calendar"></i> Godina proizvodnje</label>
                    <input type="text" name="releaseYear" id="releaseYear" class="form-control" placeholder="Npr. 2005"
                        value="{{$item->releaseYear}}">
                </div>
                <button class="btn btn-primary" type="submit"><i class="far fa-save"></i> Ažuriraj</button>
            </form>
        </div>
    </div>
</div>


@endsection