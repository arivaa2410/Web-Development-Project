
//signup script
function onSubmit(token) {
  // You can perform additional validation or submission handling here
  document.getElementById("registration-form").submit();
}
window.onload = function() {
              
  document.getElementById('registration-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    if (isFormIncomplete()) {
      alert('Please fill up all the required fields.'); 
    } else {
      
      var registrationSuccessful = true; 

      if (registrationSuccessful) {
        alert('Registration successful!'); 
      } else {
        alert('Registration unsuccessful. Please try again later.');
      }
    }
  });
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


//recaptcha script
function onSubmit(token) {
  document.getElementById("registration-form").submit();
}

//forgot password script
document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
    event.preventDefault();
  
    var email = document.getElementById('email').value;
  
    // Simulate reset password functionality (replace this with actual functionality)
    // Here you can add code to send a reset link to the provided email address
    // For demonstration, just showing a message
    document.getElementById('message').innerHTML = `A reset link has been sent to ${email}. Please check your email.`;
    document.getElementById('forgotPasswordForm').reset();
  });


//login script
    document.getElementById("log").addEventListener("click", function () {
        // Handle form submission via JavaScript
        var username = document.getElementById("Uname").value;
        var password = document.getElementById("Pass").value;

        // Perform your form validation here if needed

        // AJAX request to send form data to the PHP script
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle successful response from the PHP script
                    // Display the response from PHP (e.g., login success/error message)
                    document.body.innerHTML = xhr.responseText;
                } else {
                    // Handle any errors
                    console.log('There was a problem with the request.');
                }
            }
        };

        // Open and send the request to the login.php file
        xhr.open("GET", "login.php?Uname=" + username + "&Pass=" + password, true);
        xhr.send();
    });