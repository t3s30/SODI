<?php
session_start();
$usuario = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SODI | IMOS</title>
  <link rel="stylesheet" href="hefestoLib/css/bootstrap43.css">
  <link rel="stylesheet" href="hefestoLib/css/updateForm.css">
  <script src="hefestoLib/js/jquery331.js"></script>
  <script src="hefestoLib/js/popper114.js"></script>
  <script src="hefestoLib/js/bootstrap431.js"></script>
</head>

<body>
  <?php
  include('config/conn.php');
  $id = $_GET['id'];
  $resultado = $conn->query("SELECT * FROM demanda WHERE ID=$id ");

  while ($fila = $resultado->fetch_assoc()) {
    $id = $fila['ID'];
    $expInterno = $fila["expInterno"];
    $expediente = $fila["expediente"];
    $juzgado = $fila["juzgado"];
    $quejosos = $fila["quejosos"];
    $autorizados = $fila["autorizados"];
    $aResponsables = $fila["aResponsables"];
    $tInteresado = $fila["tInteresado"];
    $aReclamado = $fila["aReclamado"];
    $audiencias = $fila["audiencias"];
    $estadoP = $fila["estadoP"];
    $factuacion = $fila["factuacion"];
    $fechade = $fila["fechade"];
    $juicioP = $fila["juicioP"];
    $incidenteSus = $fila["incidenteSus"];
    $observaciones = $fila["observaciones"];
  } ?>
  <div class="topnav">
    <img src="img/logoImos.png" width="45" height="45" style="margin-left:5px;margin-top:5px" alt="">
    <a href="logout.php"> Salir</a>
    <a href="captura.php">Captura</a>
    <a href="main.php">Inicio</a>

    <p>Bienvenido <?php echo $usuario ?></p>
  </div>
  <div class="contenedor">
    <form action="update.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-1" style="display:none">
          <label for="inputEmail4">ID</label>
          <input type="text" class="form-control" id="id" name="id" placeholder="SIN DATOS" value="<?php echo $id ?>" disabled>
        </div>
        <div class="form-group col-md-1">
          <label for="inputEmail4">EXPEDIENTE</label>
          <input type="text" class="form-control" id="expediente" name="expediente" placeholder="SIN DATOS" value="<?php echo $expediente ?> " disabled>
        </div>

        <div class="form-group col-md-5">
          <label for="inputPassword4">JUZGADO</label>
          <input type="text" class="form-control" id="juzgado" name="juzgado" placeholder="SIN DATOS" value="<?php echo $juzgado ?>" disabled>
        </div>

        <div class="form-group col-md-5">
          <label for="inputEmail4">QUEJOSO(S)</label>
          <input type="text" class="form-control" id="quejoso" name="quejoso" placeholder="SIN DATOS" value="<?php echo $quejosos ?>" disabled>
        </div>

        <div class="form-group col-md-2">
          <label for="inputPassword4">TERCERO INTERESADO</label>
          <input type="text" class="form-control" id="tercero" name="tercero" placeholder="SIN DATOS" value="<?php echo $tInteresado ?>" disabled>
        </div>

        <div class="form-group col-md-3">
          <label for="inputPassword4">AUDIENCIAS</label>
          <input type="text" class="form-control" id="audiencias" name="audiencias" placeholder="SIN DATOS" value="<?php echo $audiencias ?>" disabled>
        </div>

        <div class="form-group col-md-3">
          <label for="exampleFormControlTextarea1">AUTORIZADOS POR EL QUEJOSO</label>
          <input type="text" class="form-control" id="autorizado" name="autorizado" placeholder="SIN DATOS" value="<?php echo $autorizados ?>" disabled>
        </div>

        <div class="form-group col-md-3">
          <label for="exampleFormControlTextarea1">AUTORIDADES &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; RESPONSABLES</label>
          <input type="text" class="form-control" id="autoridades" name="autoridades" placeholder="SIN DATOS" value="<?php echo $aResponsables ?>" disabled>
        </div>



        <div class="form-group col-md-3">
          <label for="exampleFormControlTextarea1">ACTO &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;RECLAMADO</label>
          <input type="text" class="form-control" id="actoReclamado" name="actoReclamado" placeholder="SIN DATOS" value="<?php echo $aReclamado ?>" disabled>
        </div>


        <div class="form-group col-md-3">
          <label for="inputEmail4">ESTADO PROCESAL</label>
          <input type="text" class="form-control" id="estadoProcesa" name="estadoProcesal" placeholder="SIN DATOS" value="<?php echo $estadoP ?>" disabled>
        </div>

        <div class="form-group col-md-3">
          <label for="inputPassword4">Fecha de actuación</label>
          <input type="text" class="form-control" id="fechaActuacion" name="fechaActuacion" placeholder="SIN DATOS" value="<?php echo $factuacion ?>" disabled>
        </div>

        <div class="form-group col-md-2">
          <label for="inputEmail4">Fecha de notificaciòn</label>
          <input type="text" class="form-control" id="fechaNotificacion" name="fechaNotificacion" placeholder="SIN DATOS" value="<?php echo $fechade ?>" disabled>
        </div>

        <div class="form-group col-md-3">
          <label for="exampleFormControlTextarea1">INCIDENTE DE SUSPENSIÓN</label>
          <input type="text" class="form-control" id="incidente" name="incidente" placeholder="SIN DATOS" value="<?php echo $incidenteSus ?>" disabled>
        </div>
        <div class="form-group col-md-3">
          <label for="inputPassword4">JUICIO PRINCIPAL</label>
          <input type="text" class="form-control" id="jucioPrincipal" name="jucioPrincipal" placeholder="SIN DATOS" value="<?php echo $juicioP ?>" disabled>
        </div>
        <div class="form-group col-md-5">
          <label for="exampleFormControlTextarea1">Comentarios adicionales</label>
          <input type="text" class="form-control" id="comentarios" name="comentarios" placeholder="SIN DATOS" value="<?php echo $observaciones ?>" disabled>
        </div>
      </div>
      <br><br>
      <a href="main.php" <button type="button" class="btn btn-dark">Regresa</button> </a>
      <button style="margin-left:95px;" type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Actualiza</button>
    </form>

  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          Actualización de Expediente: <?php echo "<h5 class='tituloModal'>" . $expInterno . "</h5>"; ?>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="insertUpdatDemanda.php" method="post">
            <div class="form-group col-md-12" style="display:none">
              <label class="colorI" for="inputPassword4">Expediente Interno</label>
              <input type="text" class="form-control" id="expInterno" name="expInterno" placeholder="SIN DATOS" value="<?php echo $expInterno ?>">
            </div>

            <div class="form-group col-md-12" style="display:none">
              <label class="colorI" for="inputEmail4">EXPEDIENTE</label>
              <input type="text" class="form-control" id="expediente" name="expediente" placeholder="SIN DATOS" value="<?php echo $expediente ?> ">
            </div>

            <div class="form-group col-md-12">
              <label class="colorI" for="inputPassword4">Fecha de actuación</label>
              <input type="date" class="form-control" id="fechaActuacion" name="fechaActuacion" placeholder="SIN DATOS" value="">
            </div>

            <div class="form-group col-md-12">
              <label class="colorI" for="inputEmail4">Fecha de notificaciòn</label>
              <input type="date" class="form-control" id="fechaNotificacion" name="fechaNotificacion" placeholder="SIN DATOS" value="">
            </div>



            <div class="form-group col-md-12 colorT">
              <label class="colorI" for="exampleFormControlTextarea1">INCIDENTE DE SUSPENSIÓN</label>
              <textarea name="incidente" id="incidente" cols="58" rows="3"></textarea>
            </div>
            <div class="form-group col-md-12">
              <label class="colorI" for="inputPassword4">JUICIO PRINCIPAL</label>
              <textarea name="jucioPrincipal" id="jucioPrincipal" cols="58" rows="3"></textarea>
            </div>
            <div class="form-group col-md-12">
              <label class="colorI" for="exampleFormControlTextarea1">COMENTARIOS ADICIONALES</label>
              <textarea name="comentarios" id="comentarios" cols="58" rows="3"></textarea>
            </div>
        </div>
        <button type="summit" class="btn btn-dark">Actualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
  </div>


  <div class="footer">
    <p>© IMOS - SODI | Gerencia Sistemas | Versión 1.3.3 | ▲</p>
  </div>
  <script>
    $('#exampleModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever')
      var modal = $(this)
      modal.find('.modal-title').text('', "")
      modal.find('.modal-body input').val()
    })
  </script>
</body>

</html>