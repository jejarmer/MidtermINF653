<?php
function get_classes()
{
    global $db;
    $query = 'SELECT * FROM classes ORDER BY class_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function get_class_name($class_id)
{
    if (!$class_id) {
        return "All Classes";
    }
    global $db;
    $query = 'SELECT * FROM classes WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $c = $statement->fetch();
    $statement->closeCursor();
    $class = $c['class'];
    return $class;
}

function delete_class($class_id)
{
    global $db;
    $query = 'DELETE FROM classes where class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_class($class)
{
    global $db;
    $query = 'INSERT INTO classes ( class ) VALUES (:class)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $class);
    $statement->execute();
    $statement->closeCursor();
}
