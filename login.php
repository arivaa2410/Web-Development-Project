<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Login </title>
        <!-- CSS Style -->
        <link rel="stylesheet" href="./assets/css/style1.css"/>
    </head>
    <body>
    
            <div class="topleft4"><b> Railway Transportation News Announcement System </b></div>
            
            <div class="topleft5"> Embark On a Journey, Let the Rail Unfolds </div>
            
            <br><br><br><br><br><br><br><br><br><br>

    <header> 
      <center>
        <h1><b> WELCOME TO RAILWAY TRANSPORTATION NEWS ANNOUNCEMENT SYSTEM </b></h1><br>
       </center>
       </header><br><br>

        <center>
          <h2><b>LOGIN PAGE</b></h2>
        </center>
      <br><br>

        <center>
        <div class="login">
            <img src="assets/img/profile.png" height ="150px" width="150px"><br><br><br>

            <form id="login" method="post" action="loginprocess.php">
                <label><b>Username</b>
                </label>
                <input type="text" name="Uname" id="Uname" placeholder="username">
                <br><br>
                <label><b>Password</b>
                </label>
                <input type="Password" name="Pass" id="Pass" placeholder="password">
                <br><br>
                <input type="submit" class="button" name="log" id="log" value="LOGIN">
                <br><br>
                <input type="checkbox" id="check">
                <span>Remember me</span>
                <br><br>
                <a href="OTPfunc.php">Forgot Password</a>
            </form>

             <!-- Error Message Display -->
             <div id="login-error" style="color:red;"></div>
        </div></center><br><br><br><br><br><br><br>
        </body>
</html>
