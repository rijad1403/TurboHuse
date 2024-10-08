@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-12">
            <h2>Brugere</h2>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
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
        <div class="col-12">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="" placeholder="Fornavn, efternavn, email">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i> Søg
                    </button>
                </div>
            </form>
            <div class="form-group">
                <button class="btn btn-primary" data-toggle="modal" data-target="#newUserModal"><i
                        class="fas fa-user-plus"></i> Novi korisnik
                </button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Fornavn og efternavn</th>
                        <th scope="col">Email</th>
                        <th scope="col">Brugertype</th>
                        <th scope="col">Kupovine</th>
                        <th scope="col">Land, by, adresse</th>
                        <th scope="col">Opcije</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td> <a href="/korisnici/{{$user->id}}">{{ $user->email }}</a></td>
                        <td>
                            @if ($user->type == 'user')
                            Korisnik
                            @else
                            Administrator
                            @endif
                        </td>
                        <td>{{ $user->type == 'user' ? $user->buyings->count(): '' }}</td>
                        <td>
                            <p>
                                {{ $user->state }}
                            </p>
                            <p>
                                {{ $user->city }}
                            </p>
                            <p>
                                {{ $user->street }},
                                {{ $user->zip_code }}
                            </p>
                        </td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal{{ $user->id }}" title="Rediger bruger"><i
                                    class="far fa-edit"></i>
                            </button>
                            <button class="btn btn-primary" title="Slet bruger"><i class="far fa-trash-alt"></i>
                            </button>
                            <button class="btn btn-primary" title="Send email til bruger"><i
                                    class="far fa-envelope"></i>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Rediger bruger</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/korisnici/{{ $user->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name"><i class="fas fa-user"></i> Fornavn og efternavn</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ $user->name }}" placeholder="Fornavn og efternavn">
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
                                        <input type="text" name="city" id="city" class="form-control"
                                            value="{{ $user->city }}" placeholder="By">
                                    </div>
                                    <div class="form-group">
                                        <label for="state"><i class="fas fa-globe"></i> Land</label>
                                        <input type="text" name="state" id="state" class="form-control"
                                            value="{{ $user->state }}" placeholder="Land">
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
        @empty
        <tr>Nema unešenih korisnika...</tr>
        @endforelse
        </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>

{{-- New user modal --}}

<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novi korisnik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/korisnici/store" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> Fornavn og efternavn</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder=" Fornavn og efternavn">
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
                        <label for="phone"><i class="fas fa-phone-square-alt"></i> Telefon</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefon">
                    </div>
                    <div class="form-group">
                        <label for="type"><i class="fas fa-user"></i> Brugertype</label>
                        <select class="form-control" id="type" name="type">
                            <option value="user">
                                Bruger</option>
                            <option value="admin">
                                Administrator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city"><i class="fas fa-city"></i> By</label>
                        <input type="text" name="city" id="city" class="form-control" placeholder=" By">
                    </div>
                    <div class="form-group">
                        <label for="state"><i class="fas fa-globe"></i> Land</label>
                        <input type="text" name="state" id="state" class="form-control" placeholder="Land">
                    </div>
                    <div class="form-group">
                        <label for="street"><i class="fas fa-map-marker-alt"></i>
                            Adresse
                        </label>
                        <input type="text" name="street" id="street" class="form-control" placeholder="Adresse">
                    </div>
                    <div class="form-group">
                        <label for="zipCode"><i class="fas fa-file-invoice"></i>
                            Postnummer
                        </label>
                        <input type="text" name="zip_code" id="zipCode" class="form-control" placeholder="Postnummer">
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
@endsection
