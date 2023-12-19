const price = document.querySelector('.yea');

const evenListener = price.addEventListener("mouseover", moveText)

function moveText() {
    // Generate random position
    var randomX = Math.floor(Math.random() * (window.innerWidth / 2));
    var randomY = Math.floor(Math.random() * (window.innerHeight / 2));

    // Apply the new position
    price.style.left = randomX + 'px';
    price.style.top = randomY + 'px';
}

setTimeout(() => {
    price.removeEventListener("mouseover", moveText)
}, 15000);