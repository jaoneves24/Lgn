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
    <link rel="stylesheet" href="/workspaces/Lgn/src/style.css">
    <title>Loguin</title>                                                                                                                                                      
    <style>
    body{
            background: linear-gradient(
        45deg, 
        #a57d52 25%, 
        #c1a076 25%, 
        #c1a076 50%, 
        #a57d52 50%, 
        #a57d52  75%, 
        #c1a076 75%
    );
    background-size: 60px 60px; /* Tamanho das listras */
    flex-direction: row;
}
    
    #loguin{
        background:#844420;
        width: 500px;
        height: 500px;
        margin-top: 50px;
        justify-content: center;
        align-items:center ;
        display: flex;
        border-radius: 20px;
        box-shadow: 4px 15px 35px #844420;

    }
    #btl:hover { transform: translateY(-2px);background-color: #419f00;color:black; box-shadow: 0 5px 15px rgb(0, 0, 0); }
    #btv:hover { transform: translateY(-2px);background-color:blue;color: white;  box-shadow: 0 5px 15px rgb(1, 47, 255); }
  
    #long{        
        color: white;   

    }
    #cxtx{
        display:flex;
        flex-direction: column;
        margin-bottom: 30px;
        gap: 10px;
    }
    #cxtxu, #cxtxs{
        border:none;
        color:black;
        background-color: #c1a076;
        border-radius: 20px;
        width: 300px;
        height: 50px;
        font-size: 16px;
        cursor:pointer;

    }
    #cxtxs{
        margin-top: 20px;
    }

    #cxtxu{
        margin-top: 20px;
    }
    #cxtxu:hover { transform: translatey(-2px);}
    #cxtxs:hover {transform: translatey(-2px) ;}
    #cxtx input::placeholder{
        color:black;
        text-align: center;
    }
    #botoes{
        display:flex;
        flex-direction: row;
        gap:40px;

    }
    #btv, #btl{
        height: 40px;
        width: 100px;
        cursor:pointer;
        background-color: transparent;
        border: 1px, solid ;
        border-radius: 10px;
        
    }
    #btv{
        margin-right: 60px;
        margin-left: 20px;
    }
   
    body{
        display:flex;
        justify-content: center;
        align-items: center;
    }

    h1{
        position: relative;
        text-align: center;
        font-size: 50px;
        z-index: 2;
    }
    </style>
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
