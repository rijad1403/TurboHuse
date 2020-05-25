<!-- Footer -->
<footer>
    <div id="snackbar"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <img src=" {{asset('/images/logo2.png')}} " alt="">
            </div>
            <div class="col-md-4">
                <p class="text-white"><i class="fas fa-map-marker-alt"></i> Lufthavnsvej 25 9400 Nørresundby</p>
                <p class="text-white"><i class="fas fa-phone-square-alt"></i> 0045 50908163</p>
                <p class="text-white"><i class="fas fa-envelope"></i> office@turbohuse.com</p>
            </div>
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" name="" id="" class="form-control" placeholder="Unesite Vaš email">
                    </div>
                    <button class="btn btn-primary"><i class="fas fa-envelope-open-text"></i> Prijava na
                        newsletter
                    </button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                &copy; Copyright TurboHuse | Design by Rijad Gračanin
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    let cartItems;
    let totalPrice = 0;
    let cartItemsContainer = document.querySelector('#cart');

    reloadCartTab();
    reloadCartItemsContainer();

    function addToCart(item) {
        cartItems = localStorage.getItem('cartItems') ? JSON.parse(localStorage.getItem('cartItems')) : [];
        foundItem = cartItems.find(cartItem => cartItem.id == item.id);
        if(foundItem) {
            foundItem.quantity = foundItem.quantity + 1;
        } else {
            item.quantity = 1
            cartItems.push(item);
        }
        toastMessage(item);
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        reloadCartTab();
    }

    function removeFromCart(itemId) {
        cartItems = localStorage.getItem('cartItems') ? JSON.parse(localStorage.getItem('cartItems')) : [];
        cartItems = cartItems.filter(cartItem => cartItem.id !== itemId);
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        reloadCartTab();
        reloadCartItemsContainer();
   }


   function itemPlusOne(itemId) {
        cartItems = localStorage.getItem('cartItems') ? JSON.parse(localStorage.getItem('cartItems')) : [];
        foundItem = cartItems.find(cartItem => cartItem.id == itemId);
        foundItem.quantity ++;
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        reloadCartTab();
        reloadCartItemsContainer();
   }

   function itemMinusOne(itemId) {
        cartItems = localStorage.getItem('cartItems') ? JSON.parse(localStorage.getItem('cartItems')) : [];
        foundItem = cartItems.find(cartItem => cartItem.id == itemId);
        cartItems.forEach(cartItem => {
            if(cartItem.id == itemId) {
                cartItem.quantity --;
                cartItems = cartItems.filter(cartItem => cartItem.quantity > 0);
            }
        });
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        reloadCartTab();
        reloadCartItemsContainer();
   }

    function toastMessage(item) {
        var x = document.getElementById("snackbar");
        x.innerHTML = `Artikl ${item.title} dodan u košaru.`
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }


    function reloadCartTab() {
        totalPrice = 0;
        const user = @json(Auth::user());
        if(!user || (user && user.type !== 'admin')) {
            cartItems = localStorage.getItem('cartItems') ? JSON.parse(localStorage.getItem('cartItems')) : [];
            if(cartItems.length > 0) {
            cartItems = JSON.parse(localStorage.getItem('cartItems'));
            cartItems.forEach(item => {
                totalPrice = totalPrice + item.price * item.quantity;
            });
            document.querySelector('#totalPrice').textContent = `${totalPrice} KM`;
            document.querySelector('#quantity').textContent = cartItems.length === 1 ? `${cartItems.length} artikl` : `${cartItems.length} artikla`;
            } else {
                document.querySelector('#totalPrice').textContent = ``;
                document.querySelector('#quantity').textContent = ``;
            }
        }

    }

    function reloadCartItemsContainer() {
        if (cartItemsContainer) {
            cartItems = localStorage.getItem('cartItems') ? JSON.parse(localStorage.getItem('cartItems')) : [];
            cartTable = cartItemsContainer.querySelector('tbody');
            cartTable.innerHTML = null;
            document.querySelector('input#totalPrice').value = totalPrice;
            if (cartItems && cartItems.length > 0) {
                document.querySelector('#cartItems').value = JSON.stringify(cartItems);
                cartItems.forEach(item => {
                const tableRow = document.createElement('tr');
                tableRow.innerHTML = `
                                        <td><img style="width: 100px; height: auto;"
                                                                    src="{{asset('images/items/test.jpg')}}" alt=""></td>
                                        <td><a href="/artikli/${item.id}">${item.title}</a> </td>
                                        <td>${item.price} KM</td>
                                        <td>${item.quantity}</td>
                                        <td>
                                            <button title="Povećaj kvantitet" onclick="itemPlusOne(${item.id})"><i class="fas fa-plus-circle"></i></button>
                                            <button title="Smanji kvantitet" onclick="itemMinusOne(${item.id})"><i class="fas fa-minus-circle"></i></button>
                                            <button title="Ukloni iz košare" onclick="removeFromCart(${item.id})"><i class="fas fa-times-circle"></i></button>
                                        </td>
                                    `;
                cartTable.appendChild(tableRow);
                });
                const totalPriceRow = document.createElement('tr');
                totalPriceRow.innerHTML = `<td colspan="5">Ukupna cijena: ${totalPrice} KM</td>`;
                totalPriceRow.style.textAlign = 'right';
                totalPriceRow.style.fontWeight = 'bold';
                cartTable.appendChild(totalPriceRow);
            } else {
                document.querySelector('table').remove();
                const element = document.createElement('div');
                element.classList.add('row');
                element.classList.add('justify-content-center');
                element.style.textAlign = 'center';
                element.textContent = 'Vaša košara je prazna.'
                const element2 = document.createElement('div');
                element2.classList.add('row');
                element2.classList.add('justify-content-center');
                element2.innerHTML = '<a href="/artikli" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Započni s kupovinom</a href="/artikli">'
                cartItemsContainer.appendChild(element);
                cartItemsContainer.appendChild(element2);

            }
        }
    }

    function selectUser(user) {
	    document.querySelector('#name').value = user.name;
	    document.querySelector('#email').value = user.email;
	    document.querySelector('#city').value = user.city;
	    document.querySelector('#state').value = user.state;
	    document.querySelector('#street').value = user.street;
	    document.querySelector('#phone').value = user.phone;
	    document.querySelector('#zipCode').value = user.zip_code;

	    const types = document.querySelectorAll('option');
	    types.forEach(type => {
	        if (type.value == user.type) {
	            type.selected = true;
	        }
	    });
	}

    const navbarLinks = document.querySelectorAll('.nav-link')
    navbarLinks.forEach(navLink => {
        if(location.pathname == navLink.pathname) {
            navLink.classList.add('active');
        } else {
            navLink.classList.remove('active');
        }
    });


</script>
