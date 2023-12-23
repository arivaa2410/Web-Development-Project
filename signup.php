<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Sign Up </title>
        <!-- CSS Style -->
        <link rel="stylesheet" href="./assets/css/style1.css"/>
    </head>
    
        <body>
        
                <div class="topleft4"><b> Railway Transportation News Announcement System </b></div>
                
                <div class="topleft5"> Embark On a Journey, Let the Rail Unfolds </div>
                
                <br><br><br><br><br><br><br><br><br><br>
          <header>
          <center>
             <h1><b> WELCOME TO RAILWAY TRANSPORTATION NEWS ANNOUNCEMENT SYSTEM </b></h1>
            </center>
          </header>
        <center>
          <section class="registration-section">
            <img src="impact.png" height ="250px" width="250px">
            <h2><b>REGISTER YOUR ACCOUNT HERE</b></h2>
            <p>If you already have an account with us, Please <a href="login.php">Log In</a>.</p>
        
            <form id="registration-form" method="post" action="registration.php">
            <div class="form-row">
                <label for="first-name" class="required"><b>First Name:</b></label>
                <input type="text" id="first-name" name="first-name" required>
              </div>

            <div class="form-row">
                <label for="last-name" class="required"><b>Last Name:</b></label>
                <input type="text" id="last-name" name="last-name" required>
            </div>
            
            <div class="form-row">
                <label for="user-name" class="required"><b>User Name:</b></label>
                <input type="text" id="user-name" name="user-name" required>
              </div>
              
            <div class="form-row">
                <label for="pass-id" class="required"><b>Password:</b></label>
                <input type="password" id="pass-id" name="pass-id"  required>
              </div>

            <div class="form-row">
                <label for="confirm-pass-id" class="required"><b>Confirm Password:</b></label>
                <input type="password" id="confirm-pass-id" name="confirm-pass-id"  required>
            </div>

            <div class="form-row">
              <label for="Email" class="required"><b>Email:</b></label>
              <input type="email" id="email" name="email" required>
            </div>
        
            <div class="form-row">
                <label for="country" class="required"><b>Country:</b></label>
                <select id="country" name="country" required>
                  <option value="">Select a country</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Australia">Australia</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Brazil">Brazil</option>
                  <option value="Brunei">Brunei</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="China">China</option>
                  <option value="France">France</option>
                  <option value="Germany">Germany</option>
                  <option value="India">India</option>
                  <option value="Iran">Iran</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Japan">Japan</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mangolia">Mangolia</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherland">Netherland</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Russia">Russia</option>
                  <option value="Singapore">Singapore</option>
                  <option value="SriLanka">SriLanka</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Vietnam">Vietnam</option>
                </select>
              </div>
              
              

              <div class="g-recaptcha" data-sitekey="6LfqMjcpAAAAAJRrpUFoL_1xVJoBEvJY44RuP756"></div>
              <input type="submit" class="button" value="Register"><br><br>
            </form>
          </section>
          </center>

          <script src="https://www.google.com/recaptcha/api.js" async defer></script>
         

          <script src="script.js"></script>
          <script>
           document.getElementById("registration-form").addEventListener("submit", function(event) {
            var password = document.getElementById("pass-id").value;
            if (password.length < 8) {
                alert("Password is too short. It must be at least 8 characters long.");
                event.preventDefault();
               }
           });
          </script>

        </body>
    
</html>