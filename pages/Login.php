<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NerdyGadgets</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/navbar/import-handler.js" defer></script>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        #footer {
            margin-top: auto; 
        }
    </style>
</head>
<body>
<!-- navbar -->
<div id="navbar"></div>

<!-- content -->
<div class="login_content">
    <div class="container">
        <div class="login-form">
            <h2>Inloggen</h2>
            <form action="login.php" method="post">
                
                <input type="text" name="username" placeholder="Gebruikersnaam" required>
                <input type="password" name="password" placeholder="Wachtwoord" required>
                <button class="Inloggen" type="submit">Inloggen</button>
            </form>
        </div>
    </div>
</div>
    <!-- footer -->
    <div id="footer"></div>
</body>
</html>
<style>
.login_content {
        width: 100vw;
        display: flex;
        justify-content: center;
    }
body {
    font-family: Arial, sans-serif;
    background-color: #ffffff;
    color: #333;
    display: flex;
    justify-content: center;
    margin: 0;
}
.container {
    display: flex;
    background-color: #ffffff;
    border: 1px solid #ddd;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    overflow: hidden;
    margin: 100px;
    width: 400px;
    justify-content: center;
    
}
.container > div {
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

s
.login-form {
    background-color: #ffffff;
    text-align: center;
    border-right: 1px solid #ddd;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

form {
    width: 100%;
    max-width: 300px;
    margin-right: 20px;
}

input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 3px;
}

.Inloggen {
    width: 108%;
    padding: 12px;
    background-color: #23232f;
    color: #ffffff;
    margin-top: 10px;
    margin-bottom: 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #4e4e58;
}

</style>