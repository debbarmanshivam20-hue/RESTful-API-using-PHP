<!DOCTYPE html>
<html>
<head>
    <title>Products CRUD</title>
</head>
<body>
    <h1>Product Dashboard</h1>

    <!-- Table to show products -->
    <table border="1" id="productTable">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </table>

    <h2>Add / Update Product</h2>
    Name: <input type="text" id="name">
    Price: <input type="number" id="price">
    <input type="hidden" id="productId">
    <button onclick="saveProduct()">Save</button>

    <script>
        const apiUrl = 'http://localhost/restapi/api/products.php'; 
        //postman is previously holding the url otherwise products1.php will be used

        // Load all products
        function loadProducts() {
            fetch(apiUrl)
            .then(res => res.json())
            .then(data => {
                let table = document.getElementById('productTable');
                table.innerHTML = '<tr><th>ID</th><th>Name</th><th>Price</th><th>Actions</th></tr>';

                data.forEach(product => {
                    let row = table.insertRow();
                    row.insertCell(0).innerText = product.id;
                    row.insertCell(1).innerText = product.name;
                    row.insertCell(2).innerText = product.price;
                    row.insertCell(3).innerHTML = `
                        <button onclick="editProduct(${product.id}, '${product.name}', ${product.price})">Edit</button>
                        <button onclick="deleteProduct(${product.id})">Delete</button>
                    `;
                });
            });
        }

        // Save product (POST or PUT)
        function saveProduct() {
            let id = document.getElementById('productId').value;
            let name = document.getElementById('name').value;
            let price = document.getElementById('price').value;

            let method = id ? 'PUT' : 'POST';
            let body = id ? {id: id, name: name, price: price} : {name: name, price: price};

            fetch(apiUrl, {
                method: method,
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(body)
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
                document.getElementById('name').value = '';
                document.getElementById('price').value = '';
                document.getElementById('productId').value = '';
                loadProducts();
            });
        }

        // Fill input fields for editing
        function editProduct(id, name, price) {
            document.getElementById('productId').value = id;
            document.getElementById('name').value = name;
            document.getElementById('price').value = price;
        }

        // Delete product
        function deleteProduct(id) {
            if(!confirm('Are you sure?')) return;

            fetch(apiUrl, {
                method: 'DELETE',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({id: id})
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
                loadProducts();
            });
        }

        // Initial load
        loadProducts();
    </script>
</body>
</html>