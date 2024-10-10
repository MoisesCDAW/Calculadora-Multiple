<!-- 
PHP version: 8.2.12
XAMPP version: 3.3.0
HTML 5 -->
<?php 
session_start();

/**
 * Lee la clave "operacion" del $_POST y evalúa su valor
 */
function inicio(){
    if (isset($_POST["operacion"])) {
        $operacion = $_POST["operacion"];
    
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
            case "contrasena":
                contrasena();
                break;            
        }

        header("location: index.php");
        die();
    }
}

inicio();


/**
 * Calcula el benificio de un capital inicial en N años a base de X interés
 */
function inversion(){
    $inversion="";
    $inverIntAnual="";
    $year = "";


    if (isset($_POST["inversion"])) {
        $inversion = $_POST["inversion"];
        if (intval($inversion)==0) {
            $inversion="";
        }
        
    }

    if (isset($_POST["inverIntAnual"])) {
        $inverIntAnual = $_POST["inverIntAnual"];
        if (intval($inverIntAnual)==0) {
            $inverIntAnual="";
        }else {
            $inverIntAnual /= 100;
        }
    }

    if (isset($_POST["year"])) {
        $year = $_POST["year"];
        if (intval($year)==0) {
            $year="";
        }
    }

    if ($inversion=="" || $inverIntAnual=="" || $year=="") {
        $textoFinal="ERROR. Dato inválido";
    }else {
        $beneficio = $inversion * $inverIntAnual * $year;
        $textoFinal = "TOTAL: " . $beneficio+$inversion . " € | Beneficios: $beneficio €";
    }

    $_SESSION["respuestas"] = $textoFinal;
}


/**
 * Calcula el benificio de un capital inicial a base de X interés en 25 años.
 * Muestra de 5 en 5 años
 */
function ahorros(){
    $years = [5, 10, 15, 20, 25];
    $ahorrosIntAnual = "";
    $ahorrosInversion = "";
    $textoFinal = "";

    if (isset($_POST["ahorrosIntAnual"])) {
        $ahorrosIntAnual = $_POST["ahorrosIntAnual"];
        if (intval($ahorrosIntAnual)==0) {
            $ahorrosIntAnual="";
        }else {
            $ahorrosIntAnual /= 100;
        }
        
    }

    if (isset($_POST["ahorrosInversion"])) {
        $ahorrosInversion = $_POST["ahorrosInversion"];
        if (intval($ahorrosInversion)==0) {
            $ahorrosInversion="";
        }
    }

    if ($ahorrosInversion=="" || $ahorrosIntAnual=="") {
        $textoFinal = "ERROR. Dato inválido";
    }else {
        for ($i=0; $i < count($years); $i++) { 
            $beneficio = $ahorrosInversion * $ahorrosIntAnual * $years[$i];
            $total = ($ahorrosInversion * $years[$i]) + $beneficio; 
            $strAux = "* TOTAL: $total € en " . $years[$i] . " años | Beneficios: $beneficio €<br>";
            $textoFinal = $textoFinal . $strAux;
        }
    }

    $_SESSION["respuestas"] = $textoFinal;
}


/**
 * Calcula el precio de N panes que no son del día aplicando un descuento
 */
function panaderia(){
    if (isset($_POST["panes"])) {
        $NumPanes = $_POST["panes"];
        $NumPanes = intval($NumPanes);
        if ($NumPanes==0 || $NumPanes<0) {
            $textoFinal="ERROR. Dato inválido";
        }else {
            $precioPan = 3.49;
            $descuento = 0.60;
            $precioFinal = round(($NumPanes * $precioPan) / $descuento, 2);
            $textoFinal = "P.U: $precioPan € | Descuento por no ser del día: ". ($descuento*100) ."% | Precio FINAL: $precioFinal €";
        }
    }

    $_SESSION["respuestas"] = $textoFinal;
}


/**
 * Elimina el prefijo y la extensión de un número de teléfono
 */
function telefonos(){
    $valido = true;

    if (isset($_POST["telefono"])) {
        $telefono = $_POST["telefono"];
    }

    $arrayAux = explode("-", $telefono);

    
    if (count($arrayAux)!=3) {
        $valido = false;
    }else{
        // Comprobación del PRIMER elemento del array
        if (substr($arrayAux[0], 0, 1)!="+") {
            $valido = false;
        }else{
            if (intval(substr($arrayAux[0], 1))==0) /*Si no son números*/ {
                $valido = false;
            }else {
                if (strlen($arrayAux[0])<3 || strlen($arrayAux[0])>4) /*Si no son 3 o 4 caracteres (Ej.: +34 o +503)*/ {
                    $valido = false;
                }
            }
        }    

        // Comprobación del SEGUNDO elemento del array
        if (strlen($arrayAux[1])!=9) {
            $valido = false;
        }else {
            if (intval($arrayAux[1])==0) /*Si no son números*/ {
                $valido = false;
            }
        }

        // Comprobación del TERCER elemento del array
        if (strlen($arrayAux[2])!=2) {
            $valido = false;
        }else {
            if (intval($arrayAux[2])==0) /*Si no son números*/ {
                $valido = false;
            }
        }
    }

    if ($valido==false) {
        $telefono = "ERROR. Teléfono inválido";
    }else {
        $aux = strpos($telefono, "-")+1; // prefijo
        $telefono = substr($telefono, $aux);

        $aux = strpos($telefono, "-"); // extension
        $extension = strlen(substr($telefono, $aux));
        $telefono = substr($telefono, 0, strlen($telefono)-$extension);

        $telefono = "Número de Teléfono sin prefijo: " . $telefono;
    }

    $_SESSION["respuestas"] = $telefono;
}


/**
 * PENDIENTE
 */
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


/**
 * Comprueba si una contraseña cumple ciertos requisitos.
 * Comprueba también que coincida con la contraseña nuevamente escrita
 * EXPLICACIÓN EXPRESIÓN REGULAR
 * 1. (?=.*[a-z]): Asegura que haya al menos una letra minúscula.
 * 2. (?=.*[A-Z]): Asegura que haya al menos una letra mayúscula.
 * 3. (?=.*\d): Asegura que haya al menos un dígito.
 * 4. (?=.*[$@$!%*?&]): Asegura que haya al menos un carácter especial del conjunto $, @, !, %, *, ?, o &.
 * 5. ([A-Za-z\d$@$!%*?&]|[^ ]): Permite cualquier letra (mayúscula o minúscula), cualquier dígito, 
 *  o uno de los caracteres especiales mencionados. También permite cualquier carácter que 
 *  no sea un espacio.
 * 6. {8,15}: Indica que la longitud total de la cadena debe estar entre 8 y 15 caracteres.
 * 7. ^ y $: Aseguran que toda la cadena debe coincidir con el patrón, no solo una parte de ella.   
 */
function contrasena() {
    $expresion = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){10,15}$/";

    if (isset($_POST["contra1"])) {
        $contra1 = $_POST["contra1"];
    }

    if (isset($_POST["contra2"])) {
        $contra2 = $_POST["contra2"];
    }

    if ($contra1==$contra2) {
        $valida = preg_match($expresion, $contra1);
        if ($valida==1) {
            $valida = "PERFECTO! Contraseña válida";
        }else {
            $valida = "ERROR. La contraseña no cumple los requisitos";
        }
    }else {
        $valida = "ERROR. Las contraseñas no coinciden";
    }

    $_SESSION["respuestas"] = $valida;

}



