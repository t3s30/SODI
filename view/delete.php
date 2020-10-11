<?php include('config/conn.php');
$id = $_GET['id'];
$mii = $conn->query("DELETE FROM demanda WHERE ID=$id");
$conn->close();
header('Location: main.php');
?>