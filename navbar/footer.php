<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <!-- import font awesome -->
    <script src="https://use.fontawesome.com/e899ab5352.js"></script>
</head>
<body>
    <footer>
       <div class="links">
        <img class="footer-logo" src="/image/Logo.png" alt="">
            <ul>
                <!-- andere paginas -->
                <li><a href="">Algemene Voorwaarden</a></li>
                <li><a href="">Over ons</a></li>
                <li><a href="">Retourneren</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <!-- social media links -->
            <ul>
                <li><a href="">Twitter</a></li>
                <li><a href="">Facebook</a></li>
                <li><a href="">Instagram</a></li>
                <li><a href="">LinkedIn</a></li>
            </ul>
       </div>
        <div class="nieuwsbrief">
            <!-- <iframe name="frame" style="display: none;"></iframe> -->
            <form action="/newsletter.php" type="email" method="post" autocomplete="off">
                <p>Abonneer op onze nieuwsbrief!</p>
                <input type="text" name="email" placeholder="Jouw E-mail">
                <button type="submit">Abonneer</button>
                <br>
                <?php 
                    session_start();
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?>
            </form>
        </div>
    </footer>
</body>
</html>