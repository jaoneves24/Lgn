
<!-- " ABA CAFETERIA" -->
 <!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/prd.css" ref="style/css">
    <link rel="icon" type="image/x-icon" href="styles/logo.ico">
    <title>cafeteria</title>
</head>
<body>
 <header>
    <div class="logo">☕ Café Bem Bão</div>
    <nav>
      <a href="user.php">como funciona</a>
      <a href="cfria.php">Criar cafeteria</a>
      <a href="pdria.php">Criar Padaria</a>
    </nav>
  </header> 
    <div id="additens">
        <form method="POST"id="myform">
            <div id="addit">
                <input type="button" id="sr" onclick="aparece()" value="❌">
                <input type="text" id="namp" name="namc"placeholder="Nome do Produto"> <!-- nao mexer nos nomes se nao vai quebrar o codigo -->
                <input type="text" id="prep" name="prec" placeholder="Preco">
                <input type="text" id="qntp"name="qntc" placeholder="Quantidade">
                <input type="submit" id="btep" name="btec" value="➕ Cadastrar" formaction="banco/rd.php">
            </div>
            <div id="tba">
                <input type="button" id="smd" onclick="aparece()" value="+">
            <div id="table">
                <div class="titulo">Nome</div>
                <div class="titulo">Preço</div>
                <div class="titulo">Quantidade</div>
                <div class="titulo">deletar</div>
                <?php
                require 'banco/dbase.php';
                $sql = "SELECT * FROM cfe";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>                
                    <div><?= $linha['nome'] ?></div>                    
                    <div>R$ <?= $linha['preco'] ?>  </div>
                    <form action="banco/update.php" method="post">
                    <div>
                         <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                         <input type="submit" name="rmvc" id="menos" value=" -" formaction="banco/update.php" style="background-color: transparent;">
                        <?= $linha['quantidade'] ?> 
                    <input type="submit" name="addc" id="mais" value="+ " formaction="banco/update.php" style="background-color: transparent;">
                     </div>
                </form>
                    <div>
                        <form action="banco/delete.php" method="POST">
                            <input 
                                type="hidden"
                                name="id"
                                value="<?= $linha['id'] ?>"
                            >
                            <input type="submit" id="btd" name="btdc" value=" 🗑️ " formaction="banco/delete.php">
                        </form>
                    </div>
                <?php } ?>
            </div>
            </div>            
        </form>
    </div>

    <script>
        function aparece() {
            const div = document.getElementById("addit");
            
            // Verifica se a div está escondida
            if (getComputedStyle(div).display === "none") {
                div.style.display = "flex"; // Faz aparecer
            } else {
                div.style.display = "none";  // Faz sumir
            }
            }
    </script>
</body>
</html>