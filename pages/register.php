<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
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
        <div class="registratie-container">
            <h2>Registratie</h2>
            <form action="../api/register.php" method="post">
                <input type="text" name="first_name" placeholder="first name"> <br>
                <input type="text" name="surname_prefix" placeholder="surname"><br>
                <input type="text" name="last_name" placeholder="last name"><br>
                <input type="email" name="email" placeholder="email"><br>
                <input type="text" name="street_name" placeholder="street name"><br>
                <input type="text" name="house_number" placeholder="house number"><br>
                <input type="text" name="postal_code" placeholder="postal code"><br>
                <input type="text" name="city" placeholder="city"><br>
                <input type="password" name="password" placeholder="password"><br>
                <input type="password" name="repeat_password" placeholder="repeat password"><br>
                <input type="submit" class="Registreer" value="Registreer">
            </form>
            <a class="go-to-login" href="/pages/login.php">Heb je al een account? Log in.</a>
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
.registratie-container {
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
input {
    width: 300px;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 3px;
}
.Registreer {
    width: 100%;
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
.Registreer:hover {
    background-color: #4e4e58;
}
.go-to-login {
    color: black;
}
.go-to-login:hover {
    color: #4e4e58;
}
</style>