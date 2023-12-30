

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






window.onload = function() {
// Your existing JavaScript code
// ...
}

function isFormIncomplete() {
// Your existing function
// ...
}




















document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
    event.preventDefault();
  
    var email = document.getElementById('email').value;
  
    // Simulate reset password functionality (replace this with actual functionality)
    // Here you can add code to send a reset link to the provided email address
    // For demonstration, just showing a message
    document.getElementById('message').innerHTML = `A reset link has been sent to ${email}. Please check your email.`;
    document.getElementById('forgotPasswordForm').reset();
  });