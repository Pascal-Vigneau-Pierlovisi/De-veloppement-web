<?php

    require "database.php";

      function get_price($name) {

            $products = getData($name);

            //var_dump($products);

            foreach($products as $product) {

                  if($product["nom"]==$name) {

                        return $product["prix"]; break;

                  }

            }

}

function getAllProducts(){

          Try{
              return getAll();
          }
          catch (PDOException $e){
              return False;
          }

}