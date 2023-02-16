function getRandomArbitrary(min, max) {
    return Math.random() * (max - min) + min;
}

const button_my = document.querySelector("#monbouton");

button_my.addEventListener("click", alert("Hello World"));

function valider() {

    let nombre = getRandomArbitrary(0, 10)
    let nombre2 = getRandomArbitrary(0, 10)
// si la valeur du champ prenom est non vide


    if (document.getElementById("exampleInputPassword1") === (nombre + document.getElementById("exampleInputEmail1")) && nombre2 === (nombre + document.getElementById("exampleInputEmail1"))) {
        // alors on envoie le formulaire
        document.getElementById("isWinner").innerHTML = "<center><p> Égalité </p></center>";
    }
    if  (document.getElementById("exampleInputPassword1") === (nombre + document.getElementById("exampleInputEmail1"))) {
        // sinon on affiche un message
        document.getElementById("isWinner").innerHTML = "<center><p> Victoire ! </p></center>";
    }

    if(nombre2 === (nombre + document.getElementById("exampleInputPassword1"))) {
        // sinon on affiche un message
        document.getElementById("isWinner").innerHTML = "<center><p> Perdu ! </p></center>";
    } else {
        document.getElementById("isWinner").innerHTML = "<center><p> Égalité </p></center>";
    }
}