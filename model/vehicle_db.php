<?php 

function list_vehicles($sortBy, $type, $class, $make){
    global $db;
    $query = 'SELECT V.vehicleID, V.typeID, V.classID, V.makeID, V.year, M.make, V.model, T.type, C.class, V.price 
                FROM vehicles AS V  INNER JOIN types T ON V.typeID = T.typeID 
                INNER JOIN classes C ON V.classID = C.classID 
                INNER JOIN makes M ON V.makeID = M.makeID';
        if($type != 0){
            $query.='WHERE V.typeID = :type';
            if($class != 0){
                $query.='AND V.classID = :class';
            }
            if($make != 0){
                $query.='AND V.makeID = :make';
            }
        }elseif($type != 0){
            $query.='WHERE V.typeID = :type';
            if($class != 0){
                $query.='AND V.classID = :class';
            }
        }elseif($class != 0){
            $query.= 'WHERE V.classID = :class';
        }
        if($sortBy == 'price'){
            $query.= 'ORDER BY V.price DESC;';
        }else {
            $query.='ORDER BY V.year DESC;';
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

function get_types() {
    global $db;
    $query = 'SELECT * FROM types';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;

}

function get_classes() {
    global $db;
    $query = 'SELECT * FROM classes';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}
function get_makes() {
    global $db;
    $query = 'SELECT * FROM makes';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

?>