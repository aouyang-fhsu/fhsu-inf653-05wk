<?php
    require('model/database.php');
    require('model/item_db.php');
    require('model/category_db.php');

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
    
    $categories = filter_input(INPUT_POST, 'categories', FILTER_SANITIZE_STRING);
    
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if($action == NULL){
            $action = 'list_tasks';
        }
    }

    $item = filter_input(INPUT_POST, "item", FILTER_SANITIZE_STRING);
    if(!$item){
        filter_input(INPUT_GET, "item", FILTER_SANITIZE_STRING);
    }
    
    $cat = filter_input(INPUT_POST, "cat", FILTER_SANITIZE_STRING);
    if(!$item){
        filter_input(INPUT_GET, "cat", FILTER_SANITIZE_STRING);
    }

    switch($action){
        case 'list_tasks':
            $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

            if($category_id==null || $category_id ==false ){
                $category_id=null;
            }

            $category_name= get_categories_name($category_id);
            $categories= get_categories();
            $results=select_items_by_categories($category_id);
            include('view/item_list.php');    
        break;

        case 'delete_item':
            $count = delete_items($id);
            header("Location: .?deleted={$count}");
        break;

        case 'insert_item':
            $count = insert_item($item, $description);
            header("Refresh:0");
        break;

        case 'delete_category':
            delete_category($id);
            header("Refresh:0");
        break;

        case 'insert_category':
            add_category($cat);
            header("Refresh:0");
    }

?>
