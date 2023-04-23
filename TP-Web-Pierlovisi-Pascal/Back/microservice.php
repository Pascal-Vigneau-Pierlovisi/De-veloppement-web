<?php

header("Content-Type:application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: *");

require "data.php";

$METHODE = $_SERVER["REQUEST_METHOD"];

if($METHODE == "POST"){

    if(isset($_POST["nom"]) && isset($_POST["description"]) && isset($_POST["prix"])){
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];


        if(addData($nom, $description, $prix)){
            response(200, "Success", NULL);
        }

        else{
            response(400, "Echec", NULL);
        }

    }

    else{
        response(400,"Invalid Request",NULL);
    }

}

else if($METHODE == "GET"){

    if(!empty($_GET['name'])) {

        $name=$_GET['name'];

        $price = getData($name);

        if(empty($price)) {

            response(200,"Product Not Found",NULL);

        }

        else {

            response(200,"Product Found",getData($name));

        }

    }
    else{
        response(200,"Success",getAllProducts());
    }

}

else if($METHODE == "DELETE"){

    if(!empty($_GET["name"])){

        $nom = $_GET["name"];


        if(delete($nom)){
            response(200, "success", NULL);
        }
        else{
            echo "here";
            response(400, "echec", NULL);
        }
    }
    else{
        response(400, "Invalid Request", NULL);
    }

}

else if($METHODE == "PUT"){

    if(!empty($_GET["id"])){

        $id = $_GET["id"];

        if(!empty($_GET["prix"])){

            $prix = $_GET['prix'];


            if(update($id, $prix)){
                response(200, "Success", update($id, $prix));
            }

            else{
                response(400, "Echec", NULL);
            }

        }
        else{
            response(200, "success", getDataById($id));
        }
    }

    else{
        response(400,"Invalid Request",NULL);
    }
}

else{

    response(400,"Invalid Request",NULL);

}

function response($status,$status_message,$data) {

      header("HTTP/1.1 ".$status);

      $response['status']=$status;

      $response['status_message']=$status_message;

      $response['data']=$data;

      $json_response = json_encode($response);

      echo $json_response;

}


