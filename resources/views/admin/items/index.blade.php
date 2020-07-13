@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-12">
            <h2 id="itemsHeader">produkter</h2>
            <hr>
        </div>
    </div>
    <div class="row items">
        <div class="col-sm-12 col-md-12 col-lg-3">
            @if(Auth::user() && Auth::user()->type == "admin")
            <div class="form-group">
                <button class="btn btn-primary" data-toggle="modal" data-target="#newItem"><i
                        class="fas fa-plus-circle"></i>Tilføj produkt</button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#newManufacturer">
                    <i class="fas fa-plus-circle"></i>Tilføj producent
                </button>
            </div>
            @endif
            <form action="/artikli/search" method="GET">
                <div class="form-group">
                    <label for="car-select"><i class="fas fa-car"></i> Bilmærke</label>
                    <select class="form-control" id="car-select" name="car">
                        <option value="">Vælg producent</option>
                        @forelse ($manufacturers as $manufacturer)
                        <option value={{ $manufacturer->id }}>{{ $manufacturer->title }}</option>
                        @empty
                        <option value="">Nema unešenih proizvođača...</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="price"><i class="fas fa-coins"></i> Pris Dansk kr inklusiv moms (DKK)</label>
                    <input type="text" name="maxPrice" id="price" class="form-control"
                        placeholder="Maks pris, f.eks. 1000 kr.">
                </div>
                <div class="form-group">
                    <label for="releaseYear"><i class="fas fa-calendar"></i> Årgang</label>
                    <input type="text" name="releaseYear" id="releaseYear" class="form-control"
                        placeholder="Eksempel 2005">
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Søg</button>
            </form>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-9">
            <div class="row">
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
                    @if ($filterMessage != '')
                    <div class="alert alert-light" role="alert">
                        {{ $filterMessage }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                @forelse ($items as $item)
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="card item" style="width: 80%;">
                        @foreach ($item->images as $image)
                        @if ($loop->first)
                        <img class="card-img-top" src=" {{ $image->title }} " alt="Card image cap">
                        @break
                        @endif
                        @endforeach
                        <div class="card-body">
                            <small class="text-muted">{{$item->manufacturer->title}}</small>
                            <h5 class="card-title">{{$item->title}}</h5>
                            <h5 class="card-title">{{ number_format($item->price,2,",",".") }} DKK</h5>

                            @if (!Auth::user() || Auth::user()->type !== 'admin' )
                            <div>
                                <button class="btn btn-primary" onclick="addToCart({{ $item }})">
                                    <i class="fas fa-cart-plus"></i> Tilføj til kurv
                                </button>
                            </div>
                            @endif
                            <div>
                                <a class="btn btn-primary" href="/artikli/{{$item->id}}" role="button"
                                    style="text-transform: initial; border-radius: 0;"><i
                                        class="fas fa-info-circle"></i>
                                    Udvidet</a>
                            </div>
                            @if (Auth::user() && Auth::user()->type == "admin")
                            <div>
                                <a class="btn btn-primary" href="/artikli/{{$item->id}}/uredi" role="button"
                                    style="text-transform: initial; border-radius: 0;"><i class="fas fa-edit"></i>
                                    Rediger produkt</a> <br>
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#deleteItemModal{{ $item->id }}" title="Ukloni artikl"><i
                                        class="far fa-trash-alt"></i> Slet produkt
                                </button>
                                <div class="modal fade" id="deleteItemModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true"
                                    style="text-transform: none; text-align: left">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Slet produkt</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/artikli/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Er du sikker på at du gerne vil slette produkt
                                                        "{{ $item->title }}"?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="far fa-trash-alt"></i> Ukloni</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <p>
                        Nema unešenih artikala...
                    </p>
                </div>
                @endforelse
            </div>
            {{ $items->links() }}

        </div>
    </div>
</div>

<div class="modal fade" id="newItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Produkt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/artikli/save" id="newItemForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title"><i class="fas fa-heading"></i> Navn</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Produkt Navn">
                    </div>
                    <div class="form-group">
                        <label for="body"><i class="fas fa-file-signature"></i> Beskrivelse</label>
                        <textarea name="body" id="body" class="form-control" cols="30" rows="10"
                            placeholder="Produkt beskrivelse"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="car-select"><i class="fas fa-car"></i> Bilmærke</label>
                        <select class="form-control" id="car-select" name="car">
                            @forelse ($manufacturers as $manufacturer)
                            <option value={{ $manufacturer->id }}>{{ $manufacturer->title }}</option>
                            @empty
                            <option value="">Nema unešenih proizvođača...</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price"><i class="fas fa-coins"></i> Pris Dansk kr inklusiv moms (DKK)</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Eksempel 1000">
                    </div>
                    <div class="form-group">
                        <label for="releaseYear"><i class="fas fa-calendar"></i> Årgang</label>
                        <input type="number" name="releaseYear" id="releaseYear" class="form-control"
                            placeholder="Eksempel 2005">
                    </div>
                    <div class="form-group">
                        <label for="imageUpload" class="imageUpload">
                            <i class="fas fa-file-upload"></i>
                            Tilføj produkt billede/billeder <br>
                            <input type="file" name="image_upload[]" id="imageUpload" multiple>
                        </label>
                        <div class="loaderText" style="text-align: center; display: none;">
                            Slika/slike se uploadaju, pričekajte trenutak...
                        </div>
                        <div class="loader" style="margin: auto; display: none;"></div>

                    </div>
                    <style>
                        input[type="file"] {
                            /* display: none; */
                        }

                        .imageUpload {
                            cursor: pointer;
                        }
                    </style>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveItemButton"><i class="far fa-save"></i>
                        Gem</button>
                </div>
            </form>
            <script>
                // $(document).ready(() => {
                //     $('#newItemForm').on('submit', (event) => {
                //         event.preventDefault();
                //         $('.loader').css('display',' block');
                //         $('.loaderText').css('display',' block');
                //         $.ajax({
                //             url: 'http://127.0.0.1:8000/artikli/save',
                //             // url: 'http://shielded-gorge-54004.herokuapp.com/artikli/save',
                //             method: 'POST',
                //             data: new FormData($('#newItemForm')[0]),
                //             dataType: 'JSON',
                //             contentType: false,
                //             cache:false,
                //             processData: false,
                //             success: (data) => {
                //                 $('.loader').css('display',' none');
                //                 $('.loaderText').css('display',' none');
                //                 setTimeout(() => {
                //                     location.reload();
                //                 }, 500);
                //             },
                //             error: (xhr, options, error) => {
                //                 console.log(xhr);
                //                 console.log(error);
                //             }
                //         });
                //     });
                // });

                $(document).ready(() => {
                    $('#saveItemButton').on('click', () => {
                        $('.loaderText').css('display', 'block');
                        $('.loader').css('display', 'block');
                    })

                })
            </script>
        </div>
    </div>
</div>
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
                        <label for="title"><i class="fas fa-car"></i> Navn</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Producent Navn">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Gem</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

</script>


@endsection
