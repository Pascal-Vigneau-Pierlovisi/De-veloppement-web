


btn.onclick = () =>{

    // Sélectionner l'élément HTML où vous voulez insérer le tableau
    const monTableau = document.getElementById("monTableau");

// Faire un appel Fetch pour récupérer du contenu à partir d'une API ou d'un fichier
    fetch("http://localhost:8888/microservice.php/api?name=" + champ.value)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Parcourir les données de la réponse de l'appel Fetch et créer des éléments de tableau HTML
            data.data.forEach(item => {
                // Créer une nouvelle ligne de tableau HTML
                const newRow = monTableau.insertRow();

                // Insérer des cellules de tableau HTML dans la nouvelle ligne
                const cell1 = newRow.insertCell(0);
                const cell2 = newRow.insertCell(1);
                const cell3 = newRow.insertCell(2);
                const cell4 = newRow.insertCell(3);
                const cell5 = newRow.insertCell(4);

                // Ajouter les données de l'élément actuel à chaque cellule de la nouvelle ligne
                cell1.innerHTML = item.id_produit;
                cell2.innerHTML = item.nom;
                cell3.innerHTML = item.date_in;
                cell4.innerHTML = item.date_up;
                cell5.innerHTML = item.prix;

            });
        })
        .catch(error => {
            console.error('Erreur :', error);
        });

}