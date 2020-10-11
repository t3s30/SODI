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
$id = $_POST['id'];

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



$actualizar = $conn->query("UPDATE demanda SET expediente='$expediente',juzgado='$juzgado',quejosos='$quejoso',autorizados='$autorizado',
aResponsables='$autoridades',tInteresado='$tercero',aReclamado='$actoReclamado',audiencias='$audiencias',estadoP='$estadoProcesal',factuacion='$fechaActuacion',
fechade='$fechaNotificacion',juicioP='$juicioPrincipal',incidenteSus='$incidente',observaciones='$comentarios' WHERE ID=$id");
if ($actualizar) {
  echo '<script>
    $(document).ready(function() {
      Swal.fire({
        position: "top-center",
        icon: "success",
        title: "Registrado Actualizado",
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