<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="js/lib/sweet.js"></script>
  <script src="js/lib/jquery3.js"></script>
</head>

<body>

</body>

</html>
<?php
include('config/conn.php');
$interno = $_POST['expInterno'];
$expediente = $_POST['expediente'];
$fechaActuacion = $_POST['fechaActuacion'];
$fechaNotificacion = $_POST['fechaNotificacion'];
$incidente = $_POST['incidente'];
$juicioPrincipal = $_POST['jucioPrincipal'];
$comentarios = $_POST['comentarios'];


$insertar = $conn->query("INSERT INTO demanda_actualiza(demanda_expInterno,demanda_expediente,fecha_actuacion,fecha_notificacion,icidente,jucio_principal,comentarios)VALUES('$interno','$expediente','$fechaActuacion','$fechaNotificacion','$incidente','$juicioPrincipal','$comentarios')");
if ($insertar) {
  echo '<script>
        $(document).ready(function() {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Registrado Correctamente",
            showConfirmButton: false,
            timer: 1500
            }).then(
                  function () {
                        window.location.href = "main.php";
 }
            );
                });
      </script>';
} else {
  echo ("Error description: " . $conn->error);
}

$conn->close();




?>