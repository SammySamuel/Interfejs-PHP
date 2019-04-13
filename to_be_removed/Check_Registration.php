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
<?php
$name=$_POST['name'];
$surname=$_POST['surname'];
$bdate=$_POST['bdate'];
$login_registration=$_POST['login_registration'];
$password_registration=$_POST['password_registration'];
$dane_sa=$_POST['dane_sa'];
if(!empty($name) && !empty($surname) && !empty($bdate) && !empty($login_registration) && !empty($password_registration) )
{
    echo '<div class="package-box">
            <div class="textbox">
            <p>Zarejestrowano</p>
            </div>
            <form action="index.php" method="get">
            <input type="submit"  class="btn" value="Powrót"/>
            </form>
           </div>';

}
if((empty($name) || empty($surname) || empty($bdate) || empty($login_registration) || empty($password_registration))&& $dane_sa=="1")
{
    echo'  <div class="package-box">
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