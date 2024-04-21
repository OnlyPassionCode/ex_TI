<?php

if(isset($_GET['login'])){

    if(isset($_POST['user'], $_POST['password'])){
        // userConnect redirige automatiquement
        $error = userConnect($db, $_POST['user']);
    }

    require("../views/public/login.html.php");
}else{
    require("../views/public/home.html.php");
}
