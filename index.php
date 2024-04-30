<?php
// Prevent caching
header("Cache-Control: no-cache, must-revalidate");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <meta http-equiv="refresh" content="2" /> -->
    <!-- autorefresh -->
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <script src="./formfunctions.js"></script>
  </head>
  <body>
    <!-- popup -->
    <div class="overlay display-none" id="popupOverlay"></div>

    <div id="popupContent" class="popupContainer display-none">
      <div class="popupContent">
        <div class="popupIconWrapper">
          <img src="./assets/error.svg" alt="" />
        </div>
        <div class="popupHead">
          <p>File Not Supported</p>
        </div>
        <div class="popupSubText">
          <p>
            Only jpg, png, svg formats are supported with max 1gb file size!
          </p>
        </div>
        <div class="popupActionBtnWrapper">
          <button class="PopupBtn" id="pOkayBtn">Okay</button>
        </div>
      </div>
    </div>
    <!-- popup -->

    <form action="post">
      <p class="info-head">Basic <span>Information</span></p>
      <div class="info-wrapper">
        <div class="info-feild">
          <p class="if-head">Name <span>*</span></p>
          <input
            type="text"
            placeholder="Enter Your Name"
            id="fullName"
            maxlength="50"
          />
          <div class="hinttext">Hint text</div>
        </div>
        <div class="info-feild">
          <p class="if-head">Email <span>*</span></p>
          <input type="email" placeholder="Enter Your Email" />
          <div class="hinttext">Hint text</div>
        </div>
        <div class="info-feild">
          <p class="if-head">Address <span>*</span></p>
          <input
            type="text"
            placeholder="Enter Your Address"
            id="address"
            maxlength="255"
          />
          <div class="hinttext">Hint text</div>
        </div>
        <div class="info-feild">
          <p class="if-head">Phone <span>*</span></p>
          <input
            type="text"
            id="phone_number"
            maxlength="15"
            placeholder="Enter Your Phone Number"
          />
          <div class="hinttext">Hint text</div>
        </div>

        <div class="info-feild">
          <p class="if-head">Type of Design <span>*</span></p>
          <div class="select-container" id="select-container1">
            <div class="select">
              <input
                type="text"
                id="input1"
                placeholder="select Type of Design"
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
          <div class="hinttext">Hint text</div>
        </div>

        <div class="info-feild">
          <p class="if-head">File Upload (Optional)</p>
          <div class="filewrapper">
            <div class="fileinnerwrapper">
              <div class="previewContainer">
                <input type="file" id="file-upload" name="file-upload" />
                <label for="file-upload" class="custom-file-upload">
                  <div class="importwrapper" id="importbtn">
                    <img
                      src="./assets/plus.svg"
                      class="importFile"
                      id="importimg"
                      alt=""
                    />
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
        <div id="product-fields" >
          <!-- Existing product fields go here -->
          <div class="product-field">
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
          </div>

          <!-- working -->
        </div>
        <div class="addbtnwrapper">
          <button type="button" class="themeBtn" id="add-product">
            Add Product
          </button>
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
      <button class="submitbtn themeBtn">Submit</button>
    </form>

    <script src="./formfunctions.js"></script>
  </body>

</html>
