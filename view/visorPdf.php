<?php
session_start();
$usuario = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>SODI | IMOS</title>
  <!-- Libraries/Plugins -->
  <link id="bootstrap-css" href="hefestoLib/css/bootstrap43.css" rel="stylesheet">
  <link rel="stylesheet" href="hefestoLib/css/visor.css">
 </head>
<body>
  <div class="topnav">
    <img src="img/logoImos.png" width="45" height="45" style="margin-left:5px;margin-top:5px" alt="">
    <a href="logout.php"> Salir</a>
    <a href="captura.php">Captura</a>
    <a href="main.php">Inicio</a>
 
    <h6>Bienvenido <?php echo $usuario ?></h6>
  </div>
  <div class="containerPDF">
    <div class="">
      <?php
      include('config/conn.php');
      $id = $_GET['id'];
      $resultado = $conn->query("SELECT * FROM demanda WHERE id=$id ");
      while ($fila = $resultado->fetch_assoc()) {
        $pdf = $fila['pdf'];
        $expInterno = $fila['expInterno'];
        $var_explode = explode(',', $pdf);
        array_pop($var_explode); // removes last  
      ?>
        <?php
        if ($pdf == "") {
        ?>
          <h4>Archivos de expediente: <?php echo $expInterno . " " . " | No hay Documentos Relacionados"; ?></h4>
        <?php

        } else {
        ?>
          <h4>Archivos de expediente: <?php echo $expInterno; ?></h4>
        <?php
        }
      }

      $numOfCols = 6;
      $rowCount = 0;
      $i = 1;
      $bootstrapColWidth = 12 / $numOfCols;
      foreach ($var_explode as $row) {
        if ($rowCount % $numOfCols == 0) { ?> <div class="row"> <?php }
          $rowCount++; ?>
          <div class="col-md-<?php echo $bootstrapColWidth; ?>">
            <div class="thumbnail">
              <a id="btno" href='javascript:ventanaSecundaria("<?php echo $row ?>")'><img src='img/pdf.png' width='40px' height'600px' style='margin-top:1%'></a>
              <?php
              echo "<h6>".$i++."</h6>";
              $srt = explode('/', $row);
              echo "<p>" . $srt[2] . "</p>";
              ?>
            </div>
          </div>
          <?php
          if ($rowCount % $numOfCols == 0) { ?> </div> <?php }}
         ?>
    </div>
  </div>
  </section>
  </div>
  
  <h6 class="footer" style="color:aliceblue">© IMOS - SODI | Gerencia Sistemas | Versión 1.3.3 | ▲</h6>
</body>

</html>
<script>
  var top = window.screen.height - 300;
  top = top > 0 ? top / 2 : 0;
  var left = window.screen.width - 200;
  left = left > 0 ? left / 2 : 0;
  function ventanaSecundaria(URL) {
    window.open(URL, "ventana1", "width=1000,height=800,scrollbars=NO" + ",top=" + top + ",left=" + left)
  }
</script>