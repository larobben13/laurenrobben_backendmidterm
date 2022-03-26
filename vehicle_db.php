<?php

//Create Data
function add_vehicle($year, $model, $price, $type, $class, $make){
    global $db;
    $query = 'INSERT INTO vehicles(year, model, price, type_id, class_id, make_id) 
                VALUES(:year, :model, :price, :type, :class, :make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type', $type);
    $statement->bindValue(':class', $class);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();

}

function add_type($type) {
    global $db;
    $query = 'INSERT INTO types(type)
                VALUES(:type)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closecursor();
}

function add_class($class) {
    global $db;
    $query = 'INSERT INTO classes(class)
                VALUES(:class)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $class);
    $statement->execute();
    $statement->closecursor();
}

function add_make($make) {
    global $db;
    $query = 'INSERT INTO makes(make)
                VALUES(:make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closecursor();
}

//Read Functions
function list_vehicles($sortBy, $type, $class, $make) {
    global $db;
    $query = 'SELECT V.vehicleID, V.typeID, V.classID, V.makeID, V.year, V.model, V.price, T.type, C.class, M.make,   
                FROM vehicles AS V INNER JOIN types T ON V.typeID = T.type_id 
                    INNER JOIN classes C ON V.classID = C.classID 
                        INNER JOIN makes M ON V.makeID = M.makeID';
    if($type != 0) {
        $query.='WHERE V.typeID = :type';
        if($class != 0) {
            $query.='WHERE V.classID= :class';
        }
        if($make != 0) {
            $query.='WHERE V.makeID = :make';
        }
    }elseif($type != 0){
        $query.='WHERE V.typeID =:type';
        if($class != 0){
            $query.='WHERE V.classID =:class';
        }
    }elseif($class !=0){
        $query.='WHERE V.classID = :class';
    }

    if($sortBy == 'price'){
        $query.='ORDER BY V.price DESC;';
    }else {
        $query.= 'ORDER BY V.year DESC;';
    }
    $statement = $db->prepare($query);
    if($type != 0){
        $statement->bindValue(':type', $type);
    }
    if($class != 0){
        $statement->bindValue(':class', $class);
    }
    if($make != 0){
        $statement->bindValue(':make', $make);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_types(){
    global $db;
    $query = 'SELECT * FROM types';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function get_classes(){
    global $db;
    $query = 'SELECT * FROM classes';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function get_makes(){
    global $db;
    $query = 'SELECT * FROM makes';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

//Delete
function delete_vehicles($vehicleID){
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicleID = :vehicleID';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleID', $vehicleID);
    $statement->execute();
    $statement->closeCursor();  
}

function delete_type($typeID){
    global $db;
    $query = 'DELETE FROM types WHERE typeID = :typeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $typeID);
    $statement->execute();
    $statement->closeCursor();  
}

function delete_class($class_id){
    global $db;
    $query = 'DELETE FROM classes WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();  
}

function delete_make($makeID){
    global $db;
    $query = 'DELETE FROM makes WHERE makeID = :makeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeID', $makeID);
    $statement->execute();
    $statement->closeCursor();  
}

?>