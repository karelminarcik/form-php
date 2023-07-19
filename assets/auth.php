<?php

/**
 * 
 * Verify if the user is logged
 * 
 * 
 * @return boolean true if the user is logged otherwise false.
 */




function isLoggedIn(){
    return isset($_SESSION["is-loged-in"]) and $_SESSION["is-loged-in"];
}