//compteur de pages vues
function getXMLHttpRequest() {
    var xhr = null;
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        else {
            xhr = new XMLHttpRequest();
        }
    }
    else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
    return xhr;
}

function ResponseProcessingCounter(ValueEcho) {
    document.getElementById("Compteur_Visite").innerHTML = ValueEcho;
}

function SendExecutionRequestPHP(ResponseProcessingCounter) {
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            ResponseProcessingCounter(xhr.responseText);
        }
    }
    xhr.open("GET", "/data/compteur.php", true);
    xhr.send(null);
}

window.onload = SendExecutionRequestPHP(ResponseProcessingCounter);