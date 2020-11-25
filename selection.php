<?php
if (isset($_POST["capiAbbigliamento"])) {
    setcookie("capiAbbigliamento", json_encode($_POST["capiAbbigliamento"]), time() + 86400);
}
if (isset($_POST["stile"])) {
    setcookie("stile", $_POST["stile"], time() + 86400);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Selezione</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
        }

        th {
            font-size: 20px;
            padding: 5px;
        }

        td {
            font-size: 18px;
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>
</head>

<body>
    <h1>capi selezionati</h1>
    <?php
    session_start();

    $arrayImmagini = [];
    $arrayPrezzi = array(
        "camiciecasual" => 25,
        "camicieelegante" => 80,
        "camiciesportivo" => 30,
        "magliecasual" => 30,
        "maglieelegante" => 85,
        "magliesportivo" => 26,
        "pantalonicasual" => 50,
        "pantalonielegante" => 80,
        "pantalonisportivo" => 25,
        "scarpecasual" => 130,
        "scarpeelegante" => 175,
        "scarpesportivo" => 100,
    );

    if (isset($_SESSION["username"])) {
        if (isset($_POST["stile"])) {
            $stile = $_POST["stile"];
            foreach ($_POST["capiAbbigliamento"] as $value) {
                array_push($arrayImmagini, $value . $stile);
            }
            echo "<table border=\"1px solid\">";
            echo "<tr>";
            echo "<td>prezzo</td>";
            echo "<td>immagine</td>";
            echo "<tr>";
            foreach ($arrayImmagini as $value) {
                echo "<tr>";
                echo "<td>prezzo: $arrayPrezzi[$value]$</td>";
                echo "<td><img src=\"img/$value.jpg\" alt=\"$value\"></td>";
                echo "</tr>";
            }
            echo "</table><br>";
        } else {
            echo "<script>alert(\"nessun capo selezionato, verrai reindirizzato allo shop\")</script>";
            echo "<script>location.href=\"home.php\"</script>";
        }
    } else {
        if ($_POST["username"] == $username && $_POST["password"] == $password) {
            $_SESSION["username"] = $username;
            echo "<script>location.href=\"home.php\"</script>";
        } else {
            echo "<script>alert(\"l'username o la passowrd sono sbagliati!\")</script>";
            echo "<script>location.href=\"index.php\"</script>";
        }
    }

    ?>
    <a href="logout.php"><input type=button value="logout" name="logout"></a>
</body>

</html>