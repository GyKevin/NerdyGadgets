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
                    echo $kortingscode
                    ?>
                    <div class="redirect-button">
                    <a href="../pages/guest-checkout.php">
                        <button>kortingscode</button>
                    </a>
                      </div>

