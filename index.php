<?php require('model/database.php');?>
<?php require('model/vehicle_db.php');?>

<?php

$vehicleID = filter_input(INPUT_POST, 'vehicleID', FILTER_UNSAFE_RAW);
$year = filter_input(INPUT_POST, 'year', FILTER_UNSAFE_RAW);
$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
$price = filter_input(INPUT_POST, 'price', FILTER_UNSAFE_RAW);
$typeID = filter_input(INPUT_POST, 'typeID', FILTER_UNSAFE_RAW);
$classID = filter_input(INPUT_POST, 'classID', FILTER_UNSAFE_RAW);
$makeID = filter_input(INPUT_POST, 'makeID', FILTER_UNSAFE_RAW);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'list_vehicles'; 
    }
}
    $sortBy = filter_input(INPUT_POST, "sortBy", FILTER_UNSAFE_RAW);
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
    //List Vehicles
    if($action == 'list_vehicles'){
        $vehicles = list_vehicles($sortBy, $type, $class, $make);
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();
        include('view/vehicle_list.php');
    //Price
    }elseif($action == 'price' || $action == 'year'){
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();
        $vehicles = list_vehicles($sortBy, $type, $class, $make);
        //Delete vehicle
    }elseif($action == 'delete_vehicle'){
       delete_vehicle($vehicleID);
       $vehicles = list_vehicles($sortBy, $type, $class, $make);
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();
        include('view/vehicle_list.php');
    //Add Vehicle Form
    }elseif($action == 'add_vehicle_form'){
        $types = get_types($typename);
        $classes = get_classes();
        $makes = get_makes();
        include('view/add_vehicle.php');
    //Add Vehicle
    }elseif($action == 'add_vehicle'){
        add_vehicle($year, $model, $price, $type, $class, $make);
        $type = 0;
        $class = 0;
        $make = 0;
        $vehicles = list_vehicles($sortBy, $type, $class, $make);
         include('view/vehicle_list.php');
    //Edit Type Form
    }elseif($action == 'edit_types_form'){
        $types = get_types();
        include('view/edit_types.php');
    //Delete Type
    }elseif($action == 'delete_type'){
        delete_type($type);
        $types = get_types();
        include('view/edit_types.php');
    //Add Type
    }elseif($action == 'add_type'){  
        add_type($typename); 
        $types = get_types();
        include('view/edit_types.php');
    //Edit Class Form
}elseif($action == 'edit_classes_form'){
    $classes = get_classes();
    include('view/edit_classes.php');
//Delete Class
}elseif($action == 'delete_class'){
    delete_class($classes);
    $classes = get_classes();
    include('view/edit_classes.php');
//Add Class
}elseif($action == 'add_class'){  
    add_class($classname); 
    $classes = get_classes();
    include('view/edit_classes.php');

//Edit Make Form
}elseif($action == 'edit_makes_form'){
    $makes = get_makes();
    include('view/edit_makes.php');
//Delete Make
}elseif($action == 'delete_make'){
    delete_make($make);
    $makes = get_makes();
    include('view/edit_makes.php');
//Add Make
}elseif($action == 'add_make'){  
    add_make($makename); 
    $makes = get_makes();
    include('view/edit_makes.php');
}
?>