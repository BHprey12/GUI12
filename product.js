document.addEventListener('DOMContentLoaded', function() {
    let cartIcon = document.querySelector("#cart-icon");
    let cart = document.querySelector(".cart");
    let closeCart = document.querySelector("#close-cart");

    cartIcon.onclick = () => {
        cart.classList.add("active");
    };

    closeCart.onclick = () => {
        cart.classList.remove("active");
    };

    var removeCartButtons = document.getElementsByClassName('cart-remove');
    for (var i = 0; i < removeCartButtons.length; i++) {
        var button = removeCartButtons[i];
        button.addEventListener("click", removeCartItem);
    }

    var quantityInputs = document.getElementsByClassName('cart-quantity');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }

    var addCart = document.getElementsByClassName('add-cart');
    for (var i = 0; i < addCart.length; i++) {
        var button = addCart[i];
        button.addEventListener("click", function(event) {
            addCartClicked(event);
        });
    }

    function removeCartItem(event) {
        var buttonClicked = event.target;
        buttonClicked.parentElement.remove();
        updatetotal();
    }

    function quantityChanged(event) {
        var input = event.target;
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updatetotal();
    }

    function addCartClicked(event) {
        var button = event.target;
        var shopProducts = button.closest('.product-box');
        var title = shopProducts.querySelector('.product-title').innerText;
        var price = shopProducts.querySelector('.price').innerText;
        var productImg = shopProducts.querySelector('.product-img').src;
        addProductToCart(title, price, productImg);
        updatetotal();

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "product.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                } else {
                    console.error("Error occurred during request");
                }
            }
        };
        var params = JSON.stringify({ title: title, price: price, img: productImg });
        xhr.send(params);
    }

    function addProductToCart(title, price, productImg) {
        var cartShopBox = document.createElement("div");
        cartShopBox.classList.add("cart-box");

        var cartContent = document.querySelector(".cart-content");
        var cartItems = cartContent.getElementsByClassName("cart-box");
        for (var i = 0; i < cartItems.length; i++) {
            var cartItem = cartItems[i];
            var itemName = cartItem.querySelector(".cart-product-title").innerText;
            if (itemName === title) {
                alert("You have already added this item to the cart");
                return;
            }
        }

        var cartItemContent = `
            <img src="${productImg}" alt="" class="cart-img">
            <div class="detail-box">
                <div class="cart-product-title">${title}</div>
                <div class="cart-price">${price}</div>
                <input type="number" value="1" class="cart-quantity">
            </div>
            <i class="fa-solid fa-trash cart-remove"></i>
        `;
        cartShopBox.innerHTML = cartItemContent;
        cartContent.appendChild(cartShopBox);
        cartShopBox.querySelector(".cart-remove").addEventListener("click", removeCartItem);
    }

    function updatetotal() {
        var cartContent = document.querySelector('.cart-content');
        var cartBoxes = cartContent.getElementsByClassName('cart-box');
        var total = 0;

        for (var i = 0; i < cartBoxes.length; i++) {
            var cartBox = cartBoxes[i];
            var priceElement = cartBox.querySelector('.cart-price');
            var quantityElement = cartBox.querySelector('.cart-quantity');
            var priceText = priceElement.innerText;
            var price = parseFloat(priceText.substring(1));
            var quantity = parseInt(quantityElement.value);
            total += price * quantity;
        }

        total = Math.round(total * 100) / 100;
        var totalPriceElement = document.querySelector('.total-price');
        totalPriceElement.innerText = '₱' + total;
    }

    document.querySelector('.btn-buy').addEventListener('click', function(event) {
        event.preventDefault();
        if (!document.querySelector('.cart-box')) {
            return;
        }

        var cartItems = document.querySelectorAll('.cart-box');

        var itemsToSubmit = [];

        cartItems.forEach(function(cartItem) {
            var title = cartItem.querySelector('.cart-product-title').innerText;
            var priceText = cartItem.querySelector('.cart-price').innerText;
            var price = parseFloat(priceText.replace('₱', ''));
            var img = cartItem.querySelector('.cart-img').src;
            itemsToSubmit.push({ title: title, price: price, img: img });
        });

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "product.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                } else {
                    console.error("Error occurred during request");
                }
            }
        };
        var params = JSON.stringify(itemsToSubmit);
        xhr.send(params);
    });
});