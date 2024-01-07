function getRandomNumber(int,maxNumber){
    if (int === 0){
        return Math.floor(Math.random() * maxNumber);
    }else {
        return int +2;
    }
}

let number = 0;
let aantalKerenNee = 0;

function neeOnClick(){
    let webHelperTekst = document.getElementById("web-helper-span");
    number = getRandomNumber(number,10);

    if (number <= 6){
        if (aantalKerenNee === 0){
            aantalKerenNee++;
            console.log("nummer:"+number);
            console.log("aantal keren nee:"+aantalKerenNee);
            return webHelperTekst.textContent = "Weet u zeker dat u mij niet nodig heeft?"
        }else if (aantalKerenNee === 1){
            aantalKerenNee++;
            console.log("nummer:"+number);
            console.log("aantal keren nee:"+aantalKerenNee);

            return webHelperTekst.textContent = "U gaat mij zeker wel nodig hebben."
        }else if (aantalKerenNee === 2){
            aantalKerenNee++;
            console.log("nummer:"+number);
            console.log("aantal keren nee:"+aantalKerenNee);

            return webHelperTekst.textContent = "Alsjeblieft mijn maker heeft veel tijd in me gespendeerd"
        }
    }else {
        document.getElementById("web-helper-picture").src="/image/emojis/guess-ill-die.gif";
        console.log("afsluiten");
        console.log(number);
        document.getElementById("web-helper-outer").style.display = "none";
        document.getElementById("web-helper-shrink-container").style.display = "inline"

        return webHelperTekst.textContent = "I guess i'll die";
    }
}

function jaOnClick(){
    document.getElementById("web-helper-button-ja").style.display = "none";
    document.getElementById("web-helper-button-nee").style.display = "none";
    document.getElementById("web-helper-optie").style.display = "none";
    document.getElementById("web-helper-button-product-zoeken").style.display = "inline";
    document.getElementById("web-helper-span").textContent = "Waarmee kan ik u helpen?"
    document.getElementById("web-helper-picture").src="/image/emojis/Confused-emoji.jpg";

    sessionStorage.setItem("nerdyBroActief","TRUE");
    document.cookie = "nerdyBroActief= TRUE;"
    return console.log("ja");

}

function productZoekenOnClick(){
    document.getElementById("web-helper-button-product-zoeken").style.display = "none";

    document.getElementById("web-helper-span").textContent = "Welke product zoekt u?"

    document.getElementById("web-helper-laptops-buttons").style.display = "inline";
    document.getElementById("web-helper-phones-buttons").style.display = "inline";
    document.getElementById("web-helper-opslag-buttons").style.display = "inline";
    document.getElementById("web-helper-routers-buttons").style.display = "inline";
    document.getElementById("web-helper-components-buttons").style.display = "inline";
    document.getElementById("web-helper-desktops-buttons").style.display = "inline";
    document.getElementById("web-helper-category-terug-button").style.display = "inline";
}

function clearList(){
    let laptops = document.getElementsByClassName("laptops");
    let phones = document.getElementsByClassName("phones");
    let opslag = document.getElementsByClassName("opslag");
    let routers = document.getElementsByClassName("routers");
    let componenten = document.getElementsByClassName("componenten");
    let desktops = document.getElementsByClassName("desktops");

    for (let i = 0; i < laptops.length; i++) {
        laptops[i].style.display = "none";
    }
    for (let i = 0; i < phones.length; i++) {
        phones[i].style.display = "none";
    }
    for (let i = 0; i < opslag.length; i++) {
        opslag[i].style.display = "none";
    }
    for (let i = 0; i < routers.length; i++) {
        routers[i].style.display = "none";
    }
    for (let i = 0; i < componenten.length; i++) {
        componenten[i].style.display = "none";
    }
    for (let i = 0; i < componenten.length; i++) {
        componenten[i].style.display = "none";
    }
    for (let i = 0; i < componenten.length; i++) {
        componenten[i].style.display = "none";
    }

}

let aantalKerenLaptops = false;
let aantalKerenPhones = false;
let aantalKerenOpslag = false;
let aantalKerenRouters = false;
let aantalKerenComponenten = false;
let aantalKerenDesktops = false;

function showLaptopsOnClick(){
    let laptops = document.getElementsByClassName("laptops");
    clearList();

    if (aantalKerenLaptops === false){
        document.getElementById("web-helper-span").textContent = "Weet je zeker dat je dit zoekt?";
        aantalKerenLaptops = true;
        document.getElementById("web-helper-picture").src="/image/emojis/thunk-emoji.png";

    }else if (aantalKerenLaptops === true){
        console.log("printtttt")
        document.getElementById("web-helper-zoek-producten-container").style.display = "inline";
        for (let i = 0; i < laptops.length; i++) {
            laptops[i].style.display = "inline";
        }
    }
}
function showPhonesOnClick(){
    let phones = document.getElementsByClassName("phones");
    clearList();

    if (aantalKerenPhones === false){
        document.getElementById("web-helper-span").textContent = "Weet je zeker dat je dit zoekt?";
        aantalKerenPhones = true;
        document.getElementById("web-helper-picture").src="/image/emojis/thunk-emoji.png";

    }else if ( aantalKerenPhones=== true){
        document.getElementById("web-helper-zoek-producten-container").style.display = "inline";
        for (let i = 0; i < phones.length; i++) {
            phones[i].style.display = "inline";
        }
    }
}
function showOpslagOnClick(){
    let opslag = document.getElementsByClassName("opslag");
    clearList();

    if ( aantalKerenOpslag=== false){
        document.getElementById("web-helper-span").textContent = "Weet je zeker dat je dit zoekt?";
        aantalKerenOpslag = true;
        document.getElementById("web-helper-picture").src="/image/emojis/thunk-emoji.png";
    }else if ( aantalKerenOpslag=== true){
        document.getElementById("web-helper-zoek-producten-container").style.display = "inline";

        for (let i = 0; i < opslag.length; i++) {
            opslag[i].style.display = "inline";
        }
    }
}
function showRoutersOnClick(){
    let routers = document.getElementsByClassName("routers");
    clearList();

    if ( aantalKerenRouters=== false){
        document.getElementById("web-helper-span").textContent = "Weet je zeker dat je dit zoekt?";
        aantalKerenRouters = true;
        document.getElementById("web-helper-picture").src="/image/emojis/thunk-emoji.png";

    }else if ( aantalKerenRouters=== true){
        document.getElementById("web-helper-zoek-producten-container").style.display = "inline";
        for (let i = 0; i < routers.length; i++) {
            routers[i].style.display = "inline";
        }
    }
}
function showComponentenOnClick(){
    let componenten = document.getElementsByClassName("componenten");
    clearList();

    if (aantalKerenComponenten === false){
        document.getElementById("web-helper-span").textContent = "Weet je zeker dat je dit zoekt?";
        aantalKerenComponenten = true;
        document.getElementById("web-helper-picture").src="/image/emojis/thunk-emoji.png";

    }else if (aantalKerenComponenten === true){
        document.getElementById("web-helper-zoek-producten-container").style.display = "inline";
        for (let i = 0; i < componenten.length; i++) {
            componenten[i].style.display = "inline";
        }
    }
}

function showDesktopsOnClick(){
    let desktops = document.getElementsByClassName("desktops");
    clearList();

    if (aantalKerenDesktops === false){
        document.getElementById("web-helper-span").textContent = "Weet je zeker dat je dit zoekt?";
        aantalKerenDesktops = true;
        document.getElementById("web-helper-picture").src="/image/emojis/thunk-emoji.png";

    }else if (aantalKerenDesktops === true){
        document.getElementById("web-helper-zoek-producten-container").style.display = "inline";
        for (let i = 0; i < desktops.length; i++) {
            desktops[i].style.display = "inline";
        }
    }
}

function closeWebHelperOnClick(){
    document.getElementById("web-helper-outer").style.display = "none";
    document.getElementById("web-helper-shrink-container").style.display = "inline"
    document.getElementById("web-helper-zoek-producten-container").style.display = "none";
}

function showWebHelperOnClick(){
    document.getElementById("web-helper-outer").style.display = "inline";
    document.getElementById("web-helper-shrink-container").style.display = "none"
    showProductsOnClick();
}

function closeWebHelperProductenOnClick(){
    document.getElementById("web-helper-zoek-producten-container").style.display = "none";

}

function showOptiesOnClick(){
    document.getElementById("web-helper-button-product-zoeken").style.display = "inline";
    document.getElementById("web-helper-span").textContent = "Waarmee kan ik u helpen?"

    document.getElementById("web-helper-laptops-buttons").style.display = "none";
    document.getElementById("web-helper-phones-buttons").style.display = "none";
    document.getElementById("web-helper-opslag-buttons").style.display = "none";
    document.getElementById("web-helper-routers-buttons").style.display = "none";
    document.getElementById("web-helper-components-buttons").style.display = "none";
    document.getElementById("web-helper-desktops-buttons").style.display = "none";
    document.getElementById("web-helper-category-terug-button").style.display = "none";
    document.getElementById("web-helper-zoek-producten-container").style.display = "none";


}

function doSomething(){
    let randomNumber = Math.floor(Math.random()*4);
    if (!sessionStorage.getItem("visited")){
        document.getElementById("algemene-voorwaarden-check").style.display = "inline";
        sessionStorage.setItem("visited","TRUE");
        console.log("show visited");
    }else if (!sessionStorage.getItem("nerdyBroActief")){
        if (randomNumber === 0){
            let randomColor = Math.floor(Math.random()*16777215).toString(16);
            let audio = new Audio("../audio/stars.mp3")
            audio.volume = 0.05;
            document.getElementsByClassName("navbar")[0].style.background ="#"+randomColor;
            audio.play();
        }
        if (randomNumber === 1){
            let audio = new Audio("../audio/yoda.mp3");
            audio.volume = 0.05;
           audio.play();
        }
        if (randomNumber === 2){
            let audio = new Audio("../audio/uagh.mp3");
            audio.volume = 0.01;
            audio.play();
        }
        if (randomNumber === 3){
            let check = document.getElementById("algemene-voorwaarden-check")
            check.style.display =("inline")
        }
    }
}

function active(){
    setInterval(doSomething,20000);
}
active();
function showProductsOnClick(){
    let buttons = document.getElementsByClassName("web-helper-zoek-producten-buttons");
    let buttonValue = buttons.value;

    for (let i = 0; i <buttons.length ; i++) {
        if (buttons[0].value === "laptops"){
            document.getElementsByClassName("laptops")[i].style.display = "inline";
            console.log(buttons[0].value);
            console.log("laptops");
        }
        if (buttons[0].value === "phones"){
            document.getElementsByClassName("phones")[i].style.display = "inline";
            console.log(buttons[0].value);
            console.log("phones");

        }
        if (buttons[0].value === "opslag"){
            document.getElementsByClassName("opslag")[i].style.display = "inline";
            console.log("opslag");

        }
        if (buttons[0].value === "routers"){
            document.getElementsByClassName("routers")[i].style.display = "inline";
            console.log("routers");

        }
        if (buttons[0].value === "componenten"){
            document.getElementsByClassName("componenten")[i].style.display = "inline";
            console.log("componenten");

        }
        if (buttons[0].value === "desktops"){
            document.getElementsByClassName("desktops")[i].style.display = "inline";
            console.log("desktops");

        }
    }
}

function algemeneVoorwaardenJaOnClick(){
    document.getElementById("algemene-voorwaarden-check-buttons-ja")
    location.href = ("../Pages/algemene-voorwaarden.php")
    sessionStorage.setItem("nerdyBroActief","TRUE");
}

function algemeneVoorwaardenNeeOnClick(){
    document.getElementById("algemene-voorwaarden-check-buttons-nee")
    document.getElementById("algemene-voorwaarden-check").style.display = "none";
}