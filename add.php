<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Product Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <div id="product-fields">
        <!-- Existing product fields go here -->
    </div>
    <button type="button" id="add-product">Add Product</button>

    <div id="myPopup" class="popup">
        <!-- Popup content goes here -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-product').addEventListener('click', function() {
                var productFields = document.getElementById('product-fields');
                var newProductField = document.createElement('div');
                newProductField.classList.add('product-field');
                newProductField.innerHTML = `
                    <label>Image:</label>
                    <img src="placeholder_image.jpg" alt="Product Image">
                    <p>Product Title: Sample Title</p>
                    <button type="button" class="view-size-guide">View Size Guide</button>
                    <label>Product:</label>
                    <select class="product-select" name="product[]">
                        <!-- Populate product options dynamically -->
                    </select>
                    <label>Product Type:</label>
                    <select class="product-type-select" name="product_type[]">
                        <!-- Populate product type options dynamically -->
                    </select>
                    <label>Product Size:</label>
                    <input type="text" name="product_size[]" placeholder="Size">
                    <label>Product Color:</label>
                    <input type="text" name="product_color[]" placeholder="Color">
                    <label>Product Quantity:</label>
                    <input type="number" min="1" value="1" name="product_quantity[]" placeholder="Quantity">
                    <button type="button" class="remove-product">Remove Product</button>
                `;
                productFields.appendChild(newProductField);
            });

            document.addEventListener('click', function(event) {
                if (event.target && event.target.classList.contains('remove-product')) {
                    event.target.parentNode.remove();
                }
            });

            // Get the button and the popup
            var button = document.getElementsByClassName("view-size-guide")[0];
            var popup = document.getElementById("myPopup");

            // Function to toggle the display of the popup
            function togglePopup() {
                if (popup.style.display === "block") {
                    popup.style.display = "none";
                } else {
                    popup.style.display = "block";
                }
            }

            // Attach a click event listener to the button
            button.addEventListener("click", function() {
                togglePopup();
            });

            // Close the popup if user clicks outside of it
            window.addEventListener("click", function(event) {
                if (event.target == popup) {
                    togglePopup();
                }
            });

        });
    </script>
</body>
</html>
