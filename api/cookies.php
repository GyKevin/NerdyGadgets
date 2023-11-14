<?php
function setcookieClicks(){
    $laptopClicks = 0;
    $phoneClicks = 0;
    $opslagClicks = 0;
    $routerClicks = 0;
    $componentClicks = 0;
    $desktopClicks = 0;

    setcookie("LaptopClicks", $laptopClicks,time() +(86400 *30), "/");
    setcookie("phoneClicks", $phoneClicks,time() +(86400 *30), "/");
    setcookie("opslagClicks", $opslagClicks,time() +(86400 *30), "/");
    setcookie("routerClicks", $routerClicks,time() +(86400 *30), "/");
    setcookie("componentClicks", $componentClicks,time() +(86400 *30), "/");
    setcookie("desktopClicks", $desktopClicks,time() +(86400 *30), "/");
}
?>

