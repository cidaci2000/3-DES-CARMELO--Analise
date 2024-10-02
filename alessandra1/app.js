// Variável que controla se o carrinho está visível
var carrinhoVisible = false;

// Espera que todos os elementos estejam carregados antes de executar o script
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', ready);
} else {
  ready();
}

function ready() {
  // Adiciona funcionalidade aos botões de remover item do carrinho
  var botoesEliminarItem = document.getElementsByClassName('btn-eliminar');
  for (var i = 0; i < botoesEliminarItem.length; i++) {
    var button = botoesEliminarItem[i];
    button.addEventListener('click', eliminarItemCarrito);
  }

  // Adiciona funcionalidade aos botões de somar quantidade
  var botoesSumarCantidad = document.getElementsByClassName('sumar-cantidad');
  for (var i = 0; i < botoesSumarCantidad.length; i++) {
    var button = botoesSumarCantidad[i];
    button.addEventListener('click', sumarCantidad);
  }

  // Adiciona funcionalidade aos botões de subtrair quantidade
  var botoesRestarCantidad = document.getElementsByClassName('restar-cantidad');
  for (var i = 0; i < botoesRestarCantidad.length; i++) {
    var button = botoesRestarCantidad[i];
    button.addEventListener('click', restarCantidad);
  }

  // Adiciona funcionalidade aos botões de adicionar ao carrinho
  var botoesAgregarAlCarrito = document.getElementsByClassName('boton-item');
  for (var i = 0; i < botoesAgregarAlCarrito.length; i++) {
    var button = botoesAgregarAlCarrito[i];
    button.addEventListener('click', agregarAlCarritoClicked);
  }

  // Adiciona funcionalidade ao botão de pagar
  document.getElementsByClassName('btn-pagar')[0].addEventListener('click', pagarClicked);
}

// Elimina todos os itens do carrinho e o esconde
function pagarClicked() {
  alert("Obrigado! Boa compra.");

  // Remove todos os itens do carrinho
  var carritoItems = document.getElementsByClassName('carrito-items')[0];
  while (carritoItems.hasChildNodes()) {
    carritoItems.removeChild(carritoItems.firstChild);
  }

  actualizarTotalCarrito();
  ocultarCarrito();
}

// Mostra os itens no carrinho
function agregarAlCarritoClicked(event) {
  var button = event.target;
  var item = button.parentElement;
  var titulo = item.getElementsByClassName('titulo-item')[0].innerText;
  var precio = item.getElementsByClassName('precio-item')[0].innerText;
  var imagenSrc = item.getElementsByClassName('img-item')[0].src;

  agregarItemAlCarrito(titulo, precio, imagenSrc);
  hacerVisibleCarrito();
}

// Mostra o carrinho
function hacerVisibleCarrito() {
  carrinhoVisible = true;
  var carrito = document.getElementsByClassName('carrito')[0];
  carrito.style.marginRight = '0';
  carrito.style.opacity = '1';

  var items = document.getElementsByClassName('contenedor-items')[0];
  items.style.width = '60%';
}

// Adiciona um item ao carrinho
function agregarItemAlCarrito(titulo, precio, imagenSrc) {
  var item = document.createElement('div');
  item.classList.add('item');
  var itemsCarrito = document.getElementsByClassName('carrito-items')[0];

  // Controla itens duplicados no carrinho
  var nombresItemsCarrito = itemsCarrito.getElementsByClassName('carrito-item-titulo');
  for (var i = 0; i < nombresItemsCarrito.length; i++) {
    if (nombresItemsCarrito[i].innerText === titulo) {
      alert('Esse item já está no carrinho');
      return;
    }
  }

    var itemCarritoContenido = `
        <div class="carrito-item">
            <img src="${imagenSrc}" width="80px" alt="">
            <div class="carrito-item-detalles">
                <span class="carrito-item-titulo">${titulo}</span>
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad"></i>
                    <input type="text" value="1" class="carrito-item-cantidad" disabled>
                    <i class="fa-solid fa-plus sumar-cantidad"></i>
                </div>
                <span class="carrito-item-precio">${precio}</span>
            </div>
            <button class="btn-eliminar">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    `
    item.innerHTML = itemCarritoContenido;
    itemsCarrito.append(item);

    //agrega e elimina um novo item
     item.getElementsByClassName('btn-eliminar')[0].addEventListener('click', eliminarItemCarrito);

    //Resta um item no carrinho
    var botonRestarCantidad = item.getElementsByClassName('restar-cantidad')[0];
    botonRestarCantidad.addEventListener('click',restarCantidad);

    //Soma novo item no carrinho
    var botonSumarCantidad = item.getElementsByClassName('sumar-cantidad')[0];
    botonSumarCantidad.addEventListener('click',sumarCantidad);

    //atualiza total
    actualizarTotalCarrito();
}
//Aumenta itens no carrinho
function sumarCantidad(event){
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    console.log(selector.getElementsByClassName('carrito-item-cantidad')[0].value);
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    cantidadActual++;
    selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
    actualizarTotalCarrito();
}
//Resto de um elemento selecionado
function restarCantidad(event){
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    console.log(selector.getElementsByClassName('carrito-item-cantidad')[0].value);
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    cantidadActual--;
    if(cantidadActual>=1){
        selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
        actualizarTotalCarrito();
    }
}

//Elimina o item no carrinho
function eliminarItemCarrito(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    //Atualisa o total do carrinho
    actualizarTotalCarrito();

    //controla se tem elementos no carrinho
    //se o carrinho foi eliminado
    ocultarCarrito();
}
//Função culta carrinho
function ocultarCarrito(){
    var carritoItems = document.getElementsByClassName('carrito-items')[0];
    if(carritoItems.childElementCount==0){
        var carrito = document.getElementsByClassName('carrito')[0];
        carrito.style.marginRight = '-100%';
        carrito.style.opacity = '0';
        carritoVisible = false;
    
        var items =document.getElementsByClassName('contenedor-items')[0];
        items.style.width = '100%';
    }
}
//Atualiza o total de Carrinho
function actualizarTotalCarrito(){
    //seleciona o item no carrinho
    var carritoContenedor = document.getElementsByClassName('carrito')[0];
    var carritoItems = carritoContenedor.getElementsByClassName('carrito-item');
    var total = 0;
    //soma os item e atualiza o total
    for(var i=0; i< carritoItems.length;i++){
        var item = carritoItems[i];
        var precioElemento = item.getElementsByClassName('carrito-item-precio')[0];
        //usa a variavel real e totaliza
        var precio = parseFloat(precioElemento.innerText.replace('R$','').replace('.',''));
        var cantidadItem = item.getElementsByClassName('carrito-item-cantidad')[0];
        console.log(precio);
        var cantidad = cantidadItem.value;
        total = total + (precio * cantidad);
    }
    total = Math.round(total * 100)/100;

    document.getElementsByClassName('carrito-precio-total')[0].innerText = 'R$'+total.toLocaleString("es") + ",00";

}














