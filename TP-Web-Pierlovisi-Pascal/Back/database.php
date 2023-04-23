<?php

function connection(){
    $dbh = null;
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=tp1_web", "pascal",
            "mpspppcmgp2A");
    }
    catch(PDOException $e)
    {
        print "Connection failed: " . $e->getMessage();
    }
    return $dbh;
}


function getData($name){

    $request = connection()->prepare('SELECT * FROM Produits WHERE nom =?');
    $request->execute([$name]);
    $res = $request->fetchAll();
    return $res;

}

function getDataById($id){

    $request = connection()->prepare('SELECT * FROM Produits WHERE id_produit=?');
    $request->execute([$id]);
    $res = $request->fetchAll();
    return $res;

}

function addData($nom, $description, $prix){
    $request = connection()->prepare('INSERT INTO Produits (nom, description, prix) VALUES (?,?,?)');

    Try{
        $request->execute([$nom, $description, $prix]);
        return True;
    }
    catch (PDOException $e){

        return False;

    }
}

function getAll(){

    $request = connection()->prepare('SELECT * FROM Produits');
    $request->execute();
    return $request->fetchAll();

}

function delete($nom){

    $request = connection()->prepare("DELETE FROM produits WHERE nom=?");
    $request->execute([$nom]);
    $count = $request->rowCount();

    if($count == 1){

        return True;
    }
    else{
        return False;
    }
}

function update($id, $prix){

    $request = connection()->prepare("UPDATE produits SET prix=?, date_up=? WHERE id_produit=?");
    $request->execute([$prix, date("Y-m-d H:i:s"),$id]);
    return getDataById($id);

}


?>