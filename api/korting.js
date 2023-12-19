function moveText() {
    var textElement = document.querySelector('.moveable-text');

    // Generate random position
    var randomX = Math.floor(Math.random() * window.innerWidth);
    var randomY = Math.floor(Math.random() * window.innerHeight);

    // Apply the new position
    textElement.style.left = randomX + 'px';
    textElement.style.top = randomY + 'px';
}
