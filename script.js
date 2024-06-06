function loadCartItems() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartItemsContainer = document.getElementById('cart-items');
    const cartSummary = document.querySelector('.cart-summary');
    let totalPrice = 0;

    cartItemsContainer.innerHTML = ''; // Clear existing items

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = `
            <div class="empty-cart">
                <p>I bet you're still hungry. Let's get you some Mamma Mia Lezato foods!</p>
                <button onclick="window.location.href='userhome.php'">Back to Menu</button>
            </div>
        `;
        cartSummary.style.display = 'none'; // Hide cart summary when cart is empty
        return;
    } else {
        cartSummary.style.display = 'block'; // Show cart summary when cart is not empty
    }

    cart.forEach(item => {
        const itemTotal = item.quantity * item.price;
        totalPrice += itemTotal;

        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <div class="cart-item-details">
                <h3>${item.name}</h3>
                <p>Unit Price: Rp. ${item.price.toLocaleString('id-ID')}</p>
                <div class="cart-item-actions">
                    <button onclick="changeQuantity('${item.name}', -1)">-</button>
                    <span>${item.quantity}</span>
                    <button onclick="changeQuantity('${item.name}', 1)">+</button>
                </div>
            </div>
            <div class="cart-item-total">
                Rp. ${itemTotal.toLocaleString('id-ID')}
                <button onclick="removeItem('${item.name}')">🗑️</button>
            </div>
        `;
        cartItemsContainer.appendChild(cartItem);
    });

    document.getElementById('total-amount').innerText = `Rp. ${totalPrice.toLocaleString('id-ID')}`;
}

function changeQuantity(name, delta) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const item = cart.find(item => item.name === name);
    if (item) {
        item.quantity += delta;
        if (item.quantity < 1) {
            item.quantity = 1;
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        refreshCart();
    }
}

function removeItem(name) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(item => item.name !== name);
    localStorage.setItem('cart', JSON.stringify(cart));
    refreshCart();
}

function refreshCart() {
    document.getElementById('cart-items').innerHTML = '';
    loadCartItems();
}

function checkout() {
    alert('Checkout functionality is not implemented yet!');
}

document.addEventListener('DOMContentLoaded', loadCartItems);



