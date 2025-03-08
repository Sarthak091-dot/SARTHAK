// Get cart from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Update cart count
function updateCartCount() {
  document.getElementById('cart-count').textContent = cart.length;
}

// Add item to cart
document.querySelectorAll('.add-to-cart').forEach(button => {
  button.addEventListener('click', event => {
    const product = event.target.closest('.product');
    const id = product.getAttribute('data-id');
    const name = product.getAttribute('data-name');
    const price = product.getAttribute('data-price');
    const image = product.getAttribute('data-image');

    cart.push({ id, name, price, image });
    localStorage.setItem('cart', JSON.stringify(cart));
    alert(`${name} added to cart!`);
    updateCartCount();
  });
});

// Initialize cart count on page load
updateCartCount();



