<?php
session_start();
$usuario = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="es">

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
$interno = $_POST['interno'];
$expediente = $_POST['expediente'];
$juzgado = $_POST['juzgado'];
$quejoso = $_POST['quejoso'];
$tercero = $_POST['tercero'];
$audiencias = $_POST['audiencias'];
$autorizado = $_POST['autorizado'];
$autoridades = $_POST['autoridades'];
$actoReclamado = $_POST['actoReclamado'];
$estadoProcesal = $_POST['estadoProcesal'];
$fechaActuacion = $_POST['fechaActuacion'];
$fechaNotificacion = $_POST['fechaNotificacion'];
$juicioPrincipal = $_POST['jucioPrincipal'];
$incidente = $_POST['incidente'];
$comentarios = $_POST['comentarios'];

$insertar = $conn->query("INSERT INTO demanda (expInterno,expediente,juzgado,quejosos,autorizados,aResponsables,tInteresado,aReclamado,audiencias,estadoP,factuacion,fechade,juicioP,incidenteSus,observaciones)VALUES('$interno','$expediente','$juzgado','$quejoso','$autorizado','$autoridades','$tercero','$actoReclamado','$audiencias','$estadoProcesal','$fechaActuacion','$fechaNotificacion','$juicioPrincipal','$incidente','$comentarios')");
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