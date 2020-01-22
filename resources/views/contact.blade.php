@extends('layouts.master')
@section('content')

<div class="container-fluid content">
    <div class="row">
        <div class="col-12 p-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">početna</a></li>
                    <li class="breadcrumb-item">kontakt</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Kontakt forma</h2>
            <hr>
            <form action="/sendMail" method="post">
                <div class="form-group">
                    <label for="name">Vaše ime i prezime*</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Vaš e-mail*</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="subject">Subject*</label>
                    <input type="text" name="subject" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="body">Vaša poruka*</label>
                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <small class="form-text text-muted">Polja sa oznakom (*) su obavezna.</small>
                </div>
                <button type="submit"><i class="fas fa-envelope"></i> Pošalji</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Posjetite nas</h2>
            <hr>
            <p>
                <i class="fas fa-warehouse"></i> TurboHuse
            </p>
            <p>
                <i class="fas fa-map-marker-alt"></i> Lufthavnsvej 25 9400 Nørresundby
            </p>
            <p>
                <i class="fas fa-phone-square-alt"></i> 0045 50908163
            </p>
            <p>
                <i class="fas fa-envelope"></i> office@turbohuse.com
            </p>
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="400" id="gmap_canvas" 
                    src="https://maps.google.com/maps?q=%20Lufthavnsvej%2025%209400%20N%C3%B8rresundby&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection