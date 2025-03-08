// Get cart from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Render cart items
function renderCart() {
  const cartItemsContainer = document.getElementById('cart-items');
  const cartTotal = document.getElementById('cart-total');
  cartItemsContainer.innerHTML = '';

  let total = 0;

  if (cart.length === 0) {
    cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
    cartTotal.textContent = `Total: $0`;
    return;
  }

  cart.forEach((item, index) => {
    const itemElement = document.createElement('div');
    itemElement.classList.add('cart-item');
    itemElement.innerHTML = `
      <img src="${item.image}" alt="${item.name}" class="cart-image">
      <div>
        <p>${item.name}</p>
        <p>Price: $${item.price}</p>
      </div>
       </button><button class="remove-item" data-index="${index}">Remove</button>
       <label><input type="radio" name="payment-${item.id}" value="UPI" checked> UPI</label>
                <label><input type="radio" name="payment-${item.id}" value="Wallet"> Wallet</label>
                <label><input type="radio" name="payment-${item.id}" value="Credit/Debit Card"> Credit/Debit Card</label>
                <label><input type="radio" name="payment-${item.id}" value="Net Banking"> Net Banking</label>
                <button onclick="proceedToPay(${item.id}, '${item.name}', ${item.price})">Proceed to Pay</button>
    `;
    cartItemsContainer.appendChild(itemElement);
    total += parseFloat(item.price);
  });

  cartTotal.textContent = `Total: $${total}`;
}

// Remove item from cart
document.addEventListener('click', event => {
  if (event.target.classList.contains('remove-item')) {
    const index = event.target.getAttribute('data-index');
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
  }
});

// Initialize cart on page load
renderCart();












// Example cart items with their prices (dynamic data can replace this)
const cartItems = [
    { id: 1, name: "Pet Toy", price: 500 },
    
];

// On page load, dynamically populate the cart with payment options
window.onload = function () {
    const cartContainer = document.getElementById('cart-container');
    cartItems.forEach((item) => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('cart-item');

        // Create the item's payment section
        itemDiv.innerHTML = `
         
        `;

        cartContainer.appendChild(itemDiv);
    });
};

// Function to handle payment for individual items
function proceedToPay(itemId, itemName, itemPrice) {
    const selectedOption = document.querySelector(`input[name="payment-${itemId}"]:checked`).value;
    alert(`Proceeding to pay ₹${itemPrice} for ${itemName} using ${selectedOption}`);
    // Add payment gateway logic here
}
