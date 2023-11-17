<?php
function setAllCookieClicks(){
    $laptopClicks = 0;
    $phoneClicks = 0;
    $opslagClicks = 0;
    $routerClicks = 0;
    $componentClicks = 0;
    $desktopClicks = 0;

    if (isset($_COOKIE["laptopClicks"])){
        setcookie("laptopClicks", $laptopClicks,time() +(86400 *30), "/");
    }
    if (isset($_COOKIE["phoneClicks"])){
        setcookie("phoneClicks", $phoneClicks,time() +(86400 *30), "/");
    }
    if (isset($_COOKIE["opslagClicks"])){
        setcookie("opslagClicks", $opslagClicks,time() +(86400 *30), "/");
    }
    if (isset($_COOKIE["routerClicks"])){
        setcookie("routerClicks", $routerClicks,time() +(86400 *30), "/");
    }
    if (isset($_COOKIE["componentClicks"])){
        setcookie("componentClicks", $componentClicks,time() +(86400 *30), "/");
    }
    if (isset($_COOKIE["desktopClicks"])){
        setcookie("desktopClicks", $desktopClicks,time() +(86400 *30), "/");
    }
}

function addLaptopClick(){
    if (isset($_COOKIE["laptopClicks"])){
        $laptopClicks = $_COOKIE["laptopClicks"];
        echo $laptopClicks;
        $laptopClicks++;
        echo $laptopClicks;


        setcookie("laptopClicks", $laptopClicks,time() +(86400 *30), "/");
    }
}

function addPhoneClicks(){
    if (!isset($_COOKIE["phoneClicks"])){
        $phoneClicks = $_COOKIE["phoneClicks"];
        $phoneClicks++;

        setcookie("phoneClicks", $phoneClicks,time() +(86400 *30), "/");
    }
}

function addOpslagClick(){
    if (!isset($_COOKIE["phoneClicks"])){
        $opslagClicks = $_COOKIE["opslagClicks"];
        $opslagClicks++;

        setcookie("opslagClicks", $opslagClicks,time() +(86400 *30), "/");
    }

}

function addRouterClick(){
    if (!isset($_COOKIE["routerClicks"])){
        $routerClicks = $_COOKIE["routerClicks"];
        $routerClicks++;

        setcookie("routerClicks", $routerClicks,time() +(86400 *30), "/");
    }
}

function addComponentClick(){
    if (!isset($_COOKIE["componentClicks"])){
        $componentClicks = $_COOKIE["componentClicks"];
        $componentClicks++;

        setcookie("componentClicks", $componentClicks,time() +(86400 *30), "/");
    }
}

function addDesktopClick(){
    if (!isset($_COOKIE["desktopClicks"])){
        $desktopClicks = $_COOKIE["desktopClicks"];
        $desktopClicks++;

        setcookie("desktopClicks", $desktopClicks,time() +(86400 *30), "/");
    }
}
?>

