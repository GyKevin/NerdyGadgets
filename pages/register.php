<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
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

<script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            var y = document.getElementById("repass");
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }

        }
        function mySubmit(obj) {
            var pwdObj = document.getElementById('password');
            var hashObj = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
            hashObj.update(pwdObj.value);
            var hash = hashObj.getHash("HEX");
            pwdObj.value = hash;
            console.log(pwdObj.value)

            var pwdObj = document.getElementById('repass');
            var hashObj = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
            hashObj.update(pwdObj.value);
            var hash = hashObj.getHash("HEX");
            pwdObj.value = hash;
            console.log(pwdObj.value)
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsSHA/2.0.2/sha.js"></script>
</head>
<body>
<div id="navbar"></div>
    <main>
        <div class="registratie-container">
            <?php 
                session_start();
                if (isset($_SESSION['error'])) {
                    $error_output = $_SESSION['error'];
                    echo "<p style='color: red;'$error_output</p>";
                    echo $error_output;
                    unset($_SESSION['error']);
                }
            ?>
            <h2>Registratie</h2>
            <form action="../api/register.php" method="post" class="registratie-form">
                <input type="text" name="first_name" placeholder="Voornaam"> <br>
                <input type="text" name="surname_prefix" placeholder="Tussenvoegsel"><br>
                <input type="text" name="last_name" placeholder="Achternaam"><br>
                <input type="email" name="email" placeholder="email"><br>
                <input type="text" name="street_name" placeholder="Straat naam"><br>
                <input type="text" name="house_number" placeholder="huisnummer"><br>
                <input type="text" name="postal_code" placeholder="postcode"><br>
                <input type="text" name="city" placeholder="Stad"><br>
                <input type="password" name="password" placeholder="Wachtwoord" id="password"><br>
                <input type="password" name="repeat_password" placeholder="Herhaal Wachtwoord" id="repass"><br>
                <input type="submit" class="Registreer" value="Registreer" onclick="mySubmit(this)">
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
.registratie-form input {
    width: 300px;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 3px;
}
.Registreer {
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
.Registreer:hover {
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