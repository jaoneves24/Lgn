<?php

require 'dbase.php';

$id = $_POST['id'];


// CAFETERIA
if(isset($_POST['addc'])){

    $sql = "UPDATE cfe
            SET quantidade = quantidade + 1
            WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../cfria.php");
    exit;
}

elseif(isset($_POST['rmvc'])){

    $sql = "UPDATE cfe
            SET quantidade = quantidade - 1
            WHERE id = :id
            AND quantidade > 0";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../cfria.php");
    exit;
}


// PADARIA
elseif(isset($_POST['addp'])){

    $sql = "UPDATE pda
            SET quantidade = quantidade + 1
            WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../pdria.php");
    exit;
}

elseif(isset($_POST['rmvp'])){

    $sql = "UPDATE pda
            SET quantidade = quantidade - 1
            WHERE id = :id
            AND quantidade > 0";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../pdria.php");
    exit;
}

?>