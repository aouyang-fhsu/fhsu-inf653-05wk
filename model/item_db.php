<?php 
    function select_items_by_categories($category_id){
        global $db;
        
        if($category_id == NULL || $category_id == false){
            $query = 'SELECT * 
                        FROM `todoitems`';
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } else {
            $query = 'SELECT * 
                    FROM todoitems
                    where todoitems.categoryID = :categoryID;
                    ';
            $statement = $db->prepare($query);
            $statement->bindValue(':categoryID', $category_id);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;            
        }
    }
    
    function select_items_by_name($name){
        global $db;

        $query = 'SELECT * FROM todoitems';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    function insert_item($item, $description){
        global $db;
        $query = "INSERT INTO todoitems
        (Title, Description)
    VALUES 
        (:item, :description)";
        $statement = $db->prepare($query);
        $statement->bindValue(':item', $item);
        $statement->bindValue(':description', $description);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_items($id){
        global $db;
        $query = 'DELETE FROM todoitems
        WHERE ItemNum = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $success = $statement->execute();
        $statement->closeCursor(); 
    }
?>