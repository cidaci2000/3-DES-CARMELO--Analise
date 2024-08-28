<?php
include_once('conexao.php');

// Verifica se houve um envio de formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Validação básica (adicione mais validações conforme necessário)
    if (empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Prepare a consulta SQL para evitar injeção
        $stmt = $conexao->prepare("SELECT * FROM cliente WHERE email=? AND senha=?");
        $stmt->bind_param("ss", $email, $senha); // Assumindo que email e senha são strings

        // Executa a consulta
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Verifica o tipo de usuário
                if ($row['tipo'] == 1) {
                    // Login válido para administrador, redireciona para adm.php
                    header("Location: administrador.php");
                } else {
                    // Login válido para outro tipo de usuário, redireciona para home
                    header("Location: vestidos.php");
                }
            } else {
                echo "Email ou senha inválidos.";
            }
        } else {
            // Trata erros na execução da consulta
            echo "Erro ao realizar a consulta: " . $stmt->error;
        }

        $stmt->close();
    }
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
      <h1> LOGIN!</h1>
      <form action="login.php" method="post">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email"  required>
        </div>
        <br>
        <div class="form-group">
          <label for="senha">Senha:</label>
          <input type="password" id="senha" name="senha" required>
        </div>
        <br>
        <h6>NAO TEM CADASTRO?</h6>
        <a href="cadastro.php"><button type="button">CLIQUE AQUI!</button> </a>
        
        <br>
        <br>
          <a href="URL"><button class="botao">ENVIAR</button></a>
      </form>
    </div>
  </div>
</html>