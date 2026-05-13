<?php
session_start();
require_once "dbase.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css" ref="style/css">
    <title>Bem Vindo</title>
</head>
<body>
    <style>
      

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
