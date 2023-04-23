submit.onclick = () =>{

    const color = document.getElementById("color");
    const message = document.getElementById("messageContent");

    // Définir les données à envoyer dans la requête POST
    const donnees = {
        name: nom.value,
        description: description.value,
        prix: prix.value
    };

// Définir les options de requête pour la méthode POST
    const options = {
        method: "POST",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(donnees)
    };

// Effectuer la requête Fetch avec les options spécifiées
    fetch("http://localhost:8888/microservice.php/api", options)
        .then(response => {
            if (!response.ok) {
                throw new Error("Erreur HTTP " + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log("Données reçues :", data);
        })
        .catch(error => {
            console.error("Erreur :", error);
        });

}