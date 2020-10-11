<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="hefestoLib/js/sweet.js"></script>
  <script src="hefestoLib/js/jquery3.js"></script>
</head>

<body>

</body>

</html>
<?php
$id = $_GET['id'];
echo "<script>

   Swal.fire({
  title: 'Quieres Eliminar el Registro?',
  showDenyButton: true,
  confirmButtonText: `Eliminar`,
  denyButtonText: `Cancelar`,
  

}).then((result) => {
 
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Registro Eliminado', '', 'success');
   
    window.location.href='delete.php?id=" . $id . "';

  } else if (result.isDenied) {
    Swal.fire('Registro no se elimino', '', 'info');
  
    window.location.href='main.php';
             
  }
})
  </script>";

?>