<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
        <li class="nav-item"> <a href="/" class="nav-link">početna</a></li>
        <li class="nav-item"> <a href="/artikli" class="nav-link">artikli</a></li>
        @if (Auth::user() && Auth::user()->type == 'admin')
        <li class="nav-item"> <a href="/korisnici" class="nav-link">korisnici</a></li>
        <li class="nav-item"> <a href="/proizvodjaci" class="nav-link">proizvođači</a></li>
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
