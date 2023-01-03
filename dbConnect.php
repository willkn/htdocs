<?php

if(session_id() === '') {
    session_start();
}

class DB extends SQLite3 {

    function __construct() {
        $this->open('Gym.db');
    }
}

$db = new DB();

if($db)
{
    $_SESSION['connected'] = true;
}


