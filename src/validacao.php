<?php
session_start();
require_once "dbase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['cxtxu'] ?? '';
    $senha = $_POST['cxtxs'] ?? '';

    if(isset($_POST['btv'])){
    if (!empty($email) && !empty($senha)) {

        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario'] = $usuario['email'];
            header("Location: user.php");
            exit();
        } else {
            $_SESSION['mensagem'] = "Email ou senha incorretos!";
        }
    } else {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
    }
}

}
header("Location: index.php");
exit();