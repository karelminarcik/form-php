<?php

require "assets/url.php";

/**
 * 
 * Connection to database
 * 
 * @return object - for connection to the database
 * 
 */

function connectionDB() {
    $connection = mysqli_connect("127.0.0.1", "root", "", "firm");

    if (mysqli_connect_error()){
        echo mysqli_connect_error();
        exit;
    }

    return $connection;

}

/**
 * 
 * Create a new employee and redirect to the jeden_zamestnanec.php 
 * 
 * @param object $connection - connection to the database
 * @param string $first_name - first name of the employee
 * @param string $last_name - last name of the employee
 * @param integer $age - age name of the employee
 * @param string $department - department name of the employee
 * @param string $position - position name of the employee
 * 
 * @return void
 * 
 */

function AddEmployee($connection, $first_name, $second_name, $age, $department, $position){
    

    $sql = "INSERT INTO employees(first_name, last_name, age, department, position)
            VALUES (?,?,?,?,?)";

    

    $statement = mysqli_prepare($connection,$sql);

    if ($statement === false){
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($statement, "ssiss", $first_name, $second_name, $age, $department, $position);

        if(mysqli_stmt_execute($statement)){
            $id = mysqli_insert_id($connection);

            if (isset ($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] != "off"){
                $url_protocol = "https";
            } else {
                $url_protocol = "http";
            }

            header("location: $url_protocol://" . $_SERVER["HTTP_HOST"] . "/form-php/jeden_zamestnanec.php?id=$id");
        } else {
            echo mysqli_stmt_error($statement);
        }
    }
}

/**
 * 
 * Getting one specific student according to ID
 * 
 * @param object $connection - connection to the database
 * @param integer $ id - id of the one specific employee
 * 
 * @return mixed associative array, contents information about one specific employee or return null if no employee found.
 * 
 */

 function getEmployee ($connection, $id, $columns = "*") {
    $sql = "SELECT $columns
    FROM employees
    WHERE id = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if($stmt === false) {
       echo mysqli_error($connection); 
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        } else {
            echo mysqli_error($connection);
        }
    }

 }

/**
 * 
 * employee information update
 * 
 * @param object $connection - connection to the database
 * @param integer $id - specific employee ID
 * @param string $first_name - first name of the employee
 * @param string $last_name - last name of the employee
 * @param integer $age - age name of the employee
 * @param string $department - department name of the employee
 * @param string $position - position name of the employee
 * 
 * @return void 
 * 
 */

 function editEmployee($connection, $first_name, $last_name, $age, $department, $position, $id) {
    $sql = "UPDATE employees 
            SET first_name = ?,
                last_name = ?,
                age = ?,
                department = ?,
                position = ?
            WHERE id =?";
            
    $stmt = mysqli_prepare($connection, $sql);

    if (!$stmt) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "ssissi", $first_name, $last_name, $age, $department, $position, $id );
        
        if (mysqli_stmt_execute($stmt)) {
            redirectUrl("/form-php/jeden_zamestnanec.php?id=$id");
        }
    }
 }

/**
 * Delete employee from the database
 * 
 * @param object $connectio - connection to the database
 * @param integer $id - employees ID
 * 
 * @return void
 * 
 */


 function deleteEmployee ($connection, $id) {
    $sql = "DELETE 
    FROM employees
    WHERE id = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if(!$stmt) {
       echo mysqli_error($connection); 
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            redirectUrl("/form-php/zamestnanci.php");
        } else {
            echo mysqli_error($connection);
        }
    }

 }

/**
 * 
 * Return all employess from the database
 * 
 * @param object $connection - connection to the database
 * 
 * @return array associative array, contents information about all employees
 * 
 */

 function getAllEmployees($connection, $columns = "*") {
    $sql = "SELECT $columns 
            FROM employees";

    $result = mysqli_query($connection, $sql);

    if (!$result){
        echo mysqli_error($connection);
    } else {
        $employers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $employers;
    }
 }