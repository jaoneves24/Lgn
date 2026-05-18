<?php
session_start();
require 'banco/dbase.php';


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css" ref="style/css">
    <link rel="icon" type="image/x-icon" href="styles/logo.ico">
    <title>Loguin</title>                                                                                                                                                      
</head>
<body>
    <form method="POST" id="myform" action=""> <!-- criar um formulario para o metodo post -->
    <div id="loguin"> <!-- criar uma divisioria entre a parte de longuin e o resto do codigo utilizando o metodo post para esconder os dados -->
        <div id="long">
            <h1>Café Bem Bão</h1>
            <div id=cxtx>
                <input type="text" name="cxtxu" id="cxtxu" placeholder="👤 Digite seu Usuario..."> <!-- caixa de texto para verificação de loguin -->
                <input type="password" name="cxtxs" id="cxtxs" placeholder="🔒 Digite sua Senha...">       
            </div>
            <div id="bottoes">                                       
                
                <input type="submit" id="btv" name="btv" value="☕ Entrar" formaction="banco/validacao.php"> <!-- botoes de criação de usuario e vericação de usuario -->
                <input type="submit" form="myform" id="btl" name="btl" value="➕ Cadastrar" formaction="banco/rd.php"> <!-- botoes de criação de usuario e vericação de usuario -->
            </div>
        </div>
        <?php if (isset($_SESSION['mensagem'])): ?>
            <script>
                alert("<?php echo $_SESSION['mensagem']; ?>");
            </script>
        <?php endif; ?>
    </div>
</body>
</html>
