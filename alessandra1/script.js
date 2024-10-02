document.addEventListener('DOMContentLoaded', function() {
    fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('product-container');
            data.forEach(product => {
                const card = document.createElement('div');
                card.className = 'product-card';
                card.innerHTML = `
                    <h2>${product.nome}</h2>
                    <p>${product.descricao}</p>
                    <button onclick="addToCart('${product.nome}', '${product.descricao}')">Adicionar ao Carrinho</button>
                `;
                container.appendChild(card);
            });
        });
});

function addToCart(product, description) {
    const table = document.getElementById('cart-table').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();

    const productCell = newRow.insertCell(0);
    const descriptionCell = newRow.insertCell(1);

    productCell.textContent = product;
    descriptionCell.textContent = description;
}
