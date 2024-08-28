<?php
 include("conexao.php");
 
 // Verifica se o formulário foi enviado
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Coleta os dados do formulário
   $nomeCliente = $_POST["nomecliente"];
   $cpf = $_POST["cpf"];
   $endereco = $_POST["endereco"];
   $telefone = $_POST["telefone"];
   $celular = $_POST["celular"];
   $email = $_POST["email"];
   $senha = $_POST["senha"];
 
   // Validação dos dados (Exemplo básico)
   if (empty($nomeCliente) || empty($cpf) || empty($endereco) || empty($celular) || empty($email) || empty($senha)) {
     echo "Por favor, preencha todos os campos obrigatórios.";
   }
 
     // Prepara e executa a consulta   
     
      $sql = "INSERT INTO cliente (nomecliente, cpf, endereco, telefone, celular, email, senha) VALUES ('$nomeCliente', '$cpf', '$endereco', '$telefone', '$celular', '$email', '$senha')";
 
     if ($conexao->query($sql) === TRUE) {
       echo "Novo registro criado com sucesso";
     } else {
       echo "Erro ao criar registro: " . $conexao->error;
     }
 
     $conexao->close();
   }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
    <link rel="stylesheet" href="estilo.css">
   
<body>
  
  <div class="formulario">
    <div class="caixa">
  <h1> CADASTRE-SE!</h1>
  <form action="cadastro.php" method="post" novalidate>
    <div class="nomecliente">
        <label for="nomecliente">Nome do cliente:</label>
        <input type="text" id="nomecliente" name="nomecliente" required>
    </div>
    <br>
    <div class="cpf">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required pattern="\d{11}">
    </div>
    <br>
    <div class="endereco">
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>
    </div>
    <br>
    <div class="telefone">
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" pattern="\(\d{2}\)\s\d{4}-\d{4}">
    </div>
    <br>
    <div class="celular">
        <label for="celular">Celular:</label>
        <input type="text" id="celular" name="celular" required pattern="\(\d{2}\)\s\d{5}-\d{4}">
    </div>
    <br>
    <div class="email">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <br>
    <div class="senha">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
    </div>
    <br>
    <button type="submit" 
 class="botao">ENVIAR</button>
</form>
    </div>
  </div>
</html>