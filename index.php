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
        <input type="text" placeholder="Inversion inicial" name="inversion">
        <input type="text" placeholder="7.5" name="inverIntAnual">
        <input type="text" placeholder="Años" name="year">
        <button value="capital" name="operacion">Enviar</button>
    </form>

    <br>

    <!-- CUENTA DE AHORROS: Pide interés anual, capital inicial = beneficio y total en N años-->
    <form action="logica.php" method="post">
        <p>CUENTA DE AHORROS</p>
        <input type="text" placeholder="7.5" name="ahorrosIntAnual">
        <input type="text" placeholder="Inversión inicial" name="ahorrosInversion">
        <button value="ahorros" name="operacion">Enviar</button>
    </form>

    <br>

    <!-- PANADERÍA: Pide nº barras vendidas de diferente día = precio barra, descuento y total con descuento -->
    <form action="logica.php" method="post">
        <p>PANADERIA</p>
        <input type="text" placeholder="Nº Barras de ayer">
        <button value="panaderia" name="operacion">Enviar</button>
    </form>

    <br>

    <!-- TELÉFONOS:  Pide Num-teléfono = Num-teléfono sin prefijo-->
    <form action="logica.php" method="post">
        <p>TELEFONOS</p>  
        <input type="text" placeholder="+34-913724710-56">
        <button value="telefonos" name="operacion">Enviar</button>
    </form>

    <br>

    <!-- MAYOR DE EDAD:  Pide edad = true >=18 o false <18-->
    <form action="" method="post">
        <p>MAYOR DE EDAD</p>  
        <input type="text" placeholder="Ingresa tu edad">
        <button value="edad" name="operacion">Enviar</button>
    </form>
    
    <br>

    <!-- MAYOR DE EDAD:  Pide 2 contraseñas = si coinciden y si cumplen los requisitos-->
    <form action="" method="post">
        <p>CONTRASEÑAS</p>  
        <input type="text" placeholder="Ingresa una contraseña">
        <input type="text" placeholder="Repítela">
        <button value="contrasena" name="operacion">Enviar</button>
        <p>            
            NOTA: Deben ser iguales, mínimo 10 caracteres, con mayusculas y minusculas,<br>
            algun numero y algun simbolo.
        </p>
    </form>

    <br><hr>

    <p>RESULTADOS: <?php echo $_SESSION["respuestas"];?></p>
</body>
</html>