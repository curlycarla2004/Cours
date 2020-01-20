function creerRequete() {
    var requete = null;
    try{
        requete = new XMLHttpRequest();
    } catch (essaimicrosoft) {
        try {
            requete = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (autremicrosoft) {
            try {
                requete = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (echec) {
                requete = null;
            }
        }
    }

    if (requete == null){
        alert("Impossible de créer l'objet requête !");
    } else {
        return requete;
    }
}

var requete1 = creerRequete();
var requete2 = creerRequete();