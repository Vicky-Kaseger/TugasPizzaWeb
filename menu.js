document.addEventListener('DOMContentLoaded', () => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const menuItem = button.closest('.menu-item');
            const name = menuItem.getAttribute('data-name');
            const price = parseFloat(menuItem.getAttribute('data-price'));
            const image = menuItem.querySelector('img').src;

            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ name, price, quantity: 1, image });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Item added to cart');
        });
    });

    // Filter menu functionality
    filterMenu('all');
});

function filterMenu(category) {
    const menuItems = document.querySelectorAll('.menu-item');
    
    menuItems.forEach(item => {
        if (category === 'all') {
            item.style.display = 'block';
        } else if (category === 'food' && item.classList.contains('food')) {
            item.style.display = 'block';
        } else if (category === 'drinks' && item.classList.contains('drink')) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}
