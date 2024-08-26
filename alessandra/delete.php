<?php
include_once('config.php');

if (!empty($_GET['email'])) {
    $email = mysqli_real_escape_string($conexao, $_GET['email']);

    // Prepare the SELECT query
    $sqlSelect = "SELECT * FROM clientes WHERE email=?";
    $stmtSelect = $conexao->prepare($sqlSelect);
    $stmtSelect->bind_param("s", $email);

    // Execute the SELECT query
    if ($stmtSelect->execute()) {
        $result = $stmtSelect->get_result();

        if ($result->num_rows > 0) {
            // Prepare the DELETE query
            $sqlDelete = "DELETE FROM clientes WHERE email=?";
            $stmtDelete = $conexao->prepare($sqlDelete);
            $stmtDelete->bind_param("s", $email);

            // Execute the DELETE query
            if ($stmtDelete->execute()) {
                echo "Cliente deletado com sucesso!";
            } else {
                echo "Erro ao deletar cliente: " . $stmtDelete->error;
            }
        } else {
            echo "Cliente não encontrado.";
        }
    } else {
        echo "Erro ao executar a consulta SELECT: " . $stmtSelect->error;
    }

    // Close statements
    $stmtSelect->close();
    $stmtDelete->close();
}

header('Location: listacliente.php');