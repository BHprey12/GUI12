<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./adminscss/admin.css">
</head>
<body>
<div class="dashboard">
    <div class="sidebar">
        <h2>Admin</h2>
        <ul>
            <li><a href="#" class="active">Dashboard</a></li>
            <li><a href="productsview.php">Products</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="#">Customers</a></li>
            <li><a href="report.php">Reports</a></li>
            <li><a href="">Settings</a></li>
            <a href="login.php"><i class="fa-solid fa-sign-out"></i></a>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h1>Dashboard</h1>
            <div class="user">
                <img src="../image/brucefabria.jpg" alt="Admin Avatar">
                <p>Welcome, Admin</p>
            </div>
        </header>
        <div class="cards">
            <div class="card">
                <h3>Total Products</h3>
                <p>₱250</p>
            </div>
            <div class="card">
                <h3>Total Orders</h3>
                <p>₱250</p>
            </div>
            <div class="card">
                <h3>Total Revenue</h3>
                <p>₱250</p>
            </div>
            <div class="card">
                <h3>New Customers</h3>
                <p>₱250</p>
            </div>
        </div>
        <div class="charts">
        </div>
        <div class="mains">
            <h2>Manage Products</h2>
            <div class="form-container">
                <form id="productForm">
                    <input type="hidden" id="productId" name="productId">
                    <input type="text" id="productName" name="productName" placeholder="Product Name" required>
                    <input type="number" id="productPrice" name="productPrice" placeholder="Product Price" required>
                    <input type="file" id="productImage" name="productImage" accept="image/*" required>
                    <button type="submit">Add Product</button>
                </form>
            </div>
            <table id="productTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById("productForm").addEventListener("submit", function(event) {
        event.preventDefault();
        
        var formData = new FormData(this);

        fetch("admin_add_product.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            // Display success/failure message or handle errors
            alert(data.message);

            // If successful, update products table
            if (data.success) {
                var productId = data.product.id;
                var productName = formData.get("productName");
                var productPrice = formData.get("productPrice");
                var productImage = data.product.imagePath;

                var tbody = document.querySelector("#productTable tbody");
                var newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td>${productId}</td>
                    <td>${productName}</td>
                    <td>${productPrice}</td>
                    <td><img src="${productImage}" alt="${productName}" width="50"></td>
                    <td>Actions</td>
                `;
                tbody.appendChild(newRow);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("There was an error adding the product: " + error.message);
        });
    });
</script>

</body>
</html>
