<?php
if (isset($_POST['submit'])) 
    include_once("config.php");

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process registration form submission
if (isset($_POST['submit'])) {

    // Sanitize user input
    $cpf = sanitizeInput($_POST['cpf']);
    $telefone = sanitizeInput($_POST['telefone']);
    $email = sanitizeInput($_POST['email']);
    $cep = sanitizeInput($_POST['cep']);
    $senha = sanitizeInput($_POST['senha']);


    // Check if password meets minimum length requirement
    if (strlen($senha) < 8) {
        echo "<p class='error'>Senha deve ter no mínimo 8 caracteres!</p>";
        exit();
    }

    // Hash the password for security
    $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
    
    // Prepare and execute SQL query to insert user data
    $sql = "INSERT INTO clientes (cpf, telefone, email, cep, senha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('sssss', $cpf, $telefone, $email, $cep, $hashedPassword);

    if ($stmt->execute()) {
        echo "<p class='success'>Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p class='error'>Falha ao cadastrar usuário: " . $conexao->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="tela_login">
        <form action="criar_conta.php" method="post" class="formlogin">
            <div class="flex_login">
            <h1>Criar Conta</h1>
            <p>Digite seus dados para criar sua conta</p>
          
            <div class="formulario_input">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" placeholder="000.000.000-00" min="14" max="14" autofocus="true" required>
            <label for="tel">Telefone:</label>
            <input type="tel" name="telefone" placeholder="00 00000000" min="9" max="11" autocomplete="tel-national">
            </div>
           
            <div class="formulario_input">
            <label for="Email">E-mail:</label>
            <input type="text" name="email" placeholder="digite seu email" max="80">
            <label for="cep">Cep:</label>
            <input type="text" name="cep" placeholder="digite seu cep" min="9" max="9" required>
            </div>
          
            <div class="formulario_input">
            <label for="password">Senha:</label>
            <input type="password" name="senha" placeholder="crie uma senha" min="8" max="80" required>
            </div>
            <input type="submit" name="submit"></input>
            </div>
        </form>
    </div>
    </body>
</html>

?>