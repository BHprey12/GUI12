


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders and Products</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .order {
      margin-bottom: 20px;
      padding: 15px;
      background-color: #f9f9f9;
      border-radius: 8px;
      border-left: 5px solid #007bff;
    }

    .order h2 {
      margin-top: 0;
      color: #007bff;
    }

    .product {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .product img {
      width: 60px;
      height: 60px;
      margin-right: 10px;
      border-radius: 5px;
    }

    .product .details {
      flex-grow: 1;
    }

    .product .name {
      font-weight: bold;
    }

    .product .price {
      color: #007bff;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Orders and Products</h1>

  <div class="order">
    <h2>Order #1234</h2>
    <div class="product">
      <img src="product1.jpg" alt="Product 1">
      <div class="details">
        <div class="name">Product 1</div>
        <div class="price">$20</div>
      </div>
    </div>
    <div class="product">
      <img src="product2.jpg" alt="Product 2">
      <div class="details">
        <div class="name">Product 2</div>
        <div class="price">$15</div>
      </div>
    </div>
  </div>

  <div class="order">
    <h2>Order #5678</h2>
    <div class="product">
      <img src="product3.jpg" alt="Product 3">
      <div class="details">
        <div class="name">Product 3</div>
        <div class="price">$25</div>
      </div>
    </div>
  </div>

</div>

</body>
</html>