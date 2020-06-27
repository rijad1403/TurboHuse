@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-12">
            <h2>Proizvođači</h2>
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
            <div class="form-group">
                <input type="text" class="form-control" id="manufacturerSearch" placeholder="Pretraga proizvođača">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" data-toggle="modal" data-target="#newManufacturer">
                    <i class="fas fa-plus-circle"></i> Dodaj proizvođača</button>
            </div>
            <table class="table manufacturersTable">
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Naziv proizvođača</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($manufacturers as $manufacturer)
                    <tr class="manufacturerRow">
                        <td>{{ $manufacturer->title }}</td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal{{ $manufacturer->id }}" title="Ažuriraj proizvođača"><i
                                    class="far fa-edit"></i>
                            </button>
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#deleteModal{{ $manufacturer->id }}" title="Ukloni proizvođača"><i
                                    class="far fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal{{ $manufacturer->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ažuriraj proizvođača</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/proizvodjaci/{{ $manufacturer->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="title{{ $manufacturer->id }}"><i class="fas fa-car"></i> Naziv
                                                proizvođača</label>
                                            <input type="text" name="title" id="title{{ $manufacturer->id }}"
                                                class="form-control" value="{{ $manufacturer->title }}"
                                                placeholder="Naziv proizvođača">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>
                                            Spremi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModal{{ $manufacturer->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ukloni proizvođača</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/proizvodjaci/{{ $manufacturer->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        <p>Jeste li sigurni da želite ukloniti proizvođača sa nazivom
                                            "{{ $manufacturer->title }}"?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="far fa-trash-alt"></i> Ukloni</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>Nema unešenih proizvođača...</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- New manufacturer modal --}}

    <div class="modal fade" id="newManufacturer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novi proizvođač</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/proizvodjaci/save" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title"><i class="fas fa-car"></i> Naziv</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Naziv proizvođača">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Spremi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    const search = document.querySelector('#manufacturerSearch');
    const manufactureRows = document.querySelectorAll('.manufacturerRow');
    document.querySelector('#manufacturerSearch').addEventListener('keyup', () => {
        manufactureRows.forEach(row => {
            if(row.querySelector('td').innerText.toLowerCase().indexOf(search.value.toLowerCase()) !== -1) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });

</script>


@endsection
