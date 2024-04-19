var inputField = document.getElementById("D_typeInput");
var typeResults = document.getElementById("D_type");
var searchOptions = document.querySelectorAll("#D_type p");
var dropdownToggle = document.getElementById("dropdownToggle");

var phoneNumberInput = document.getElementById("phone_number");

phoneNumberInput.addEventListener("input", function () {
  this.value = this.value.replace(/[^0-9]/g, "");
});

dropdownToggle.addEventListener("click", function (event) {
  if (
    typeResults.style.display === "none" ||
    typeResults.style.display === ""
  ) {
    typeResults.style.display = "inline-block";
    dropdownToggle.src = "./assets/up.svg";
    alert("hogai link bhai"); // Change the arrow to up when opening
  } else {
    typeResults.style.display = "none";
    dropdownToggle.src = "./assets/down.svg"; // Change the arrow to down when closing
  }
  event.stopPropagation(); // Stop the click event from propagating to the document
});

inputField.addEventListener("keydown", function (e) {
  e.preventDefault();
});

// Attach focus event listener to input field to handle opening and closing the dropdown
inputField.addEventListener("focus", function (event) {
  if (
    typeResults.style.display === "none" ||
    typeResults.style.display === ""
  ) {
    typeResults.style.display = "inline-block";
    dropdownToggle.src = "./assets/up.svg";
  } else {
    typeResults.style.display = "none";
    dropdownToggle.src = "./assets/down.svg"; // Change the arrow to down when closing
  }
  event.stopPropagation();
  console.log("dsadsad");
});

searchOptions.forEach(function (option) {
  option.addEventListener("click", function () {
    inputField.value = this.textContent;
    typeResults.style.display = "none";
    dropdownToggle.src = "./assets/down.svg";
  });
});

// for touch devices input characters
inputField.addEventListener("touchstart", function (event) {
  event.preventDefault(); // Prevent the default touch behavior (e.g., showing the keyboard)
  if (
    typeResults.style.display === "none" ||
    typeResults.style.display === ""
  ) {
    typeResults.style.display = "inline-block";
    dropdownToggle.src = "./assets/up.svg";
  } else {
    typeResults.style.display = "none";
    dropdownToggle.src = "./assets/down.svg"; // Change the arrow to down when closing
  }
});

searchOptions.forEach(function (option) {
  option.addEventListener("touchend", function (event) {
    event.preventDefault(); // Prevent the default touch behavior
    inputField.value = this.textContent;
    typeResults.style.display = "none";
    dropdownToggle.src = "./assets/down.svg";
  });
});

//   file functionality

document.getElementById("file-upload").addEventListener("change", function (e) {
  var files = e.target.files;
  console.log(files);
  var previewContainer = document.getElementById("preContainer");
  

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
    this.value = "";
    return; // Exit the function
  }

  if (previewContainer.children.length >= 3) {
    this.disabled = true;
  }else{
    this.disabled = false;
  }

  if (previewContainer.children.length == 2) {
    // Remove the 'multiple' attribute when two files are selected
    document.getElementById("file-upload").removeAttribute("multiple");
  }  else if (files.length <= 1) {
    // Reset the file input to allow multiple files if less than or equal to one file is selected
    document.getElementById("file-upload").setAttribute("multiple", "multiple");
  }


  for (var i = 0; i < files.length; i++) {
    var file = files[i];
    if (file) {
      var previewElement = document.createElement("div"); // Create a new wrapper element for each preview
      previewElement.classList.add("preview-file");
      closeFileIcon = document.createElement("span");
      closeFileIcon.classList.add("remove-file");
      (function (previewElement) {
        closeFileIcon.addEventListener("click", function () {
          // Remove the parent preview element when the close icon is clicked
          previewContainer.removeChild(previewElement);
          // Re-enable the file input when removing a preview
          document.getElementById("file-upload").disabled = false;
          updateFileNames()
        });
      })(previewElement);
      previewElement.setAttribute("data-file-name", file.name);


      previewElement.append(closeFileIcon);

      if (file.type.startsWith("image/")) {
        var reader = new FileReader();
        reader.onload = function (event) {
          var img = document.createElement("img");
          img.src = event.target.result;
          img.classList.add("preview-image"); // Add a class to style the image
          previewElement.appendChild(img);
        };
        reader.readAsDataURL(file);
      } else {
        var fileIcon = document.createElement("img");
        fileIcon.src = "./assets/doc.svg";
        fileIcon.alt = "File Icon";
        fileIcon.classList.add("preview-icon"); // Add a class to style the file icon
        previewElement.appendChild(fileIcon);
      }

      previewContainer.appendChild(previewElement); // Append the new preview element to the wrapper
    }
  }
});

document.getElementById("file-upload").addEventListener("click", function () {
  var previewContainer = document.getElementById("preContainer");
  if (previewContainer.children.length >= 3) {
    this.disabled = true;
  }

});





// closing the dropdown when clicking outside the dropdown
document.addEventListener("click", function (event) {
  if (
    !inputField.contains(event.target) &&
    !typeResults.contains(event.target)
  ) {
    typeResults.style.display = "none";
    dropdownToggle.src = "./assets/down.svg";
  }
});

//File upload functionality
