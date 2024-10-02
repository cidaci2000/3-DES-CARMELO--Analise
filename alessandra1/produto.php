<?php
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Função para upload de imagem (com tratamento de erros)
    function uploadImagem($imagem) {
        $target_dir = "imagem/";
        $target_file = $target_dir . basename($imagem["name"]);

        if (move_uploaded_file($imagem["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Erro ao fazer upload da imagem.";
            return null;
        }
    }

    // Recebendo os dados do formulário
    $nome = $_POST['nome'];
    $imagem = $_FILES["imagem"];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    
    

    // Upload da imagem
    $imagem_path = null;
    if (isset($imagem) && $imagem["error"] === 0) {
        $imagem_path = uploadImagem($imagem);
        if (!$imagem_path) {
            $erros[] = "Erro ao enviar a imagem.";
        }
    }

    // Verifica se o upload da imagem foi bem-sucedido
    if ($imagem_path) {
        // Preparando a query SQL com parâmetros para evitar injeção de SQL
        $stmt = $conexao->prepare("INSERT INTO sorvetes (nome, imagem, descricao, preco ) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $imagem_path, $descricao, $preco );

        // Executando a query
        if ($stmt->execute()) {
            echo "Novos registros inseridos com sucesso";
        } else {
            echo "Erro ao inserir registros: " . $stmt->error;
        }

        $stmt->close();
    }

    $conexao->close();
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
