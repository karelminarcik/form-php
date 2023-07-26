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

/**
 * Verification of the user accorging to email and passwotrd
 * 
 * @param object $connection - connection to the database
 * @param string $log_mail - email from the login form
 * @param string $log_password - email from the login form
 * 
 * 
 * @return boolean true if success, false if not 
 */
function authentication ($connection, $log_email, $log_password) {
    $sql = "SELECT password
            FROM users
            WHERE email = ?";

    $stmt = mysqli_prepare ($connection, $sql);

    if($stmt){
        mysqli_stmt_bind_param($stmt, "s", $log_email);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if($result->num_rows !=0){
                $password_database = mysqli_fetch_row($result); //zde je v promenne pole
                $user_pass_database = $password_database[0]; //zde je v promenne string

                if($user_pass_database) {
                    return password_verify($log_password, $user_pass_database); //prvni vlozim zadany email, pote hash ke kontrole
            
                }
            } else {
                echo "Chyba pri prihlaseni.";
            }

            
            
        }
    } else {
        echo mysqli_error($connection);
         }
}

/**
 * Get user ID
 * 
 * @param object $connection - connection to the database
 * @param string $email - user email
 * 
 * @return int user ID
 * 
 */


 function getUserId ($connection, $email) {
    $sql = "SELECT id FROM users
            WHERE email = ?"; 

    $stmt = mysqli_prepare ($connection, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param ($stmt, "s", $email);

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            $id_database = mysqli_fetch_row ($result); //pole
            $user_id = $id_database[0];//string
            return $user_id;
        }
    } else {
        echo mysqli_error ($connection);
    }
 }