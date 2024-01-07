// Een keymap van alle toegestane toetsen
var allowedKeys = {
    37: 'left',
    38: 'up',
    39: 'right',
    40: 'down',
    65: 'a',
    66: 'b'
};

// De Konami Code sequence
var konamiCode = ['up', 'up', 'down', 'down', 'left', 'right', 'left', 'right', 'b', 'a'];

// Variabele om te herrineren, hoe ver de gebruiker is met de sequence
var konamiCodePosition = 0;

// keydown event listener toegevoegd
document.addEventListener('keydown', function(e) {
    // derde van de key code opvragen van de key map
    var key = allowedKeys[e.keyCode];
    // De waarde van de required key van de Konami code opvragen
    var requiredKey = konamiCode[konamiCodePosition];

    // vergelijk de key met de required key
    if (key == requiredKey) {

        // ga verder naar de volgende key in de Konami Code
        konamiCodePosition++;

        // Als de laatste key is bereikt, activeer de cheats
        if (konamiCodePosition == konamiCode.length) {
            activateCheats();
            konamiCodePosition = 0;
        }
    } else {
        konamiCodePosition = 0;
    }
});

function activateCheats() {

    var audio = new Audio('../image/xbox.mp3');
    audio.play();

    alert("Hidden achievement unlocked: The Konami Code");
}