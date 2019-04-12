<?php
session_start();
?>

<html>
<head>
    <meta http-equiv="text/html" content="text/html"; charset="utf-8" >
    <title>Kurierowo</title>
    <link href="style.css" rel="stylesheet"
</head>
<body>
<div class="naglowek">
    <h1>Usługi kurierskie </h1>
</div>
<?php
$_SESSION['log']=1;
$_SESSION['password']=1;
if(!empty($_SESSION['log']) && !empty($_SESSION['password']))
{
    echo'<div class="package-box">
        <h2>Nadaj przesyłkę</h2>
        <form action="package.php" method="post">
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Adres startowy" name="adress_start">
        </div>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Adres docelowy" name="adress_stop">
        </div>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Waga przesyłki w kg" name="waga">
        </div>
        <p>Wybierz firme kurierską</p>
           <select id="soflow-color" name="firma">
            <option>Poczta Polska</option>
            <option>DPD</option>
            <option>DHL</option>
            <option>InPost</option>
            <option>UPS</option>
           </select>
           <p>Wybierz metodę płatności</p>
           <select id="soflow-color" name="metoda">
            <option>Przelew</option>
            <option>Za pobraniem</option>
           </select>
             <input type="submit" class="btn" value="Nadaj przesyłkę">
        </form>
    </div>';
}
else {
    echo'
    <div class="login-box">
        <form action="login.php" method="post">
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password">
        </div>

        <input type="submit" class="btn" value="Zaloguj">
        </form>
        <form action="registration.php" method="post">
            <input type="submit" class="btn" value="Zarejetruj">
        </form>
    </div>';
}
?>
<footer class="stopka">
    <p>® Projket na zaliczenie z przedmiotu "Komunikacja człowiek- komputer" Samuel Stefański </p>
    <p>Data: <?php echo date("d-m-Y");?></p>
</footer>
</body>
</html>
