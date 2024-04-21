<?php

require_once("../models/LocationsModel.php");

if(isset($_GET['disconnect'])){
    userDisconnect();
}elseif(isset($_GET['administration'])){
    $locations = getAllLocations($db);
    require("../views/private/administration.html.php");
}else{
    require("../views/private/home.html.php");
}
