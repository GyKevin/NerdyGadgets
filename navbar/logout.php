<?php
// unset cookie
session_start();
session_unset();
session_destroy();
header("/");
?>