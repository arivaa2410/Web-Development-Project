<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Forgot Password </title>
        <!-- CSS Style -->
        <link rel="stylesheet" href="./assets/css/styles.css"/>
    </head>
    <body>
    
            <div class="topleft4"><b> Railway Transportation News Announcement System </b></div>
            
            <div class="topleft5"> Embark On a Journey, Let the Rail Unfolds </div>
            
            <br><br><br><br><br><br><br><br><br><br>

    <header>
        <center>
            <h1><b>FORGOT PASSWORD</b></h1>
        </center>
    </header><br><br>
        

    
    <div class="container">
    <h2>Change Your Password Here</h2>
    <form id="forgotPasswordForm">
        <div class="input-group">
            <label for="email"><b>Email:</b></label>
            <input type="email" id="email" name="email" required>
        </div><br>
        <div class="input-group">
            <label for="new-password"><b>New Password:</b></label>
            <input type="password" id="new-password" name="new-password" required>
        </div><br>
        <button type="submit">Reset Password</button>
    </form>
    <p id="message"></p>
</div>
    
              
    <script src="script.js"></script>

    </body>
    </html>