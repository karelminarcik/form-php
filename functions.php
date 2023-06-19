<?php

function AddFun(){
    global $connection;
    // $firstname = $_POST["first_name"];
    // $lastname = $_POST["last_name"];
    // $age = $_POST["age"];
    // $department = $_POST["department"];
    // $position = $_POST["position"];

    $sql = "INSERT INTO zamestnanci(first_name, last_name, age, department, position)
            VALUES (?,?,?,?,?)";

    $statement = mysqli_prepare($connection,$sql);

    if ($statement === false){
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($statement, "ssiss", $_POST["first_name"], $_POST["last_name"], $_POST["age"], $_POST["department"], $_POST["position"]);

        if(mysqli_stmt_execute($statement)){
            $id = mysqli_insert_id($connection);
            header("location: jeden_zamestnanec.php?id=$id");
        } else {
            echo mysqli_stmt_error($statement);
        }
    }



    

    
    // $result = mysqli_query($connection, $sql);

    // if(!$result){
    //     die("Dotaz do databaze selhal");
    // }
    // exit;
}