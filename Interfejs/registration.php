<?php
session_start();
?>
<html>
<head>
    <meta http-equiv="text/html" content="text/html"; charset="utf-8" >
    <title>Kurierowo rejetracja</title>
    <link href="style.css" rel="stylesheet"
</head>
<body>
<div class="naglowek">
    <h1>Usługi kurierskie </h1>
</div>
<div class="login-box">
    <form action="Check_Registration.php" method="post">
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="text" placeholder="Imie" name="name">
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="text" placeholder="Nazwisko" name="surname">
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="date" placeholder="Data urodzenia" name="bdate">
        </div>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Login" name="login_registration">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Hasło" name="password_registration">
        </div>
        <input type="hidden" name="dane_sa" value="1">
        <input type="submit" class="btn" value="Zarejestruj">
    </form>
    <?php
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $bdate=$_POST['bdate'];
    $login_registration=$_POST['login_registration'];
    $password_registration=$_POST['password_registration'];
    $dane_sa=$_POST['dane_sa'];
    if(!empty($name) && !empty($surname) && !empty($bdate) && !empty($login_registration) && !empty($password_registration))
    {
        echo '<script language="JavaScript">window.alert("Zarejetrowano");</script>';
        header("Location:./");
    }
    if((empty($name) || empty($surname) || empty($bdate) || empty($login_registration) || empty($password_registration))&& $dane_sa=="1")
    {
        echo'  <div class="login-box-box">
            <div class="textbox">
            <p>Nie wszystkie dane zostały wprowadzone!!!!</p>
            </div>
            <form action="registration.php" method="get">
            <input type="submit"  class="btn" value="Wprowadz ponownie"/>
            </form>
            
           </div>
    ';
    }
    ?>
<footer class="stopka">
    <p>® Projket na zaliczenie z przedmiotu "Komunikacja człowiek- komputer" Samuel Stefański </p>
    <p>Data: <?php echo date("d-m-Y");?></p>
</footer>
</body>
</html>
