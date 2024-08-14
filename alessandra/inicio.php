<?php
include_once('config.php');

// Verifica se houve um envio de formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recebe os dados do formulário
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  // Validação básica (adicione mais validações conforme necessário)
  if (empty($email) || empty($senha)) {
    echo "Por favor, preencha todos os campos.";
  } else {
    // Consulta ao banco de dados (ajuste a consulta para sua estrutura)
    $sql = "SELECT * FROM clientes WHERE email='$email' AND senha='$senha'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
      // Login válido, redireciona para a página adm.php
      header("Location: adm.php");
    } else {
      echo "Email ou senha inválidos.";
    }
  }
}

// Formulário HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="inicio.css">
  <title>Login</title>
</head>

<body>
<header>
        <h1>Sorveteria Delícia</h1>
        <nav>
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="cardapio.html">CARDÁPIO</a></li>
                <li><a href="contato.html">CONTATO</a></li>
                
              </ul>
        </nav>
    </header>
<h2>LOGIN</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Email: <input type="email" name="email" required>
    Senha: <input type="password" name="senha" required>
    <button type="submit">Entrar</button>
  </form>
</body>
</html>

