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
        <div class="col-md-8">
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
                        <th scope="col">#</th>
                        <th scope="col">Ime i prezime</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tip</th>
                        <th scope="col">Kupovine</th>
                        <th scope="col">Opcije</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Huse Gračanin</td>
                        <td>office@turbohuse.com</td>
                        <td>Administrator</td>
                        <td>0</td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                title="Uredi korisnika"><i class="far fa-edit"></i>
                            </button>
                            <button class="btn btn-primary" title="Obriši korisnika"><i class="far fa-trash-alt"></i>
                            </button>
                            <button class="btn btn-primary" title="Pošalji email korisniku"><i
                                    class="far fa-envelope"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Ime i prezime" value="Huse Gračanin">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"><i class="far fa-save"></i> Spremi</button>
            </div>
        </div>
    </div>
</div>

@endsection