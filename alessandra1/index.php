<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sorveteria delicia</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        window.alert("Sejam Bem Vindos")


     </script>
    
</head>
<body background="3537419-icon-background-ice-cream-flat-design-vector-gratis-vetor.jpg"></body>
    <header>
        <h1>Sorveteria Delícia</h1>
        <nav>
            <ul>
                <li><a href="inicio.php">LOGIN</a></li>
                <li><a href="cliente.php">CADASTRO DO CLIENTE</a></li>
                <li><a href="contato.html">CONTATO</a></li>
                
                </ul>
        </nav>
    </header>
    <section class="sabores">
    <style>
     /* cards.css */

.card {
  /* Estilos para todos os cards */
  border: 1px solid #ccc;
  padding: 20px;
  margin: 10px;
  background-color: #f9f9f9;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
 
  
}

.card-header {
  /* Estilos para o cabeçalho do card */
  font-weight: bold;
  margin-bottom: 10px;
}

section {
  /* Estilos para a seção de conteúdo */
  display: flex;
  flex-wrap: wrap;
}

img {
  /* Estilos para a imagem */
  max-width: 100%;
  height: auto;
  margin-right: 10px;
}
.certo{
  display: grid;
  grid-template-columns: auto auto auto auto;
  margin-inline: center;
  flex-wrap: wrap;
}
    </style>
</head>
<body>
<div class="certo">
<?php
include_once('config.php');

// Preparando a query SQL para selecionar os dados
$sql = "SELECT id, nome, imagem, descricao, preco FROM sorvetes";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    // Saída dos dados de cada linha
    while($row = $result->fetch_assoc()) {
      
      echo "<div class='card'>";
      echo "<div class='card-header'>  " . $row["nome"] . "</div>";
      echo "<div class='p'> <img src='" . $row["imagem"] . "' alt='Imagem'><br>" . "</div>";
        
      
      echo "</div>";  
        
    }
} else {
    echo "0 resultados";
}



$conexao->close();

?>


</div>
        <!--Aqui você pode listar os sabores de sorvete disponíveis-->
    </section>


    </section>
    <footer>
    <p>&copy;2023 Sorveteria delicia.Todos os  direitos reservados.</p> 
    </footer>
   
</body>
</html>