<?php
session_start();
require_once "banco/dbase.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/user.css" ref="style/css">
    <link rel="icon" type="image/x-icon" href="styles/logo.ico">
    <title>Bem Vindo</title>
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
    <div id="lista">
          <section class="hero">
    <h1>Bem-vindo, Administrador!</h1>
    <p>Gerencie os produtos da cafeteria de forma simples e eficiente.</p>
    </section>

      <section class="cards" id="como-funciona">

    <div class="card">
      <div class="icon">➕</div>
      <h2>Adicionar item</h2>
      <p>Clique no botão para adicionar um item à lista.</p>
    </div>

    <div class="card">
      <div class="icon">🗑️</div>
      <h2>Remover item</h2>
      <p>Use a lixeira para remover o produto em estoque.</p>
    </div>

    <div class="card">
      <div class="icon">➕ ➖</div>
      <h2>Definir quantidade</h2>
      <p>Use os botões de mais e menos para definir a quantidade.</p>
    </div>

    <div class="card">
      <div class="icon">💰</div>
      <h2>Definir preço</h2>
      <p>Clique no cifrão para colocar o preço no produto.</p>
    </div>

  </section>

  <section class="sobre" id="quem-somos">
    <div class="sobre-esquerda"></div>

    <div class="sobre-direita">
    <h2>Quem Somos</h2>

    <p>
      A Café Bem Bão nasceu do amor por café e boas experiências.
      Nosso propósito é oferecer produtos de qualidade em um ambiente acolhedor.
    </p>

    <p>
      Aqui, tradição e inovação se encontram para levar até você o melhor da cafeteria.
    </p>
      </div>
  </section>

  <footer>
    <p> (11) 98765-4321</p>
    <p> (11) 91234-5678</p>
    <p> contato@cafebembao.com</p>
    <p> Rua das Flores, 123 - São Paulo, SP</p>
  </footer>

          
    </div>
</body>
</html>
