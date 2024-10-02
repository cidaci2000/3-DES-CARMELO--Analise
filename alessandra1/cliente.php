<?php
// Conexão com o banco de dados (substitua com seus dados)
include_once ('config.php');



// Verificando a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error); 

}

// Recebendo dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado']; 


    // Preparando e executando a query SQL
    $sql = "INSERT INTO clientes (nome, email, senha, telefone, endereco, cidade, estado) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssssss", $nome, $email, $senha, $telefone, $endereco, $cidade, $estado);

    if ($stmt->execute()) {
        echo "Cliente cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar cliente: " . $stmt->error;
    }

    $stmt->close();
}

$conexao->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastro de Cliente</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background: url(imagem.jpg);
            background-size: 600px;
             background-repeat: no-repeat;
             background-position-x: center;
        }
        h1{
            text-align: center;
        }
        header{
            background-color: palevioletred;
             padding: 10px 0;
            text-align: center;
            }
        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #45e05f;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #435dd1;
        }
        header{
    background-color: palevioletred;
    padding: 10px 0;
    text-align: center;
    }

    nav ul{
    list-style: none;

    }

        nav ul li{
    display: inline;
    margin-right: 20px;
    }
    nav ul li a{
    text-decoration: none;
    color: #151414;
    font-weight: bold;
    }

    </style>
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
    <h1>Cadastro de Cliente</h1>

    <form action="cliente.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" required>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="" disabled selected>Selecione o estado</option>
            <!-- Inserir opções de estados aqui -->
            <option value="PR">Paraná</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="MG">Minas Gerais</option>
        </select>

        <input type="submit" value="Cadastrar">
    </form>
    
</body>
</html>


