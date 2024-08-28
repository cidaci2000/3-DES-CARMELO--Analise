<?php
include_once('conexao.php');

// Verifica se o parâmetro 'email' foi enviado via GET
if (isset($_GET['email'])) {
    // Sanitiza o email para evitar injeção de SQL
    $email = mysqli_real_escape_string($conexao, $_GET['email']);

    // Prepara a consulta SQL utilizando prepared statements
    $sql = "SELECT * FROM cliente WHERE email=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);

    // Executa a consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Obtém os dados do usuário
            $user_data = $result->fetch_assoc();

            // Atribui os valores aos campos do formulário
            $nome = $user_data['nomecliente'];
            $email = $user_data['email'];
            // ... outros campos ...
        } else {
            echo "Usuário não encontrado.";
            exit;
        }
    } else {
        echo "Erro ao executar a consulta: " . $stmt->error;
        exit;
    }

    // Fecha o statement
    $stmt->close();
} else {
    header('Location: ListaCliente.php');
    exit;
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
        <h1> EDIÇÃO DE FORMULÁRIO</h1>
        <form action="saveEdit.php" method="post" novalidate>
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
    <label for="tipo">Tipo:</label>
    <select id="tipo" name="tipo" required>
        <option value="" disabled selected>Selecione o tipo</option>
        <option value="0">0</option>
        <option value="1">1</option>
    </select>
    <br>
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="submit" name="update" id="submit">
</form>
    </div>
  </div>
</html>