<?php
setcookie("isReturning", "true", time() + 86400);
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Shop</title>
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
            padding: 3px;
            font-size: 18px;
            padding-left: 10px;
            padding-right: 10px;
            font-weight: lighter;
        }

        .submit {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <?php

    $username = "matteo";
    $password = "password";

    $arrayCapi = array("scarpe", "pantaloni", "maglie", "camicie");
    $arrayStile = array("casual", "sportivo", "elegante");

    session_start();

    if (isset($_SESSION["username"])) {
        if (isset($_COOKIE["isReturning"])) {
            echo "<h1>Bentornato " . $_SESSION["username"] . "</h1>";
            if (isset($_COOKIE["capiAbbigliamento"]) && isset($_COOKIE["stile"])) {
                $capiSelezione = json_decode($_COOKIE["capiAbbigliamento"], true);
                $stile = $_COOKIE["stile"];
                echo "<p> ultima selezione ";
                foreach ($capiSelezione as $value) {
                    echo $value . " " . $stile . " ";
                }
            }
        } else {
            echo "<h1>Benvenuto " . $_SESSION["username"] . "<h1>";
        }
    ?>
        <form action="selection.php" method="post">
            <table>
                <tr>
                    <th>Shop</th>
                </tr>
                <tr>
                    <td>capi di abbigliamento</td>
                </tr>
                <?php
                foreach ($arrayCapi as $value) {
                    echo "<tr>";
                    echo "<td><input type=\"checkbox\" name=\"capiAbbigliamento[]\" value=\"$value\"> $value</td";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td>stile</td>
                </tr>
                <?php
                foreach ($arrayStile as $value) {
                    echo "<tr>";
                    echo "<td><input type=\"radio\" name=\"stile\" value=\"$value\"> $value</td";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td><input class="submit" type="submit" name="confirm" value="confirm"></td>
                </tr>
            </table>
        </form>
    <?php
        echo "<a href=\"logout.php\"><input type=button value=\"logout\" name=\"logout\"></a>";
    } else {
        if ($_POST["username"] == $username && $_POST["password"] == $password) {
            $_SESSION["username"] = $username;
            echo "<script>location.href=\"home.php\"</script>";
        } else {
            echo "<script>alert(\"Username or passowrd is incorrect!\")</script>";
            echo "<script>location.href=\"index.php\"</script>";
        }
    }
    ?>
</body>

</html>