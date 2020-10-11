<?php
session_start();
$usuario = $_SESSION['user'];
?>
<link href="hefestoLib/css/bootstrap331.css" rel="stylesheet">
<link rel="stylesheet" href="hefestoLib/css/bootstrap.fd.css">
<link rel="stylesheet" href="hefestoLib/css/upload.css">
<link id="onyx-css" href="hefestOlIB/css/style.css" rel="stylesheet">
<script src="hefestoLib/js/jquery111.js"></script>
<script src="hefestoLib/js/boostrap331.js"></script>
<script src="hefestoLib/js/bootstrap.fd.js"></script>
<script src="hefestoLib/js/sweet.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!-- Viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<title>SODI | IMOS</title>
<!-- Main CSS -->

<div class="topnav">
  <img src="img/logoImos.png" width="45" height="45" style="margin-left:5px;margin-top:5px" alt="">
  <a href="logout.php"> Salir</a>
  <a href="captura.php">Captura</a>
  <a href="main.php">Inicio</a>

  <p>Bienvenido <?php echo $usuario?></p>
</div>

<!-- Wrapper -->
<div class="wrapper" style="height:500px">

  <section class="col-xl-12 offset-xl-6 col-lg-6 offset-lg-6 col-md-12 full-dark-bg">
    <!-- Files section -->
    <h4 class="section-sub-title" style="padding-bottom: 9%;"><span>Elije PDF´S</span></h4>

    <div class="fallback">
      <form enctype="multipart/form-data" id="form" onsubmit="return submitForm();">
        <button type="button" onclick="selectFiles();" style="width:100px">Seleccionar</button>
        <br>
        <div id="selected-images"></div>
        <br>
        <br>
        <input type="submit" value="Subir" style="background-color:black;color:white;">
      </form>

      <script>
        var selectedImages = [];

        function selectFiles() {
          $.FileDialog({
            "accept": "pdf"

          }).on("files.bs.filedialog", function(event) {
            var html = "";
            for (var a = 0; a < event.files.length; a++) {
              selectedImages.push(event.files[a]);
              html += "<img src='img/pdf.png' style='width: 35px; margin-top: 20px;'>";
            }
            document.getElementById("selected-images").innerHTML = html;
          });
        }

        function submitForm() {
          var form = document.getElementById("form");
          var formData = new FormData(form);
          var num = <?php echo $_GET['id'] ?>;

          for (var a = 0; a < selectedImages.length; a++) {
            formData.append("images[]", selectedImages[a]);

            formData.append("id", num);

          }

          var ajax = new XMLHttpRequest();
          ajax.open("POST", "Http.php", true);
          ajax.send(formData);

          ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

              Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Archivos Cargados!! :=) ",
                showConfirmButton: false,
                timer: 2000
              }).then(
                function() {
                  window.location.href = "main.php";
                }
              );




            }
          };

          return false;
        }
      </script>