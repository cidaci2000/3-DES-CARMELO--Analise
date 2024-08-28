<?php
// Inclui o arquivo de configuração
include_once('conexao.php');

// Verifica se o formulário foi enviado
if (isset($_POST['update'])) {
    // Sanitiza os dados do formulário para evitar injeção de SQL
    $nome = mysqli_real_escape_string($conexao, $_POST['nomecliente']);
    $email = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $senha = mysqli_real_escape_string($conexao, $_POST['endereco']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['celular']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['email']);
    $estado = mysqli_real_escape_string($conexao, $_POST['senha']);
    $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);

    // Prepara a consulta SQL utilizando prepared statements
   
    //
    $sqlUpdate = "UPDATE cliente SET nomecliente=?, cpf=?, endereco=?, telefone=?, celular=?, email=?, senha=?, tipo=? 
    WHERE email=?";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bind_param("sssssssss", $nomecliente, $cpf, $endereco, $telefone, $celular, $email, $senha, $tipo, $email);



    // Executa a consulta
    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados: " . $stmt->error;
    }

    // Fecha o statement
    $stmt->close();
}

// Redireciona para a lista de clientes
header('Location: ListaCliente.php');
?>