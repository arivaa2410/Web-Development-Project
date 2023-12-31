async function submitRegistrationForm(event) {
  event.preventDefault();

  if (isFormIncomplete()) {
    alert('Please fill up all the required fields.');
    return;
  }

  const form = document.getElementById('registration-form');
  const formData = new FormData(form);

  // Add reCAPTCHA response token to the form data
  const recaptchaResponse = grecaptcha.getResponse();
  if (recaptchaResponse.length === 0) {
    alert("Please complete the reCAPTCHA.");
    return;
  }
  formData.append('g-recaptcha-response', recaptchaResponse);

  try {
    const response = await fetch('register.php', {
      method: 'POST',
      body: formData
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const result = await response.json();

    if (result.success) {
      window.location.href = 'login.php';
    } else {
      alert('Registration unsuccessful. Please try again later.');
    }
  } catch (error) {
    console.error('Error during form submission:', error);
  }
}

function isFormIncomplete() {
  var inputs = document.querySelectorAll('#registration-form input[required], #registration-form select[required]');
  var incomplete = false;

  inputs.forEach(function(input) {
    if (!input.value) {
      incomplete = true;
    }
  });

  return incomplete;
}

// Add the event listener to the form
document.getElementById('registration-form').addEventListener('submit', submitRegistrationForm);


//login script
document.getElementById("login").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent the default form submission

  var username = document.getElementById("Uname").value.trim();
  var password = document.getElementById("Pass").value.trim();

  // Basic Form Validation
  if (username === "" || password === "") {
      alert("Please enter both username and password.");
      return; // Stop the function if validation fails
  }

  // AJAX request to send form data to the PHP script
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              // Handle successful response from the PHP script
              // Display the response from PHP (e.g., login success/error message)
              var response = xhr.responseText.trim();
              if (response === "Success"){
                window.location.href = 'homepage.php';
              }else {
                document.getElementById("login-error").innerHTML = response; 
              }
              
          } else {
              // Handle any errors
              console.log('There was a problem with the request.');
          }
      }
  };

  // Set up and send the request to the login.php file
  xhr.open("POST", "loginprocess.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("Uname=" + encodeURIComponent(username) + "&Pass=" + encodeURIComponent(password));
});
