<?php

/**
 * 
 * redirection on tha page jeden_zamestnanec.php
 * 
 * @param string $path - redirection address
 * 
 * @return void
 * 
 */

 function redirectUrl($path) {
    
    if (isset ($SERVER["HTTPS"]) and $_SERVER["HTTPS"] != "off"){
        $url_protocol = "https";
    } else {
        $url_protocol = "http";
    }

        header("location: $url_protocol://" . $_SERVER["HTTP_HOST"] . $path);
    
    }
