<?php   
    //Crea un archivo de texto para guardar los datos que envía el ESP8266
    if (!file_exists("miTemp&Hum.txt")){
        // si no existe el archivo, lo creamos
        file_put_contents("miTemp&Hum.txt", "0.0\r\n0.0");
    }
    
    // Si se recibe Datos con el Método GET, los procesamos
    if (isset($_GET['Temp']) && isset($_GET['Hum'])){
        $var3 = $_GET['Temp'];
        $var4 = $_GET['Hum'];
        $fileContent = $var3 . "\r\n" . $var4;
        $fileSave = file_put_contents("miTemp&Hum.txt", $fileContent);
    }
   
    // Leemos los datos del archivo para guardarlos en variables
    $fileStr = file_get_contents("miTemp&Hum.txt");
    $pos1 = strpos($fileStr, "\r\n");
    $var1 = substr($fileStr, 0, $pos1);
    $var2 = substr($fileStr, $pos1 + 1); // de la pos1 +1 hasta el final
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta http-equiv="refresh" content="2">
    <title>Control Automatizado Temperatura y Humedad</title>

</head>
    <style>
        html {
            font-family: Arial;
            display: inline-block;
            margin: 0px auto;
            text-align: center;
        }
        h2{
            font-size: 3.0rem;
        }
        p{
            font-size: 3.0rem;
        }
        .units{
            font-size:1.2rem;
        }
        .dth-labels{
            font-size: 1.5rem;
            vertical-align:middle;
            padding-botton:15px;
        }
    </style>
<body>
    <header>
        <h2>Control de Temperatura y Humedad</h2>
    </header>
    
    <section>
        <p>
            <i class="fas fa-thermometer-half" style="color:#059e8a;">
            <span class="dht-labels">Temperature: <?php echo $var1; ?></span>
            </i>
        </p>
        <p>
            <i class="fas fa-tint" style="color:#00add6;"></i> 
            <span class="dht-labels">Humedad: <?php echo $var2; ?></span>
        </p>
    </section>
</body>
</html>
