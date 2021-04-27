<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Teacher's login Portal</title>
<link rel='stylesheet' a href="style.css"/>
</head>
<body>      
<div class="login-box">
    <div class="header">
    <h2>Login</h2>
    </div>
    <?php
if (isset($_GET['per'])){
    $per=$_GET['per'];
    echo "<form action='$per.php' method='get'>
    <div class='textbox'>
    <!--<label for='username'>Username :</label>-->
    <i class='fas fa-user'></i>
    <input type='text' placeholder='Username' name='username'>
    </div>
    
    <div class='textbox'>
    <!--<label for='email'>Email :</label>-->
    <input type='email' placeholder='Email' name='email'>
    </div>

    <div class='textbox'>
    <!--<label for='password'>Password :</label>-->
    <input type='password' placeholder='Password' name='password'>
    </div>
    <input type='hidden' name='per' value='$per'>
    <input type='submit' name='login' class='btn' value='Sign in'>

    </form>
    </div>";
}
else{
    echo "<form action='portal.php' method='get'>
    <div class='textbox'>
    <!--<label for='username'>Username :</label>-->
    <i class='fas fa-user'></i>
    <input type='text' placeholder='Username' name='username'>
    </div>
    
    <div class='textbox'>
    <!--<label for='email'>Email :</label>-->
    <input type='email' placeholder='Email' name='email'>
    </div>

    <div class='textbox'>
    <!--<label for='password'>Password :</label>-->
    <input type='password' placeholder='Password' name='password'>
    </div>

    <input type='submit' name='login' class='btn' value='Sign in'>
    </form>
    </div>";
}
?>
    

</body>
</html>