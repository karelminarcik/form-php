<?php

/**
 * 
 * Create a new user to the database
 * 
 * @param object $connection - connection to the database
 * @param string $first_name - first name of the user
 * @param string $second_name - last name of the user
 * @param integer $email - email of the employee
 * @param string $password - password of the employee
 *
 * 
 * @return int $id - id of the user
 * 
 */

 function AddUser($connection, $first_name, $second_name, $email, $password){
    

    $sql = "INSERT INTO users(first_name, second_name, email, password)
            VALUES (?,?,?,?)";

    

    $statement = mysqli_prepare($connection,$sql);
    

    if ($statement === false){
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($statement, "ssss", $first_name, $second_name, $email, $password);
        mysqli_stmt_execute($statement);
        $id = mysqli_insert_id($connection);

        if(!empty($id)){
            return $id;
        } else {
            echo mysqli_stmt_error($statement);
        }
    }
}