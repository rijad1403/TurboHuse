<!-- Footer -->
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <img src=" {{asset('/images/logo2.png')}} " alt="">
            </div>
            <div class="col-md-4">
                <p class="text-white"><i class="fas fa-map-marker-alt"></i> Lufthavnsvej 25 9400 Nørresundby</p>
                <p class="text-white"><i class="fas fa-phone-alt"></i> 0045 50908163</p>
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


<script>
    let cartItems = [];
    let totalPrice = 0;
    reloadCart();

    function addToCart(item) {
        const cartItem = {id: item.id, title: item.title, price: item.price, quantity: 1};
        if(localStorage.getItem('cartItems')) {
            cartItems = JSON.parse(localStorage.getItem('cartItems'));
            const foundItem = cartItems.find(item => item.id === cartItem.id);
            if (foundItem) {
                foundItem.quantity++;
            } else {
                cartItems.push(cartItem);
            }
        } else {
            cartItems.push(cartItem);
        }
    localStorage.setItem('cartItems',JSON.stringify(cartItems));
    reloadCart();
   }

    function reloadCart() {
        totalPrice = 0;
        if(localStorage.getItem('cartItems')) {
        cartItems = JSON.parse(localStorage.getItem('cartItems'));
        cartItems.forEach(item => {
            totalPrice = totalPrice + item.price * item.quantity;
        });
        document.querySelector('#totalPrice').textContent = `${totalPrice} KM`;
        document.querySelector('#quantity').textContent = `${cartItems.length} artikala`;
        } else {
            document.querySelector('#totalPrice').textContent = ``;
            document.querySelector('#quantity').textContent = ``;
        }
    }

    const cartItemsContainer = document.querySelector('#cart');
    if (cartItemsContainer) {
        if(JSON.parse(localStorage.getItem('cartItems'))) {
        cartItems = JSON.parse(localStorage.getItem('cartItems'));
        } if (cartItems && cartItems.length > 0) {
            cartItems.forEach(item => {
            const element = document.createElement('div');
            element.innerHTML = `<div>Naziv: ${item.title}</div><div>Cijena: ${item.price} KM</div><div>Količina: ${item.quantity}</div>`;
            element.style.borderBottom = '1px solid lightgray';
            element.classList.add('p-2')
            cartItemsContainer.appendChild(element);
            });
            const element = document.createElement('div');
            element.innerHTML = `<div>Ukupna cijena: ${totalPrice} KM</div>`;
            element.style.borderBottom = '1px solid lightgray';
            element.style.textAlign = 'right';
            element.style.fontWeight = 'bold';
            element.classList.add('p-2')
            cartItemsContainer.appendChild(element);
        } else {
            const element = document.createElement('div');
            element.textContent = 'Vaša košara je prazna.'
            cartItemsContainer.appendChild(element);
        }
    }

    function selectUser(user) {
	    document.querySelector('#name').value = user.name;
	    document.querySelector('#email').value = user.email;
	    document.querySelector('#city').value = user.city;
	    document.querySelector('#state').value = user.state;
	    document.querySelector('#address').value = user.address;
	    document.querySelector('#phone').value = user.phone;
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