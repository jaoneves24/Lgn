<?php
session_start();
require 'dbase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['cxtxu'] ?? '';
    $senha = $_POST['cxtxs'] ?? '';

    if(isset($_POST['btl'])){

    if (!empty($email) && !empty($senha)) {

        $sql = "INSERT INTO usuarios (email, senha) VALUES (:email, :senha)";
        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':email' => $email,
            ':senha' => password_hash($senha, PASSWORD_DEFAULT)
        ]);

        $_SESSION['mensagem'] = "Usuário cadastrado!";
    } else {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
    }
    }
}

header("Location: index.php");
exit();