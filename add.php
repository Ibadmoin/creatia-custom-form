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
                
            <div class="product-previewContainer">
              <div class="product-previewContainerInner">
                <div class="Product-imageWrapper">
                  <img src="./assets/frame.png" alt="" />
                </div>
                <div class="product-detailsWrapper">
                  <div class="productNameWrapper">
                    <p>Men’s Classic Tee | Gildon 5000</p>
                  </div>
                  <div class="view-sizeGuideWrapper">
                    <span><img src="./assets/sizeguideicon.svg" alt="" /></span>
                    <p>View Product Size Guide</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="productSelection-Wrapper">
              <div class="info-feild">
                <p class="if-head">Product <span>*</span></p>
                <div class="select-container" id="select-container-product">
                  <div class="select">
                    <input
                      type="text"
                      id="search-products"
                      placeholder="Select an Option"
                      onfocus="this.blur();"
                    />
                  </div>
                  <div class="option-container">
                    <div class="option">
                      <label>Text based Design</label>
                    </div>
                    <div class="option">
                      <label>Image based Design</label>
                    </div>
                    <div class="option">
                      <label>Image & Text based Desgin</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- product items -->
              <div class="info-feild">
                <p class="if-head">Product Type <span>*</span></p>
                <div class="select-container" id="select-container-product-item">
                  <div class="select">
                    <input
                      type="text"
                      id="search-products-item"
                      placeholder="Select an Option"
                      onfocus="this.blur();"
                    />
                  </div>
                  <div class="option-container">
                    <div class="option">
                      <label>Text based Design</label>
                    </div>
                    <div class="option">
                      <label>Image based Design</label>
                    </div>
                    <div class="option">
                      <label>Image & Text based Desgin</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- product sizes -->
              <div class="info-feild">
                <p class="if-head">Product Size <span>*</span></p>
                <div class="size-selection-wrapper" >
                  <div class="select">
                    <div class="option-size-container">
                      <div class="size-box sizebox_active"><p>S</p></div>
                      <div class="size-box"><p>M</p></div>
                      <div class="size-box"><p>L</p></div>
                      <div class="size-box"><p>XL</p></div>
                      <div class="size-box"><p>L</p></div>
                    </div>
                </div>
              </div>
            </div>
            <!-- product colors -->
            <div class="info-feild">
              <p class="if-head">Product Color <span>*</span></p>
              <div class="select-container" id="select-container-product-item-color">
                <div class="select">
                  <input
                    type="text"
                    id="search-products-item-color"
                    placeholder="Select an Option"
                    onfocus="this.blur();"
                  />
                </div>
                <div class="option-container  ">
                  <div class="option coloroption">
                    <label><span class="color-preview"></span><p>Green</p></label>
                    
                  </div>
                  
                  <div class="option coloroption">
                  <label><span class="color-preview"></span><p>Black</p></label>

                  </div>
                  <div class="option coloroption">
                  <label><span class="color-preview"></span><p>Blue</p></label>

                  </div>
                </div>
              </div>
            </div>
          
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
