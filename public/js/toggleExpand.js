function toggleExpand(index) {
    const card = document.querySelectorAll('.product-card')[index];
    const btnText = document.getElementById(`btn-text-${index}`);
    
    card.classList.toggle('expanded');
    
    if(card.classList.contains('expanded')) {
        btnText.textContent = 'Ver menos detalles';
    } else {
        btnText.textContent = 'Ver más detalles';
    }
}