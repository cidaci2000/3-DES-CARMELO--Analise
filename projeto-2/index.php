<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>staichoki moda</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
</head>

<body>
    <nav class="navbar">
        <div class="imagem">
            <img src="./img/STAI.png" class="logo">
        </div>
        <div class="navegacao">
            <input type="text" name="" id="" class="pesquisar" placeholder="Pesquisar...">
        </div>
        <div class="busca">
            
                <img class="carro" src="./img/carrinho.png">    
                <img class="Coração" src="./img/coracao-removebg-preview.png"> 
                <a href="login.php"><img class="usuario" src="img/usuario.png"></a>
           
        </div>
    </nav>

    <nav>
        <ul class="navbar1">
            <li><a href="vestidos.php">VESTIDOS</a></li>
            <li><a href="Conjuntos.php">CONJUNTOS</a></li>
            <li><a href="Acessórios.php">ACESSÓRIOS</a></li>
            <li><a href="shorts.php">SHORTS JEANS</a></li>
            <li><a href="calças.php">CALÇAS</a></li>
        </ul>
    </nav>

    <!-- slider em javascript -->
    <section>
        <div class="wrapper">
            <div class="slide-wrapper" data-slide="wrapper">
                <button class="slide-nav-button slide-nav-previous fas fa-chevron-left"
                    data-slide="nav-previous-button"></button>
                <button class="slide-nav-button slide-nav-next fas fa-chevron-right"
                    data-slide="nav-next-button"></button>
                <div class="slide-list" data-slide="list">
                    <div class="slide-item" data-slide="item" data-index="0">
                        <div class="slide-content">
                            <img class="slide-image" src="./imgens-carousel/1.jpg" alt="Assassin's Creed" />
                        </div>
                    </div>
                    <div class="slide-item" data-slide="item" data-index="0">
                        <div class="slide-content">
                            <img class="slide-image" src="./imgens-carousel/2.jpg" alt="Assassin's Creed" />
                        </div>
                    </div>
                    <div class="slide-item" data-slide="item" data-index="0">
                        <div class="slide-content">
                            <img class="slide-image" src="./imgens-carousel/3.jpg" alt="Assassin's Creed" />
                        </div>
                    </div>
                    <div class="slide-item" data-slide="item" data-index="0">
                        <div class="slide-content">
                            <img class="slide-image" src="./imgens-carousel/4.jpg" alt="Assassin's Creed" />
                        </div>
                    </div>
                </div>
                <div class="slide-controls" data-slide="controls-wrapper">
                </div>
            </div>
        </div>
    </section>
    <section>
    <script src="./assets/js/slides.js"></script>
    <script>
        initSlider({
            autoPlay: true,
            startAtIndex: 0,
            timeInterval: 2000
        })
    </script>
    <div  class="oi">
        <img class="carro" src="./img/caminhao-removebg-preview (1).png"> FRETE GRÁTIS*
        Acima de R$ 169,99    <img class="carro" src="./img/cartao-removebg-preview.png">ATÉ 10X SEM JUROS*
        Com cartão da Staichoki Moda Feminina<img class="carro" src="./img/porcentagem-removebg-preview.png">COMPRE NO SITE E RETIRE NA LOJA
        É rápido, grátis e fácil <img class="carro" src="./img/celular-removebg-preview (1).png">BAIXE O APP
        Ganhe 10% OFF
        Válido na 1ª Compra*
    </div>
    <div class="outraf">
        <img class="OUTRA" src="./img/STAICHOKI Moda Feminina.png">   
    </div>
    </section>
    <section>
        <div class="meio">
        <section class="produtos">
         <center><title9>Produtos em Destaque</title9></center>  
            <ul class="cards">
                <li class="card">
                    <img id="img" src="img/vestido1.jpeg" alt="Produto 1">
                    <h3>VESTIDO
                        PRAIANO</h3>
                    <p>R$150,00</p>
                </li>
               
             
        
            
          <li class="card">
                    <img id="img" src="img/vestido2.jpeg" alt="Produto 2">
                    <h3>VESTIDO 
                        LONGO</h3>
                    <p>R$120,00</p>
                </li>
                <li class="card">
                    <img id="img" src="img/vesstido3.jpeg" alt="Produto 3">
                    <h3>VESTIDO   
                     COM FENDA </h3>
                    <p>R$130,00</p>
                </li>
               
            </ul>
            <ul class="cards">
                <li class="card">
                    <img id="img" src="img/conjunto1.jpeg" alt="Produto 1">
                    <h3>CONJUNTO
                     PRETO E BRANCO  </h3>
                    <p>R$100,00</p>
                </li>
                <li class="card">
                    <img id="img" src="img/conjunto2.webp" alt="Produto 2">
                    <h3>CONJUNTO
                        BEGE</h3>
                    <p>R$180,00</p>
                </li>
                <li class="card">
                    <img id="img" src="img/conjunto3.jpg" alt="Produto 3">
                    <h3>CONJUNTO
                        BRANCO</h3>
                    <p>R$170,00</p>
                </li>
               
            </ul>
          
            <ul class="cards">
                <li class="card">
                    <img id="img" src="img/acessório1.jpg" alt="Produto 1">
                    <h3>ACESSÓRIOS
                        DOURADOS </h3>
                    <p>R$80,00</p>
                </li>
                <li class="card">
                    <img id="img" src="img/acessório2.jpeg" alt="Produto 2">
                    <h3>ACESSÓRIOS
                        PRATAS </h3>
                    <p>R$80,00</p>
                </li>
                <li class="card">
                    <img id="img" src="img/acessório3.jpg" alt="Produto 3">
                    <h3>COLAR
                        PRATA</h3>
                    <p>R$85,00</p>
                </li>
               
            </ul>
            <ul class="cards">
                <li class="card">
                    <img id="img" src="img/calçao1.webp" alt="Produto 1">
                    <h3>SHORTS
                        COM BOTÕES</h3>
                    <p>R$70,00</p>
                </li>
                <li class="card">
                    <img id="img" src="img/calçao2.jpeg" alt="Produto 2">
                    <h3>SHORTS
                        COM CINTO</h3>
                    <p>R$100,00</p>
                </li>
                <li class="card">
                    <img id="img" src="img/calçao3.jpeg" alt="Produto 3">
                    <h3>SHORTS
                        JEANS</h3>
                    <p>R$85,00</p>
                </li>
               
            </ul>
            <ul class="cards">
                <li class="card">
                    <img id="img" src="img/calça1.jpeg" alt="Produto 1">
                    <h3>CALÇA
                         DELICADA</h3>
                    <p>R$120,00</p>
                </li>
                <li class="card">
                    <img id="img" src="img/calça3.jpeg" alt="Produto 3">
                    <h3>CALÇA
                    DETALHADA </h3>
                    <p>R$100,00</p>
                </li>
                <li class="card">
                    <img id="img" src="img/ROSA.jpeg" alt="Produto 3">
                    <h3>CALÇA
                        COLORIDA </h3>
                    <p>R$100,00</p>
                </li>
               
            </ul>
          
        </div>
        <br>
        <div class="frase2">
            FIQUE POR DENTRO DAS NOVIDADES:
            <br>
            <img src="./img/PROMO.png" class="
">
         </div>
     
    
    <footer class="rodape">
       
        <div class="contatos">
            <p class="localizaçao">
                *Encontrar uma loja<a target="_blank"
                    href="https://www.google.com/maps/place/Cascavel+JL+Shopping/@-24.9506042,-53.4774242,19.5z/data=!4m6!3m5!1s0x94f3d6aa81b410bb:0xb8108885b00348ee!8m2!3d-24.9505948!4d-53.4769645!16s%2Fg%2F119vp4grx?entry=ttu ">CLICA
                    AQUI!</a>
            </p>

            <h2>
                Contato
            </h2>
            <p>
                <a href="https://wa.me/"> (45998614533)</a>
               
            </p>

            <h2>
                Whatsapp
            </h2>
            <p>
                <a href="https://wa.me/">(45999131764)</a>
              
               
            </p>

           <h2>
            Seg. à Sex. das 8h às 17h
            Exceto Feriados
           </h2>

        </div>
        <div class="sobre">
            <p>
              <a href="Sobre a loja/sobre.html"> Sobre a Staichoki Moda Feminina</a> 
            </p>
 
            <p>
                <a href=" Trabalhe Conosco.html">     Trabalhe Conosco</a> 
            </p>
           <p>
            <a href="Regras.html"> Código de Ética & Conduta</a> 
           </p>
           <p>
            <a href="fornecedores.html">  Novos Fornecedores</a> 
           </p>
        </div>

</footer>

</body>

</html>
