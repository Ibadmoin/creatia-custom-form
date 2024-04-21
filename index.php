<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <meta http-equiv="refresh" content="5" /> -->
    <!-- autorefresh -->
    <title>Document</title>
    <link rel="stylesheet" href="design.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="./formfunctions.js"></script>
  </head>
  <body>
    <form action="post">
      <p class="info-head">Basic <span>Information</span></p>
      <div class="info-wrapper">
        <div class="info-feild">
          <p class="if-head">Name <span>*</span></p>
          <input type="text" placeholder="Enter Your Name" />
          <div class="hinttext">Hint text</div>
        </div>
        <div class="info-feild">
          <p class="if-head">Email <span>*</span></p>
          <input type="email"  placeholder="Enter Your Email"/>
          <div class="hinttext">Hint text</div>
        </div>
        <div class="info-feild">
          <p class="if-head">Address <span>*</span></p>
          <input type="text" placeholder="Enter Your Address" />
          <div class="hinttext">Hint text</div>
        </div>
        <div class="info-feild">
          <p class="if-head">Phone <span>*</span></p>
          <input type="text" id="phone_number" maxlength="15" placeholder="Enter Your Phone Number" />
          <div class="hinttext">Hint text</div>
        </div>

        <div class="info-feild">
          <p class="if-head">Type of Design <span>*</span></p>
          <div class="select-container" id="select-container1">
    <div class="select">
        <input type="text" id="input1" placeholder="select Type of Design" onfocus="this.blur();">
    </div>
    <div class="option-container">
        <div class="option">
            <label>Typography</label>
        </div>
        <div class="option">
            <label>Image based Design</label>
        </div>
        <div class="option">
            <label>Image Plus Text</label>
        </div>
        
    </div>
</div>
          <div class="hinttext">Hint text</div>
        </div>

        <div class="info-feild">
          <p class="if-head">File Upload (Optional)</p>
          <div class="filewrapper">
            <div class="fileinnerwrapper">
              <div class="previewContainer">
                <input
                  type="file"
                  id="file-upload"
                  name="file-upload"
                />
                <label for="file-upload" class="custom-file-upload">
                  <div class="importwrapper " id="importbtn">
                    <img src="./assets/plus.svg" class="importFile" id="importimg"  alt="" />
                  </div>
                </label>
                <div id="preContainer" class="preContainerimport">
                  <!-- js Populated file preview here -->
                  <!-- <div class="preview-file">
                    <img src="./assets/plus.svg" alt="">
                    <span  class="remove-file"></span>
                    <span class="filename">File Name.png</span>
                  </div> -->
                  
                </div>
              </div>
            </div>
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

      <!-- description layout start here  -->
      <p class="desciption-head">Description <span>*</span></p>
      <textarea
        name="description"
        id="descriptionbox"
        cols="30"
        rows="7"
        placeholder="Describe about product"
      ></textarea>
      <!-- description layout end here  -->
      <!-- submit button here -->
      <button class="submitbtn">Submit</button>
    </form>



  <script src="./formfunctions.js"></script>

  </body>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      document
        .getElementById("add-product")
        .addEventListener("click", function () {
          var productFields = document.getElementById("product-fields");
          var newProductField = document.createElement("div");
          newProductField.classList.add("product-field");
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

      document.addEventListener("click", function (event) {
        if (event.target && event.target.classList.contains("remove-product")) {
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
      button.addEventListener("click", function () {
        togglePopup();
      });

      // Close the popup if user clicks outside of it
      window.addEventListener("click", function (event) {
        if (event.target == popup) {
          togglePopup();
        }
      });
    });
  </script>
</html>
