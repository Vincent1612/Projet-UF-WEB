<?php

    define('HOST','localhost');
    define('DB_NAME','siteweb');
    define('USER','root');
    define('PASS','');

    try{
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);

    } catch(PDOException $e){
        echo $e;
    }