<?php

// header('Content-Type: application/json');

$results = array();

$length = $_GET["length"];
if($_GET["min"]) {
    $min    = $_GET["min"];
} else $min = 1;
if($_GET["max"]) {
    $max    = $_GET["max"];
} else $max = $length;
$sort   = "";
if($_GET["sort"]) {
    $sort = $_GET["sort"];
}
if($_GET["inc"]) {
    if ($_GET["inc"]=="true"){
    $inc = true;
    if($_GET["incBy"]) {
        $incBy = $_GET["incBy"];
    } else $incBy = 1;
} else $inc = false;
} 

if ($inc) {
    if ($max < $length) {
        $length = $max;
    }
    for ($i=0;$i<$length;$i++) {
        $results[] = $min+$i*$incBy;
    }
} else {

    for ($i=0;$i<$length;$i++) {
        $results[] = rand($min,$max);
    }

}
    
    if ($sort=="asc") {
        sort($results);
    } elseif ($sort=="desc") {
        rsort($results);
    }
   
    $endArray = array('array' => $results);

    

    echo json_encode($endArray);    


?>
        