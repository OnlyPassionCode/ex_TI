<?php
$locations = getAllLocations($db);

if(is_string($locations)) { // error
    echo json_encode(['error' => $locations]);
}else echo json_encode($locations);