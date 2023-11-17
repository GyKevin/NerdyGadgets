<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <script src="https://kit.fontawesome.com/d44308875f.js" crossorigin="anonymous"></script>
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
        <div class="login-container">
            <?php 
                session_start();
                if (isset($_SESSION['error'])) {
                    $error_output = $_SESSION['error'];
                    echo "<p style='color: red;'$error_output</p>";
                    echo $error_output;
                    unset($_SESSION['error']);
                }
            ?>
            <h2>Inloggen</h2>
            <form action="../api/login.php" method="post" class="login-form">
                <input type="email" name="email" placeholder="email"> <br>
                <input type="password" name="password" placeholder="wachtwoord"> <br>
                <input type="submit" class="login" value="Login">
                
            </form>
            <a class="go-to-login" href="/pages/register.php">Geen account? Maak een account aan.</a>
        </div>
    </main>
    <div id="footer"></div>
</body>
</html>

<style>
main {
    display: flex;
    justify-content: center;
}
.login-container {
    border: 2px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width: 500px;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 50px;
    margin-bottom: 50px;
}
.login-form input{
    width: 300px;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 3px;
}
.login {
    width: 100% !important;
    padding: 12px;
    background-color: #23232f;
    color: #ffffff;
    margin-top: 10px;
    margin-bottom: 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: all 0.3 ease-in-out;
}
.login:hover {
    background-color: #4e4e58;
}
.go-to-login {
    color: black;
    padding-bottom: 25px;
}
.go-to-login:hover {
    color: #4e4e58;
}
</style>