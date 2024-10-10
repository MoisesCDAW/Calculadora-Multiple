<!-- 
PHP version: 8.2.12
XAMPP version: 3.3.0
HTML 5-->

<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Index</title>
</head>
<body>
    <!-- name para botones: operacion
        action: logica.php
    -->

    <!-- INVERSIÓN. Pide inversión inicial, interés anual, años de inversión = capital después de x años -->
    <form action="logica.php" method="post">
        <p>INVERSION</p>
        <input type="text" placeholder="Inversion inicial" name="inversion" autocomplete="off">
        <input type="text" placeholder="7.5" name="inverIntAnual" autocomplete="off">
        <input type="text" placeholder="Años" name="year" autocomplete="off">
        <button value="capital" name="operacion">Enviar</button>
    </form>

    <br>

    <!-- CUENTA DE AHORROS: Pide interés anual, capital inicial = beneficio y total en N años-->
    <form action="logica.php" method="post">
        <p>CUENTA DE AHORROS</p>
        <input type="text" placeholder="Inversión inicial" name="ahorrosInversion" autocomplete="off">
        <input type="text" placeholder="7.5" name="ahorrosIntAnual" autocomplete="off">
        <button value="ahorros" name="operacion">Enviar</button>
    </form>

    <br>

    <!-- PANADERÍA: Pide nº barras vendidas de diferente día = precio barra, descuento y total con descuento -->
    <form action="logica.php" method="post">
        <p>PANADERIA</p>
        <input type="text" placeholder="Nº Barras de ayer" name="panes" autocomplete="off">
        <button value="panaderia" name="operacion">Enviar</button>
    </form>

    <br>

    <!-- TELÉFONOS:  Pide Num-teléfono = Num-teléfono sin prefijo-->
    <form action="logica.php" method="post">
        <p>TELEFONOS</p>  
        <input type="text" placeholder="+34-913724710-56" name="telefono" autocomplete="off">
        <button value="telefonos" name="operacion">Enviar</button>
    </form>

    <br>

    <!-- MAYOR DE EDAD:  Pide edad = true >=18 o false <18-->
    <form action="logica.php" method="post">
        <p>MAYOR DE EDAD</p>  
        <input type="date" placeholder="Ingresa tu edad" name="edad" autocomplete="off">
        <button value="mayor" name="operacion">Enviar</button>
    </form>
    
    <br>

    <!-- MAYOR DE EDAD:  Pide 2 contraseñas = si coinciden y si cumplen los requisitos-->
    <form action="logica.php" method="post">
        <p>CONTRASEÑAS</p>  
        <!-- <input type="text" placeholder="Ingresa una contraseña" name="contra1" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$">
        <input type="text" placeholder="Repítela" name="contra2" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$"> -->
        <input type="password" placeholder="Ingresa una contraseña" name="contra1">
        <input type="password" placeholder="Repítela" name="contra2">
        <button value="contrasena" name="operacion">Enviar</button>
        <p>            
            REQUISITOS: Deben ser iguales, mínimo 10 caracteres, con mayusculas y minusculas,<br>
            algun numero y algun simbolo.
        </p>
    </form>

    <br><hr>

    <p>RESULTADOS: <?php if(isset($_SESSION["respuestas"])){echo "<br>".$_SESSION["respuestas"];}?>
    </p>
</body>
</html>