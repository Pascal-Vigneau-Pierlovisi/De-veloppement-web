<?php

function getDatabase(){
    $dbh = null;
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=td_php", "pascal",
            "mpspppcmgp2A");
    }
    catch(PDOException $e)
    {
        print "Connection failed: " . $e->getMessage();
    }
    return $dbh;
}

 ?>