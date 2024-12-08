document.addEventListener('DOMContentLoaded', function() {
    const likedProducts = JSON.parse(localStorage.getItem('likedProducts')) || [];
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    function loadCartItems() {
        const cartItemsContainer = document.getElementById('cart-items');
        if (!cartItemsContainer) return;

        cartItemsContainer.innerHTML = '';
        cart.forEach(item => {
            const itemDiv = document.createElement('div');
            itemDiv.className = 'cart-item';
            itemDiv.innerHTML = `
                <h3>${item.name}</h3>
                <p>Price: R${item.price.toFixed(2)}</p>
                <p>Quantity: ${item.quantity}</p>
                <button onclick="removeFromCart('${item.name}')">Remove</button>
            `;
            cartItemsContainer.appendChild(itemDiv);
        });
    }

    function addToCart(productName, price) {
        const existingItem = cart.find(item => item.name === productName);
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ name: productName, price, quantity: 1 });
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        alert(`${productName} added to cart!`);
        loadCartItems();  // Refresh cart display immediately after adding an item
    }

    window.addToCart = addToCart;

    function removeFromCart(productName) {
        cart = cart.filter(item => item.name !== productName);
        localStorage.setItem('cart', JSON.stringify(cart));
        loadCartItems();
    }

    window.removeFromCart = removeFromCart;

    function toggleLike(productName) {
        const index = likedProducts.indexOf(productName);
        if (index > -1) {
            likedProducts.splice(index, 1);
        } else {
            likedProducts.push(productName);
        }
        localStorage.setItem('likedProducts', JSON.stringify(likedProducts));
        updateLikeStatus(productName);
    }

    window.toggleLike = toggleLike;

    function updateLikeStatus(productName) {
        const likeButton = document.querySelector(`button[data-product='${productName}']`);
        if (likeButton) {
            likeButton.textContent = likedProducts.includes(productName) ? '❤️ Liked' : '🤍 Like';
        }
    }

    function rateProduct(productName) {
        const rating = prompt(`Rate ${productName} from 1 to 5:`);
        if (rating && rating >= 1 && rating <= 5) {
            alert(`You rated ${productName} ${rating} stars!`);
        } else {
            alert("Please enter a rating between 1 and 5.");
        }
    }

    window.rateProduct = rateProduct;

    window.processPayment = function() {
        const cardNumber = document.getElementById('card-number').value;
        const expiryDate = document.getElementById('expiry-date').value;
        const cvv = document.getElementById('cvv').value;

        if (!cardNumber || !expiryDate || !cvv) {
            alert('Please fill in all fields.');
            return;
        }

        document.getElementById('confirmation-message').innerHTML = '<p>Processing payment...</p>';
        setTimeout(() => {
            document.getElementById('confirmation-message').innerHTML = '<p>Payment successful! Thank you for your purchase.</p>';
            cart = [];
            localStorage.setItem('cart', JSON.stringify(cart));
            loadCartItems();
        }, 2000);
    }

    likedProducts.forEach(updateLikeStatus);
    loadCartItems();  // Load cart items if on cart page
});
