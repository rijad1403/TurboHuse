@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row">
        <div class="col-12 p-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">admin</a></li>
                    <li class="breadcrumb-item">Korisnici</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2>Korisnici</h2>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="" placeholder="Unesite ime, prezime ili email">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary"><i class="fas fa-search"></i> Pretraga
                    </button>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ime i prezime</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tip korisnika</th>
                        <th scope="col">Kupovine</th>
                        <th scope="col">Država | Grad | Adresa</th>
                        <th scope="col">Opcije</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->type == 'user')
                            Korisnik
                            @else
                            Administrator
                            @endif
                        </td>
                        <td>{{ $user->buyings }}</td>
                        <td>
                            <p>
                                {{ $user->state }}
                            </p>
                            <p>
                                {{ $user->city }}
                            </p>
                            <p>
                                {{ $user->address  }}
                            </p>
                        </td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                title="Uredi korisnika" onclick="selectUser({{ $user }})"><i class="far fa-edit"></i>
                            </button>
                            <button class="btn btn-primary" title="Obriši korisnika"><i class="far fa-trash-alt"></i>
                            </button>
                            <button class="btn btn-primary" title="Pošalji email korisniku"><i
                                    class="far fa-envelope"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>Nema unešenih korisnika...</tr>
                    @endforelse
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Uredi korisnika</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/korisnici/save" method="GET">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"><i class="fas fa-heading"></i> Ime i prezime</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ime i prezime">
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="far fa-envelope"></i> Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"><i class="far fa-save"></i> Spremi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection