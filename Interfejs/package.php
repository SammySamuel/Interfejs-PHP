<?php
session_start();
?>

<html>
<head>
    <meta http-equiv="text/html" content="text/html"; charset="utf-8" >
    <title>Kurierowo Podsumowanie</title>
    <link href="style.css" rel="stylesheet"
</head>
<div class="naglowek">
    <h1>Usługi kurierskie </h1>
</div>
<body>
<?php
$adress_start=$_POST['adress_start'];
$adress_stop=$_POST['adress_stop'];
$waga=$_POST['waga'];
$firma=$_POST['firma'];
$metoda=$_POST['metoda'];
$cena=0;
switch ($firma)
{
    case "1":
        $firma="Poczta Polska";
        $cena=$waga;
        $szacowany_czas="6 dni";
        break;
    case "2":
        $firma="DPD";
        $cena=$waga;
        $szacowany_czas="4 dni";
        break;
    case "3":
        $firma="DHL";
        $cena=$waga;
        $szacowany_czas="3 dni";
        break;
    case "4":
        $firma="InPost";
        $cena=$waga;
        $szacowany_czas="2 dni";
        break;
    case "5":
        $firma="UPS";
        $cena=$waga;
        $szacowany_czas="4 dni";
        break;
}

switch ($metoda)
{
    case "1":
        $metoda="Przelew";
        break;
    case "2":
        $metoda="Za pobraniem";
        break;
}
if(!empty($adress_start) && !empty($adress_stop) && !empty($waga) && !empty($firma) && !empty($metoda))
{
    echo'  <div class="package-box">
        <form action="" method="post">
        <div class="textbox">
        <h3>Podsumowanie </h3>
        <h4>Dokładnie sprawdż wprowadzone dane!!</h4>
        <br>
        <p>Adres początkowy: '.$adress_start.'</p>
        <p>Adres docelowy: '.$adress_stop.'</p>
        <p>Waga w kilogramach: '.$waga.'</p>
        <p>Wybrana firma: '.$firma.'</p>
        <p>Forma płatności: '.$metoda.'</p>
        <p>Koszt przesyłki: '.$cena.'</p>
        <p>Szacowany czas dostawy: '.$szacowany_czas.'</p>
        </div>
        <input type="submit" class="btn" value="Potwierdź">
        </form>
        <form action="index.php" method="get">
        <input type="submit"  class="btn" value="Powrót"/>
        </form>
    </div>';
}else
    echo'  <div class="package-box">
            <div class="textbox">
            <p>Nie wszystkie dane zostały wprowadzone!!!!</p>
            </div>
            <form action="index.php" method="get">
            <input type="submit"  class="btn" value="Wprowadz ponownie"/>
            </form>
            
           </div>
    ';
?>
</body>
</html>