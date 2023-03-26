<?php
function get_makes()
{
    global $db;
    $query = 'SELECT * FROM makes ORDER BY make_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_make_name($make_id)
{
    if (!$make_id) {
        return "All makes";
    }
    global $db;
    $query = 'SELECT * FROM makes WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $m = $statement->fetch();
    $statement->closeCursor();
    $make = $m['make'];
    return $make;
}

function delete_make($make_id)
{
    global $db;
    $query = 'DELETE FROM makes where make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($make)
{
    global $db;
    $query = 'INSERT INTO makes ( make ) VALUES (:make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();
}