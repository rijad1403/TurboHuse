@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row mt-5">
        <div class="col-12">
            <h2>{{ $item->title }} </h2>
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
    <div class="row items justify-content-center">
        <div class="col-lg-4">
            <form action="/artikli/{{ $item->id }}" method="POST" enctype="multipart/form-data">
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
                <div class="form-group">
                    <label for="imageUpload" class="imageUpload">
                        <i class="fas fa-file-upload"></i>
                        Upload slike/slika artikla <br>
                        <input type="file" name="image_upload[]" id="imageUpload" multiple>
                    </label>
                    <div class="loaderText" style="text-align: center; display: none;">
                        Slika/slike se uploadaju, pričekajte trenutak...
                    </div>
                    <div class="loader" style="margin: auto; display: none;"></div>
                </div>

                <button class="btn btn-primary" type="submit" id="saveItemButton"><i class="far fa-save"></i>
                    Ažuriraj</button>
            </form>
        </div>
        <div class="col-lg-4">
            <form action="/slike/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <input type="hidden" name="selected_images" class="selectedImages" id="selectedImages" value="">
                <div class="form-group">
                    <label for="images" class="images">
                        <i class="fas fa-images"></i>
                        Slike/slika artikla <br>
                    </label>
                    <div>
                        @forelse ($item->images as $image)
                        <img src=" {{ $image->title }} " name="item_image" class="itemImage"
                            id="itemImage{{ $image->id }}">
                        @empty

                        @endforelse
                    </div>
                </div>
                <button class="btn btn-primary" type="submit"><i class="far fa-trash-alt"></i>
                    Ukloni odabrane slike</button>
            </form>
        </div>
        <script>
            let selectedImages = [];
            document.querySelectorAll('.itemImage').forEach(itemImage => {
                itemImage.addEventListener('click', () => {
                    const id = itemImage.id.replace('itemImage', '');
                    if(selectedImages.find(image => image.id === id)) {
                        selectedImages = selectedImages.filter(image => image.id !== id);
                        itemImage.classList.remove('selectedItemImage');
                        document.querySelector('.selectedImages').value = JSON.stringify(selectedImages);
                        console.log(selectedImages);
                    } else {
                        selectedImages.push({id: id});
                        itemImage.classList.add('selectedItemImage');
                        document.querySelector('.selectedImages').value = JSON.stringify(selectedImages);
                        console.log(selectedImages);
                    }
                    }
                );
            })
            $(document).ready(() => {
                $('#saveItemButton').on('click', () => {
                    if($('#imageUpload')[0].files.length > 0) {
                        $('.loaderText').css('display', 'block');
                        $('.loader').css('display', 'block');
                    }
                })
            })
        </script>
    </div>
</div>


@endsection
