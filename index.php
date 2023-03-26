<?php
require('model/database.php');
require('model/vehicle_db.php');
require('model/type_db.php');
require('model/class_db.php');
require('model/make_db.php');

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

$types = filter_input(INPUT_POST, 'types', FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, 'type', FILTER_UNSAFE_RAW);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);

$makes = filter_input(INPUT_POST, 'makes', FILTER_VALIDATE_INT);
$make = filter_input(INPUT_POST, 'make', FILTER_UNSAFE_RAW);
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);


$classes = filter_input(INPUT_POST, 'classes', FILTER_VALIDATE_INT);
$class = filter_input(INPUT_POST, 'class', FILTER_UNSAFE_RAW);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);

if (!$type_id) {
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}
elseif (!$make_id) {
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}
elseif (!$class_id) {
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'list_items';
    }
}

switch ($action) {
    case "list_types":
        $types = get_types();
        include('view/type_list.php');
        break;
    case "add_type":
        add_type($type);
        header("Location: .?action=list_types");
        break;

    case "list_classes":
        $classes = get_classes();
        include('view/class_list.php');
        break;
    case "add_classes":
        add_class($class);
        header("Location: .?action=list_classes");
        break;

    case "list_makes":
        $makes = get_makes();
        include('view/make_list.php');
        break;
    case "add_makes":
        add_make($make);
        header("Location: .?action=list_makes");
        break;


    case "add_item":
        if ($type_id && $class_id && $make_id && $model && $year && $price) {
            add_item($type_id, $class_id, $make_id, $model, $year, $price);
            header("Location: .?action=$type_id");
        } else {
            $error = "Invalid item data .Check all felids and try again";
            include("view/error.php");
            exit();
        }
    case "delete_type":
        if ($type_id) {
            try {
                delete_type($type_id);
            } catch (PDOException $e) {
                $error = "You cannot delete a type if items exists in the type";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=list_types");
        }
        break;

    case "delete_item":
        if ($vehicle_id) {
            delete_item($vehicle_id);
            header("Location: .?action=list_items");
        } else {
            $error = "Missing or incorrect item id.";
            include('view/error.php');
        }
    default:
        $type = get_type_name($type_id);
        $class = get_class_name($class_id);
        $make = get_make_name($make_id);
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();
        //$vehicle_id = get_vehicle_id();
        //$price = get_price($vehicle_id);
        $items =  get_vehicles_by_type($type_id);
        include('view/vehicle_list.php');
}
