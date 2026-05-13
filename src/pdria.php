           
<!-- padaria -->
<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/prd.css" ref="style/css">
    <title>Document</title>
</head>
<body>
    <div id="additens">
        <form method="POST"id="myform">
            <input type="text" id="namp" name="namp"placeholder="Nome do Produto"> <!-- nao mexer nos nomes se nao vai quebrar o codigo -->
            <input type="text" id="prep" name="prep" placeholder="Preco">
            <input type="text" id="qntp"name="qntp" placeholder="Quantidade">
            <input type="submit" id="btep" name="btep" value="➕ Cadastrar" formaction="rd.php">
            <div id="table">
                <div class="titulo">Nome</div>
                <div class="titulo">Preço</div>
                <div class="titulo">Quantidade</div>
                <div class="titulo">deletar</div>
                <?php
                require 'dbase.php';
                $sql = "SELECT * FROM pda";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div><?= $linha['nome'] ?></div>
                    <div>R$ <?= $linha['preco'] ?>  </div>
                    <div><?= $linha['quantidade'] ?> </div>
                    <div>
                        <form action="delete.php" method="POST">
                            <input 
                                type="hidden"
                                name="id"
                                value="<?= $linha['id'] ?>"
                            >
                            <input type="submit" id="btd" name="btd" value=" ❌ " formaction="delete.php">
                        </form>
                    </div>
                <?php } ?>
            </div>            
        </form>
    </div>
</body>
</html>