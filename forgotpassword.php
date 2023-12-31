<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
     <!-- CSS Style -->
     <link rel="stylesheet" href="./assets/css/style1.css"/>
</head>
<body>
            <div class="topleft4"><b> Railway Transportation News Announcement System </b></div>
            
            <div class="topleft5"> Embark On a Journey, Let the Rail Unfolds </div>
            
            <br><br><br><br><br><br><br><br><br><br>
    <header> 
      <center>
          <h1><b>Forgot Password</b></h1><br>
          </center>
       </header><br><br>

    <center>   
     <p>Enter your email address to receive a password reset link.</p>
        <form id="forgot-password-form" action="send_reset_link.php" method="POST">
           <label for="email">Email:</label>
           <input type="email" id="email" name="email" required>
           <button type="submit">Request Reset Link</button>
        </form>
    </center>

    <script>
        document.getElementById('forgot-password-form').addEventListener('submit', function(event) {
            event.preventDefault();

            var email = document.getElementById('email').value;
            // You can add additional validation for the email here

            // Send the form data using AJAX to send_reset_link.php
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert('Password reset link sent to your email!');
                        // Redirect to another page or display a success message
                    } else {
                        alert('Error: Failed to send reset link.');
                    }
                }
            };

            xhr.open('POST', 'send_reset_link.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('email=' + encodeURIComponent(email));
        });
    </script>
</body>
</html>