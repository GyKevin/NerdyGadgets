<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kortingscodes</title>
    <link rel="stylesheet" href="/navbar/navbar.css">
    <script src="https://kit.fontawesome.com/d44308875f.js" crossorigin="anonymous"></script>
    <script src="/navbar/import-handler.js"></script>
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
        <!-- navigatie bar -->
        <div id="navbar"></div>
    <!-- content -->
<main>
    

<script type="text/javascript" src="../api/korting.js"></script>
<?php
session_start();
$kortingscode = kortingscode(5);
$_SESSION['korting'] = $kortingscode;


$numberofletters = 5;
function kortingscode($numberofletters)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $numberofletters; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}
?>

<div>
    <p><?php echo $kortingscode; ?></p>
</div>

<script src="/api/korting.js"></script>

<div class="redirect-button">
                        <a href="../pages/guest-checkout.php">
                            <button>kortingscode</button>
                        </a>
                        </div>
                        </main>
    <!-- footer -->
    <div id="footer"></div>
</main>
</body>
</html>
<style>
    .yea {
        transition: all 0.3s ease-in-out;
    }

    .redirect-button {
        margin-top: 100px;
    }
</style>