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
        <div class="login">
            
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
                <input type="submit" value="Register">
            </form>
        </div>
    </main>
    <div id="footer"></div>
</body>
</html>