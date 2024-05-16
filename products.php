<?php
function handleCartInteractions() {
    include("./php/config.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        if (isset($data['title']) && isset($data['price']) && isset($data['img'])) {
            $title = mysqli_real_escape_string($con, $data['title']);
            $price = mysqli_real_escape_string($con, $data['price']);
            $img = mysqli_real_escape_string($con, $data['img']);

            $insert_query = mysqli_query($con, "INSERT INTO products (title, price, img) VALUES ('$title', '$price', '$img')");
            if ($insert_query) {
                echo json_encode(["message" => "Product added to the database successfully!"]);
            } else {
                echo json_encode(["message" => "Error occurred while inserting product into the database: " . mysqli_error($con)]);
            }
        } else if (isset($_POST['submit']) && $_POST['submit'] == '1') {
            if (isset($_COOKIE['cart'])) {
                $cart_items = json_decode($_COOKIE['cart'], true);

                foreach($cart_items as $item) {
                    $title = mysqli_real_escape_string($con, $item['title']);
                    $price = mysqli_real_escape_string($con, $item['price']);
                    $img = mysqli_real_escape_string($con, $item['img']);

                    $insert_query = mysqli_query($con, "INSERT INTO products (title, price, img) VALUES ('$title', '$price', '$img')");
                    if (!$insert_query) {
                        echo json_encode(["message" => "Error occurred while inserting product into the database: " . mysqli_error($con)]);
                        return;
                    }
                }
                setcookie('cart', '', time() - 3600, '/');
                echo json_encode(["message" => "Products added to the database successfully!"]);
            } else {
                echo "Cart is empty.";
            }
        } else {
            echo "Missing required fields.";
        }
    } else {
        echo "Invalid request method.";
    }
}

handleCartInteractions();
?>



 <script>
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
});

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
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "stylesheet" href="./css/products.css">
</head>
<body>


      
    <header>
             <div class="nav container">
             <a href="dashboard.php" style ="color: white; font-size: 1.4rem;">Back</a>
                    <a href="#" class="logo">Products</a>
                    <i class="fa-solid fa-basket-shopping " id="cart-icon"></i>

                    
                    <div class="cart">
    <h2 class="cart-title">Cart</h2>
    <div class="cart-content">

        <div class="cart-box">

            <div class="detail-box">
                <div class="cart-product-title"></div>
                <div class="cart-price"></div>
                <input type="number" value="" class="cart-quantity">
            </div>
          
        </div>
    </div>

    <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">₱</div>
    </div>
    <form method="POST" action="">
    <input type="hidden" name="submit" value="1">
    <input type="hidden" name="title" value="cart-product-title">
    <input type="hidden" name="price" value="total-price">
    <input type="hidden" name="img" value="image/khaki.jpg">
    <button type="submit" class="btn-buy">Buy Now</button>
</form>



    <i class="fa-solid fa-xmark" id="close-cart"></i>
</div>

</header>

<div class="cart">
    <h2 class="cart-title">Cart</h2>
    <div class="cart-content">
        <!-- Cart items will be dynamically added here -->
    </div>
    <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">₱0</div>
    </div>
    <button type="button" class="btn-buy">Buy Now</button>
    <i class="fa-solid fa-xmark" id="close-cart"></i>
</div>

<section class="shop container">
    <h2 class="section-title">Drippin Essence Products</h2>
    <div class="shop-content">
        <!-- Product boxes -->
    </div>
</section>


    <script src="product.js"></script>
</body>
</html>