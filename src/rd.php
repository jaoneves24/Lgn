<?php
session_start();
require 'dbase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['cxtxu'] ?? '';
    $senha = $_POST['cxtxs'] ?? '';
    $nap = $_POST['namp'] ?? '';  
    $inp = $_POST['prep'] ?? ''; 
    $pep = $_POST['qntp'] ?? '';  
    $nac = $_POST['namc'] ?? '';  
    $inc = $_POST['prec'] ?? ''; 
    $pec = $_POST['qntc'] ?? '';  


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
    header("Location: index.php");
    exit();
    }
    
    if(isset($_POST['btep'])){
        if(!empty($nap) && !empty($inp) && !empty($pep)){
            $sql = "INSERT INTO pda (nome, preco, quantidade) VALUE (:nome, :preco, :quantidade)";
            $stmt = $conn->prepare($sql);

            $stmt->execute([
                ':nome' => $nap,
                ':preco' =>$inp,
                ':quantidade' =>$pep

            ]);
            
        } else {
        $_SESSION['mensagem'] = "Preencha todos os campos!";
    }
    header("Location: pdria.php");
    exit();
    }
    

    if(isset($_POST['btec'])){
        if(!empty($nac) && !empty($inc) && !empty($pec)){
            $sql = "INSERT INTO cfe (nome, preco, quantidade) VALUE (:nomec, :precoc, :quantidadec)";
            $stmt = $conn ->prepare($sql);
            $stmt ->execute([
                ':nomec' => $nac,
                ':precoc' => $inc,
                ':quantidadec' => $pec
            ]);
        } else{$_SESSION['mensagem'] = "Preencha todos os campos!";}
    header("Location: cfria.php");
    exit();

    }
    
}
