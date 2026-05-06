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

        $mensagem = "Usuário cadastrado!";
    } else {
        $mensagem = "Preencha todos os campos!";
    }
    }
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
            $mensagem = "Email ou senha incorretos!";
        }
    } else {
        $mensagem = "Preencha todos os campos!";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://ideal-potato-4jqx9qx45xg5f7gx7-8080.app.github.dev/style.css">
    <title>Loguin</title>                                                                                                                                                      
</head>
<body>
    <form method="POST" id="myform">
    <div id="loguin"> <!-- criar uma divisioria entre a parte de longuin e o resto do codigo utilizando o metodo post para esconder os dados -->
        <div id="long">
            <h1>Café Bem Bão</h1>
            <div id=cxtx>
                <input type="text" name="cxtxu" id="cxtxu" placeholder="👤 Digite seu Usuario..."> <!-- caixa de texto para verificação de loguin -->
                <input type="password" name="cxtxs" id="cxtxs" placeholder="🔒 Digite sua Senha...">       
            </div>
            <div id="bottoes">                                       
                
                <input type="submit" id="btv" name="btv" value="☕ Entrar">
                <input type="submit" form="myform" id="btl" name="btl" value="➕ Cadastrar"> <!-- botoes de criação de usuario e vericação de usuario -->
            </div>
        </div>
        <?php if (isset($mensagem)): ?>
            <script>
                alert("<?php echo $mensagem; ?>");
            </script>
        <?php endif; ?>
    </div>
</body>
</html>
