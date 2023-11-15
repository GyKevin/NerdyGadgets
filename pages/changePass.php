<?php 
session_start();

include_once("../db/dbc.php");

if (isset($_SESSION['user_id'])) {
    $sql = "SELECT * FROM user WHERE id = " . $_SESSION['user_id'];
    $res= $conn -> query($sql);
    if ($res -> num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $password = $row['password'];
        }
    }
}
?>

<script>
    function changeData() {
       const element =  document.getElementsByClassName("change");

        for (let i = 0; i < element.length; i++) {
            element[i].removeAttribute("disabled");
        }
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wachtwoord aanpassen</title>
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
                <div class="box">
                    <?php 
                    if (isset($_SESSION['error'])) {
                        $error_output = $_SESSION['error'];
                        echo "<p style='color: red;'$error_output</p>";
                        echo $error_output;
                        unset($_SESSION['error']);
                    } elseif (isset($_SESSION['success'])) {
                        $success_output = $_SESSION['success'];
                        echo "<p style='color: green;'$success_output</p>";
                        echo $success_output;
                        unset($_SESSION["success"]);
                    }
                    ?>
                    <form action="../api/changePass.php" method="post" class="input-form">
                        <h2>Wachtwoord aanpassen</h2>
                        <label for="old_password">
                            Oude Wachtwoord <br>
                            <input type="password" name="old_password">
                        </label>
                        <label for="new_password">
                            Nieuwe Wachtwoord <br>
                            <input type="password" name="new_password">
                        </label>
                        <label for="again_password">
                            Opnieuw Nieuwe Wachtwoord <br>
                            <input type="password" name="again_password">
                        </label>
                        <input type="submit" name="submit" id="submit" value="Opslaan">
                    </form>
                    <a id="gegevens" href="profiel.php">Terug naar Mijn Gegevens</a>
                </div>
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
.box {
    width: 500px; 
    border: 2px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    flex-direction: column;
}
.input-form {
    width: 500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    /* border: 2px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); */
}
.input-form input {
    width: 300px;
    padding: 12px;
    margin: 5px 0;
    border: 1px solid #ddd;
    border-radius: 3px;
}
#submit {
    background-color: white !important;
    border: 3px solid green !important;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
}
#submit:hover {
    transform: scale(1.05);
    cursor: pointer !important;
}
#aanpassen {
    width: 300px;
    padding: 12px;
    margin: 5px 0;
    background-color: white !important;
    border: 3px solid black !important;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
}
#aanpassen:hover {
    transform: scale(1.05);
    cursor: pointer !important;
}
#annuleren {
    width: 300px;
    padding: 12px;
    margin: 5px 0;
    background-color: white !important;
    border: 3px solid red !important;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
}
#annuleren:hover {
    transform: scale(1.05);
    cursor: pointer !important;
}
#gegevens {
    color: black;
}
#gegevens:hover {
    color: #4e4e58;
}
</style>