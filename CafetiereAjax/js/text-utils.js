function remplacerTexte(el, texte) {
    if (el != null) {
        effacerTexte(el);
        var nouveauNoeud = document.createTextNode(texte);
        el.appendChild(nouveauNoeud);
    }
}

function effacerTexte(el) {
    if (el != null) {
        if (el.childNodes) {
            for (var i=0; i < el.childNodes.length; i++) {
                var noeudFils = el.childNodes[i];
                el.removeChild(noeudFils);
            }
        }
    }
}

//lire de text de n'importe lequelle balise
function getTexte(el) {
    var text = "";
    if (el != null) {
        if (el.childNodes) {
            for (var i = 0; i < el.childNodes.length; i++) {
                var noeudFils = el.childNodes[i];
                if (noeudFils.nodeValue !=null) {
                    text = text + noeudFils.nodeValue;
                }
            }
        }
    }
    return text;
}