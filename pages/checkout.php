<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelwagen</title>
    <link rel="stylesheet" href="/navbar/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/navbar/import-handler.js"></script>
    <link rel="stylesheet" href="/css/checkout.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main{
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
    <div class="content">
    <div class="checkout">
        <div class="container">
        <form action="/action_page.php">

            <div class="row">
            <div class="billing">
                <h3>Billing Address</h3>
                <label for="fname">Full Name</label>
                <input type="text" id="fname" name="firstname">
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
                <label for="adr">Address</label>
                <input type="text" id="adr" name="address">
                <label for="city">City</label>
                <input type="text" id="city" name="city">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip">
            </div>

            <div class="payment">
                <h3>Payment</h3>

                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth">

                <div class="row">
                <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear">
                </div>
                <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv">
                </div>
                </div>
                </div>
            </div>

            </div>
            <input type="submit" value="Continue to checkout" class="btn">
        </form>
        </div>
    </div>
    </div>
    </main>
    <div id="footer"></div>
</body>
</html>