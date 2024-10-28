<?php

  
if(isset($_POST['dato'])){
    $co2 = $_POST['dato'];
    echo $co2;
    
    $servername = "localhost"; // Servidor MySQL
    $username   = "ibomusot_dias";  // Usuario de MySQL
    $password   = "dias.2024";  // Contraseña de MySQL
    $dbname     = "ibomusot_datos_co2";  // Nombre de la base de datos
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificar conexión
    if (mysqli_connect_errno()) {
        echo "Fallo la conexion a la BD".mysqli_connect_error();
    }
    else{
        echo "Conexion exitosa a la BD";
    }
    $result = $conn->query("insert into datos(info) values('$co2')");
    $conn->close();
}


?>
**aca va el codigo HTML