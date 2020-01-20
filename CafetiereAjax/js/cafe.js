function envoyerRequete(requete, url) {
    //Envoyer une requête à la cafetiere
    requete.onreadystatechange = servirCafe;
    requete.open('GET', url, true);
    requete.send(null);
}

function commanderCafe() {
    //Prendre une commande dans le formulaire web
    var nom = document.getElementById("nom").value;

    var boisson = getBoisson();
    var taille = getTaille();

    var divStatutCafetiere1 = document.getElementById("status-cafetiere1");
    var statut = getTexte(divStatutCafetiere1);
    
    // var img1 = document.createElement("image1");
    // var img2 = document.createElement("image2");

    if (statut == "Inactive") {
        remplacerTexte(divStatutCafetiere1, "Préparation du " + taille + " " + boisson + " de " + nom);
        
        document.forms[0].reset();
        var url = "cafetiere.php?nom=" + escape(nom) + "&taille=" + escape(taille) + "&boisson=" + escape(boisson)+ "&cafetiere=1";
        envoyerRequete(requete1, url);
        ServingCoffeeImage();

    } else {

        var divStatutCafetiere2 = document.getElementById("status-cafetiere2");
        var statut = getTexte(divStatutCafetiere2);
        if (statut == "Inactive") {
            remplacerTexte(divStatutCafetiere2, "Préparation du " + taille + " " + boisson + " de " + nom);
            // document.getElementById("image").innerHTML = '<img src=Serving-coffee.jpg />';
            document.forms[0].reset();
            var url = "cafetiere.php?nom=" + escape(nom) + "&taille=" + escape(taille) + "&boisson=" + escape(boisson) + "&cafetiere=2";
            envoyerRequete(requete2, url);
            ServingCoffeeImage2();
        } else ("Désolé! Les deux cafetières sont occupés." + "Réessayez plus tard.");
        
    }
}

function servirCafe() {
    //Quand la cafeitere a fini, servir la boisson
    if (requete1.readyState == 4) {
        if (requete1.status == 200) {
            var reponse = requete1.responseText;
            //Determiner qui a passé la commande
            //et quelle cafetière l'a préparée
            var quellecafetiere = reponse.substring(0, 1);
            var nom = reponse.substring(1, reponse.length);
            if (quellecafetiere == "1"){
                var divStatutCafetiere1 = document.getElementById("status-cafetiere1");
                remplacerTexte(divStatutCafetiere1, "Inactive");
            } else {
                var divStatutCafetiere2 = document.getElementById("status-cafetiere2");
                remplacerTexte(divStatutCafetiere2, "Inactive");
            }
            alert(nom + ", votre café est prêt!");
            requete1 = creerRequete();
            backToMachineImage();
        } else{
            alert("Erreur! Statut de la requête = " + requete1.status);
        }

    }else if (requete2.readyState == 4) {
        if (requete2.status == 200) {
            var reponse = requete2.responseText;
            //Determiner qui a passé la commande
            //et quelle cafetière l'a préparée
            var quellecafetiere = reponse.substring(0, 1);
            var nom = reponse.substring(1, reponse.length);
            if (quellecafetiere == "1"){
                var divStatutCafetiere1 = document.getElementById("status-cafetiere1");
                remplacerTexte(divStatutCafetiere1, "Inactive");
            } else {
                var divStatutCafetiere2 = document.getElementById("status-cafetiere2");
                remplacerTexte(divStatutCafetiere2, "Inactive");
            }
            alert(nom + ", votre café est prêt!");
            requete2 = creerRequete();
            backToMachineImage2();
        } else {
            alert("Erreur! Statut de la requête = " + requete2.status);
            
        }
    }
}

function getBoisson() {
    var boisson = $("input[name=boisson]:checked").val();
    return boisson;
}

function getTaille() {
    var taille = $("input[name=taille]:checked").val();
    return taille;
}

function ServingCoffeeImage(){
     
    document.getElementById("image1").src="https://data.photofunky.net/output/image/d/d/a/5/dda5e9/photofunky.gif"
    var img1 = document.getElementById('image1');
    // img1.style.height = '250px';
    // img1.style.width = '180px';
}

function backToMachineImage(){
    document.getElementById("image1").src="img/left.jpg"
}

function ServingCoffeeImage2(){
    document.getElementById("image2").src="https://data.photofunky.net/output/image/d/d/a/5/dda5e9/photofunky.gif"
    var img2 = document.getElementById('image2');
}

function backToMachineImage2(){
    document.getElementById("image2").src="img/right.jpg"
}