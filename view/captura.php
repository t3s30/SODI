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
  <link rel="stylesheet" href="hefestoLib/css/captura.css">
  <script src="hefestoLib/js/jquery331.js"></script>
  <script src="hefestoLib/js/popper114.js"></script>
  <script src="hefestoLib/js/bootstrap431.js"></script>
</head>

<body>
  <div class="topnav">
    <img src="img/logoImos.png" width="45" height="45" style="margin-left:5px;margin-top:5px" alt="">
    <a href="logout.php"> Salir</a>
    <a href="captura.php">Captura</a>
    <a href="main.php">Inicio</a>
  
    <p>Bienvenido <?php echo $usuario ?></p>
  </div>
  <div class="contenedor">
    <form action="capturaPost.php" method="post">
      <div class="form-row">
        <?php
        include('config/conn.php');
        $resultado = $conn->query("SELECT * FROM demanda ORDER BY ID DESC LIMIT 1 ");

        while ($fila = $resultado->fetch_assoc()) {
          $id = $fila['ID'];
        }
        $expNew = 'exp-' . $id;

        ?>

        <div class="form-group col-md-1" style="display:none">
          <label for="inputEmail4">EXPEDIENTE Interno</label>
          <input type="text" class="form-control" id="interno" name="interno" placeholder="" value="<?php echo $expNew ?>">
        </div>

        <div class="form-group col-md-1">
          <label for="inputEmail4">EXPEDIENTE</label>
          <input type="text" class="form-control" id="expediente" name="expediente" placeholder="EXPEDIENTE">
        </div>

        <div class="form-group col-md-2">
          <label for="inputPassword4">JUZGADO</label>
          <input type="text" class="form-control" id="juzgado" name="juzgado" placeholder="JUZGADO">
        </div>

        <div class="form-group col-md-3">
          <label for="inputEmail4">QUEJOSO(S)</label>
          <input type="text" class="form-control" id="quejoso" name="quejoso" placeholder="QUEJOSO(S)">
        </div>

        <div class="form-group col-md-2">
          <label for="inputPassword4">TERCERO INTERESADO</label>
          <input type="text" class="form-control" id="tercero" name="tercero" placeholder="TERCERO INTERESADO">
        </div>

        <div class="form-group col-md-3">
          <label for="inputPassword4">AUDIENCIAS</label>
          <input type="text" class="form-control" id="audiencias" name="audiencias" placeholder="AUDIENCIAS">
        </div>

        <div class="form-group col-md-3">
          <label for="exampleFormControlTextarea1">AUTORIZADOS POR EL QUEJOSO</label>
          <textarea class="form-control" id="autorizado" name="autorizado" rows="1"></textarea>
        </div>

        <div class="form-group col-md-4">
          <label for="exampleFormControlTextarea1">AUTORIDADES RESPONSABLES</label>
          <textarea class="form-control" id="autoridades" name="autoridades" rows="1"></textarea>
        </div>

        <div class="form-group col-md-4">
          <label for="exampleFormControlTextarea1">ACTO RECLAMADO</label>
          <textarea class="form-control" id="actoReclamado" name="actoReclamado" rows="1"></textarea>
        </div>


        <div class="form-group col-md-3">
          <label for="inputEmail4">ESTADO PROCESAL</label>
          <input type="text" class="form-control" id="estadoProcesa" name="estadoProcesal" placeholder="ESTADO PROCESA">
        </div>

        <div class="form-group col-md-3">
          <label for="inputPassword4">Fecha de actuación</label>
          <input type="text" class="form-control" id="fechaActuacion" name="fechaActuacion" placeholder="Fecha de actuación">
        </div>

        <div class="form-group col-md-2">
          <label for="inputEmail4">Fecha de notificaciòn</label>
          <input type="text" class="form-control" id="fechaNotificacion" name="fechaNotificacion" placeholder="Fecha de notificaciòn">
        </div>

        <div class="form-group col-md-3">
          <label for="inputPassword4">JUICIO PRINCIPAL</label>
          <input type="text" class="form-control" id="jucioPrincipal" name="jucioPrincipal" placeholder="JUICIO PRINCIPAL">
        </div>

        <div class="form-group col-md-5">
          <label for="exampleFormControlTextarea1">INCIDENTE DE SUSPENSIÓN</label>
          <textarea class="form-control" id="incidente" name="incidente" rows="3"></textarea>
        </div>

        <div class="form-group col-md-6">
          <label for="exampleFormControlTextarea1">Comentarios adicionales</label>
          <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
        </div>

      </div>
      <a href="main.php"<button type="button" class="btn btn-dark" style="margin-right:2%">Regresa</button> </a>
      <button type="submit" class="btn btn-dark">Capturar</button>
    </form>
  </div>
  <div class="footer">
    <p>© IMOS - SODI | Gerencia Sistemas | Versión 1.3.3 | ▲</p>
  </div>
</body>
</html>