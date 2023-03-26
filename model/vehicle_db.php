<?php

function get_vehicles_by_type($type_id){
    global $db;
    if ($type_id) {
        $query = 'SELECT A.vehicle_id, A.model, A.year, C.type From vehicles A
            LEFT JOIN types C ON A.type_id = C.type_id
                WHERE A.type_id = :type_id ORDER BY A.vehicle_id';
    } else {
        $query = 'SELECT A.vehicle_id, A.model, A.year, C.type From vehicles A
        LEFT JOIN types C ON A.type_id = C.type_id ORDER BY C.type_id';
    }
    $statement = $db->prepare($query);
    if ($type_id) {
        $statement->bindValue(':type_id', $type_id);
    }
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

/*function get_vehicles_by_class($class_id){

}

function get_vehicles_by_make($make_id){
    global $db;
    if ($make_id) {
        $query = 'SELECT A.vehicle_id, A.model, A.year, C.make From vehicles A
            LEFT JOIN types C ON A.type_id = C.type_id
                WHERE A.type_id = :type_id ORDER BY A.vehicle_id';
    } else {
        $query = 'SELECT A.vehicle_id, A.model, A.year, C.type From vehicles A
        LEFT JOIN types C ON A.make_id = C.make_id ORDER BY C.make_id';
    }
    $statement = $db->prepare($query);
    if ($make_id) {
        $statement->bindValue(':make_id', $make_id);
    }
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}
*/

/*
function get_price($vehicle_id)
{
    global $db;
    $query = "SELECT price FROM vehicles WHERE vehicle_id = :vehicle_id";
    $statement= $db->prepare($query);
    $statement->execute([$vehicle_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return floatval($result['price']);

}
*/

function delete_item($vehicle_id)
{
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_item($type_id, $class_id, $make_id, $model, $year, $price)
{
    global $db;
    $query = 'INSERT INTO vehicles (type_id, class_id, make_id, model, year, price ) VALUES (:type_id, :class_id, :make_id, :model, :year, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}
