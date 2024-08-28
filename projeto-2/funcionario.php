<?php
 include("conexao.php");

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $endereco = $_POST['endereco'];
        $telefone= $_POST['telefone'];
        $celular= $_POST['celular'];
        $email= $_POST['email'];
        $senha= $_POST['senha'];
      


        $sql = "INSERT INTO funcionario(nome,cpf,endereco,telefone,celular,email,senha) 
        VALUES('$nome','$cpf','$endereco','$telefone','$celular','$email','$senha')";
    
if(mysqli_query($conexao, $sql)){
    echo "Usuario cadastrado com sucesso";
}
else{
    echo "Erro".mysqli_connect_error($conexao);
}
    mysqli_close($conexao);
?>




<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="fornecedores.css">
            <title>Funcionarios</title>
  
        </div>
 
        </head>
<body>
    <h5> FUNCIONARIOS:  </h5>
       <H6>A nossa marca está em constante crescimento e sempre busca novos funcionarios.
        <br>
         Trabalhamos com produtos femininos,roupas e acessórios. Quer ser nosso parceiro? Nos apresente o seu trabalho.
        </H6> 
    <div class="formulario">
        <div class="caixa">
      <h3> Dados Pessoais:</h3>
        <form action="funcionario.php" method="post">    
  
            <div class="Nome">
              <label for="name">Nome:</label>
              <input type="text" id="name" name="nome">
            </div>
            <br>
            <div  class="Cargo">
                <label for="Cargo">Cargo:</label>
                <input type="text" id="Cargo" name="cargo">
              </div>
              <br>
            
              <a href="URL"><button class="botao">ENVIAR</button></a>

          </form>
        </div>
      </div>

      <div class="formulario">
        <div class="caixa2">
      <h4> DADOS DA EMPRESA:</h4>
        <form action="funcionario.php" method="post">    
  
            <div class="Nome">
              <label for="name">nome:</label>
              <input type="text" id="name" name="nome">
            </div>
            <br>
            <div  class="cpf">
                <label for="cpf">cpf:(Inserir apenas números)</label>
                <input type="text" id="cpf"  name="cpf">
              </div>
              <br>
              <div  class="Endereco">
                <label for="Endereco">Endereco:</label>
                <input type="text" id="Endereco"  name="Endereco">
              </div>
              <br>
              <div  class="telefone">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone"  name="telefone">
              </div>
              <br>
              <div  class="celular">
                <label for="celular">celular:</label>
                <input type="text" id="celular"  name="celular">
              </div>
              <br>
              <div  class="email">
                <label for="email">email:</label>
                <input type="text" id="email"  name="email">
              </div>
              <br>
              <div  class="senha">
                <label for="senha">senha:</label>
                <input type="text" id="senha"  name="senha">
              </div>
              <br>
            
            
              <a href="URL"><button class="botao" type="submit">ENVIAR</button></a>

          </form>
        </div>
      </div>


    </body>
</html>