<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- import font-awesome -->
    <script src="https://kit.fontawesome.com/d44308875f.js" crossorigin="anonymous"></script>
    <script src="/navbar/import-handler.js" defer></script>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            padding-top: 55px;
        }
        #footer {
            margin-top: auto; 
        }
    </style>
</head>
<body>
    <div id="navbar"></div>
    <main>
        <div class="login">
            <form action="/pages/login.php" method="post">
                <label for="username">Gebruikersnaam</label>
                <input type="text" name="username" id="username" placeholder="gebruikersnaam" required>
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" placeholder="wachtwoord" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </main>
    <div id="footer"></div>
</body>
</html>