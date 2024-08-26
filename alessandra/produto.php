<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validação dos dados (exemplo básico)
    $nome = htmlspecialchars($_POST['nome']);
    $descricao = htmlspecialchars($_POST['descricao']);
    $preco = floatval($_POST['preco']);
 

    // Upload da imagem (implementar validação e segurança)
    $target_dir = "uploads/";
    $target_file = $target_dir . uniqid() . "_" . basename($_FILES["imagem"]["name"]);
    move_uploaded_file($_FILES["imagem"]["name"], $target_file);
    
    // Inserir os dados no banco de dados (exemplo básico)
    $sql = "INSERT INTO sorvetes (nome, imagem, descricao, preco) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $nome, $target_file, $descricao, $preco);
    if ($stmt->execute()) {
        echo "Sorvete cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar sorvete: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produto.css">
    <title>Cadastro de Sorvetes</title>
</head>
<body>
    <section>
        <h1>Cadastro de Sorvetes</h1>
        <form action="produto.php" method="post" enctype="multipart/form-data">
            <label for="nome">Nome do Sorvete:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="imagem">Imagem do Sorvete:</label>
            <input type="file" id="imagem" name="imagem" accept="imagem/*">

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao"></textarea>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" required>

            <input type="submit" value="Cadastrar">
        </form>
    </section>
    <h1> <a href="adm.php"><button>PÁGINA DE ADMINISTRADOR</button></a> </h1>
</body>
</html>
