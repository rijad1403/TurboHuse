<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
        <li class="nav-item"> <a href="/" class="nav-link">početna</a></li>
        <li class="nav-item"> <a href="/artikli" class="nav-link">artikli</a></li>
        @if (Auth::user() && Auth::user()->type == 'admin')
        <li class="nav-item"> <a href="/proizvodjaci" class="nav-link">proizvođači</a></li>
        <li class="nav-item"> <a href="/korisnici" class="nav-link">korisnici</a></li>
        @endif
        <li class="nav-item"> <a href="/onama" class="nav-link">o nama</a></li>
        <li class="nav-item"> <a href="/kontakt" class="nav-link">kontakt</a></li>
        @if (Auth::user())
        <li class="nav-item"> <a href="/profil" class="nav-link">profil</a></li>
        <li class="nav-item"> <a href="/odjava" class="nav-link">odjava</a></li>
        @else
        <li class="nav-item"> <a href="/prijava" class="nav-link">prijava</a></li>
        <li class="nav-item"> <a href="/registracija" class="nav-link">registracija</a></li>
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
    <a href="#" class="nav-link menu-button" id="toggle">
        <i class="fas fa-bars"></i>
    </a>
    @endif
</div>

<div class="overlay" id="overlay">
    <span id="close-menu" class="close-menu"><i class="fas fa-times"></i></span>
    <nav class="overlay-menu">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Work</a></li>
            <li><a href="#">Contact</a></li>
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