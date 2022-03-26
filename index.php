<?php require('model/database.php');?>
<?php require('model/vehicle_db.php');?>


<?php 
include('view/header.php');


$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'list_vehicles';
    }
}

$sortBy = filter_input(INPUT_POST, 'sortBy', FILTER_UNSAFE_RAW);
    if(!$sortBy){
        $sortBy = 'price';
    }

    $type = filter_input(INPUT_POST, 'type', FILTER_UNSAFE_RAW);
    if(!$type){
        $type = 0;
    }

    $class = filter_input(INPUT_POST, 'class', FILTER_UNSAFE_RAW);
    if(!$class){
        $class = 0;
    }

    $make = filter_input(INPUT_POST, 'make', FILTER_UNSAFE_RAW);
    if(!$make){
        $make = 0;
    }

    if($action == 'list_vehicles'){
        $vehicles = list_vehicles($sortBy, $type, $class, $make);
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();
        include('view/vehicle_list.php');
    }elseif($action == 'price' || $action == 'year'){
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();
        $vehicles = list_vehicles($sortBy, $type, $class, $make);
    }
?>


 