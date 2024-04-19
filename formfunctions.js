var inputField = document.getElementById("D_typeInput");
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
alert("hogai link bhai") // Change the arrow to up when opening
} else {
typeResults.style.display = "none";
dropdownToggle.src = "./assets/down.svg"; // Change the arrow to down when closing
}
event.stopPropagation(); // Stop the click event from propagating to the document
});



inputField.addEventListener("keydown",function(e){
  e.preventDefault();
  
  })

// Attach focus event listener to input field to handle opening and closing the dropdown
inputField.addEventListener("focus", function(event) {
  if (typeResults.style.display === "none" || typeResults.style.display === "") {
      typeResults.style.display = "inline-block";
      dropdownToggle.src = "./assets/up.svg";
  } else {
      typeResults.style.display = "none";
      dropdownToggle.src = "./assets/down.svg"; // Change the arrow to down when closing
  }
  event.stopPropagation();
  console.log("dsadsad")
});





searchOptions.forEach(function(option){
  option.addEventListener("click", function(){
    inputField.value = this.textContent;
    typeResults.style.display = "none";
    dropdownToggle.src = "./assets/down.svg"
  });

});


// for touch devices input characters
inputField.addEventListener("touchstart", function(event) {
  event.preventDefault(); // Prevent the default touch behavior (e.g., showing the keyboard)
  if (typeResults.style.display === "none" || typeResults.style.display === "") {
      typeResults.style.display = "inline-block";
      dropdownToggle.src = "./assets/up.svg";
  } else {
      typeResults.style.display = "none";
      dropdownToggle.src = "./assets/down.svg"; // Change the arrow to down when closing
  }
});

searchOptions.forEach(function(option) {
  option.addEventListener("touchend", function(event) {
      event.preventDefault(); // Prevent the default touch behavior
      inputField.value = this.textContent;
      typeResults.style.display = "none";
      dropdownToggle.src = "./assets/down.svg";
  });
});


//   file functionality

document.getElementById("file-upload").addEventListener("change", function(e) {
    var files = e.target.files;
    console.log(files)
    var previewContainer = document.getElementById('preContainer');



    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if (file) {
            var previewElement = document.createElement('div'); // Create a new wrapper element for each preview
            previewElement.classList.add('preview-file'); // Add a class to style the preview

            if (file.type.startsWith('image/')) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var img = document.createElement('img');
                    img.src = event.target.result;
                    img.classList.add('preview-image'); // Add a class to style the image
                    previewElement.appendChild(img);
                };
                reader.readAsDataURL(file);
            } else {
                var fileIcon = document.createElement('img');
                fileIcon.src = './assets/doc.svg';
                fileIcon.alt = "File Icon";
                fileIcon.classList.add('preview-icon'); // Add a class to style the file icon
                previewElement.appendChild(fileIcon);
            }

            previewContainer.appendChild(previewElement); // Append the new preview element to the wrapper
        }
    }
});



// closing the dropdown when clicking outside the dropdown
document.addEventListener("click", function(event){

if(!inputField.contains(event.target) && !typeResults.contains(event.target)) {
  typeResults.style.display = "none";
  dropdownToggle.src = "./assets/down.svg"
  }

});

//File upload functionality




