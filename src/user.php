<?php
session_start();
include 'dbase.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

// evita SQL injection
$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();

    // verifica senha
    if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        header("Location: dashboard.php");
    } else {
        echo "Senha incorreta";
    }
} else {
    echo "Usuário não encontrado";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo</title>
</head>
<body>
    <style>
        body{
            background: linear-gradient(
                45deg,
                #a57d52 25%, 
                #c1a076 25%, 
                #c1a076 50%, 
                #a57d52 50%, 
                #a57d52 75%, 
                #c1a076 75%
            );
            background-size: 50px 50px;
            flex-direction: row;
        }
        #lista{
            background-color: #c1a076;
            position: absolute;
            inset:25px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0,0,0,1);
        }
        #cbc{
            background-color: black;
            position:absolute;
            top:0%;
            right:0%;
            left: 0%;
            bottom: 90%;
            z-index: 1;

        }

        #bts{
            display: flex;
            margin-top: 0.5%;
            margin-left: 2%;
            gap: 15px;
            align-items: center;
        }
        #btf {
            line-height: 0.8;
            margin-top: 2;
            flex-direction: column;
            display:flex;
            height: 45px;
            width: 45px;
            background-color: #a57d52;
            color:black;
            border-radius: 15px;
            border:none;
            cursor: pointer;
        }
        #btf::hover{transform:translateY(-2px)}

        #janela{
            background-color:white;
            height: 200px;
            width: 200px;
            right:80%;
            left: 0%;
            bottom: 0%;
            align-items: center;
            flex-direction:column;
            display: flex;  
            visible:none;
        }

    </style>
    <div id=cbc>
        <div id=bts>
            <button type="button" id="btf">
                <b>-</b>
                <b>-</b>
                <b>-</b>
            </button>
            
    
        </div>    
            <div id="janela">
                <input type="button" id="bti" value="menu principal">
                <div>
                    <input type="button" id="bti" value="+">
                    <input type="button" id="bti" value="-">
                </div>
                <input type="button" id="bti" value="cafe">
                <input type="button" id="bti" value="padaria">
            </div>

    </div>
    
    <div id="lista">
          
    </div>
</body>
</html>
