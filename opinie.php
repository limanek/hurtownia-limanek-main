<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opniee klientów</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <div id="container">
        <div id="header">
            <h1>Hurtownia spożywcza</h1>
        </div>
        <div id="main">
            <h2>Opinie naszych klientów</h2>
            <?php
            $pdo = new PDO("mysql:host=localhost;dbname=hurtownia","root","");
            $query = "SELECT `zdjecie`, `imie`, `opinia` FROM `klienci` JOIN opinie ON klienci.id = klienci_id WHERE Typy_id = 2 OR Typy_id = 3;";

            $stmt = $pdo->prepare($query);
            $stmt->execute();
        
            $osoby = $stmt->fetchall();
            foreach ($osoby as $osoba) {
                echo '<div class="osoba">';
                echo '<img src="zdj/' . $osoba['zdjecie'] . '" alt="klient">';
                echo '<p>' . $osoba['opinia'] . '</p>';
                echo '<h3>' . $osoba['imie'] . '</h3>';
                echo '</div>';
            }
            
            ?>
        </div>
        <div id="footer">
            <div id="footer_1">
                <h3>Współpracują z nami</h3>
                <a href="http://sklep.pl/">Sklep 1</a>
            </div>
            <div id="footer_2">
                <h3>Nasi top klienci</h3>
            </div>
            <div id="footer_3">
                <h3>Skontaktuj się</h3>
                <p>telefon: 111222333</p>
            </div>
            <div id="footer_4">
                <h3>Autor:0000000000</h3>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>
</body>
</html>