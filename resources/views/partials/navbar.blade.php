<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
        <li class="nav-item"> <a href="/" class="nav-link">Forside</a></li>
        <li class="nav-item"> <a href="/artikli" class="nav-link">Produkter</a></li>
        @if (Auth::user() && Auth::user()->type == 'admin')
        <li class="nav-item"> <a href="/proizvodjaci" class="nav-link">Producenter</a></li>
        <li class="nav-item"> <a href="/korisnici" class="nav-link">Brugere</a></li>
        @endif
        <li class="nav-item"> <a href="/onama" class="nav-link">Om os</a></li>
        <li class="nav-item"> <a href="/kontakt" class="nav-link">kontakt</a></li>
        @if (Auth::user())
        <li class="nav-item"> <a href="/profil" class="nav-link">Bruger</a></li>
        <li class="nav-item"> <a href="/narudzbe" class="nav-link">narudžbe</a></li>

        <li class="nav-item"> <a href="/odjava" class="nav-link">Log ud</a></li>
        @else
        <li class="nav-item"> <a href="/prijava" class="nav-link">Log ind</a></li>
        <li class="nav-item"> <a href="/registracija" class="nav-link">Registrer bruger</a></li>
        @endif
        @if (!Auth::user() || Auth::user()->type == 'user' )
        <li class="nav-item">
            <a href="/kosara" class="nav-link"><i class="fas fa-shopping-cart"></i>
                <span class="badge badge-secondary" id="quantity"></span>
                <span class="badge badge-secondary" id="totalPrice"></span></a>
        </li>
        @endif
    </ul>
</nav>

<div class="menu">
    @if (!Auth::user() || Auth::user()->type == 'user' )
    <a href="/kosara" class="nav-link"><i class="fas fa-shopping-cart"></i>
        <span class="badge badge-secondary" id="quantity"></span>
        <span class="badge badge-secondary" id="totalPrice"></span>
    </a>
    @endif
    <a href="#" class="nav-link menu-button" id="toggle">
        <i class="fas fa-bars"></i>
    </a>
</div>

<div class="overlay" id="overlay">
    <span id="close-menu" class="close-menu"><i class="fas fa-times"></i></span>
    <nav class="overlay-menu">
        {{-- <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Work</a></li>
            <li><a href="#">Contact</a></li>
        </ul> --}}
        <ul>
            <li> <a href="/">Forside</a></li>
            <li> <a href="/artikli">Produkter</a></li>
            @if (Auth::user() && Auth::user()->type == 'admin')
            <li> <a href="/proizvodjaci">Producenter</a></li>
            <li> <a href="/korisnici">Brugere</a></li>
            @endif
            <li> <a href="/onama">Om os</a></li>
            <li> <a href="/kontakt">kontakt</a></li>
            @if (Auth::user())
            <li> <a href="/profil">Bruger</a></li>
            <li> <a href="/odjava">Log ud</a></li>
            @else
            <li> <a href="/prijava">Log ind</a></li>
            <li> <a href="/registracija">Registrer bruger</a></li>
            @endif
        </ul>
    </nav>
</div>

<style>
    .menu {
        display: none;
    }

    .menu-button {
        display: none;
    }

    .close-menu {
        font-size: 40px;
        position: absolute;
        right: 10%;
        top: 5%;
        color: white;
    }

    @media only screen and (max-width: 991px) {
        .navbar {
            display: none;
        }

        .menu {
            display: flex;
            justify-content: flex-end;

        }

        .menu-button {
            display: initial;
        }

        .overlay {
            display: initial;
        }
    }
</style>

<script>
    $('#toggle').click(function() {
   $(this).toggleClass('active');
   $('#overlay').toggleClass('open');
  });

  $('#close-menu').on('click', () => {
    $('#toggle').toggleClass('active');
   $('#overlay').toggleClass('open');
  })

</script>
