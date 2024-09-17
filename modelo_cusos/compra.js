
document.querySelector('.compra').addEventListener('click', function(event) {
    event.preventDefault();
    const url = "compra.html";
    // Lógica adicional pode ser adicionada aqui, se necessário
    window.open(url, '_blank', 'noopener,noreferrer');
});
