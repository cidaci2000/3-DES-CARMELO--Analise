<?php

// Função para validação de campos
function validarCampo($campo) {
  return !empty($campo) && trim($campo) != "";
}

// Função para converter preço para float
function converterParaFloat($preco) {
  return floatval(str_replace(",", ".", $preco));
}

// Função para upload de imagem
function uploadImagem($imagem) {
  $target_dir = "img/";
  $target_file = $target_dir . basename($imagem["name"]);

  if (!move_uploaded_file($imagem["tmp_name"], $target_file)) {
    return null;
  }

  return $target_file;
}

// Conexão com o banco de dados
$conn = new PDO('mysql:host=localhost;dbname=staichoki', 'root', '');

// Verificação de envio do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Dados do formulário
 
  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $preco = converterParaFloat($_POST["preco"]);
  $categoria = $_POST["categoria"];
  $estoque = $_POST["estoque"];
  $imagem = $_FILES["img"];

  // Validação de campos
  $erros = [];
  
  if (!validarCampo($nome)) {
    $erros[] = "O campo nome é obrigatório.";
  }
  if (!validarCampo($descricao)) {
    $erros[] = "O campo descrição é obrigatório.";
  }
  if (!validarCampo($preco)) {
    $erros[] = "O campo preço é obrigatório e deve ser um número válido.";
  }
  if (!validarCampo($categoria)) {
    $erros[] = "O campo categoria é obrigatório.";
  }
  if (!validarCampo($estoque)) {
    $erros[] = "O campo estoque é obrigatório.";
  }

  if (!is_numeric($preco)) {
    $erros[] = "O campo preço deve ser um número válido.";
  }

  // Upload da imagem
  $imagem_path = null;
  if (isset($imagem) && $imagem["error"] === 0) {
    $imagem_path = uploadImagem($imagem);
    if (!$imagem_path) {
      $erros[] = "Erro ao enviar a imagem.";
    }
  }

  // Se não houver erros, cadastra o produto
  if (empty($erros)) {
    $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, categoria, estoque, imagem) VALUES 
    (:nome, :descricao, :preco, :categoria, :estoque, :imagem)");
    
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':estoque', $estoque);
    $stmt->bindParam(':imagem', $imagem_path);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      echo "<p>Produto cadastrado com sucesso!</p>";
    } else {
      echo "<p>Erro ao cadastrar o produto.</p>";
    }
  } else {
    // Exibe os erros
    echo "<ul>";
    foreach ($erros as $erro) {
      echo "<li>$erro</li>";
    }
    echo "</ul>";
  }
}

// Fecha a conexão com o banco de dados
$conn = null;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
  <title>Cadastro de Produto</title>
</head>
<body>
  <h1>Cadastro de Produto</h1>
  
     <h1> <button><a href="administrador.php">Administrador</a></button></h1>
    
      
  
  <div class="caixa">
    <form action="produto.php" method="post" enctype="multipart/form-data">

      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" required>
      <br>
      <label for="descricao">Descrição:</label>
      <textarea name="descricao" id="descricao" required></textarea>
      <br>
      <label for="preco">Preço:</label>
      <input type="text" name="preco" id="preco" required>
      <br>
      <label for="categoria">Categoria:</label>
      <select name="categoria" id="categoria" required>
        <option value="">Selecione...</option>
        <option value="1">Infantil</option>
        <option value="2">Masculino</option>
        <option value="3">Feminino</option>
        <option value="4">Outros</option>
      </select>
      <br>
      <label for="estoque">Estoque:</label>
      <input type="number" name="estoque" id="estoque" required>
      <br>
      <label for="img">Imagem:</label>
      <input type="file" name="img" id="img" accept="image/*">
      <br>
      <button type="submit">Enviar</button>

    </form>
  </div>
</body>
</html>
