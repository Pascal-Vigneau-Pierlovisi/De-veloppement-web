<?php

require "database.php";

session_start();

$conn = getDatabase();

$current_date = time();
$format_date = date("Y/m/d", $current_date);

$login = $_REQUEST['login'];
$SESSION = $_SESSION["username"];


if(!isset($SESSION)){

    $request = $conn->prepare('SELECT * FROM user_table WHERE username =?');
    $request->execute([$login]);
    $res = $request->fetchAll();

    if(count($res) < 1){


        $insert = $conn->prepare("INSERT INTO user_table (username, date_crea, date_con) VALUES (?,?,?)");
        $insert->execute([$login, $format_date, $format_date]);
        echo "Bienvenue " . $login;
        $SESSION = $_SESSION["username"] = $login;

    }
    else{
        $update = $conn->prepare("UPDATE user_table SET date_con=? WHERE username=?");
        $update->execute([$format_date, $login]);
        $SESSION = $_SESSION["username"] = $login;
        echo "Bienvenue " . $SESSION;
    }
}

else{
    if(isset($SESSION)){
        echo "Rebonjour ". $SESSION;
    }
    else{
        echo "Access interdit vous devez être connecté !";
    }
}


?>