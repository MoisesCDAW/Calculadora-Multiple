<!-- 
PHP version: 8.2.12
XAMPP version: 3.3.0
HTML 5 -->
<?php 
session_start();

function inicio(){
    if (isset($_POST["operacion"])) {
        $operacion = $_POST["operacion"];
    
        unset($_SESSION["respuestas"]);
    
        switch ($operacion) {
            case "capital":
                inversion();
                break;
            case "ahorros":
                ahorros();
                break;
        }

        header("location: index.php");
        die();
    }
}

inicio();


function inversion(){
    if (isset($_POST["inversion"])) {
        $inversion = $_POST["inversion"];
    }

    if (isset($_POST["inverIntAnual"])) {
        $inverIntAnual = $_POST["inverIntAnual"];
        $inverIntAnual /= 100;
    }

    if (isset($_POST["year"])) {
        $year = $_POST["year"];
    }

    $res = $inversion * $inverIntAnual * $year;
    $_SESSION["respuestas"] = $res;
}


function ahorros(){
    if (isset($_POST["ahorrosIntAnual"])) {
        $ahorrosIntAnual = $_POST["ahorrosIntAnual"];
        $ahorrosIntAnual /= 100;
    }

    if (isset($_POST["ahorrosInversion"])) {
        $ahorrosInversion = $_POST["ahorrosInversion"];
    }

    $res = $inversion * $inverIntAnual * $year;
    $_SESSION["respuestas"] = $res;
}
