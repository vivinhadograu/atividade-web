<?php

$conexao = new PDO("mysql:host=localhost;dbname=meubanco", "root", "");

$usuarios = $conexao->query("SELECT * FROM usuario;");

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link rel="stylesheet" href="./estilo.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@300&display=swap" rel="stylesheet">
  </head>

  <body>
    <header>
      <h1>Lista de Usuários</h1>
    </header>

    <main>
      <?php
        if ($usuarios != NULL) {
          ?>

          <table>
            <thead>
              <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Usuario</th>
                <th>E-mail</th>
              </tr>
            </thead>
            <tbody>
              <?php

                while ($linha = $usuarios->fetch(PDO::FETCH_ASSOC)) {
                  ?>

                  <tr>
                    <td><?php echo $linha["id"] ?></td>
                    <td><?php echo $linha["nome"] ?></td>
                    <td><?php echo $linha["usuario"] ?></td>
                    <td><?php echo $linha["email"] ?></td>
                  </tr>

                  <?php
                }

              ?>
            </tbody>
          </table>

          <?php
        }
        else {
          ?>

          <p>Não tem usuário nenhum cadastrado.</p>

          <?php
        }
      ?>
    </main>
  </body>
</html>