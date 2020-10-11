
<?php
 include('config/conn.php');
 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
  //Username and Password sent from Form
  $username = mysqli_real_escape_string($conn, $_POST['user']);
  $password = mysqli_real_escape_string($conn, $_POST['pass']);
  $password = md5($password);
 
  $sql = "SELECT * FROM imos_login WHERE user ='$username' AND pass = '$password'";
  $query = mysqli_query($conn, $sql);
  while ( $res=mysqli_fetch_assoc($query)){
  $usuario = $res['user'];
  //$contra  = $res['mosut_users_pass'];
  $sistema = $res['pass'];
  } 
  
 if($usuario == $username)
 {
 
         session_start();
         $_SESSION['user'] = $usuario;
        /*  $_SESSION['sys'] = $sistema;
         $_SESSION['code'] = '0000'; */
         header('Location: main.php');
 
 }
  else
  {
 
  echo "<script>Swal.fire('Error!', 'Usuario o Contraseña incorrectos', 'error');</script>";
  }
 
 }
 
?>