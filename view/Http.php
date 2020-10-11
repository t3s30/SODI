<?php

	 
$conn = mysqli_connect("localhost", "root", "", "sodi");
$id = $_POST['id'];
mkdir("uploads/" . $id . "/");


for ($a = 0; $a < count($_FILES["images"]["name"]); $a++) {
	$path = "uploads/" . $id . "/" . $_FILES["images"]["name"][$a];
	$bd .= "uploads/" . $id . "/" . $_FILES["images"]["name"][$a] . ",";

	mysqli_query($conn, "UPDATE demanda SET pdf =CONCAT(pdf,'$bd') WHERE ID=$id ");
	move_uploaded_file($_FILES["images"]["tmp_name"][$a], $path);
}

