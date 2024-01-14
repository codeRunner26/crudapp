document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector(".form_content");

  form.addEventListener("submit", function (event) {
    // Validate each input field
    if (!validateName("fname")) {
      event.preventDefault();
    }
    if (!validateName("lname")) {
      event.preventDefault();
    }
    if (!validatePassword("password")) {
      event.preventDefault();
    }
    if (!validateConfirmPassword("conpassword")) {
      event.preventDefault();
    }
    if (!validateSelect("gender")) {
      event.preventDefault();
    }
    if (!validateEmail("email")) {
      event.preventDefault();
    }
    if (!validatePhone("phone")) {
      event.preventDefault();
    }
    if (!validateAddress("address")) {
      event.preventDefault();
    }
  });

  function validateName(fieldName) {
    var element = document.getElementById(fieldName);
    var errorElement = document.getElementById(fieldName + "_error");

    if (element.value.trim() === "") {
      errorElement.textContent = "Please enter " + fieldName + ".";
      element.classList.add("input_error");
      return false;
    } else {
      errorElement.textContent = "";
      element.classList.remove("input_error");
      return true;
    }
  }

  function validatePassword(fieldName) {
    // Add your password validation logic here
    // You can use regex or other methods
    // For simplicity, just checking if it's not empty
    return validateName(fieldName);
  }

  function validateConfirmPassword(fieldName) {
    var passwordElement = document.getElementById("password");
    var confirmPasswordElement = document.getElementById(fieldName);
    var errorElement = document.getElementById(fieldName + "_error");

    if (confirmPasswordElement.value.trim() === "") {
      errorElement.textContent = "Please confirm your password.";
      confirmPasswordElement.classList.add("input_error");
      return false;
    } else if (confirmPasswordElement.value !== passwordElement.value) {
      errorElement.textContent = "Passwords do not match.";
      confirmPasswordElement.classList.add("input_error");
      return false;
    } else {
      errorElement.textContent = "";
      confirmPasswordElement.classList.remove("input_error");
      return true;
    }
  }

  function validateSelect(fieldName) {
    var element = document.getElementById(fieldName);
    var errorElement = document.getElementById(fieldName + "_error");

    if (element.value === "select") {
      errorElement.textContent = "Please select a gender.";
      element.classList.add("input_error");
      return false;
    } else {
      errorElement.textContent = "";
      element.classList.remove("input_error");
      return true;
    }
  }

  function validateEmail(fieldName) {
    var element = document.getElementById(fieldName);
    var errorElement = document.getElementById(fieldName + "_error");

    // Add your email validation logic here
    // You can use regex or other methods
    // For simplicity, just checking if it's not empty
    if (element.value.trim() === "") {
      errorElement.textContent = "Please enter your email.";
      element.classList.add("input_error");
      return false;
    } else {
      errorElement.textContent = "";
      element.classList.remove("input_error");
      return true;
    }
  }

  function validatePhone(fieldName) {
    var element = document.getElementById(fieldName);
    var errorElement = document.getElementById(fieldName + "_error");

    if (element.value.trim() === "" || !iti.isValidNumber()) {
      errorElement.textContent = "Please enter a valid phone number.";
      element.classList.add("input_error");
      return false;
    } else {
      errorElement.textContent = "";
      element.classList.remove("input_error");
      return true;
    }
  }

  function validateAddress(fieldName) {
    var element = document.getElementById(fieldName);
    var errorElement = document.getElementById(fieldName + "_error");

    if (element.value.trim() === "") {
      errorElement.textContent = "Please enter your address.";
      element.classList.add("input_error");
      return false;
    } else {
      errorElement.textContent = "";
      element.classList.remove("input_error");
      return true;
    }
  }
});

document.addEventListener("DOMContentLoaded", function () {
  var input = document.querySelector("#phone");
  var iti = window.intlTelInput(input, {
    utilsScript: "build/js/utils.js",
  });
});
