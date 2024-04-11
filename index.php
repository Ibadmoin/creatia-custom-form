<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="post" >
        <p class="info-head">Basic <span>Information</span> </p>
       <div class="info-wrapper">
       <div class="info-feild">
            <p class="if-head">Name <span>*</span></p>
            <input type="text">
        </div>
        <div class="info-feild">
            <p class="if-head">Email <span>*</span></p>
            <input type="text">
        </div>
        <div class="info-feild">
            <p class="if-head">Address <span>*</span></p>
            <input type="text">
        </div>
        <div class="info-feild">
            <p class="if-head">Phone <span>*</span></p>
            <input type="text">
        </div>
        <div class="info-feild">
            <p class="if-head">Type of Design <span>*</span></p>
            <input type="text">
        </div>
        <div class="info-feild">
            <p class="if-head">File Upload <span>*</span></p>
            <div class="filewrapper">
            <input type="file" id="file-upload" name="file-upload">
            <label for="file-upload" class="custom-file-upload">Choose File</label>
            <p>Max file Size: 2gb</p>
            </div>
        </div>
       </div>
       <div class="product-detail-wrapper">
           <p class="info-head">Product <span>Details</span></p>
           <!-- add product end here -->
           <div id="product-fields">
        <!-- Existing product fields go here -->
    </div>
   <div class="addbtnwrapper">
   <button type="button" id="add-product">Add Product</button>

   </div>
    <div id="myPopup" class="popup">
        <!-- Popup content goes here -->
    </div>

 
           
           <!-- add product start here -->
       </div>
       
  

    </form>
    

</body>

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
</html>