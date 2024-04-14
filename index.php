<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="design.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form action="post">
      <p class="info-head">Basic <span>Information</span></p>
      <div class="info-wrapper">
        <div class="info-feild">
          <p class="if-head">Name <span>*</span></p>
          <input type="text" />
        </div>
        <div class="info-feild">
          <p class="if-head">Email <span>*</span></p>
          <input type="email"  />
        </div>
        <div class="info-feild">
          <p class="if-head">Address <span>*</span></p>
          <input type="text" />
        </div>
        <div class="info-feild">
          <p class="if-head">Phone <span>*</span></p>
          <input type="text" id="phone_number" maxlength="15">

        </div>
     
       
        <div class="info-feild">
          <p class="if-head">Type of Design <span>*</span></p>
          <div class="search-wrapper">
            <input type="text" value="ibad" id="D_typeInput">
              <img src="./assets/down.svg" id="dropdownToggle"  class="arrow-icon" alt="">
            
            
            <div class="search-results" id="D_type">
              <!-- search query php -->
              <p>Typography</p>
              <p>Image based Desgin</p>
              <p>Typo + Image</p>
            </div>
          </div>
        </div>

        <div class="info-feild">
          <p class="if-head">File Upload <span>*</span></p>
          <div class="filewrapper">
            <input type="file" id="file-upload" name="file-upload" />
            <label for="file-upload" class="custom-file-upload"
              >Choose File</label
            >
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
      <textarea name="description" id="descriptionbox" cols="30" rows="7" placeholder="Describe about product" ></textarea>
      <!-- description layout end here  -->
      <!-- submit button here -->
      <button class="submitbtn">Submit</button>
    </form>
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
  <script>
    var inputFeild = document.getElementById("D_typeInput");
    var typeResults = document.getElementById("D_type");
    var searchOptions = document.querySelectorAll("#D_type p");
    var dropdownToggle = document.getElementById("dropdownToggle");

    
    var phoneNumberInput = document.getElementById("phone_number");

    phoneNumberInput.addEventListener("input", function(){
      this.value = this.value.replace(/[^0-9]/g, '');
    });





    dropdownToggle.addEventListener("click", function(event) {
  if (typeResults.style.display === "none" || typeResults.style.display === "") {
    typeResults.style.display = "inline-block";
    dropdownToggle.src = "./assets/up.svg";
    console.log("cliekd"); // Change the arrow to up when opening
  } else {
    typeResults.style.display = "none";
    dropdownToggle.src = "./assets/down.svg"; // Change the arrow to down when closing
  }
  event.stopPropagation(); // Stop the click event from propagating to the document
});


// Attach click event listener to input field to handle opening and closing the dropdown
inputFeild.addEventListener("click", function() {
  if (typeResults.style.display === "none" || typeResults.style.display === "") {
    typeResults.style.display = "inline-block";
    dropdownToggle.src = "./assets/up.svg"; // Change the arrow to up when opening
  } else {
    typeResults.style.display = "none";
    dropdownToggle.src = "./assets/down.svg"; // Change the arrow to down when closing
  }
});
    

    searchOptions.forEach(function(option){
      option.addEventListener("click", function(){
        inputFeild.value = this.textContent;
        typeResults.style.display = "none";
        dropdownToggle.src = "./assets/down.svg"
      })
    });

  
  
  document.addEventListener("click", function(event){
    
    if(!inputFeild.contains(event.target) && !typeResults.contains(event.target)) {
      typeResults.style.display = "none";
      dropdownToggle.src = "./assets/down.svg"
      }

    });

    

  </script>
</html>
