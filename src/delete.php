<?php

require 'dbase.php';


if(isset($_POST['btd'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM pda WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    header("Location: pdria.php");
    exit();
}

