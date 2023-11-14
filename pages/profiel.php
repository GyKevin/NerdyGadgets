<?php 
session_start();

include_once("../db/dbc.php");

if (isset($_SESSION['user_id'])) {
    $sql = "SELECT * FROM user WHERE id = " . $_SESSION['user_id'];
    $res= $conn -> query($sql);
    if ($res -> num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $first_name = $row["first_name"];
            $surname_prefix = $row["surname_prefix"];
            $last_name = $row["surname"];
            $email = $row["email"];
            $street_name = $row["street_name"];
            $apartment_nr = $row["apartment_nr"];
            $postal_code = $row["postal_code"];
            $city = $row["city"];
        }
    }
}
?>

<script>
    function changeData() {
       const element =  document.getElementsByClassName("change");
        for (let i = 0; i < element.length; i++) {
            element[i]..removeAttribute("disabled");
        }
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Gegevens</title>
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
            <div class="profiel-container">
                <form action="" class="input-form">
                    <h2>Mijn Gegevens</h2>
                    <label for="first_name">
                        Voornaam <br>
                        <input type='text' class="change" name='first_name' value='<?=$first_name?>' disabled>
                    </label>

                    <label for="surname_prefix">
                        Tussenvoegsel <br>
                        <input type='text' class="change" name='surname_prefix' value='<?=$surname_prefix?>' disabled>
                    </label>
                    
                    <label for="surname">
                        Achternaam <br>
                        <input type='text' class="change" name='surname' value='<?=$last_name?>' disabled>
                    </label>

                    <label for="email">
                        Email <br>
                        <input type='text' class="change" name='email' value='<?=$email?>' disabled>
                    </label>

                    <label for="street_name">
                        Straat naam <br>
                        <input type='text' class="change" name='street_name' value='<?=$street_name?>' disabled>
                    </label>

                    <label for="apartment_nr">
                        Huisnummer <br>
                        <input type='text' class="change" name='apartment_nr' value='<?=$apartment_nr?>' disabled>
                    </label>

                    <label for="postal_code">
                        Post code <br>
                        <input type='text' class="change" name='postal_code' value='<?=$postal_code?>' disabled>
                    </label>

                    <label for="city">
                        Stad <br>
                        <input type='text' class="change" name='city' value='<?=$city?>' disabled>
                    </label>

                    
                </form>
                <button onclick="changeData()">Gegevens aanpassen</button>
            </div>
            
        </main>
    <div id="footer"></div>
</body>
</html>

<style>
.profiel-container {
    /* width: 100%; */
    /* border: 2px solid red; */
    display: flex;
    justify-content: center;
    margin-top: 50px;
    margin-bottom: 50px;
}
.input-form {
    width: 500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 2px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}
.input-form input {
    width: 300px;
    padding: 12px;
    margin: 5px 0;
    border: 1px solid #ddd;
    border-radius: 3px;
}
</style>