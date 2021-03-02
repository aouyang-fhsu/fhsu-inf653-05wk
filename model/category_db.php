<?php
    function get_categories(){
        global $db;

        $query = 'select * from categories
                    order by categoryID

        ';
        $statement = $db->prepare($query);
        $statement-> execute();
        $categories= $statement->fetchAll();
        $statement-> closeCursor();
        return $categories;
    }

    function get_categories_name($cat_id){
        global $db;

        if(!$cat_id){
            $query = 'select * from `categories`';
            
            $statement = $db->prepare($query);
            $statement-> execute();
            $categories= $statement->fetchAll();
            $statement-> closeCursor();
            return $categories;
        } else{
            $query = 'select * from categories
            where categoryID = :cat;
            ';

            $statement = $db->prepare($query);
            $statement->bindValue(':cat', $cat_id);
            $statement-> execute();
            $categories= $statement->fetchAll();
            $statement-> closeCursor();
            $categories_name = $categories['categoryName'];
            return $categories_name;
        }



    }

    function add_category($categoryName){
        global $db;
        $query = "INSERT INTO categories
        (categoryName)
    VALUES 
        (:cat)";
        $statement = $db->prepare($query);
        $statement->bindValue(':cat', $categoryName);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_category($categories_id){
        global $db;
        $query = 'DELETE FROM categories
        WHERE categoryID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $categories_id);
        $success = $statement->execute();
        $statement->closeCursor(); 
    }
?>