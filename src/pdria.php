           
<!-- padaria -->
<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/prd.css" ref="style/css">
    <link rel="icon" type="image/x-icon" href="styles/logo.ico">
    <title>Padaria</title>
</head>
<body>
    <div id="rdp">
        <a href="pdria.php">Padaria</a>
        <a href="user.php">Home</a>
        <a href="cfria.php">café</a>
    </div>
    <div id="additens">
        <form method="POST"id="myform">
            <div id="addit">
                <input type="button" id="sr" onclick="aparece()" value="❌">
                
                <input type="text" id="namp" name="namp"placeholder="Nome do Produto"> <!-- nao mexer nos nomes se nao vai quebrar o codigo -->
                <input type="text" id="prep" name="prep" placeholder="Preco">
                <input type="text" id="qntp"name="qntp" placeholder="Quantidade">
                <input type="submit" id="btep" name="btep" value="➕ Cadastrar" formaction="banco/rd.php">
            </div> <!-- final da div addit -->
             
            <div id="tba"> 
                <input type="button" id="smd" onclick="aparece()" value="+">
                <div id="table">
                    <div class="titulo">Nome</div>
                    <div class="titulo">Preço</div>
                    <div class="titulo">Quantidade</div>
                    <div class="titulo">deletar</div>
                    <?php
                    require 'banco/dbase.php';
                    $sql = "SELECT * FROM pda";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div><?= $linha['nome'] ?></div>
                        <div>R$ <?= $linha['preco'] ?>  </div>
                         <form action="update.php" method="post">
                    <div>
                         <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                         <input type="submit" name="rmvp" id="menos" value=" -" formaction="banco/update.php" style="background-color: transparent;">
                        <?= $linha['quantidade'] ?> 
                    <input type="submit" name="addp" id="mais" value="+ " formaction="banco/update.php" style="background-color: transparent;">
                     </div>
                         </form>
                        <div>
                            <form action="banco/delete.php" method="POST">
                                <input 
                                    type="hidden"
                                    name="id"
                                    value="<?= $linha['id'] ?>"
                                >
                                <input type="submit" id="btd" name="btd" value=" ❌ " formaction="banco/delete.php">
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
            
            if (getComputedStyle(div).display === "none") {
                div.style.display = "flex";
            } else {
                div.style.display = "none";
            }
            }
    </script>

</body>
</html>