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
            case "panaderia":
                panaderia();
                break;
            case "telefonos":
                telefonos();
                break;
            case "mayor":
                mayor();
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
    $_SESSION["respuestas"] = $res . "€";
}


function ahorros(){
    $years = [5, 10, 15, 20, 25];
    $ahorrosIntAnual = "";
    $ahorrosInversion = "";
    $textoFinal = "";

    if (isset($_POST["ahorrosIntAnual"])) {
        $ahorrosIntAnual = $_POST["ahorrosIntAnual"];
        $ahorrosIntAnual /= 100;
    }

    if (isset($_POST["ahorrosInversion"])) {
        $ahorrosInversion = $_POST["ahorrosInversion"];
    }

    for ($i=0; $i < count($years); $i++) { 
        $beneficio = $ahorrosInversion * $ahorrosIntAnual * $years[$i];
        $total = ($ahorrosInversion * $years[$i]) + $beneficio; 
        $strAux = "* TOTAL: $total € en " . $years[$i] . " años | Beneficios: $beneficio €<br>";
        $textoFinal = $textoFinal . $strAux;
    }

    $_SESSION["respuestas"] = $textoFinal;
}


function panaderia(){
    if (isset($_POST["panes"])) {
        $NumPanes = $_POST["panes"];
    }

    $precioPan = 3.49;
    $descuento = 0.60;
    $precioFinal = round(($NumPanes * $precioPan) / $descuento, 2);
    $strAux = "P.U: $precioPan € | Descuento por no ser del día: ". ($descuento*100) ."% | Precio FINAL: $precioFinal €";

    $_SESSION["respuestas"] = $strAux;
}


function telefonos(){
    if (isset($_POST["telefono"])) {
        $telefono = $_POST["telefono"];
    }

    $aux = strpos($telefono, "-");
    $telefono = substr($telefono, $aux+1);
    echo $telefono;
    $_SESSION["respuestas"] = "Número de Teléfono sin prefijo: " . $telefono;
}


function mayor(){
    $mayor = "Si";

    if (isset($_POST["edad"])) {
        $edad = $_POST["edad"];
    }

    if ($edad<18) {
        $mayor = "No";
    }

    if ($edad<1 || $edad>105) {
        $mayor = "Edad inválida";
    }

    $_SESSION["respuestas"] = "¿Eres mayor? $mayor";
}


function contrasena() {
    $expresion = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/";

    // (?=.*[a-z]): Asegura que haya al menos una letra minúscula.
    // (?=.*[A-Z]): Asegura que haya al menos una letra mayúscula.
    // (?=.*\d): Asegura que haya al menos un dígito.
    // (?=.*[$@$!%*?&]): Asegura que haya al menos un carácter especial del conjunto $, @, !, %, *, ?, o &.
    // ([A-Za-z\d$@$!%*?&]|[^ ]): Permite cualquier letra (mayúscula o minúscula), cualquier dígito, 
    //     o uno de los caracteres especiales mencionados. También permite cualquier carácter que 
    //     no sea un espacio.
    // {8,15}: Indica que la longitud total de la cadena debe estar entre 8 y 15 caracteres.
    // ^ y $: Aseguran que toda la cadena debe coincidir con el patrón, no solo una parte de ella.

    if (condition) {
        # code...
    }
}



