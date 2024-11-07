const menu = document.querySelector("#mobile-menu");
const menuLinks = document.querySelector(".navbar_menu");

menu.addEventListener("click", function () {
  menu.classList.toggle("is-active");
  menuLinks.classList.toggle("active");
});

document.addEventListener("DOMContentLoaded", function () {
  // Select all buttons with the class 'main_btn'
  var buttons = document.querySelectorAll(".main_btn");

  buttons.forEach(function (button) {
    button.addEventListener("click", function () {
      // Get the URL from the data-href attribute
      var url = button.getAttribute("data-href");

      // Redirect to the URL
      window.location.href = url;
    });
  });
});

// Function to open the overlay
function openOverlay(img) {
  const overlay = document.getElementById("imageOverlay");
  const overlayImg = document.getElementById("overlayImage");
  const overlayCaption = document.getElementById("overlayCaption");

  overlay.style.display = "block";
  overlayImg.src = img.src; // Set the source of the overlay image
  overlayCaption.textContent = img.nextElementSibling.textContent; // Set the caption
}

// Function to close the overlay
function closeOverlay() {
  const overlay = document.getElementById("imageOverlay");
  overlay.style.display = "none";
}

// Close overlay on clicking outside the image
window.onclick = function (event) {
  const overlay = document.getElementById("imageOverlay");
  if (event.target === overlay) {
    overlay.style.display = "none";
  }
};

// Contact form functionality
if (form) {
  successMessage.className = "success-msg";
  successMessage.style.display = "none"; // Initially hidden
  successMessage.style.color = "green";
  successMessage.textContent = "Your message has been sent successfully!";
  form.appendChild(successMessage);

  form.addEventListener("submit", (e) => {
    e.preventDefault(); // Prevent default form submission
    console.log("Form submitted"); // Debugging

    if (validateForm()) {
      submitFormData();
    } else {
      successMessage.style.display = "none"; // Hide success message if validation fails
      console.log("Form validation failed"); // Debugging
    }
  });

  // Remove error messages on input
  const inputs = form.querySelectorAll("input");
  const textareas = form.querySelectorAll("textarea");
  const allFields = [...inputs, ...textareas];

  allFields.forEach((field) => {
    field.addEventListener("input", () => {
      removeError(field);
    });
  });
} else {
  console.error('Form with id "contactForm" not found');
}

// Validate form
function validateForm() {
  let valid = true;

  const name = form.querySelector(".name");
  const email = form.querySelector(".email");
  const message = form.querySelector(".message");

  // Validate name
  if (name.value.trim() === "") {
    giveError(name, "Please enter your name");
    valid = false;
  } else {
    removeError(name);
  }

  // Validate email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email regex
  if (email.value.trim() === "") {
    giveError(email, "Please enter your email");
    valid = false;
  } else if (!emailRegex.test(email.value.trim())) {
    giveError(email, "Please enter a valid email");
    valid = false;
  } else {
    removeError(email);
  }

  // Validate message
  if (message.value.trim() === "") {
    giveError(message, "Please enter your message");
    valid = false;
  } else {
    removeError(message);
  }

  console.log(`Form valid: ${valid}`); // Debugging
  return valid;
}

// Function to display error message
function giveError(field, message) {
  const parentElement = field.parentElement;
  parentElement.classList.add("error");

  let existingError = parentElement.querySelector(".err-msg");
  if (existingError) {
    existingError.remove();
  }

  const error = document.createElement("span");
  error.textContent = message;
  error.classList.add("err-msg");
  parentElement.appendChild(error);
}

// Function to remove error message
function removeError(field) {
  const parentElement = field.parentElement;
  parentElement.classList.remove("error");

  const error = parentElement.querySelector(".err-msg");
  if (error) {
    error.remove();
  }
}

// AJAX form submission function
function submitFormData() {
  const formData = new FormData(form);
  console.log("Submitting form data:", [...formData]); // Debugging

  fetch("send_mail.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.text();
    })
    .then((data) => {
      console.log("Success:", data);
      successMessage.style.display = "block"; // Show success message if the form is submitted
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// Redirect buttons functionality
document.addEventListener("DOMContentLoaded", function () {
  // Select all buttons with the class 'main_btn'
  const buttons = document.querySelectorAll(".main_btn");

  buttons.forEach(function (button) {
    button.addEventListener("click", function () {
      const url = button.getAttribute("data-href");
      console.log(`Redirecting to: ${url}`); // Debugging
      window.location.href = url;
    });
  });
});
