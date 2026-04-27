<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            z-index: 10;

        }

        #bts{
            display: flex;
            margin-top: 0.5%;
            margin-left: 2%;
            gap: 15px;
            align-items: center;
        }
        #btf {
            height: 45px;
            width: 45px;
            background-color: #a57d52;
            color:black;
            border-radius: 15px;
            border:none;
            cursor: pointer;
        }
        #btf::hover{transform:translateY(-2px)}

    </style>
    <div id=cbc>
        <div id=bts>
            <button type="button" id="btf">
                <b>-</b>
                <b>-</b>
                <b>-</b>
            </button>
    
        </div>    
    </div>
    
    <div id="lista">
          
    </div>
</body>
</html>
