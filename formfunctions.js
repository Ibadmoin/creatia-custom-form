// var inputField = document.getElementById("D_typeInput");
// var typeResults = document.getElementById("D_type");
// var searchOptions = document.querySelectorAll("#D_type p");
// var dropdownToggle = document.getElementById("dropdownToggle");

// dropdownToggle &&
//   dropdownToggle.addEventListener("click", function (event) {
//     if (
//       typeResults.style.display === "none" ||
//       typeResults.style.display === ""
//     ) {
//       typeResults.style.display = "inline-block";
//       dropdownToggle.src = "./assets/up.svg";
//       alert("hogai link bhai"); // Change the arrow to up when opening
//     } else {
//       typeResults.style.display = "none";
//       dropdownToggle.src = "./assets/down.svg"; // Change the arrow to down when closing
//     }
//     event.stopPropagation(); // Stop the click event from propagating to the document
//   });

// inputField &&
//   inputField.addEventListener("keydown", function (e) {
//     e.preventDefault();
//   });

// // Attach focus event listener to input field to handle opening and closing the dropdown
// inputField &&
//   inputField.addEventListener("focus", function (event) {
//     if (
//       typeResults.style.display === "none" ||
//       typeResults.style.display === ""
//     ) {
//       typeResults.style.display = "inline-block";
//       dropdownToggle.src = "./assets/up.svg";
//     } else {
//       typeResults.style.display = "none";
//       dropdownToggle.src = "./assets/down.svg"; // Change the arrow to down when closing
//     }
//     event.stopPropagation();
//     console.log("dsadsad");
//   });

// searchOptions.forEach(function (option) {
//   option.addEventListener("click", function () {
//     inputField.value = this.textContent;
//     typeResults.style.display = "none";
//     dropdownToggle.src = "./assets/down.svg";
//   });
// });

// // for touch devices input characters
// inputField &&
//   inputField.addEventListener("touchstart", function (event) {
//     event.preventDefault(); // Prevent the default touch behavior (e.g., showing the keyboard)
//     if (
//       typeResults.style.display === "none" ||
//       typeResults.style.display === ""
//     ) {
//       typeResults.style.display = "inline-block";
//       dropdownToggle.src = "./assets/up.svg";
//     } else {
//       typeResults.style.display = "none";
//       dropdownToggle.src = "./assets/down.svg"; // Change the arrow to down when closing
//     }
//   });

// searchOptions.forEach(function (option) {
//   option.addEventListener("touchend", function (event) {
//     event.preventDefault(); // Prevent the default touch behavior
//     inputField.value = this.textContent;
//     typeResults.style.display = "none";
//     dropdownToggle.src = "./assets/down.svg";
//   });
// });

function initializeSelect(containerId, inputId) {
  let selectContainer = document.getElementById(containerId);
  let input = document.getElementById(inputId);
  let options = selectContainer.querySelectorAll(".option");

  console.log("Select Container:", selectContainer);
  console.log("Input Field:", input);
  console.log("Options:", options);

  selectContainer.querySelector(".select").onclick = () => {
    selectContainer.classList.toggle("active");
    console.log("clicked")
  };

  options.forEach((option) => {
    option.addEventListener("click", () => {
      input.value = option.innerText;
      selectContainer.classList.remove("active");
      options.forEach((opt) => {
        opt.classList.remove("selected");
      });
      option.classList.add("selected");
    });
  });

  document.addEventListener("click", (event) => {
    if (!selectContainer.contains(event.target)) {
      selectContainer.classList.remove("active");
    }
  });
}

//   file functionality

function handleFileUploadChange() {
  var files = document.getElementById("file-upload").files;
  var previewContainer = document.getElementById("preContainer");
  var importBtn = document.getElementById("importbtn");
  var plusImg = document.getElementById("importimg");

  function updateFileNames() {
    var fileNames = [];
    for (var i = 0; i < previewContainer.children.length; i++) {
      var previewElement = previewContainer.children[i];
      var fileName = previewElement.getAttribute("data-file-name");
      if (fileName) {
        fileNames.push(fileName);
      }
    }
    console.log("File names:", fileNames);
  }

  // Check if more than three files are selected
  if (files.length > 3) {
    alert("You can only upload up to three files.");
    // Clear the file input
    document.getElementById("file-upload").value = "";
    return; // Exit the function
  }

  if (previewContainer.children.length >= 2) {
    document.getElementById("file-upload").disabled = true;
    console.log("diable hogaya");
    importBtn.classList.add("disabled");
    plusImg.src = "assets/disablePlus.svg";
  } else {
    document.getElementById("file-upload").disabled = false;
    console.log("enable hogaya");
    importBtn.classList.remove("disabled");
    plusImg.src = "assets/plus.svg";
  }

  for (var i = 0; i < files.length; i++) {
    var file = files[i];

    if (file) {
      var previewElement = document.createElement("div");
      previewElement.classList.add("preview-file");
      closeFileIcon = document.createElement("span");
      closeFileIcon.classList.add("remove-file");
      fileNamePreview = document.createElement("span");

      (function (previewElement) {
        closeFileIcon.addEventListener("click", function () {
          previewContainer.removeChild(previewElement);
          document.getElementById("file-upload").disabled = false;
          importBtn.classList.remove("disabled");
          plusImg.src = "assets/plus.svg";
          updateFileNames();
        });
      })(previewElement);

      fileNamePreview.textContent = file.name;
      fileNamePreview.classList.add("filename");

      previewElement.setAttribute("data-file-name", file.name);

      previewElement.append(closeFileIcon, fileNamePreview);

      if (file.type.startsWith("image/")) {
        var reader = new FileReader();
        reader.onload = function (event) {
          var img = document.createElement("img");
          img.src = event.target.result;
          img.classList.add("preview-image");
          previewElement.appendChild(img);
        };
        reader.readAsDataURL(file);
      } else {
        var fileIcon = document.createElement("img");
        fileIcon.src = "./assets/doc.svg";
        fileIcon.alt = "File Icon";
        fileIcon.classList.add("preview-icon");
        previewElement.appendChild(fileIcon);
      }

      previewContainer.appendChild(previewElement);
    }
  }
}

// Attach the event listener to the file input element
document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("file-upload")
    .addEventListener("change", handleFileUploadChange);

  var name = document.getElementById("fullName");
  

  var phoneNumberInput = document.getElementById("phone_number");

  phoneNumberInput.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "");
  });

  // selectBoxes Initializations

  initializeSelect("select-container1", "input1");
  initializeSelect("select-container-product", "search-products");
  initializeSelect("select-container-product-item", "search-products-item");
  initializeSelect("select-container-product-item-color", "search-products-item-color");



  // popup
  var overlay = document.getElementById("popupOverlay");
  var popupContent = document.getElementById("popupContent");

   document.addEventListener("click", function(event) {
    // Check if the clicked element is outside of the popupContent
    if (!popupContent.contains(event.target) && event.target == overlay) {
      overlay.classList.add("display-none");
      popupContent.classList.add("display-none");
    }
  });

  var pOkayBtn = document.getElementById("pOkayBtn");
  pOkayBtn && pOkayBtn.addEventListener("click", function() {
    overlay.classList.add("display-none");
    popupContent.classList.add("display-none");
  })

  // Show the popup when needed (example)
  var showPopupBtn = document.getElementById("showPopupBtn");
  showPopupBtn && showPopupBtn.addEventListener("click", function() {
    overlay.classList.remove("display-none");

  });

});


// validation functions
function sanitizeInput(input) {

  return input.replace(/<[^>]*>?/gm, '');
}




// closing the dropdown when clicking outside the dropdown

//File upload functionality
