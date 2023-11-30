<?php 
session_start();

include_once("../db/dbc.php");

$sql = "SELECT `password` FROM user WHERE id =" . $_SESSION['user_id'];
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $currPass = $row['password'];
        $oldPass = $_POST['old_password'];
        $newPass = $_POST['new_password'];
        $newPass2 = $_POST['again_password'];

        $error_count = 0;
        //check if old password matches with the one in the input field
        if ($oldPass != $currPass) {
            $error_count = +1;
            $_SESSION['error'] = "Oude wachtwoorden matchen niet";
            header("location: ../pages/changePass.php");
        }

        //check if new passwords match
        if ($newPass != $newPass2) {
            $error_count = +1;
            $_SESSION["error"] = "Nieuwe wachtwoorden matchen niet";
            header("location: ../pages/changePass.php");
        }

        //check if fields are empty
        if (empty($oldPass) || empty($newPass) || empty($newPass2)) {
            $error_count = +1;    
            $_SESSION["error"] = "Vul alle velden in";
            header("location: ../pages/changePass.php");
        }

        if ($error_count == 0) {
            $updatePass = "UPDATE user SET password = '$newPass' WHERE id = " . $_SESSION['user_id'];
        }
        
        if (mysqli_query($conn, $updatePass)) {
            $_SESSION['success'] = "Uw wachtwoord is succesvol geupdate";
            header("location: ../pages/changePass.php");
        } else {
            echo "Error: " . $updatePass . " " . mysqli_error($conn);
        }
    }
}

?>